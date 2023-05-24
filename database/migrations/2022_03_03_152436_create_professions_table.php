<?php

use App\Models\Atom\Position as Position;
use App\Models\Atom\Profession as ProfessionAlias;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Position::class)->constrained()->onDelete('cascade');
            $table->string('icon')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('profession_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(ProfessionAlias::class)->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('professions');
        Schema::dropIfExists('profession_translations');
    }
}
