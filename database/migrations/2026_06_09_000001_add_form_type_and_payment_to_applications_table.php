<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Form type: lifetime (one-time submission per student) OR one_time (periodic)
            $table->enum('form_type', ['lifetime', 'one_time'])
                  ->default('lifetime')
                  ->after('reference_no');

            // Payment fields (Razorpay integration-ready)
            $table->enum('payment_status', ['pending', 'paid', 'failed'])
                  ->default('pending')
                  ->after('form_type');

            $table->decimal('payment_amount', 10, 2)
                  ->nullable()
                  ->after('payment_status');

            $table->string('payment_reference')
                  ->nullable()
                  ->after('payment_amount')
                  ->comment('Future Razorpay order/payment ID');
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'form_type',
                'payment_status',
                'payment_amount',
                'payment_reference',
            ]);
        });
    }
};
