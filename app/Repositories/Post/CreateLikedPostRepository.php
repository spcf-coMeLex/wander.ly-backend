<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

use App\Models\Post\LikedPost,
    App\Models\Post\CommunityPost,
    App\Models\User\User;


class CreateLikedPostRepository extends BaseRepository
{
    public function execute($request)
    {
        $validated = $request->validated();

        if($validated){
        $user = User::where('principal_id', $request->principal_id)->first();
        
        LikedPost::create([
            'user_id'               => $user->id,
            'community_post_id'     => $request->community_post_id
        ]);

        CommunityPost::where('id', $request->community_post_id)->increment('like_count');

        return $this->success('Liked post created successfully!');
        }

        return $this->error("Something went wrong!");

        
    }
}