<?php

namespace App\Repositories\Post\AwardPost;

use App\Repositories\BaseRepository;

use App\Models\Post\AwardPost,
    App\Models\Post\CommunityPost,
    App\Models\User\User;


class ShowAwardPostRepository extends BaseRepository
{
    public function execute($userPrincipalId)
    {
        $user = User::where('principal_id', $userPrincipalId)->first();
        if($user){
            $awardedPosts = AwardPost::where('user_id', $user->id)->pluck('community_post_id')->toArray();

            $communityPosts = CommunityPost::whereIn('id', $awardedPosts)->get();

            return $this->success('User awarded post list', $communityPosts);
        }
        return $this->error("Something went wrong!");

        
    }
}