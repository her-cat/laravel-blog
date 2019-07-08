<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name' => 'Laravel 笔记',
                'description' => 'Laravel 相关的一些使用技巧。',
            ],
            [
                'name' => 'Redis 笔记',
                'description' => 'Redis 及其内部运行机制学习笔记。',
            ],
            [
                'name' => '设计模式',
                'description' => '设计模式的学习及实践。',
            ]
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
