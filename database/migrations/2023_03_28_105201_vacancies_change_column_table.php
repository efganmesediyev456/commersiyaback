<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VacanciesChangeColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->renameColumn('date', 'active');
        });

        Schema::table('vacancy_translations', function (Blueprint $table) {
            $table->renameColumn('subtitle', 'grafik');
            $table->string('sales')->nullable();
            $table->text('ohdelik')->nullable();
        });

        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropForeign('vacancies_profession_id_foreign');
            $table->dropColumn('profession_id');
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
