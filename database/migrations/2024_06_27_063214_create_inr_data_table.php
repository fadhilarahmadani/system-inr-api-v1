<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInrDataTable extends Migration
{
    public function up()
    {
        //tes
        Schema::create('inr_data', function (Blueprint $table) {
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
            $table->enum("status", ["active", "inactive","cut off"]);
            $table->timestamps();
            $table->softDeletes();


        });
    }

    public function down()
    {
        Schema::dropIfExists('inr_data');
    }
}
