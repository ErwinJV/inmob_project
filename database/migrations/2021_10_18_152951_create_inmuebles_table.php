<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('price');
            $table->text('desc');
            $table->enum('status', ['1', '2']);
            $table->float('long')->nullable();
            $table->float('alt')->nullable();
            $table->string('locality');
            $table->unsignedBigInteger('bath');
            $table->unsignedBigInteger('hab');
            $table->unsignedBigInteger('est')->nullable();
            $table->unsignedBigInteger('pool')->nullable();
            $table->unsignedBigInteger('size');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('inmob_category_id');
            
            //Foreign Keys
            
            $table->foreign('user_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            
            $table->foreign('inmob_category_id')
                            ->references('id')
                            ->on('inmob_categories')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            
            
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
        Schema::dropIfExists('inmuebles');
    }
}
