<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crm_leads', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('company')->nullable();
        $table->string('job_title')->nullable();
        $table->text('message')->nullable();
        $table->string('source')->nullable();
        $table->string('status')->default('new');
        $table->decimal('lead_score', 5, 2)->nullable();
        $table->string('classification')->nullable();
        $table->json('ai_metadata')->nullable();
        $table->timestamps();

        $table->index('email');
        $table->index('status');
        $table->index('classification');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_leads');
    }
};
