<?php

namespace App\Http\Controllers;

use App\Enums\VisitStatus;
use App\Models\PreviewVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

class PreviewVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tell the validator that this file should be an image
        $rules = array(
            'contract_id' => 'required|unique:visits,contract_id',
            // 'lat',
            // 'long',
            'duration' => 'nullable',
            'status' => ['required', new Enum(VisitStatus::class, false)],
            'end_time' => 'date|nullable',
            'start_time' => 'date|nullable',
            "image"    => "required|array|min:1|max:4",
            'image.*' => 'required|mimes:jpg,bmp,png,jpeg,gif|max:2048',
        );
        $messages = [
            'contract_id.required' => 'A contract_id is required.',
            'status' => [
                'required' => 'A status is required.',
                'Enum' => 'A status is not a VisitStatus.',
            ],
            'image.*.mimes' => 'Only jpg,bmp,png,jpeg and gif images are allowed.',
            'image.*.max' => 'Sorry! Maximum allowed size for an image is 2MB.',
        ];
        // Now pass the input and rules into the validator
        $validator = Validator::make($request->all(), $rules, $messages);


        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $path = FilesHelper::saveFile($image, 'visit_images/');
                $images[] = $path;
            }
            $request['images'] =  $images;
        }



        $visit =  Visit::create($request->all());

        if ($visit) {
            return  ResponseHelper::setResponse('success', $visit);
        } else {
            return ResponseHelper::setError('some thing went wrong', ResponseStatusCodes::$error_status_code, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PreviewVisit $previewVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PreviewVisit $previewVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PreviewVisit $previewVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreviewVisit $previewVisit)
    {
        //
    }
}
