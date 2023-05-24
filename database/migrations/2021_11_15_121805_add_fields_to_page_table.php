<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('image');
        });

        Schema::table('page_translations', function (Blueprint $table) {
            $table->string('second_title',400)->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('icon') ;
        });
        Schema::table('page_translations', function (Blueprint $table) {
            $table->dropColumn('second_title') ;
        });
    }
}
