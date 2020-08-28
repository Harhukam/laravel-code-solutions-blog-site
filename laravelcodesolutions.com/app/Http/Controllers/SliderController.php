<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{

    private $_slider;

    public function __construct(Slider $slider)
    {
        $this->_slider = $slider;
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(Request $request)
    {
        if(!$request->ajax()) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'title2' => 'required|max:255',
            'description' => 'required|max:2000',
            'btn_name' => 'required|max:255',
            'url' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
                $Img = Image::make($image->getRealPath())->resize(1920, 766);
                $Img->save($Path . '/' . $fileName, 70);
            }

            $data = [
                'title'=>$request->title,
                'title2'=>$request->title2,
                'description'=>$request->description,
                'btn_name'=>$request->btn_name,
                'url'=>$request->url,
                'image'=>$fileName,
            ];

            $this->_slider->store($data);
            return response()->json(['success' => 'Create Successfully.']);
        }
    }




    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(Request $request, Slider $slider)
     {
         if(!$request->ajax()) {
             abort('404');
         }

         $validator = Validator::make($request->all(), [
             'title' => 'required|max:255',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

         if ($validator->fails()) {
             return response()->json(['error' => $validator->errors()->all()]);
         } else {

             $fileName = ($slider->image != null) ? $slider->image : null;
             if($request->hasFile('image')){
                 $image = $request->image;
                 $Path = public_path('images/');
                 $extension = $image->getClientOriginalExtension();
                 $fileName =  generateRandomName('8') . '.' . $extension;
                 $Img = Image::make($image->getRealPath())->resize(1920, 766);
                 $Img->save($Path . '/' . $fileName,70);
             }

             $data = [
                 'title'=>$request->title,
                 'title2'=>$request->title2,
                 'description'=>$request->description,
                 'btn_name'=>$request->btn_name,
                 'url'=>$request->url,
                 'active'         =>  ($request->has('status')) ? $request->status : 'N',
                 'image'          => $fileName,
             ];

             $this->_slider->store($data , $slider->id);
             return response()->json(['success' => 'Update Successfully.']);
         }
     }



    public function destroy(Slider $slider)
    {
        $Path = public_path('images/'. $slider->image);
        if(file_exists($Path)){
            @unlink($Path);
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Delete successfully.');
    }

}
