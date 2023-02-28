<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    protected  $validationRules = [
        'title' => ['required',  'unique:posts'],
        'date' => 'required',
        'content' => 'required',
        'image' => 'required|image',
        'type_id' => 'required|exists:types,id'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('date', 'DESC')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', ["post" => new Post(),  'types' => Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);
        $data['author'] = Auth::user()->name;
        $data['slug'] = Str::slug($data['title']);
        $data['image'] =  Storage::put('img/', $data['image']);
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();

        return redirect()->route('admin.posts.index')->with('message', "$newPost->title created success");
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'), ['types' => Type::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $data = $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id)],
            'date' => 'required',
            'content' => 'required',
            'image' => 'image|required',
            'type_id' => 'required|exists:types,id'
        ]);


        if ($request->hasFile('image')) {
            if (!$post->isImageUrl()) {
                Storage::delete($post->image);
            }

            $data['image'] =  Storage::put('img/', $data['image']);
        }
        $post->update($data);
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!$post->isImageUrl()) {
            Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', "the film $post->title has been delete correctly ")->with('message-class', 'danger');
    }
}
