<?php

namespace App\Http\Controllers;

use App\Models\CompetitionVote;
use Illuminate\Http\Request;

class CompetitionVoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $vote = CompetitionVote::create($validated);
        return response()->json($vote, 201);
    }

    public function destroy(CompetitionVote $competitionVote)
    {
        $competitionVote->delete();
        return response()->json(['message' => 'Vote removed successfully.'], 200);
    }
}
