<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libraries\WebApiResponse;
use App\Models\Post\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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
     * Create A New Post
     * @group Posts
     *
     * @param Request $request
     * @bodyParam platform_id integer required Platform ID. Example : 1
     * @bodyParam title string Title Of The Post. Example : Post Title
     * @bodyParam description string required Post Description . Example : Post Description
     * @bodyParam status boolean required Status . Example : 1
     *
     * @return \Illuminate\Http\Response
     * @response 201 {"status":"success","message":"Post Created Successfully!","code":201,"data":[]}
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'platform_id'   => 'integer|exists:platforms,id',
            'title'         => 'required|string ',
            'description'   => 'required|string',
            'status'        => "required|boolean"
        ]);


        if ($validator->fails()) {
            return WebApiResponse::validationError($validator, $request);
        }


        $post = Post::create($request->only([
            'platform_id',
            'title',
            'description',
            'status'
        ]));

        return WebApiResponse::success(201, $post->toArray(), 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
