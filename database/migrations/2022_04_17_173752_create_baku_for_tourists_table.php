<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BakuForTourist;

class CreateBakuForTouristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('baku_for_tourists', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->string("image")->nullable();
            $table->timestamps();
        });

        Schema::create('baku_for_tourist_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(BakuForTourist::class)->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('baku_for_tourists');
    }
}
