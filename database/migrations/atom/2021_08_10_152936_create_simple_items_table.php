<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simple_items', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->integer('item_id');
            $table->char('model');
            $table->integer('page_id');
            $table->string('type');
            $table->string('text',400)->nullable();
            $table->float('A')->nullable();
            $table->float('B')->nullable();
            $table->float('C')->nullable();
            $table->integer('ordering');
            $table->boolean('status')->default(1);
            $table->date('date')->nullable();
            $table->timestamps();
            $table->string('uniq_id')->nullable() ;
        });


        Schema::create('simple_item_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('simple_item_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('link')->nullable();
            $table->string('medium_text1',1000)->nullable();
            $table->string('medium_text2',1000)->nullable();
            $table->string('medium_text3',1000)->nullable();
            $table->string('medium_text4',1000)->nullable();
            $table->text('text_field')->nullable();
            $table->text('locale')->nullable();


            $table->foreign('simple_item_id')->references('id')->on('simple_items')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simple_item_translations');
        Schema::dropIfExists('simple_items');
    }
}
