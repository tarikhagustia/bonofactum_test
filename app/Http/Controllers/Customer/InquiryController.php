<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerInquiryRequest;
use App\Models\Country;
use App\Models\Inquiry;
use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Service\InquiryService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        // Need to cache these things
        $types = Cache::remember('TYPES', 10 * 1000, function () {
            return Type::all();
        });
        $materials = Cache::remember('MATERIALS', 10 * 1000, function () {
            return Material::all();
        });
        $countries = Cache::remember('COUNTRIES', 10 * 1000, function () {
            return Country::all();
        });

        return view('customer.inquery', compact('types', 'materials', 'countries'));
    }

    /**
     * Handle customer inquiry request
     */
    public function store(CustomerInquiryRequest $request)
    {
        return $this->inquiryService->create($request->except('_token'));
    }

    public function show(Inquiry $inquiry, Request $request)
    {
        if (!$request->hasValidSignature()) {
            return abort(401);
        }

        return view('customer.show', compact('inquiry'));
    }
}
