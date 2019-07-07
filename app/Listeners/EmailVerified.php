<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;

class EmailVerified
{
    /**
     * Handle the event.
     *
     * @param Verified $event
     */
    public function handle(Verified $event)
    {
        session()->flash('success', '邮箱验证成功 ^_^');
    }
}
