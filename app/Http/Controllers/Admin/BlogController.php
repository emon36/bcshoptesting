<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function createPage()
    {
        return view('admin.pages.blog.pages.CreateBlog');
    }

    public function createProcess(Request $request){

        $blog = new Blog();
        $blog->title       = $request->title;
        $blog->content =    $request->description;
        $blog->created_by  = session()->get('user')->id;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = 'blog_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/blog')) {
                mkdir('uploads/images/blog', 0777, true);
            }
            $imageFile->move('uploads/images/blog', $imageFileName);
            $blog->image = $imageFileName;
        }

        $blog->save();

        return redirect()->back()->with('success','Blog added successfully');

    }

    public function blogList(){
        $blogs = Blog::all();
        return view('admin.pages.blog.pages.BlogIndex', ['blogs' => $blogs]);
    }

    public function editBlog($id){
        $blog = Blog::find($id);
        return view('admin.pages.blog.pages.EditBlog', ['blog' => $blog]);
    }

    public function updateBlog(Request $request, $id){
        $blog = Blog::find($id);
        $blog->title       = $request->title;
        $blog->content =    $request->description;

        if ($request->hasFile('image')) {
            $destination = 'uploads/images/blog/' .$blog->image;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $newsImageFile = $request->file('image');
            $imageFileName = 'blog_' . time() . '.' . $newsImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/blog')) {
                mkdir('uploads/images/blog', 0777, true);
            }
            $newsImageFile->move('uploads/images/blog', $imageFileName);
            $blog->image = $imageFileName;
        }
        $blog->update();
        return redirect()->back()->with('success','Blog Updated successfully');
    }

    public function changeStatus(Request $request){
        $blog = Blog::find($request->blog_id);
        $blog->status = $request->status;
        $blog->update();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
}
