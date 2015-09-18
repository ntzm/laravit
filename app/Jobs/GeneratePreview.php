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

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Convert an image into a small blurred preview to be used on posts.
     */
    public function handle()
    {
        // This is called on every new post, so we will not be able to make a
        // preview if the URL is unreadable.
        try {
            $image = Image::make($this->post->content);
        } catch (NotReadableException $e) {
            return;
        }

        $preview = $this->makePreview($image);
        $publicId = $this->makePublicId();
        $this->store($preview, $this->getPath($publicId));

        $this->post->thumbnail_url = $this->getPath($publicId);
        $this->post->save();
    }

    /**
     * Get the path where previews are stored.
     *
     * @param  string $publicId
     * @return string
     */
    private function getPath($publicId)
    {
        return 'images/previews/'.$publicId.'.jpg';
    }

    /**
     * Make image into preview.
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    private function makePreview($image)
    {
        $image->fit(320, 180);
        $image->blur(5);

        return $image;
    }

    /**
     * Make a unique public ID for storing the preview in storage.
     *
     * @return string
     */
    private function makePublicId()
    {
        $publicId = uniqid();

        if (Storage::exists($this->getPath($publicId))) {
            $this->makePublicId();
        }

        return $publicId;
    }

    /**
     * Store preview in storage.
     *
     * @param \Intervention\Image\Image $image
     * @param string                    $path
     */
    private function store($image, $path)
    {
        Storage::put($path, $image->encode('jpg'));
    }
}
