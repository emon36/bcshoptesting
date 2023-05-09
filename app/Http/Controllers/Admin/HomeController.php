<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Annoucment;
use App\Models\ShippingCharges;
use Illuminate\Http\Request;
use App\Models\HomeSlider;

use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    public function sliderCreate()
    {
        return view('admin.pages.home_setting.pages.CreateSlider');
    }

    public function uploadSliderImage(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $path = public_path('uploads/images/banner/' . $filename);

        $img = Image::make($image->getRealPath());

        $img->resize(450, 450);

        // save resized image
        $img->save($path);

        $homeSlider = new HomeSlider();
        $homeSlider->title = $request->title;
        $homeSlider->subtitle = $request->subtitle;
        $homeSlider->image = $filename;
        $homeSlider->save();

        return redirect()->back()->with('success', 'Home Slider Images Upload Successfully');
    }

    public function shippingChargePage()
    {
        $shippingCharges = ShippingCharges::all();
        return view('admin.pages.business_setting.ShippingCharges', ['shippingCharges'  => $shippingCharges]);

    }

    public function updateShippingCharge(Request $request,$id)
    {
        $shippingCharge = ShippingCharges::find($id);

        $shippingCharge->amount = $request->amount;
        $shippingCharge->update();

        return redirect()->back()->with('success', 'Updated Successfully');
    }

    public function announcementPage()
    {
        $announcement = Annoucment::where('id', 1)->first();

        return view('admin.pages.home_setting.pages.AnnouncementSetup', ['announcement' => $announcement]);
    }

    public function updateAnnouncement(Request $request ,$id)
    {
        $announcement = Annoucment::find($id);
        $announcement->status = $request->status;
        $announcement->text = $request->text;
        $announcement->update();
        return redirect()->back()->with('success', 'Updated Successfully');

    }

}
