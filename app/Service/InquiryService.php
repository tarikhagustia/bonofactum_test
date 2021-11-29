<?php

namespace App\Service;

use App\Events\InquiryCreated;
use App\Jobs\TakeWebsiteScreenshot;
use App\Models\Inquiry;
use Storage;

class InquiryService
{

    public function create(array $data)
    {
        // Defind
        $data['references'] = [];

        // Store image to public disk
        if (isset($data['reference_image'])) {
            $filePath = $data['reference_image']->store('inquiry/images', 'public');
            $data['references'] = [
                [
                    'path' => $filePath,
                    'ts' => now()->format('Y-m-d H:i:s'),
                    'url' => null
                ]
            ];
        }

        // Some mapping
        $referenceImage = null;
        if(isset($data['reference'])) {
            $referenceImage = $data['reference'];
        }
        $data['type_id'] = $data['type'];
        $data['material_id'] = $data['material'];
        $data['country_id'] = $data['country'];
        $data['ip_address'] = request()->ip();

        // Remove unused data
        unset($data['country']);
        unset($data['type']);
        unset($data['material']);
        unset($data['reference']);
        unset($data['reference_image']);


        // Store data
        $inquiry = Inquiry::create($data);
        // Store references as image if the reference link has been filled, maybe we use chromeium or pagespeed API ?
        if (isset($referenceImage)) {
            // TODO : Do logic here
            TakeWebsiteScreenshot::dispatch($inquiry, $referenceImage);
        }
        event(new InquiryCreated($inquiry));
        return redirect()->back()->with(['success' => 'Success creating inquiry, we will process your inquiry as soon as possible.']);
    }
}
