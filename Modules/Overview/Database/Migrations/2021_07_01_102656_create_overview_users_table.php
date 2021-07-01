<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverviewUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overview_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('title');
            $table->longText('lead');
            $table->longText('body');
            $table->longText('name');
            $table->longText('description');
            $table->foreignId('user_id')->references('id')->on('people')->nullable()->default('1');

            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overview_users');
    }
}
