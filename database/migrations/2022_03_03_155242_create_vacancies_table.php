<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Atom\Profession::class)->constrained()->onDelete('cascade');
            $table->timestamp('date')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('vacancy_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(\App\Models\Atom\Vacancies::class)->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('subtitle', 1000)->nullable();
            $table->string('locale',10);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
