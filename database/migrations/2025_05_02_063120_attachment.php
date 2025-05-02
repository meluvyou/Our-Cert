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
        Schema::create("attachment", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->integer("cert_id")->unsigned();
            $table->string("file_name");
            $table->string("new_file_name");
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("attachment");
    }
};
