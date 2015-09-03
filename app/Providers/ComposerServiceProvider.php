<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('partials.post', 'App\Http\Composers\PostComposer');
        view()->composer('partials.comment', 'App\Http\Composers\CommentComposer');
    }

    public function register()
    {
        //
    }
}
