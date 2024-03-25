<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\Post\CreateCommunityPostRequest,
    App\Http\Requests\Post\CreateLikedPostRequest;

// * REPOSITORIES
use App\Repositories\Post\CreateCommunityPostRepository,
    App\Repositories\Post\CreateLikedPostRepository;

class PostController extends Controller
{
    protected $createCommunityPost, $createLikePost;

    public function __construct(
        CreateCommunityPostRepository           $createCommunityPost,
        CreateLikedPostRepository               $createLikePost
    ){
        $this->createCommunityPost          = $createCommunityPost;
        $this->createLikePost               = $createLikePost;
    }

    protected function createCommunityPost(CreateCommunityPostRequest $request){
        return $this->createCommunityPost->execute($request);
    }

    protected function createLikePost(CreateLikedPostRequest $request){
        return $this->createLikePost->execute($request);
    }
}
