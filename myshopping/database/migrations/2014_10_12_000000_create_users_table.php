<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',150)->nullable();

            $table->string('brandname',150)->nullable();
            $table->string('address1',150)->nullable();
            $table->string('address2',150)->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city',150)->nullable();
            $table->string('time_zone')->nullable();
            $table->string('image',150)->nullable();
            $table->integer('key_update_status')->nullable();
            $table->integer('claimed_status')->nullable();
            $table->integer('approval_status')->nullable();
            $table->integer('lastet_status')->nullable();
            $table->integer('purchase_status')->nullable();
            $table->integer('status')->nullable();
            $table->integer('mail_verify')->nullable();

            $table->string('email_claimed')->nullable();
            $table->string('email_approval')->nullable();
            $table->string('invoice1')->nullable();
            $table->string('invoice2')->nullable();
            $table->string('invoice3')->nullable();
            $table->string('invoice4')->nullable();
            $table->string('phone')->nullable();
            $table->integer('phone_verify')->nullable();
            $table->string('phone_code')->nullable();


            $table->string('email',150)->unique();
            $table->integer('role_id')->require();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',150);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
