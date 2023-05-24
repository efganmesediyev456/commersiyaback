<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->char('title');
            $table->string('description')->nullable();
            $table->char('model');
            $table->boolean('C')->default(0) ;
            $table->boolean('R')->default(0) ;
            $table->boolean('U')->default(0) ;
            $table->boolean('D')->default(0) ;
            $table->boolean('full')->default(0) ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
