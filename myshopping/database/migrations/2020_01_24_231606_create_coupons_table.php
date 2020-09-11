<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id')->nullable();
            $table->integer('market_place')->nullable();
            $table->string('product_id',150)->nullable();
            $table->string('product_name',150)->nullable();
            $table->text('description')->nullable();
            $table->integer('category')->nullable();
            $table->string('brand_name',150)->nullable();
            $table->string('picture',150)->nullable();
            $table->double('price')->nullable();
            $table->double('off_per')->nullable();
            $table->string('coupon_code',150)->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->text('product_url',150)->nullable();
            $table->string('keyword1',150)->nullable();
            $table->string('keyword2',150)->nullable();
            $table->string('keyword3',150)->nullable();
            $table->integer('free_status')->nullable();
            $table->integer('upload_status')->nullable();
            $table->integer('favorite')->nullable();
            $table->string('permission')->nullable();

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
        Schema::dropIfExists('coupons');
    }
}
