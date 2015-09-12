<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateThumbnail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $post;
    private $imageUrl;

    public function __construct(Post $post, $imageUrl)
    {
        $this->post = $post;
        $this->imageUrl = $imageUrl;
    }

    public function handle()
    {
        try {
            $thumbnailUrl = 'public/img/thumbs/' . $this->post->id . '.jpg';

            $thumbnail = Image::make($this->imageUrl);
            $thumbnail->resize(140, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnail->save($thumbnailUrl);
        } catch (NotReadableException $e) {
            $thumbnailUrl = null;
        }

        $this->post->thumbnail_url = $thumbnailUrl;
        $this->post->save();
    }
}
