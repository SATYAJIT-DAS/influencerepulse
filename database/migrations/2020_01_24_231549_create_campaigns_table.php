<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->string('product_name',150)->nullable();
            $table->text('description')->nullable();
            $table->integer('category')->nullable();
            $table->integer('marketplace')->nullable();
            $table->string('amazon_id',150)->nullable();
            $table->string('brand_name',150)->nullable();
            $table->string('product_id',150)->nullable();
            $table->string('picture',150)->nullable();
            $table->double('price')->nullable();
            $table->double('rebate_price')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->integer('daily_rebates')->nullable();
            $table->integer('total_rebates')->nullable();
            $table->string('product_url',150)->nullable();
            $table->string('keyword1',150)->nullable();
            $table->string('keyword2',150)->nullable();
            $table->string('keyword3',150)->nullable();
            $table->integer('private_status',150)->nullable();
            $table->integer('chrome_status',150)->nullable();
            $table->integer('free_status',150)->nullable();
            $table->double('wallet')->nullable();
            $table->integer('favorite')->nullable();
            $table->string('permission',100)->nullable();

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
        Schema::dropIfExists('campaigns');
    }
}
