<?php

namespace App\Http\Composers;

use Auth;
use Illuminate\Contracts\View\View;

class PostComposer
{
    public function compose(View $view)
    {
        $voteValue = 0;
        $post = $view->getData()['post'];

        if (Auth::check()) {
            $votes = $post->votes()->where('user_id', Auth::id());

            if ($votes->count() > 0) {
                $voteValue = $votes->first()->value;
            }
        }

        $view->with('voteValue', $voteValue);
        $view->with('score', $post->votes()->sum('value'));
    }
}
