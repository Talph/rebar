<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected User $user;
    /**
     *
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function storeUser(Request $request){
        return $this->user->updateOrCreate(
            [
                'id' => $request->get('id'),
            ],[
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
    }
}