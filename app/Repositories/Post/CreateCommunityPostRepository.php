<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Storage,
    Illuminate\Http\File;

use App\Models\Post\CommunityPost,
    App\Models\User\User;


class CreateCommunityPostRepository extends BaseRepository
{
    public function execute($request)
    {
        // $validated = $request->validated();

        // $path = Storage::disk('public')->put('post', $request->file('picture'));

        $user = User::where('principal_id', $request->principal_id)->first();

        $path = $request->file('picture')->store('post', 'public');
        $fileName = basename($path);

        $comPost = CommunityPost::create([
            // 'user_id'       =>  $user->id,
            'user_id'       => $request->user_id,
            'title'        =>  $request->title,
            'description'   =>  $request->description,
            'img_basename'  =>  $fileName
        ]);

        dd($comPost);

        
    }
}