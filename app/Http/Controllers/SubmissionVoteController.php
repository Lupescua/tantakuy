<?php

namespace App\Http\Controllers;

use App\Models\SubmissionVote;
use Illuminate\Http\Request;

class SubmissionVoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => 'required|exists:user_submissions,id',
            'user_id' => 'required|exists:users,id',
        ]);

        return response()->json(SubmissionVote::create($validated), 201);
    }

    public function destroy(SubmissionVote $vote)
    {
        $vote->delete();
        return response()->json(['message' => 'Vote removed successfully.'], 200);
    }
}
