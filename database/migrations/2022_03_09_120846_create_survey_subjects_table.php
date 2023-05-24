<?php

use App\Models\SurveySubject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveySubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_subjects', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('survey_subject_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(SurveySubject::class)->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('locale',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_subjects');
    }
}
