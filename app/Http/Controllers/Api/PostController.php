<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libraries\WebApiResponse;
use App\Models\Post\Post;
use Illuminate\Http\Request;

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
     * @bodyParam title integer string Title Of The Post. Example : Post Title
     * @bodyParam description string required Post Description . Example : Post Description
     * @bodyParam status boolean required Status . Example : 1
     *
     * @return \Illuminate\Http\Response
     * @response 201 {"status":"success","message":"File List","code":200,"data":[{"id":1,"name":"Raju Rayhan","email":"rayhan@simecsystem.com","phone":"8801849699001","address":"20, Nur Graden City","country":"Bangladesh","country_id":15,"state":null,"state_id":null,"zip":"1212","created_at":"2021-01-26T17:30:31.000000Z","updated_at":"2021-01-26T17:30:31.000000Z"},{"id":2,"name":"Nicolas Heathcote","email":"kgusikowski@example.net","phone":"3","address":"20, Nur Graden City","country":"Bangladesh","country_id":15,"state":null,"state_id":null,"zip":"1212","created_at":"2021-01-26T17:30:31.000000Z","updated_at":"2021-01-26T17:30:31.000000Z"},{"id":3,"name":"Madelynn Morissette Sr.","email":"enos.koss@example.com","phone":"11","address":"20, Nur Graden City","country":"Bangladesh","country_id":15,"state":null,"state_id":null,"zip":"1212","created_at":"2021-01-26T17:30:31.000000Z","updated_at":"2021-01-26T17:30:31.000000Z"},{"id":4,"name":"Sean Rogahn","email":"nils.yundt@example.com","phone":"7","address":"20, Nur Graden City","country":"Bangladesh","country_id":15,"state":null,"state_id":null,"zip":"1212","created_at":"2021-01-26T17:30:31.000000Z","updated_at":"2021-01-26T17:30:31.000000Z"},{"id":5,"name":"Prof. Tyra Borer","email":"huel.cornell@example.com","phone":"2","address":"20, Nur Graden City","country":"Bangladesh","country_id":15,"state":null,"state_id":null,"zip":"1212","created_at":"2021-01-26T17:30:31.000000Z","updated_at":"2021-01-26T17:30:31.000000Z"}],"links":{"first":"http:\/\/localhost:8000\/api\/users?page=1","last":"http:\/\/localhost:8000\/api\/users?page=3","prev":null,"next":"http:\/\/localhost:8000\/api\/users?page=2"},"meta":{"current_page":1,"from":1,"last_page":3,"links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost:8000\/api\/users?page=1","label":1,"active":true},{"url":"http:\/\/localhost:8000\/api\/users?page=2","label":2,"active":false},{"url":"http:\/\/localhost:8000\/api\/users?page=3","label":3,"active":false},{"url":"http:\/\/localhost:8000\/api\/users?page=2","label":"Next &raquo;","active":false}],"path":"http:\/\/localhost:8000\/api\/users","per_page":"5","to":5,"total":12}}
     */
    public function store(Request $request)
    {
        return WebApiResponse::success(201, [], 'Post Created Successfully!');
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
