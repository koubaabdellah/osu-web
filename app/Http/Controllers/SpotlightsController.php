<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Http\Controllers;

use App\Models\Spotlight;

/**
 * @group Ranking
 */
class SpotlightsController extends Controller
{
    /**
     * Get Spotlights
     *
     * Gets the list of spotlights.
     *
     * ---
     *
     * ### Response Format
     *
     * Returns [Spotlight Response](#spotlight-response)
     *
     * @authenticated
     */
    public function index()
    {
        return [
            'spotlights' => json_collection(Spotlight::orderBy('chart_id', 'desc')->get(), 'Spotlight'),
        ];
    }
}
