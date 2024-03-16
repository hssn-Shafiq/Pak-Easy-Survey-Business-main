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
        Schema::create('user_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('own_referral_code')->nullable();
            $table->foreignId('referral_by')->nullable()->constrained('users');
            $table->integer('total_referrals')->default(0);
            $table->integer('team_size')->default(0);
            $table->decimal('earnings', 10, 2)->default(0.00);
            $table->boolean('referral_status')->default(false);
            $table->integer('level')->default(0);
            $table->timestamp('last_referral_added_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stats');
    }
};
