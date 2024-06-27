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
        //tes
        Schema::create('recruiter_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("auth_id")->unsigned();
            $table->foreign("auth_id")
                  ->references('id')
                  ->on('auths')
                  ->onDelete('CASCADE')
                  ->onUpdate('CASCADE');
            $table->string('name',50);
            $table->string('photo_profile', 100);
            $table->string('class', 50);
            $table->enum("status", ["accepted", "rejected"]);
            $table->string("type_proses", 50 );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiter_data');
    }
};