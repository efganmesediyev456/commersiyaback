<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->string('type',40);
            $table->string('image')->nullable();
            $table->string('iframe')->nullable();
            $table->dateTime('date');
            $table->date('event_date')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->string('uniq_id')->nullable();
        });


        Schema::create('article_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->index();
            $table->string('title')->nullable();
            $table->string('subtitle',350)->nullable();
            $table->text('description')->nullable();
            $table->string('locale',10);

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade') ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_translations');
        Schema::dropIfExists('articles');
    }
}
