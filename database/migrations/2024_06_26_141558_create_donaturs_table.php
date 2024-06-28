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
        Schema::create('donaturs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("auth_id")->unsigned();
            $table->foreign("auth_id")
                  ->references('id')
                  ->on('auths')
                  ->onDelete('CASCADE')
                  ->onUpdate('CASCADE');
            $table->enum("status", ["active", "inactive"]);
            $table->bigInteger("total_price")->default(0);
            $table->string('type'); //(10.000, 20.000, 30.000)
            $table->timestamps();
            $table->softDeletes();

   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaturs');
    }
};