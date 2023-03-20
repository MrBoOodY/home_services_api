<?php

namespace App\Http\Controllers;

use App\Enums\VisitStatus;
use App\Helpers\ResponseHelper;
use App\Helpers\ResponseStatusCodes;
use App\Models\PreviewVisit;
use FilesHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use ValidatorHelper;

class PreviewVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits =  PreviewVisit::with(['visit_request:id'])->get();

        if ($visits->isNotEmpty()) {

            return  ResponseHelper::setResponse('success', $visits);
        } else {
            return ResponseHelper::setError('visits is empty', ResponseStatusCodes::$error_status_code, []);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tell the validator that this file should be an image
        $rules = array(
            'visit_request_id' => 'required|unique:preview_visits,visit_request_id',

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
        return $validator->fails();
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $path = FilesHelper::saveFile($image, 'visit_images/');
                $images[] = $path;
            }
            $request['images'] =  $images;
        }



        $previewVisit =  PreviewVisit::create($request->all());

        if ($previewVisit) {
            return  ResponseHelper::setResponse('success', $previewVisit);
        } else {
            return ResponseHelper::setError('some thing went wrong', ResponseStatusCodes::$error_status_code, null);
        }
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
    public function update(Request $request, int $id)
    {
        $visit = PreviewVisit::firstWhere('id', '=', $id);

        if (!$visit) {
            return ResponseHelper::setError('visit not found', ResponseStatusCodes::$error_status_code);
        }
        // Tell the validator that this file should be an image
        $rules = array(
            'contract_id' => 'required|unique:contract_id',
            'lat' => 'nullable',
            'long' => 'nullable',
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
        return $visit;

        $visit =   $visit->update($request->all());

        if ($visit) {
            return  ResponseHelper::setResponse('updated successfully', $visit);
        } else {
            return ResponseHelper::setError('some thing went wrong', ResponseStatusCodes::$error_status_code, null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreviewVisit $previewVisit)
    {
        //
    }
}
