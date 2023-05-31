<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{

    public function addBanner()
    {
        return view('admin.pages.banner.pages.CreateBanner');
    }

    public function storeBanner(Request $request)
    {
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->banner_type = $request->banner_type;
        $banner->url = $request->url;
        $banner->color_code = $request->color_code;

        if ($request->hasFile('image')) {

            $imageFile = $request->file('image');
            $imageFileName = 'Banner'.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/banner/', $imageFileName);
            $banner->image = $imageFileName;
        }

        if ($request->hasFile('bg_image')) {

            $imageFile = $request->file('bg_image');
            $imageFileName = 'Banner'.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/banner/', $imageFileName);
            $banner->bg_image = $imageFileName;
        }
        $banner->save();

        return redirect()->back()->with('success', 'Banner Uploaded Successfully');

    }

    public function bannerList()
    {
        $banners = Banner::all();

        return view('admin.pages.banner.pages.BannerList', ['banners' => $banners]);
    }

    public function bannerStatusChange(Request $request)
    {
        $banner = Banner::find($request->banner_id);
        $banner->status = $request->status;
        $banner->update();
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function bannerEdit($id)
    {
        $banner = Banner::find($id);
        return view('admin.pages.banner.pages.BannerEdit', ['banner' => $banner]);

    }

    public function updateBanner(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->banner_type = $request->banner_type;
        $banner->url = $request->url;
        $banner->color_code = $request->color_code;
        if ($request->hasFile('image')) {

            $destination = 'uploads/images/banner/' .$banner->image;
            if (file_exists($destination)) {
                @unlink($destination);
            }

            $imageFile = $request->file('image');
            $imageFileName = 'Banner'.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/banner/', $imageFileName);
            $banner->image = $imageFileName;
        }
        if ($request->hasFile('bg_image')) {

            $destination = 'uploads/images/banner/' .$banner->bg_image;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $imageFile = $request->file('bg_image');
            $imageFileName = 'Banner'.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/banner/', $imageFileName);
            $banner->bg_image = $imageFileName;
        }
        $banner->update();
        return redirect()->back()->with('success', 'Banner Uploaded Successfully');

    }


}
