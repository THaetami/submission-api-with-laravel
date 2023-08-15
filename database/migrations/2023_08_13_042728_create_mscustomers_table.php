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
        Schema::create('mscustomers', function (Blueprint $table) {
            $table->char('cus_id', 4)->primary();
            $table->string('cus_nm', 100);
            $table->date('cus_tanggallahir')->nullable();
            $table->char('cus_kta_id', 3)->nullable();
            $table->char('cus_aktif', 1)->default('Y');

            // Set foreign key constraint
            $table->foreign('cus_kta_id')->references('kta_id')->on('mskotas')
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
        Schema::dropIfExists('mscustomers');
    }
};
