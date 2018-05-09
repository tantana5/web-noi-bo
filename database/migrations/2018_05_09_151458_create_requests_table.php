<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->comment('Loại yêu cầu');
            $table->integer('sender_id')->comment('Người gửi');
            $table->integer('receiver_id')->comment('Người nhận');
            $table->integer('order_id')->comment('Đơn hàng');
            $table->integer('customer_id')->comment('Khách hàng');
            $table->longText('comment');
            $table->tinyInteger('status')->comment('Trạng thái');
            $table->softDeletes();
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
        Schema::dropIfExists('requests');
    }
}
