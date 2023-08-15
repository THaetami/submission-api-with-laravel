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
        Schema::create('msproduks', function (Blueprint $table) {
            $table->char('prd_id', 5)->primary();
            $table->string('prd_nm', 100);
            $table->char('prd_typ_id', 3)->nullable();
            $table->char('prd_aktif', 1)->default('Y');
            $table->string('prd_notes', 1000)->nullable();
            $table->double('prd_hargamodal')->nullable();
            $table->double('prd_stokawal')->default(0);

            // Set foreign key constraint
            $table->foreign('prd_typ_id')->references('typ_id')->on('mstypeproduks')
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
        Schema::dropIfExists('msproduks');
    }
};
