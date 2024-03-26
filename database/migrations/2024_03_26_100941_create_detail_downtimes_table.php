<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDowntimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_downtimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('downtime_id');
            $table->unsignedBigInteger('type_downtime_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('description', 255);
            $table->timestamps();
            $table->foreign('downtime_id')->references('id')->on('downtime');
            $table->foreign('type_downtime_id')->references('id')->on('type_downtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_downtimes');
    }
}
