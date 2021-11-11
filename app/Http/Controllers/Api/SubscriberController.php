<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libraries\WebApiResponse;
use App\Models\Subscriber\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Subscribe to a Platform
     * @group Subscriptions
     *
     * @param Request $request
     * @bodyParam platform_id integer required Platform ID. Example : 1
     * @bodyParam email email Title Of The Post. Example : send2raju.bd@gmail.com
     * @bodyParam status boolean required Status . Example : 1
     *
     * @return \Illuminate\Http\Response
     * @response 201 {"status":"success","message":"Subscribed Successfully!","code":201,"data":[]}
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'platform_id'   => 'integer|exists:platforms,id',
            'email'         => 'required|email ',
            'status'        => "required|boolean"
        ]);


        if ($validator->fails()) {
            return WebApiResponse::validationError($validator, $request);
        }


        $subscriber = Subscriber::create($request->only([
            'email',
            'platform_id',
            'status'
        ]));

        return WebApiResponse::success(201, $subscriber->toArray(), 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
