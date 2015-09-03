<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Auth;

class CommentComposer
{
    public function compose(View $view)
    {
        $voteValue = 0;
        $comment = $view->getData()['comment'];

        if (Auth::check())
        {
            $votes = $comment->votes()->where('user_id', Auth::id());

            if ($votes->count() > 0) {
                $voteValue = $votes->first()->value;
            }
        }

        $view->with('voteValue', $voteValue);
        $view->with('score', $comment->votes()->sum('value'));
    }
}
