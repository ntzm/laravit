<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Auth;

class PostComposer
{
    public function compose(View $view)
    {
        $voteValue = 0;

        if (Auth::check())
        {
            $post = $view->getData()['post'];
            $votes = $post->votes()->where('user_id', Auth::id());

            if ($votes->count() > 0) {
                $voteValue = $votes->first()->value;
            }
        }

        $view->with('voteValue', $voteValue);
    }
}
