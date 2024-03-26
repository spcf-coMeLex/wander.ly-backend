<?php

namespace App\Repositories\Post\CommunityPost;

use App\Repositories\BaseRepository;

use App\Models\Post\CommunityPost,
    App\Models\User\User;


class CreateCommunityPostRepository extends BaseRepository
{
    public function execute($request)
    {
        // $validated = $request->validated();

        // $path = Storage::disk('public')->put('post', $request->file('picture'));

        $validated = $request->validated();

        if($validated){
        $user = User::where('principal_id', $request->principal_id)->first();

        $path = $request->file('picture')->store('post', 'public');
        $fileName = basename($path);

        $comPost = CommunityPost::create([
            'user_id'       =>  $user->id,
            'place'         =>  $request->place,
            'content'       =>  $request->content,
            'img_basename'  =>  $fileName
        ]);

        return $this->success('Community post created successfully!');
        }

        return $this->error("Something went wrong!");

        
    }
}