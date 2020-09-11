<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->date('date');
            $table->text('message');
            $table->integer('msg_status');
            //0 : unread
            //1: readed
            $table->integer('type');
            //buyer->seller: 0
            //seller->buyer: 1
            $table->string('file_path')->nullable();
            $table->string('file_title')->nullable();
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
