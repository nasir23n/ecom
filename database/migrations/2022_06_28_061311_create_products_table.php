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
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description')->nullable();
            $table->double('price');
            $table->text('image')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('featured')->default(false);
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->foreignId('unit_id')->nullable()->constrained();
            $table->bigInteger('created_by')->nullable();
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
