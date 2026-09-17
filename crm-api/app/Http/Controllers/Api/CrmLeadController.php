<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CrmLead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CrmLeadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'source' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'string', 'max:50'],
            'lead_score' => ['nullable', 'numeric', 'between:0,100'],
            'classification' => ['nullable', 'string', 'max:50'],
            'ai_metadata' => ['nullable', 'array'],
        ]);

        $lead = CrmLead::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Lead created successfully.',
            'data' => $lead,
        ], 201);
    }

    public function show(CrmLead $lead): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $lead,
        ]);
    }

    public function update(Request $request, CrmLead $lead): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255'],
            'company' => ['sometimes', 'nullable', 'string', 'max:255'],
            'job_title' => ['sometimes', 'nullable', 'string', 'max:255'],
            'message' => ['sometimes', 'nullable', 'string'],
            'source' => ['sometimes', 'nullable', 'string', 'max:100'],
            'status' => ['sometimes', 'string', 'max:50'],
            'lead_score' => ['sometimes', 'nullable', 'numeric', 'between:0,100'],
            'classification' => ['sometimes', 'nullable', 'string', 'max:50'],
            'ai_metadata' => ['sometimes', 'nullable', 'array'],
        ]);

        $lead->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Lead updated successfully.',
            'data' => $lead->fresh(),
        ]);
    }
}
