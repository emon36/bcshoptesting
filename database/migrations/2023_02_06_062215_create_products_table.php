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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');

            $table->string('title');
            $table->string('slug'); // Auto Generated
            $table->string('sku');
            $table->text('description')->nullable();

            $table->string('unit');
            $table->unsignedBigInteger('unit_weight'); // x1000 - in grams

            $table->unsignedBigInteger('current_purchase_price'); // x100
            $table->unsignedBigInteger('current_selling_price'); // x100
            $table->unsignedBigInteger('current_stock')->nullable();


            $table->boolean('perishable')->default(false);
            $table->boolean('preorder')->default(false);
            $table->unsignedBigInteger('preorder_advance_amount')->nullable();

            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('existence', ['Active', 'Inactive'])->default('Active');

            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('products');
    }
};
