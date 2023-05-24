<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->integer('parent_id')->nullable();
            $table->integer('menu_id')->nullable()->unsigned();
            $table->string('model',50)->nullable();
            $table->integer('model_record_id')->nullable()->unsigned();
            $table->integer('ordering');
            $table->boolean('status')->default(1);
            $table->boolean('on_blank')->default(0);
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('model_record_id')->references('id')->on('pages')->onDelete('cascade');
        });

        Schema::create('menu_item_translations', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->integer('menu_item_id')->unsigned();
            $table->string('title')->nullable() ;
            $table->string('link')->nullable();
            $table->string('locale');

            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_item_translation');
        Schema::dropIfExists('menu_items');
    }
}
