<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    private $_category;

    public function __construct(Category $category)
    {
        $this->_category = $category;
    }

    public function index()
    {
        $categories = CategoryView::orderBy('id', 'desc')->paginate(25);
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $categories = $this->_category->categoryOptions();
        return view('admin.categories.create', compact('categories'));
    }


    public function store(Request $request)
    {
        if(!$request->ajax()) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            // 'category_name' => 'required|max:255|unique:categories',
            'category_name' => 'required|max:255',
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
                $Img = Image::make($image->getRealPath())->resize(600, 400);
                $Img->save($Path . '/' . $fileName, 90);
            }

            $data = [
                'category_name'  =>  $request->category_name,
                'parent_id'      =>  $request->parent,
                'slug'       =>  translateEnglishSlug($request->category_name).'-'.randomName(4),
                'image'          => $fileName,
            ];

            $this->_category->store($data);
            return response()->json(['success' => 'Create Successfully.']);
        }
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $categories = $this->_category->categoryOptions();
        return view('admin.categories.edit', compact('category','categories'));
    }


    public function update(Request $request , Category $category)
    {
        if(!$request->ajax()) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            // 'category_name' => 'required|max:255|unique:categories,category_name,'.$category->id.',id',
            'category_name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {

            $fileName = ($category->image != null) ? $category->image : null;
            if($request->hasFile('image')){
                $image = $request->image;
                $Path = public_path('images/');
                $extension = $image->getClientOriginalExtension();
                $fileName =  generateRandomName('8') . '.' . $extension;
                $Img = Image::make($image->getRealPath())->resize(600, 400);
                $Img->save($Path . '/' . $fileName, 90);
            }

            $data = [
                'category_name'  =>  $request->category_name,
                'parent_id'            =>  $request->parent,
                'active'         =>  ($request->has('status')) ? $request->status : 'N',
                'slug'       =>  translateEnglishSlug($request->category_name).'-'.randomName(4),
                'image'          => $fileName,
            ];

            $this->_category->store($data , $category->id);
            return response()->json(['success' => 'Update Successfully.']);
        }
    }


    public function destroy(Category $category)
    {
        $Path = public_path('images/'. $category->image);
        if(file_exists($Path)){
            @unlink($Path);
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category has been Delete successfully.');
    }
}
