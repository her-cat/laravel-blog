<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $data = $request->all();

        if ($avatar = $request->avatar) {
            $url = $uploader->save($avatar, 'avatars', $user->id);
            $url && $data['avatar'] = $url;
        }

        $user->update($data);

        return redirect()->route('users.show', $user->id)->with('success', '保存成功!');
    }
}
