<?php

namespace App\Http\Controllers;

use App\Models\UserSubmission;
use Illuminate\Http\Request;

class UserSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'competition_id' => 'required|exists:competitions,id',
            'title' => 'required|string|max:255',
            'images' => 'required|array',
            'meta_description' => 'nullable|string',
        ]);

        return response()->json(UserSubmission::create($validated), 201);
    }

    public function destroy(UserSubmission $submission)
    {
        $submission->delete();
        return response()->json(['message' => 'Submission deleted successfully.'], 200);
    }
}
