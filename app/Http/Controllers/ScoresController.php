<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Http\Controllers;

use App\Models\Score\Best\Model as ScoreBest;
use App\Models\Solo\Score as SoloScore;
use App\Transformers\ScoreTransformer;
use App\Transformers\UserCompactTransformer;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class ScoresController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth', ['except' => [
            'show',
            'userRankLookup',
        ]]);

        $this->middleware('require-scopes:public');
    }

    public function download($rulesetOrSoloId, $id = null)
    {
        $shouldRedirect = !is_api_request() && !from_app_url();
        if ($id === null) {
            if ($shouldRedirect) {
                return ujs_redirect(route('scores.show', ['score' => $rulesetOrSoloId]));
            }
            $soloScore = SoloScore::where('has_replay', true)->findOrFail($rulesetOrSoloId);

            $score = $soloScore->legacyScore();

            if ($score === null) {
                abort(404);
            }

            $ruleset = $score->getMode();
        } else {
            if ($shouldRedirect) {
                return ujs_redirect(route('scores.show-legacy', ['score' => $id, 'mode' => $rulesetOrSoloId]));
            }
            $ruleset = $rulesetOrSoloId;
            // don't limit downloading replays of restricted users for review purpose
            $score = ScoreBest::getClass($ruleset)
                ::where('score_id', $id)
                ->where('replay', true)
                ->firstOrFail();
        }

        $replayFile = $score->replayFile();
        if ($replayFile === null) {
            abort(404);
        }

        try {
            $filename = "replay-{$ruleset}_{$score->beatmap_id}_{$score->getKey()}.osr";
            $body = $replayFile->get();
        } catch (FileNotFoundException $e) {
            // missing from storage.
            log_error($e);
            abort(404);
        }

        $file = $replayFile->headerChunk()
            .pack('i', strlen($body))
            .$body
            .$replayFile->endChunk();

        return response()->streamDownload(function () use ($file) {
            echo $file;
        }, $filename, ['Content-Type' => 'application/x-osu-replay']);
    }

    public function show($rulesetOrSoloId, $legacyId = null)
    {
        $score = $legacyId === null
            ? SoloScore::whereHas('beatmap.beatmapset')->findOrFail($rulesetOrSoloId)
            : ScoreBest::getClass($rulesetOrSoloId)
                ::whereHas('beatmap.beatmapset')
                ->visibleUsers()
                ->findOrFail($legacyId);

        $userIncludes = array_map(function ($include) {
            return "user.{$include}";
        }, UserCompactTransformer::CARD_INCLUDES);

        $scoreJson = json_item($score, new ScoreTransformer(), array_merge([
            'beatmap.max_combo',
            'beatmapset',
            'rank_global',
        ], $userIncludes));

        if (is_json_request()) {
            return $scoreJson;
        }

        return ext_view('scores.show', compact('score', 'scoreJson'));
    }

    public function userRankLookup()
    {
        $params = get_params(request()->all(), null, [
            'beatmapId:int',
            'score:int',
            'rulesetId:int',
        ]);

        foreach (['beatmapId', 'score', 'rulesetId'] as $key) {
            if (!isset($params[$key])) {
                abort(422, "required parameter '{$key}' is missing");
            }
        }

        $score = ScoreBest
            ::getClassByRulesetId($params['rulesetId'])
            ::where([
                'beatmap_id' => $params['beatmapId'],
                'hidden' => false,
                'score' => $params['score'],
            ])->firstOrFail();

        return response()->json($score->userRank(['cached' => false]) - 1);
    }
}
