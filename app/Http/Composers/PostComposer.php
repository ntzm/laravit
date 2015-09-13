<?php

namespace App\Http\Composers;

use Auth;
use Embed;
use Illuminate\Contracts\View\View;

class PostComposer
{
    public function compose(View $view)
    {
        $post = $view->getData()['post'];

        $embedHtml = null;

        $embed = Embed::make($post->content)->parseUrl();

        if ($embed) {
            $embedHtml = $embed->getHtml();
        }

        $voteValue = 0;

        if (Auth::check()) {
            $votes = $post->votes()->where('user_id', Auth::id());

            if ($votes->count() > 0) {
                $voteValue = $votes->first()->value;
            }
        }

        $view->with('voteValue', $voteValue);
        $view->with('score', $post->votes()->sum('value'));
        $view->with('embedHtml', $embedHtml);
    }
}
