<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_visitors', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('ip', 15);
            $table->integer('user_id')->nullable();
            $table->timestamp('last_visit');
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
        Schema::drop('stats_visitors');
    }
}
