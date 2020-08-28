<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        $posts = Post::orderBy('id','desc')->get();
        return view('welcome', compact('sliders', 'posts'));
    }

    public function viewPostsByCategory( $categorySlug = null )
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail(['id','category_name','image']);
        $posts = Post::where('category_id', $category->id)->active()->orderBy('id', 'desc')->paginate(50);
        return view('post-list', compact('posts','category','categorySlug'));
    }



    
    public function singleView($category, $slug = null)
    {
        if($slug == null) {
             abort(404);
            //return view('404');
        }

        if(!Post::where('slug', $slug)->exists())
        {
            return view('404');
        }

        $single = Post::where('slug','=', $slug)->orderby('id','DESC')->firstOrFail();
        $posts = Post::where('id', '<>', $single['id'])
            ->where('category_id', $single['category_id'])->active()->take(6)->get();
        if($posts->count() >= 3) {
            $posts = $posts->random(3);
        }

        $categories = Category::where('active', 'Y')->get();
        return view('single-post', compact('single','posts','categories'));
    }



    public function search(Request $request)
    {
        
        $keyword = $request->get('keyword');
        $query = Post::orderBy('id', 'desc');

        if ($keyword != '') {
            $posts = $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('slug', 'like', '%' . $keyword . '%')
                ->orWhere('meta_description', 'like', '%' . $keyword . '%')
                ->orWhere('body', 'like', '%' . $keyword . '%')
                ->where('active', 'Y')
                ->paginate(50);
        } else {
            $posts = $query->paginate(50);
        }
        return view('search-result', compact('keyword', 'posts'));
    }



    public function faq()
    {
        return view('faq');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termAndConditions()
    {
        return view('term-and-conditions');
    }
}
