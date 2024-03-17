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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('own_referral_code')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('our_bank')->nullable(); // Add our_bank field
            $table->string('bank_username')->nullable(); // Add bank_username field
            $table->string('sender_number')->nullable(); // Add sender_number field
            $table->string('TRX_number')->nullable(); // Add TRX_number field
            $table->string('payment_status')->default('Pending'); // Add payment_status field with default value 'Pending'
            $table->timestamp('payment_date_time')->nullable(); // Add payment_date_time field
            $table->string('admin_approvel_status')->default('Pending'); // Add admin_approvel_status field with default value 'Pending'
            $table->tinyInteger('isAdmin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
