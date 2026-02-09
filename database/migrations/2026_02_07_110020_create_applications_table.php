<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            // Internal
            $table->string('reference_no')->unique();
            $table->string('status')->default('pending'); // pending | approved | rejected
            $table->timestamp('status_updated_at')->nullable();
            $table->text('remarks')->nullable();

            // Student & Family Details
            $table->string('student_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('address')->nullable();

            // Aadhar
            $table->string('student_aadhar')->nullable();
            $table->string('father_aadhar')->nullable();
            $table->string('mother_aadhar')->nullable();

            // Household
            $table->text('parents_illness')->nullable();
            $table->string('home_type')->nullable(); // own | rent
            $table->integer('total_family_members')->nullable();

            // Contact
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Income
            $table->string('parents_business')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();

            // Location
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();

            // School
            $table->string('school_name')->nullable();
            $table->integer('standard')->nullable();
            $table->string('school_phone')->nullable();
            $table->text('school_address')->nullable();

            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
