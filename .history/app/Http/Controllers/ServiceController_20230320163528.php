<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Helpers\ResponseStatusCodes;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use FilesHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use ValidatorHelper;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services =  Service::with(['category:id,name'])->get();
        return  ResponseHelper::setResponse('success',    ServiceResource::collection($services));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tell the validator that this file should be an image
        $rules = array(
            'name' => 'required|unique:services,name',
            'description' => 'nullable',
            'category_id' => 'required',
            "images"    => "required|array|min:1|max:4",
            'images.*' => 'required|mimes:jpg,bmp,png,jpeg,gif|max:2048',
        );

        // Now pass the input and rules into the validator
        $validator = Validator::make($request->all(), $rules);


        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = FilesHelper::saveFile($image, 'visit_images/');
                $images[] = $path;
            }
            $request['images'] =  $images;
        }



        $service =  Service::create($request->input());

       
            return  ResponseHelper::setResponse('success', new ServiceResource($service));
     
    }


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
