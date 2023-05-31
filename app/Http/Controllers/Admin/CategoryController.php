<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AuthSessionService;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::where('parent_id', null)->orderby('title', 'asc')->get();
        return view('admin.pages.category.pages.CreateCategory', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'parent_id' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:50000'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }
        $category = new Category();
        $category->title       = $request->title;
        $category->description = $request->description;
        $category->slug        = Str::slug($request->title).'-'.Str::random(4);
        $category->parent_id   = $request->parent_id;
        $category->title_color_code   = $request->title_color_code;
        $category->created_by  = session()->get('user')->id;


        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = 'category_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/category')) {
                mkdir('uploads/images/category', 0777, true);
            }
            $imageFile->move('uploads/images/category', $imageFileName);
            $category->image = $imageFileName;
        }

        $category->save();

        return redirect()->back()->with('success','Category added successfully');
    }

    public function index()
    {
        $categories = Category::where('parent_id', null)->orderby('title', 'asc')->paginate(20);
        return view('admin.pages.category.pages.IndexCategory',['categories' => $categories]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('title', 'asc')->get();
        return view('admin.pages.category.pages.EditCategory',['category' => $category,'categories'=>$categories]);

    }

    public function update(Request $request ,$id)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'parent_id' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:50000'
        ]);
        $category = Category::find($id);
        if($request->title != $category->title || $request->parent_id != $category->parent_id)
        {
            if(isset($request->parent_id))
            {
                //check duplicate
                $categoryParent = Category::where('title', $request->title)->where('parent_id', $request->parent_id)->first();
                if($categoryParent)
                {
                    return redirect()->back()->with('error', 'Category already exist in this parent.');
                }
            }
            else
            {
                $categoryParent = Category::where('title', $request->title)->where('parent_id', null)->first();
                if($categoryParent)
                {
                    return redirect()->back()->with('error', 'Category already exist with this name.');
                }
            }
        }

        $category->title       = $request->title;
        $category->parent_id   = $request->parent_id;
        $category->description = $request->description;
        $category->title_color_code   = $request->title_color_code;
        $category->created_by  = session()->get('user')->id;

        if ($request->hasFile('image')) {
            $destination = 'uploads/images/category/' .$category->image;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $newsImageFile = $request->file('image');
            $imageFileName = 'category_' . time() . '.' . $newsImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/category')) {
                mkdir('uploads/images/category', 0777, true);
            }
            $newsImageFile->move('uploads/images/category', $imageFileName);
            $category->image = $imageFileName;
        }
        $category->update();
        return redirect()->back()->with('success', 'Category Updated successfully');
    }

}
