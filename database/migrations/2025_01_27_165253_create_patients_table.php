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
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 150)->unique();
            $table->string('phone', 15);
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->text('address');
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('postal_code', 10);
            $table->string('country', 100);
            $table->string('emergency_contact_phone', 15);
            $table->text('medical_history')->nullable();
            $table->text('allergies')->nullable();
            $table->text('current_medications')->nullable();
            $table->unsignedBigInteger('doctor_assigned_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            $table->foreign('doctor_assigned_id')->references('id')->on('doctors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
