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
        Schema::create('mstypeproduks', function (Blueprint $table) {
            $table->char('typ_id', 3)->primary();
            $table->string('typ_nm', 100);
            $table->double('typ_persenkomisi')->default(0);
            $table->string('typ_notes', 1000)->nullable();
            $table->char('typ_aktif', 1)->default('Y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mstypeproduks');
    }
};
