<?php

namespace App\Repository;
use App\Models\User as users;

class UserRepository
{
    private string $path;
    public function __construct(users $path)
    {
        $this->path = $path;
    }

    public function getUserByEmail($email){
        return users::where('email', $email)->first();
    }
}
