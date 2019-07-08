<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $each_callback = function ($user, $index) {
            $user->avatar = "https://api.adorable.io/avatars/285/{$user->name}.png";
        };

        $users = factory(User::class)
            ->times(10)
            ->make()
            ->each($each_callback);

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::find(1);
        $user->name = '她和她的猫';
        $user->email = 'her-cat@example.com';
        $user->avatar = 'https://avatars1.githubusercontent.com/u/18332628?s=460';
        $user->save();
    }
}
