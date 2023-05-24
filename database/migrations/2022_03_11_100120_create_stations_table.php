<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('color');
            $table->string('formal_id');
            $table->integer('distance')->default(0);
            $table->integer('time')->default(0);
            $table->string('before')->nullable();
            $table->string('after')->nullable();
            $table->timestamps();

        });


        Schema::create('station_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('station_id') ;
            $table->string('title')->nullable();
            $table->string('locale',10);

            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
        Schema::dropIfExists('station_translations');
    }
}
