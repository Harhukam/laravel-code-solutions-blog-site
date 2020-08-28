<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    private $_post;

    public function __construct(Post $post)
    {
        $this->_post = $post;
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(25);
        return view('post.index', compact('posts'));
    }


    public function create()
    {
        $categories = (new Category)->categoryOptions();
        return view('post.create', compact('categories'));
    }


    public function store(Request $request)
    {
        if(!$request->ajax()) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:500|unique:posts',
            'body' => 'required|max:4294967000',
            'category' => 'required|max:255',
            'meta_description' => 'required|max:160',
            'disclaimer' => 'nullable|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            $fileName = null;
            if($request->hasFile('image')){
                $image = $request->image;
                $Path = public_path('images/');
                $extension = $image->getClientOriginalExtension();
                $fileName =  generateRandomName('8') . '.' . $extension;
                $img = Image::make($image->getRealPath())->fit(800, 383);
                $img->insert(public_path('logo.png'), 'bottom-right',20,20);
                $img->save($Path . '/' . $fileName, 60);

                $thumb = Image::make($image->getRealPath())->fit(411, 276);
                $thumb->save($Path . '/'. 'thumb-' . $fileName, 50);
            }

            $data = [
                'title'=>$request->title,
                'body'=>$request->body,
                'category_id'=>$request->category,
                'slug'=>translateEnglishSlug($request->title).'.html',
                'image'=> $fileName,
                'meta_description'=>$request->meta_description,
                'disclaimer'=>$request->disclaimer,
            ];

            $this->_post->store($data);
            return response()->json(['success' => 'Post Successfully.']);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $categories = (new Category)->categoryOptions();
        return view('post.edit', compact('categories', 'post'));
    }


    public function update(Request $request, Post $post)
    {
        if(!$request->ajax()) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:500|unique:posts,title,'.$post->id.',id',
            'body' => 'required|max:4294967000',
            'category' => 'required|max:255',
            'meta_description' => 'required|max:160',
            'disclaimer' => 'nullable|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            $fileName = ($post->image != null) ? $post->image : null;

            if($request->hasFile('image')){
                $image = $request->image;
                $Path = public_path('images/');
                $extension = $image->getClientOriginalExtension();
                $fileName =  generateRandomName('8') . '.' . $extension;
                $Img = Image::make($image->getRealPath())->fit(800, 383);
                $Img->insert(public_path('logo.png'), 'bottom-right',20,20);
                $Img->save($Path . '/' . $fileName, 40);

                $thumbImg = Image::make($image->getRealPath())->fit(411, 276);
                $thumbImg->save($Path . '/'. 'thumb-' . $fileName, 40);
            }


            $data = [
                'title'=>$request->title,
                'body'=>$request->body,
                'category_id'=>$request->category,
                //'slug'=>translateEnglishSlug($request->title).'.html',
                'slug'=>($request->has('slug')) ? $request->slug : translateEnglishSlug($request->title).'.html',
                'image'=> $fileName,
                'meta_description'=>$request->meta_description,
                'disclaimer'=>$request->disclaimer,
                'active'         =>  ($request->has('status')) ? $request->status : 'N',
            ];

            $this->_post->store($data , $post->id);
            return response()->json(['success' => 'Post Update Successfully.']);
        }
    }


    public function destroy(Post $post)
    {
        $Path = public_path('images/'. $post->image);
        $thumbPath = public_path('images/'.'thumb-'. $post->image);
        if(file_exists($Path)){
            @unlink($Path);
        }
        if(file_exists($thumbPath)){
            @unlink($thumbPath);
        }

        $post->delete();
        return redirect()->back()->with('success', 'Delete successfully.');
    }
}
