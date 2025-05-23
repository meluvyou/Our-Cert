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
        Schema::create('admin_cert_request', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number', 11);
            $table->string('email', 20)->unique();
            $table->string('request_type');
            $table->string('request_purpose');
            $table->string('status')->default('pending');
            $table->enum('action', ['approved', 'declined'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_cert_request');
    }
};
