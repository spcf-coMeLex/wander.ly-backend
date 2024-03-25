<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;

use App\Models\User\User;


class CreateUserRepository extends BaseRepository
{
    public function execute($request)
    {
        $validated = $request->validated();

        if($validated){
            User::create([
                'principal_id' => $request->principal_id
            ]);

            return $this->success('User created successfully!');
        }
    }
}