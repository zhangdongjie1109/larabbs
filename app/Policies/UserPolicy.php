<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        //dump($user,$ability);
        if ($user->id == 2){
            //return true;
        }
    }

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    public function update1(User $currentUser, User $user)
    {
        //dump(111);
        return $currentUser->id === $user->id;
        //return false;
    }
}
