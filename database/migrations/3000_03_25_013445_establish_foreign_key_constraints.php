<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*****************************************  COMMUNITY POSTS  *****************************************/
        Schema::table('community_posts', function (Blueprint $table)
        {
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        /*****************************************  AWARD POSTS  *****************************************/
        Schema::table('award_posts', function (Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('community_post_id')->references('id')->on('community_posts')->onDelete('cascade');
        });

        /*****************************************  LIKED POSTS  *****************************************/
        Schema::table('liked_posts', function (Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('community_post_id')->references('id')->on('community_posts')->onDelete('cascade');
        });

        /*****************************************  DISLIKE POSTS  *****************************************/
        Schema::table('dislike_posts', function (Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('community_post_id')->references('id')->on('community_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
