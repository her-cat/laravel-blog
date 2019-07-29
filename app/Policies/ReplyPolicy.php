<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Reply $reply)
    {
        return $user->isAuthorOf($reply);
    }
}
