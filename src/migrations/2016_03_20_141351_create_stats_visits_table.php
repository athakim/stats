<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_visits', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('visitor_id');
            $table->string('useragent', 100);
            $table->string('robot',25)->nullable();
            $table->string('device',20)->nullable();
            $table->string('lang',10)->nullable();
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
        Schema::drop('stats_visits');
    }
}
