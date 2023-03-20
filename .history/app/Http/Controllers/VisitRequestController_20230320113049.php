<?php

namespace App\Http\Controllers;

use App\Enums\VisitRequestStatus;
use App\Helpers\ResponseHelper;
use App\Helpers\ResponseStatusCodes;
use App\Http\Resources\VisitRequestResource;
use App\Models\VisitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use ValidatorHelper;

class VisitRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitRequests = VisitRequest::all();
        if ($visitRequests) {
            return ResponseHelper::setResponse('success',VisitRequestResource::collection($previewVisits) );
        } else {
            return ResponseHelper::setError('Visit requests are empty', ResponseStatusCodes::$error_status_code, []);
        }
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

        if (isset($request['status'])) {
            $request->request->remove('status');
        }

        // Tell the validator that this file should be an image
        $rules = array(
            'notes' => 'nullable',
            'lat' => 'required',
            'long' => 'required',
            'user_id' => 'required',
        );

        /*  $messages = [
            'status' => [
                'required' => 'A status is required.',
                'Enum' => 'A status is not a VisitStatus.',
            ],

        ]; */
        // Now pass the input and rules into the validator
        $validator = Validator::make($request->all(), $rules);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }

        $visitRequest =   VisitRequest::create($request->all());

        if ($visitRequest) {
            return  ResponseHelper::setResponse('updated successfully',  $visitRequest);
        } else {
            return ResponseHelper::setError('some thing went wrong', ResponseStatusCodes::$error_status_code, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VisitRequest $visitRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisitRequest $visitRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $visitRequest = VisitRequest::firstWhere('id', '=', $id);

        if (!$visitRequest) {
            return ResponseHelper::setError('visit request not found', ResponseStatusCodes::$error_status_code);
        }
        // Tell the validator that this file should be an image
        $rules = array(
            'status' => ['required', new Enum(VisitRequestStatus::class, false)],
        );

        // Now pass the input and rules into the validator
        $validator = Validator::make($request->all(), $rules);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }

        if ($request->status != VisitRequestStatus::pending->name && $request->status != VisitRequestStatus::contract->name) {
            // Tell the validator that this file should be an image
            $rules = array(
                'sales_id' => 'required',
            );
        }

        $validator = Validator::make($request->all(), $rules);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }

        $visitRequest =    $visitRequest->update($request->all());

        if ($visitRequest) {
            return  ResponseHelper::setResponse('updated successfully',  $visitRequest);
        } else {
            return ResponseHelper::setError('some thing went wrong', ResponseStatusCodes::$error_status_code, null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitRequest $visitRequest)
    {
        //
    }
}
