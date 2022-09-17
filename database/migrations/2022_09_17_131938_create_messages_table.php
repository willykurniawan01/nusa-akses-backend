<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("chat_room_id")->nullable();
            $table->foreign("chat_room_id")->references("id")->on("chat_rooms")->onDelete("set null")->onUpdate("cascade");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("set null")->onUpdate("cascade");
            $table->unsignedBigInteger("guest_id")->nullable();
            $table->foreign("guest_id")->references("id")->on("guests")->onDelete("set null")->onUpdate("cascade");
            $table->text("message");
            $table->string("type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
