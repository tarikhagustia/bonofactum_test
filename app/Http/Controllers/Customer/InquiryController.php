<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerInquiryRequest;
use App\Models\Country;
use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Handle view customer inquiry form     
     */
    public function create()
    {
        $types = Type::all();
        $materials = Material::all();
        $countries = Country::all();

        return view('customer.inquery', compact('types', 'materials', 'countries'));
    }

    /**
     * Handle customer inquiry request
     */
    public function store(CustomerInquiryRequest $request)
    {
        $data = $request->all();
    }
}
