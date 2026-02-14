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
        Schema::table('applications', function (Blueprint $table) {
            $table->string('school_ac_name')->after('school_address')->nullable();
            $table->string('school_ac_number')->after('school_ac_name')->nullable();
            $table->string('school_ifsc')->after('school_ac_number')->nullable();
            $table->string('school_bank_name')->after('school_ifsc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'school_ac_name',
                'school_ac_number',
                'school_ifsc',
                'school_bank_name'
            ]);
        });
    }
};
