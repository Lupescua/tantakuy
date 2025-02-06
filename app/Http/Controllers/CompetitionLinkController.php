<?php

namespace App\Http\Controllers;

use App\Models\CompetitionLink;
use Illuminate\Http\Request;

class CompetitionLinkController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'display_type' => 'required|in:description,meta_description',
        ]);

        $link = CompetitionLink::create($validated);
        return response()->json($link, 201);
    }

    public function destroy(CompetitionLink $competitionLink)
    {
        $competitionLink->delete();
        return response()->json(['message' => 'Link removed successfully.'], 200);
    }
}
