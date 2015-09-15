<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Image;
use Intervention\Image\Exception\NotReadableException;
use Storage;

class GeneratePreview extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    const PATH = 'images/previews/';
    const FORMAT = 'jpg';

    private $post;

    private function getPreviewPath($publicId)
    {
        return self::PATH.$publicId.'.'.self::FORMAT;
    }

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle()
    {
        try {
            $thumbnail = Image::make($this->post->content);
        } catch (NotReadableException $e) {
            return;
        }

        // Fit thumbnail to 16:9 ratio
        $thumbnail->fit(160, 90);
        // Blur thumbnail a little, because we will be scaling it up
        $thumbnail->blur(10);

        $publicId = uniqid();
        // Just because uniqid isn't actually unique
        while (Storage::exists($this->getPreviewPath($publicId))) {
            $publicId = uniqid();
        }

        Storage::put($this->getPreviewPath($publicId), $thumbnail->encode(self::FORMAT));

        $this->post->thumbnail_url = $this->getPreviewPath($publicId);
        $this->post->save();
    }
}
