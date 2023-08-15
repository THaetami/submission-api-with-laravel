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
        Schema::create('mssalesmen', function (Blueprint $table) {
            $table->char('sal_id', 4)->primary();
            $table->string('sal_nm', 100);
            $table->date('sal_bekerjasejak')->nullable();
            $table->char('sal_aktif', 1)->default('Y');
            $table->char('sal_kta_id', 3)->nullable();

             // Set foreign key constraint
            $table->foreign('sal_kta_id')->references('kta_id')->on('mskotas')
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
        Schema::dropIfExists('mssalesmen');
    }
};
