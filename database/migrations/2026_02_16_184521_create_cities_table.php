<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('is_active')->default(true);
            $table->timestamps();
        });

        DB::table('cities')->insert([
            ['name' => 'Ahmedabad', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Surat', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vadodara', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rajkot', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bhavnagar', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jamnagar', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Junagadh', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gandhinagar', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Anand', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Navsari', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Surendranagar', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Morbi', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kutch', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kheda', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bharuch', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Patan', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Porbandar', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mehsana', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gir', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Valsad', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Panchmahal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Banaskantha', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sabarkantha', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Botad', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Amreli', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
