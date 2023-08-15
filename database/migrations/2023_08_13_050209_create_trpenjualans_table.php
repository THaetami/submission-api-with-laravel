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
        Schema::create('trpenjualans', function (Blueprint $table) {
            $table->increments('jul_id')->unsigned(false);
            $table->date('jul_tanggaljual');
            $table->char('jul_sal_id', 4)->nullable();
            $table->char('jul_cus_id', 4)->nullable();
            $table->string('jul_notes', 100)->nullable();
            $table->date('jul_tanggalbayar')->nullable()->comment('null jika belum bayar, terisi jika sudah bayar');
            $table->char('jul_batal', 1)->default('N')->comment('N = tidak batal, Y = jika dibatalkan');

            // Set foreign key constraint
            $table->foreign('jul_sal_id')->references('sal_id')->on('mssalesmen')
                ->onUpdate('cascade')->onDelete('cascade');

            // Set foreign key constraint
            $table->foreign('jul_cus_id')->references('cus_id')->on('mscustomers')
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
        Schema::dropIfExists('trpenjualans');
    }
};
