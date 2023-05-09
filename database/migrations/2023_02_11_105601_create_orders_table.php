<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vendor_id');
            $table->string('subtotal')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Canceled'])->default('Pending');
            $table->enum('delivery_status', ['Pending', 'Processing', 'Shipped', 'Received', 'Delivered'])->default('Pending');
            $table->enum('payment_status', ['Pending', 'Paid'])->default('Pending');
            $table->enum('payment_type', ['Cash On Delivery', 'Online'])->default('Cash On Delivery');
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
        Schema::dropIfExists('orders');
    }
};
