<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Models\Inquiry;
use App\Models\Setting;

class InquiryController extends Controller
{
    public function create()
    {
        $settings = Setting::first();

        return view('inquiry', compact('settings'));
    }

    public function store(StoreInquiryRequest $request)
    {
        $validatedData = $request->validated();

        Inquiry::create($validatedData);

        return back()->with('success', 'Transmission Received. Our core nodes will establish contact shortly.');
    }
}
