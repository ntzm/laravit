<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeVotesPolymorphic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropColumn('post_id');
            $table->integer('voteable_id')->unsigned();
            $table->string('voteable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropColumn('voteable_id');
            $table->dropColumn('voteable_type');
            $table->integer('post_id')->unsigned();
        });
    }
}
