<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {

            $table->dropColumn("organization_name");
            $table->dropColumn("type");
            $table->dropColumn("lastname");
            $table->dropColumn("country");
            $table->dropColumn("city");
            $table->dropColumn("address");
            $table->dropColumn("internal_phone");
            $table->dropColumn("description");
            $table->longText("message");
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
