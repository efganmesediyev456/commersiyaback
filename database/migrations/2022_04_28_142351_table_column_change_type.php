<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableColumnChangeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
            $table->longText("subtitle")->nullable()->change();
        });
        Schema::table('baku_for_tourist_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
        });
        Schema::table('baku_item_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
        });
        Schema::table('page_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
            $table->longText("subtitle")->nullable()->change();

        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
        });
        Schema::table('position_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
            $table->longText("subtitle")->nullable()->change();
        });
        Schema::table('profession_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
            $table->longText("subtitle")->nullable()->change();
        });
        Schema::table('simple_item_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
            $table->longText("subtitle")->nullable()->change();
        });
        Schema::table('survey_question_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
        });
        Schema::table('survey_subject_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
        });
        Schema::table('survey_subject_translations', function (Blueprint $table) {
            $table->longText("title")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
