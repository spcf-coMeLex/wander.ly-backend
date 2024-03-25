<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * REQEUST
use App\Http\Requests\User\CreateUserRequest;

// * REPOSITORIES
use App\Repositories\User\CreateUserRepository;

class UserController extends Controller
{
    protected $create;

    public function __construct(
        CreateUserRepository    $create
    ){
        $this->create  = $create;
    }

    protected function create(CreateUserRequest $request){
        return $this->create->execute($request);
    }
}
