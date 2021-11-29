<?php

namespace App\Jobs;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class TakeWebsiteScreenshot implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $inquiry;
    protected $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Inquiry $inquiry, string $url)
    {
        $this->inquiry = $inquiry;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->inquiry->references .= $this->fetchImage();
        $this->inquiry->save();
    }


    /**
     * Fething image from url
     */
    private function fetchImage()
    {
        $url = $this->url;
        // Check if the link is image or no?
        $size = getimagesize($url);
        $imgData = null;
        if ($size) {
            // that is an image process them
            $imgData = file_get_contents($url);
        } else {
            // take website screenshot
            $jsonData = file_get_contents("https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url={$url}&screenshot=true");
            $arrayResult = json_decode($jsonData, true);
            $imgData = $arrayResult['lighthouseResult']['audits']['final-screenshot']['details']['data'];
            $imgData = base64_decode(explode(',', $imgData)[1]);
        }

        $f = finfo_open();
        $mime_type = finfo_buffer($f, $imgData, FILEINFO_MIME_TYPE);
        $fileName = 'images/references/' . uniqid() . "." . explode("/", $mime_type)[1];
        Storage::disk('public')->put($fileName, $imgData);
        return $fileName;
    }
}
