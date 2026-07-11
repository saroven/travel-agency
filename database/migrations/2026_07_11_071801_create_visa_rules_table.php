<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visa_rules', function (Blueprint $table) {
            $table->id();
            $table->string('country_code')->unique();
            $table->string('title');
            $table->integer('price');
            $table->string('processing_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visa_rules');
    }
};
