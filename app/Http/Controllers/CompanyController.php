<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a list of companies.
     */
    public function index()
    {
        return response()->json(Company::all());
    }

    /**
     * Show a specific company.
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }

    /**
     * Store a newly created company.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:companies,name|max:255',
            'description' => 'nullable|string',
            'cvr' => 'required|string|unique:companies,cvr|max:20',
            'address' => 'nullable|string|max:255',
            'logo_path' => 'nullable|string|max:2048',
            'cover_photo_path' => 'nullable|string|max:2048',
            'subscription_level' => ['required', Rule::in(['free', 'plus', 'premium'])],
        ]);

        $company = Company::create($validated);

        return response()->json($company, 201);
    }

    /**
     * Update an existing company.
     */
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => ['string', 'max:255', Rule::unique('companies')->ignore($company->id)],
            'description' => 'nullable|string',
            'cvr' => ['string', 'max:20', Rule::unique('companies')->ignore($company->id)],
            'address' => 'nullable|string|max:255',
            'logo_path' => 'nullable|string|max:2048',
            'cover_photo_path' => 'nullable|string|max:2048',
            'subscription_level' => ['required', Rule::in(['free', 'plus', 'premium'])],
        ]);

        $company->update($validated);

        return response()->json($company);
    }

    /**
     * Delete a company.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(['message' => 'Company deleted successfully.'], 200);
    }
}
