<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerInquiryRequest;
use App\Models\Country;
use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Service\InquiryService;

class InquiryController extends Controller
{
    protected $inquiryService;

    public function __construct(InquiryService $inquiryService)
    {
        $this->inquiryService = $inquiryService;    
    }
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
        return $this->inquiryService->create($request->except('_token'));
    }
}
