<?php

namespace App\Repositories\Post\DislikedPost;

use App\Repositories\BaseRepository;

use App\Models\Post\DislikePost,
    App\Models\Post\CommunityPost,
    App\Models\User\User;


class CreateDislikedPostRepository extends BaseRepository
{
    public function execute($request)
    {
        $validated = $request->validated();

        if($validated){
        $user = User::where('principal_id', $request->principal_id)->first();
        
        DislikePost::create([
            'user_id'               => $user->id,
            'community_post_id'     => $request->community_post_id
        ]);

        return $this->success('Disliked post created successfully!');
        }

        return $this->error("Something went wrong!");

        
    }
}