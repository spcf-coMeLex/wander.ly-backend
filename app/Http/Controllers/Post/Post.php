<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\Post\CommunityPostRequest;

// * REPOSITORIES
use App\Repositories\Post\CreateCommunityPostRepository;

class Post extends Controller
{
    protected $createCommunityPost;

    public function __construct(
        CreateCommunityPostRepository           $createCommunityPost
    ){
        $this->createCommunityPost          = $createCommunityPost;
    }

    protected function createCommunityPost(CommunityPostRequest $request){
        return $this->createCommunityPost->execute($request);
    }
}
