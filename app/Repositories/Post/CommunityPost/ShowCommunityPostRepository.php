<?php

namespace App\Repositories\Post\CommunityPost;

use App\Repositories\BaseRepository;

use App\Models\Post\CommunityPost,
    App\Models\Post\AwardPost,
    App\Models\Post\LikedPost,
    App\Models\Post\DislikePost,
    App\Models\User\User;


class ShowCommunityPostRepository extends BaseRepository
{
    public function execute($userPrincipalId)
    {
        $user = User::where('principal_id', $userPrincipalId)->first();
        if($user){
            $awardPost = AwardPost::where('user_id', $user->id)->pluck('community_post_id')->toArray();
            $likedPost = LikedPost::where('user_id', $user->id)->pluck('community_post_id')->toArray();
            $dislikedPost = DislikePost::where('user_id', $user->id)->pluck('community_post_id')->toArray();

            $mergedPosts = array_unique(array_merge($awardPost, $likedPost, $dislikedPost));

            $communityPost = CommunityPost::whereNotIn('id', $mergedPosts)->orderBy('created_at', 'desc')->get();
            
            return $this->success('Community post created successfully!', $communityPost);
        }

        return $this->error("Something went wrong!");

        
    }
}