<?php

use App\Models\Atom\Position as PositionAlias;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable() ;
            $table->boolean('status')->default(1) ;
            $table->timestamps();
        });

        Schema::create('position_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(PositionAlias::class)->constrained()->onDelete('cascade'); ;
            $table->string('title')->nullable();
            $table->string('locale',10);
            $table->string('subtitle',1000)->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
        Schema::dropIfExists('position_translations');
    }
}
