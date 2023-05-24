<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->integer('parent_id')->nullable()->unsigned() ;
            $table->string('template');
            $table->string('slug');
            $table->integer('ordering');
            $table->boolean('status')->default(1) ;
            $table->timestamps();
            $table->string('image')->nullable();

            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('cascade');
        });


        Schema::create('page_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned() ;
            $table->string('title')->nullable();
            $table->string('subtitle',1000)->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('locale',10);

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_translations');
        Schema::dropIfExists('pages');
    }
}
