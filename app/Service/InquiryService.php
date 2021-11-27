<?php

namespace App\Service;

use App\Events\InquiryCreated;
use App\Models\Inquiry;

class InquiryService
{

    public function create(array $data)
    {
        // Defind
        $data['references'] = "";

        // Store image to public disk
        if (isset($data['reference_image'])) {
            $filePath = $data['reference_image']->store('inquiry/images', 'public');
            $data['references'] .= $filePath;
        }

        // Store references as image if the reference link has been filled, maybe we use chromeium ?
        if (isset($data['reference'])) {
            // TODO : Do logic here
            $filePath = "";
            $data['references'] .= $filePath;
        }

        // Some mapping
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

        event(new InquiryCreated($inquiry));
        return redirect()->back()->with(['success' => 'Success creating inquiry, we will process your inquiry as soon as possible.']);
    }
}
