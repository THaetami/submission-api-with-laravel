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
        Schema::create('dtpenjualans', function (Blueprint $table) {
            $table->increments('djul_id')->unsigned(false);
            $table->integer('djul_jul_id')->unsigned(false);
            $table->char('djul_prd_id', 5);
            $table->double('djul_qtyjual')->default(0);
            $table->double('djul_hargasatuan')->default(0);

            // Set foreign key constraint
            $table->foreign('djul_prd_id')->references('prd_id')->on('msproduks')
                ->onUpdate('cascade')->onDelete('cascade');

            // Set foreign key constraint
            $table->foreign('djul_jul_id')->references('jul_id')->on('trpenjualans')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dtpenjualans');
    }
};
