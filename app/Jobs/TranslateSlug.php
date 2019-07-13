<?php

namespace App\Jobs;

use App\Handlers\SlugTranslateHandler;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class TranslateSlug implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @var Article
     */
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $slug = app(SlugTranslateHandler::class)->translate($this->article->title);

        DB::table('articles')->where('id', $this->article->id)->update(['slug' => $slug]);
    }
}
