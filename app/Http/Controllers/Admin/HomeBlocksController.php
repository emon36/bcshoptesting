<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBlock;
use App\Models\HomeBlockProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeBlocksController extends Controller
{
    public function homeBlocksCreatePage()
    {
        $products = Product::where('status', 'Approved')->where('existence', 'Active')->get();
        return view('admin.pages.home_setting.pages.HomeBlock', ['products' => $products]);
    }


    public function homeBlocksCreateProcess(Request $request)
    {

        $homeBlock = new HomeBlock();
        $homeBlock->title = $request->title;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/section', $imageFileName);

            $homeBlock->image = $imageFileName;
        }
        $homeBlock->save();

        return redirect()->back()->with('success', 'Home Page section created Successfully');
    }

    public function index()
    {
        $homeBlocks = HomeBlock::all();
        return view('admin.pages.home_setting.pages.HomeBlockIndex', ['homeBlocks' => $homeBlocks]);

    }

    public function editHomeBlock($id)
    {
        $homeBlock = HomeBlock::where('id', $id)->first();
        return view('admin.pages.home_setting.pages.HomeBlockEdit', ['homeBlock' => $homeBlock]);
    }

    public function updateHomeBlock(Request $request,$id)
    {
        $homeBlock = HomeBlock::find($id);
        $homeBlock->title = $request->title;
        if ($request->hasFile('image')) {
            $destination = 'uploads/images/section/' .$homeBlock->image;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $imageFile = $request->file('image');
            $imageFileName = Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/section', $imageFileName);

            $homeBlock->image = $imageFileName;
        }
        $homeBlock->update();
        return redirect()->back()->with('success', 'Home Page section updated Successfully');

    }

    public function homeBlocksAddProductPage($id)
    {
        $homeBlock = HomeBlock::where('id', $id)->first();
        $products = Product::where('existence', 'Active')->where('status', 'Approved')->get();

        $homeBlockProducts = HomeBlockProduct::with('product')->where('home_block_id', $id)->paginate(10);

        return view('admin.pages.home_setting.pages.HomeBlockProductAdd', ['homeBlock' => $homeBlock,
            'products' => $products,
            'homeBlockProducts' => $homeBlockProducts
            ]);
    }


    public function  homeBlocksAddProductProcess(Request $request, $id)
    {

        $productExists = HomeBlockProduct::where('product_id', $request->product_id)->where('home_block_id',$id)->first();
        if($productExists)
        {
            return  redirect()->back()->with('error', 'Product Already Exits');
        }else{
            $homeBlockProduct = new HomeBlockProduct();
            $homeBlockProduct->home_block_id = $id;
            $homeBlockProduct->product_id = $request->product_id;
            $homeBlockProduct->save();

            return redirect()->back()->with('success', 'Successfully Added Products');
        }

    }

    public function  removeHomeBlocksProduct($id)
    {
        $homeBlockProduct = HomeBlockProduct::find($id);
        $homeBlockProduct->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }


    public function changeStatus(Request $request)
    {
        $homeBlock = HomeBlock::find($request->id);
        $homeBlock->status = $request->status;
        $homeBlock->update();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
}
