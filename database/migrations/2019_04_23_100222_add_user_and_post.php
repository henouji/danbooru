<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAndPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('accepted_tasks', function ($table) {
            $table->integer('user_id');
            $table->integer('post_id');
            $table->boolean('completed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accepted_tasks', function ($table) {
            $table->dropColumn('user_id');
            $table->dropColumn('post_id');
            $table->dropColumn('completed');
        });
    }
}
