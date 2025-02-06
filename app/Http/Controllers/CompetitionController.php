<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the competitions.
     */
    public function index()
    {
        return response()->json(Competition::with('company', 'participants', 'links')->get());
    }

    /**
     * Show the form for creating a new competition. (Not needed for API)
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created competition in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'prize' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => ['required', Rule::in(['Opened', 'Finished'])],
        ]);

        $competition = Competition::create($validated);

        return response()->json($competition, 201);
    }

    /**
     * Display the specified competition.
     */
    public function show(Competition $competition)
    {
        return response()->json($competition->load(['company', 'participants',  'links']));
    }

    /**
     * Show the form for editing the specified competition. (Not needed for API)
     */
    public function edit(Competition $competition)
    {
        abort(404);
    }

    /**
     * Update the specified competition in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'prize' => 'sometimes|string|max:255',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after:start_date',
            'status' => ['sometimes', Rule::in(['Opened', 'Finished'])],
        ]);

        $competition->update($validated);

        return response()->json($competition);
    }

    /**
     * Remove the specified competition from storage.
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
        return response()->json(['message' => 'Competition deleted successfully.'], 200);
    }
}
