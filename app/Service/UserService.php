<?php

namespace App\Service;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private UserRepository $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function loginSystem($input){
        $cekUser = $this->user->getUserByEmail($input['email']);
        if(!$cekUser){
            return [
                'message'=>"email tidak ditemukan",
                'status'=> false,
            ];
        }
        
        if(!Hash::check($input['password'], $cekUser->password)){
            return [
                'message'=>"Password tidak sesuai",
                'status'=> false,
            ];
        }

        Auth::login($cekUser);

        return[
            'message'=>"Berhasil login",
            'status'=>true
        ];
    }

    public function logOut(){
        Auth::logout();
        return true;
    }
}
