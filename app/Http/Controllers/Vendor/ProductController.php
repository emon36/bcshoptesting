<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Unit;
use App\Models\Vendor;
use App\Services\Helpers\Converter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use Converter;

    public function vendorProductCreatePage()
    {
        $categories = Category::all();
        $units = Unit::all();
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $sku = strtoupper(Str::random(13));
        return view('vendor.pages.product.pages.CreateProduct',  [
            'units' => $units,
            'sku' => $sku,
            'vendor' => $vendor,
            'categories' => $categories
        ]);
    }

    public function vendorProductCreateProcess(Request $request)
    {

        if($request->unit_weight_helper == 'KGs'){
            $request->unit_weight =  $this->toGram($request->unit_weight);
        }

        $product = new Product();
        $product->vendor_id = $request->vendor_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title).'-'.Str::random(4).$request->vendor_id.'-'.Str::random(8);
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->unit = $request->unit;
        $product->unit_weight = $request->unit_weight;
        $product->current_purchase_price = $this->toPaisa($request->current_purchase_price);
        $product->current_selling_price = $this->toPaisa($request->current_selling_price);
        $product->current_stock = $request->current_stock;
        $product->status = 'Pending';
        if ($request->has('preishable'))
        {
            $product->perishable = $request->perishable;
        }
        if ($request->has('preoder'))
        {
            $product->preorder = $request->preorder;
            $product->preorder_advance_amount = $request->preorder_advance_amount? $this->toPaisa($request->preorder_advance_amount) : null;
        }
        $product->created_by = session()->get('user')->id;
        $product->save();

        if ($request->hasFile('featured_image')) {
            $imageFile = $request->file('featured_image');
            $imageFileName = $product->id.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/products', $imageFileName);

            $newProductImage = new ProductImage();
            $newProductImage->product_id = $product->id;
            $newProductImage->image = $imageFileName;
            $newProductImage->position_key = 1;
            $newProductImage->created_by = session()->get('user')->id;
            $newProductImage->save();
        }

        $categoryId = $request->category_id;
        $productCategory = new ProductCategory();
        $productCategory->category_id = $categoryId;
        $productCategory->product_id = $product->id;
        $productCategory->save();

        if ($request->hasFile('image')) {

            $imageFile = $request->file('image');
            $i= 2;
            foreach($imageFile as $images)
            {
                $imageFileName = $product->id.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $images->getClientOriginalExtension();
                $images->move('uploads/images/products', $imageFileName);

                $newProductImage = new ProductImage();
                $newProductImage->product_id = $product->id;
                $newProductImage->image = $imageFileName;
                $newProductImage->position_key = $i++;
                $newProductImage->created_by = session()->get('user')->id;
                $newProductImage->save();

            }
        }

        return redirect()->back()->with('success','Product Saved Successfully');
    }

    public function VendorProductIndex()
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $products = Product::where('vendor_id', $vendor->id)->where('existence', 'Active')->orderBy('id', 'desc')->paginate(10);
        return view('vendor.pages.product.pages.IndexProduct', ['products' => $products]);
    }


    public function productCategoryPage($id)
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $categories = Category::all();
        $product = Product::where('id',$id)->where('vendor_id', $vendor->id )->first();
        $productCategory = ProductCategory::with('category')->where('product_id', $product->id)->get();
        return view('vendor.pages.product.pages.ProductCategory', ['categories' => $categories, 'product' => $product, 'productCategory' => $productCategory]);
    }

    public function productCategoryStore(Request $request, $id)
    {
        $categoryExist = ProductCategory::where('product_id',$id)->where('category_id', $request->category_id)->first();
        if ($categoryExist)
        {
            return redirect()->back()->with('error', 'Product Category Already exists');
        }
        else{
            $categoryId = $request->category_id;
            foreach ($categoryId as $row)
            {
                $productCategory = new ProductCategory();
                $productCategory->category_id = $row;
                $productCategory->product_id = $id;
                $productCategory->save();
            }

            return redirect()->back()->with('success', 'Product Added Successfully' );
        }

    }

    public function productCategoryDelete($id)
    {
        $productCategory = ProductCategory::where('id', $id)->first();
        $productCategory->delete();
        return redirect()->back()->with('success', 'Product Categories deleted successfully');
    }

    public function productCreateImagePage($id)
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $product = Product::where('id',$id)->where('vendor_id', $vendor->id)->first();
        return view('vendor.pages.product.pages.ProductGallery', ['product' => $product]);

    }

    public function productImageUpload(Request $request, $id)
    {
        if ($request->hasFile('image')) {

            $imageFile = $request->file('image');
            $i= 2;
            foreach($imageFile as $images)
            {
                $imageFileName = $id.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $images->getClientOriginalExtension();
                $images->move('uploads/images/products', $imageFileName);

                $newProductImage = new ProductImage();
                $newProductImage->product_id = $id;
                $newProductImage->image = $imageFileName;
                $newProductImage->position_key = $i++;
                $newProductImage->created_by = session()->get('user')->id;
                $newProductImage->save();

            }

        }

        return redirect()->route('InVendor.Product.CategoryPage',$id);

    }

    public function productEditPage($id)
    {
        $categories = Category::orderby('title', 'asc')->get();
        $productCategories = ProductCategory::where('product_id', $id)->first();
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $units = Unit::all();
        $product = Product::where('id',$id)->where('vendor_id', $vendor->id)->first();

        return view('vendor.pages.product.pages.EditProduct', ['product' => $product, 'vendor' => $vendor, 'units' => $units,  'productCategories' => $productCategories,  'categories' => $categories]);

    }

    public  function productUpdateProcess(Request $request, $id)
    {
        $product = Product::find($id);
        if($request->unit_weight_helper == 'KGs'){
            $request->unit_weight =  $this->toGram($request->unit_weight);
        }
        $product->vendor_id = $request->vendor_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title).'-'.Str::random(4).$request->vendor_id.'-'.Str::random(8);
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->unit = $request->unit;
        $product->unit_weight = $request->unit_weight;
        $product->current_purchase_price = $this->toPaisa($request->current_purchase_price);
        $product->current_selling_price = $this->toPaisa($request->current_selling_price);
        $product->current_stock = $request->current_stock;
        $product->perishable = $request->perishable ? 1 : 0;
        $product->preorder = $request->preorder ? 1 : 0;
        $product->preorder_advance_amount = $request->preorder_advance_amount? $this->toPaisa($request->preorder_advance_amount) : null;
        $product->created_by = session()->get('user')->id;


        if ($request->hasFile('featured_image')) {

            $imageFile = $request->file('featured_image');
            $imageFileName = $product->id.'_'.Str::uuid() .'_'. time() .'_'. Str::uuid() .'.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/images/products/', $imageFileName);

            $newProductImage = ProductImage::where('product_id', $id)->where('position_key', 1)->first();
            $newProductImage->product_id = $product->id;
            $newProductImage->image = $imageFileName;
            $newProductImage->created_by = session()->get('user')->id;
            $newProductImage->update();
        }

        $categoryId = $request->category_id;
        $productCategory = ProductCategory::where('product_id', $id)->first();
        $productCategory->category_id = $categoryId;
        $productCategory->product_id = $product->id;
        $productCategory->update();


        $product->update();

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function productDelete($id)
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $product = Product::where('id', $id)->where('vendor_id',$vendor->id)->first();
        $product->existence = 'Inactive';
        $product->update();
        return redirect()->back()->with('success', 'Product Deleted successfully');
    }

    public function discountPage($id)
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $product = Product::find($id);

        return view('vendor.pages.product.pages.ProductDiscount', ['product' => $product, 'vendor' => $vendor]);

    }

    public function addDiscount(Request $request, $id)
    {
        $product = Product::find($id);

        $product->old_price = $request->old_price*100;
        $product->current_selling_price = $request->current_selling_price*100;
        $product->discount = $request->discount;
        $product->update();

        return redirect()->back()->with('success', 'updated successfully');

    }

    public function deleteGalleryImage(Request $request, $id)
    {
        $productImage = ProductImage::find($id);
        $productImage->delete();
        return redirect()->back()->with('success', 'deleted successfully');
    }



}
