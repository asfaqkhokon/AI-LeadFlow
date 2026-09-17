<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmLead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company',
        'job_title',
        'message',
        'source',
        'status',
        'lead_score',
        'classification',
        'ai_metadata',
    ];

    protected $casts = [
        'lead_score' => 'decimal:2',
        'ai_metadata' => 'array',
    ];
}
