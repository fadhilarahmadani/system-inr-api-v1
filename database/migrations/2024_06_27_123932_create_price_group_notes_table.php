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
        Schema::create('price_group_notes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("donatur_id")->unsigned();
            $table->foreign("donatur_id")
                ->references('id')
                ->on('donaturs')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->decimal('price');
            $table->text('description');
            $table->string('type', 50); //donatur : sekret, tahunan
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_group_notes');
    }
};