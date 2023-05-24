<?php

use App\Models\SurveyQuestion;
use App\Models\SurveySubject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SurveySubject::class)->constrained()->onDelete('cascade') ;
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('survey_question_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(SurveyQuestion::class)->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->json('answers')->nullable();
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
        Schema::dropIfExists('survey_questions');
    }
}
