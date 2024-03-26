<?php
namespace App\Repositories\Post\AwardPost;

use App\Repositories\BaseRepository;

use App\Models\Post\AwardPost,
    App\Models\Post\CommunityPost,
    App\Models\User\User;


class CreateAwardPostRepository extends BaseRepository
{
    public function execute($request)
    {
        $validated = $request->validated();

        if($validated){
            if($request->currentUserPoints > 5.00){
                $user = User::where('principal_id', $request->principal_id)->first();
                
                AwardPost::create([
                    'user_id'               => $user->id,
                    'community_post_id'     => $request->community_post_id
                ]);

                CommunityPost::where('id', $request->community_post_id)->increment('award_points', 1.00);
                $updatedUserPointsBalance = $request->currentUserPoints - 1.00;


                return $this->success('Liked post created successfully!', ['updatedUserPoints' => $updatedUserPointsBalance]);
            }
        }

        return $this->error("Something went wrong!");
    }
}