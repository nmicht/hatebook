<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eb = Post::where('user_id',\Auth::user()->id);

        if($request->search) {
            $eb->where('content','like','%'.$request->search.'%');
        }

        $posts = $eb->withoutInteractions()
            ->latest()
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $image = $request->image;
        $date = \Carbon\Carbon::now()->format('YmdHis');
        $name = $date . '-' . \Auth::user()->id ;
        $extension = $image->extension();

        if ($image->isValid()) {
            //Valido tipo de imagen, peso, etc...
            $image->storeAs('public/images', $name . '.' . $extension);

            //Genero el thumnail-
            // \Image::make($image)->resize(50, 50)->save('images/' . $name . '_thumb' . '.' . $extension);

        } else {
            session()->flash('message',$image->getErrorMessage());
            session()->flash('message-type','danger');

            return back();
        }

        Post::create([
            'content' => $request->content,
            'user_id' => \Auth::user()->id,
            'image' => $name
        ]);

        session()->flash('message','Pinche post creado');

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (\Gate::denies('delete-post', $post)) {
            abort(403);
        }

        $post->delete();

        session()->flash('message','Pinche post, lo mandaste ALV');

        return redirect('posts');
    }

}
