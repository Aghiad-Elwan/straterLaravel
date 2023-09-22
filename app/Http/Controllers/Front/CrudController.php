<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function getOffers()
    {
        return Offer::get();
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];

        $messages = [
            'name.required' => trans('messages.name required'),
            'name.unique' => __('messages.name unique'),
            'price.numeric' => __('messages.price numeric'),
            'price.required' => __('messages.price required'),
            'details.required'=>__('messages.details required'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);

        return redirect()->back()->with(["success"=>"تم إضافة العرض بنجاح"]);
    }
}
