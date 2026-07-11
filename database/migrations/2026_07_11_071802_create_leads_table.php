<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // consultation, contact, service_inquiry, package_booking
            $table->string('source_page')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('destination')->nullable();
            $table->date('travel_date')->nullable();
            $table->string('budget')->nullable();
            $table->text('plan_details')->nullable();
            $table->string('service_slug')->nullable();
            $table->json('extra_data')->nullable();
            $table->string('status')->default('new'); // new, contacted, in_progress, completed, cancelled
            $table->text('admin_notes')->nullable();
            $table->string('assigned_to')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
