<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->timestamps();
            $table->string('name')->nullable();
            $table->decimal('price')->default(0.0);
            $table->bigInteger('stock')->default(0);
            $table->string('brand')->nullable();
        });
        /**
         * Database seeder for random initial data
         */
        Artisan::call('db:seed', [
            '--class' => 'DatabaseSeeder',
            ]);
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
}
