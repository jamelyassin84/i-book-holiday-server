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
        Schema::create('work_expieriences', function (Blueprint $table) {
            $table->id();

            $table->string('job_title');
            $table->string('company');
            $table->date('date_started');
            $table->enum('industry', ['Hospitality', 'Engineering', 'Others']);
            $table->string('industry_others_specified')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_expieriences');
    }
};
