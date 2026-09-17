<?php

use App\Http\Controllers\Api\CrmLeadController;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'service' => 'AI-LeadFlow Mock CRM',
        'status' => 'healthy',
    ]);
});

Route::post('/leads', [CrmLeadController::class, 'store']);
Route::get('/leads/{lead}', [CrmLeadController::class, 'show']);
Route::patch('/leads/{lead}', [CrmLeadController::class, 'update']);
