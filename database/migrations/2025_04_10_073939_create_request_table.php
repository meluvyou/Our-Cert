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
        Schema::create('request_cert', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('first_name,',15);
            $table->string('middle_name',15);
            $table->string('last_name',15);
            $table->string('suffix',15);
            $table->string('email',25);
            $table->string('purok',15);
            $table->string('barangay',25);
            $table->string('city',25);
            $table->string('province',25);
            $table->string('date_of_birth',15);
            $table->string('contact_number',11);
            $table->string('request_type',20);
            $table->integer('civilstatus')->default(0);
            $table->integer('status')->default(0);
            $table->string('request_purpose',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_cert');
    }
};
