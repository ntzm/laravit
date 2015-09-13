<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Image;
use Intervention\Image\Exception\NotReadableException;

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
            $thumbnailUrl = 'img/thumbs/' . $this->post->id . '.jpg';

            $thumbnail = Image::make($this->imageUrl);
            $thumbnail->fit(160, 90);

            // Blur it a little, because we will be scaling it
            $thumbnail->blur(10);

            $thumbnail->save(public_path($thumbnailUrl));
        } catch (NotReadableException $e) {
            $thumbnailUrl = null;
        }

        $this->post->thumbnail_url = $thumbnailUrl;
        $this->post->save();
    }
}
