<?php

use Illuminate\Database\Migrations\Migration;

class RenamePostVotesTableToVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('post_votes', 'votes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('votes', 'post_votes');
    }
}
