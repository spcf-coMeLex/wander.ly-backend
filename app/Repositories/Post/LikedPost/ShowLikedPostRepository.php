<?php

namespace App\Repositories\Post\LikedPost;

use App\Repositories\BaseRepository;

use App\Models\Post\LikedPost,
    App\Models\Post\CommunityPost,
    App\Models\User\User;


class ShowLikedPostRepository extends BaseRepository
{
    public function execute($userPrincipalId)
    {
        $user = User::where('principal_id', $userPrincipalId)->first();
        if($user){
            $dislikedPosts = LikedPost::where('user_id', $user->id)->pluck('community_post_id')->toArray();

            $communityPosts = CommunityPost::whereIn('id', $dislikedPosts)->get();

            return $this->success('User awarded post list', $communityPosts);
        }
        return $this->error("Something went wrong!");

        
    }
}