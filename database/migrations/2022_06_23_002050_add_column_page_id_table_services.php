<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPageIdTableServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger("page_id")->nullable();
            $table->foreign("page_id")->references("id")->on("pages")->onDelete("set null")->onUpdate("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_sliders', function (Blueprint $table) {
            $table->dropForeign(["page_id"]);
            $table->dropColumn("page_id");
        });
    }
}
