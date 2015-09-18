<?php

namespace App\Http\Composers;

use Embed;
use Illuminate\Contracts\View\View;

class PostComposer
{
    private $post;

    public function compose(View $view)
    {
        $this->post = $view->offsetGet('post');

        $embedHtml = $this->getEmebdHtml();
        $previousVoteValue = $this->getPreviousVoteValue();

        $view->with('previousVoteValue', $previousVoteValue);
        $view->with('embedHtml', $embedHtml);
    }

    /**
     * Get embed HTML for post URL.
     *
     * @return string
     */
    private function getEmebdHtml()
    {
        $embed = Embed::make($this->post->content)->parseUrl();

        return $embed ? $embed->getHtml() : null;
    }

    /**
     * Get the user's previous vote value.
     *
     * @return int
     */
    private function getPreviousVoteValue()
    {
        if (auth()->check()) {
            $votes = $this->post->votes()->where('user_id', auth()->id());

            return $votes->count() > 0 ? $votes->first()->value : 0;
        }

        return 0;
    }
}
