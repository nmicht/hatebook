<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return Post::all();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Post::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelsPost  $modelsPost
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsPost $modelsPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelsPost  $modelsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsPost $modelsPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelsPost  $modelsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsPost $modelsPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelsPost  $modelsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsPost $modelsPost)
    {
        //
    }
}
