<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\Post\CommunityPost\CreateCommunityPostRequest,
    App\Http\Requests\Post\CommunityPost\ShowCommunityPostRequest,
    App\Http\Requests\Post\AwardPost\CreateAwardPostRequest,
    App\Http\Requests\Post\AwardPost\ShowAwardPostRequest,
    App\Http\Requests\Post\LikedPost\CreateLikedPostRequest,
    App\Http\Requests\Post\LikedPost\ShowLikedPostRequest,
    App\Http\Requests\Post\DislikePost\CreateDislikePostRequest,
    App\Http\Requests\Post\DislikePost\ShowDislikePostRequest;

// * REPOSITORIES
use App\Repositories\Post\CommunityPost\CreateCommunityPostRepository,
    App\Repositories\Post\CommunityPost\ShowCommunityPostRepository,
    App\Repositories\Post\AwardPost\CreateAwardPostRepository,
    App\Repositories\Post\AwardPost\ShowAwardPostRepository,
    App\Repositories\Post\LikedPost\CreateLikedPostRepository,
    App\Repositories\Post\LikedPost\ShowLikedPostRepository,
    App\Repositories\Post\DislikedPost\CreateDislikedPostRepository,
    App\Repositories\Post\DislikedPost\ShowDislikedPostRepository;

class PostController extends Controller
{
    protected $createCommunityPost, $createLikePost, $createDislikePost, $showCommunityPost, $createAwardPost, $showAwardPost, $showLikedPost, $showDislikePost;

    public function __construct(
        CreateCommunityPostRepository           $createCommunityPost,
        CreateLikedPostRepository               $createLikePost,
        CreateDislikedPostRepository            $createDislikePost,
        ShowCommunityPostRepository             $showCommunityPost,
        CreateAwardPostRepository               $createAwardPost,
        ShowAwardPostRepository                 $showAwardPost,
        ShowLikedPostRepository                 $showLikedPost,
        ShowDislikedPostRepository              $showDislikePost
    ){
        $this->createCommunityPost          = $createCommunityPost;
        $this->createLikePost               = $createLikePost;
        $this->createDislikePost            = $createDislikePost;
        $this->showCommunityPost            = $showCommunityPost;
        $this->createAwardPost              = $createAwardPost;
        $this->showAwardPost                = $showAwardPost;
        $this->showLikedPost                = $showLikedPost;
        $this->showDislikePost              = $showDislikePost;
    }

    // *Community Post
    protected function createCommunityPost(CreateCommunityPostRequest $request){
        return $this->createCommunityPost->execute($request);
    }
    protected function showCommunityPost(ShowCommunityPostRequest $request, $userPrincipalId){
        return $this->showCommunityPost->execute($userPrincipalId);
    }

    // *Award Post
    protected function createAwardPost(CreateAwardPostRequest $request){
        return $this->createAwardPost->execute($request);
    }
    protected function showAwardPost(ShowAwardPostRequest $request, $userPrincipalId){
        return $this->showAwardPost->execute($userPrincipalId);
    }

    // *Like Post
    protected function createLikePost(CreateLikedPostRequest $request){
        return $this->createLikePost->execute($request);
    }
    protected function showLikedPost(ShowLikedPostRequest $request, $userPrincipalId){
        return $this->showLikedPost->execute($userPrincipalId);
    }

    // *Dislike Post
    protected function createDislikePost(CreateDislikePostRequest $request){
        return $this->createDislikePost->execute($request);
    }
    protected function showDislikePost(ShowDislikePostRequest $request, $userPrincipalId){
        return $this->showDislikePost->execute($userPrincipalId);
    }
}
