<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index()->comment('用户 ID');
            $table->unsignedInteger('category_id')->index()->comment('分类 ID');
            $table->string('slug')->nullable()->comment('SEO 友好的 URI');
            $table->string('title')->index()->comment('标题');
            $table->string('excerpt')->nullable()->comment('摘要');
            $table->text('content')->comment('内容');
            $table->unsignedInteger('reply_count')->default(0)->comment('回复数量');
            $table->unsignedInteger('view_count')->default(0)->comment('浏览量');
            $table->timestamp('published_at')->nullable()->comment('发布时间');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
