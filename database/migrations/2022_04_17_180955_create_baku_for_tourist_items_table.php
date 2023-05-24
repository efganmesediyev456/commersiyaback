<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBakuForTouristItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baku_items', function (Blueprint $table) {

        $table->id();
        $table->unsignedBigInteger("baku_for_tourist_id") ;
        $table->boolean('status')->default(1);
        $table->string('image');
        $table->timestamps();
        $table->foreign("baku_for_tourist_id")->references("id")->on('baku_for_tourists')->onDelete("cascade");

        });

        Schema::create('baku_item_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('baku_item_id');
            $table->string('title')->nullable();
            $table->text('about')->nullable()->collation("utf8mb4_general_ci");
            $table->longText('content_key')->nullable();
            $table->longText('content_value')->nullable();
            $table->string('locale',10);

            $table->foreign("baku_item_id")->references("id")->on('baku_items')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baku_for_tourist_items');
    }
}
