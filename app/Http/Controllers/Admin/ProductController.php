<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Unit;
use App\Services\Helpers\Converter;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    use Converter;
    public function productCreatePage(){

        $categories = Category::orderby('title', 'asc')->get();
        $vendors = Vendor::all();
        $units = Unit::all();
        $sku = strtoupper(Str::random(13));
        $attributes = Attribute::all();
        return view('admin.pages.product.pages.CreateProduct',  [
            'categories' => $categories ,
            'vendors' => $vendors,
            'units' => $units,
            'sku' => $sku,
            'attributes' => $attributes
        ]);
    }

    public function productIndex(Request $request)
    {
        $search = $request['search'] ?? "";

        if ($search != ""){
            $products = Product::where('title', 'LIKE', '%'.$search.'%')->where('existence', 'Active')->orderBy('id', 'desc')->paginate(10);
        }else{
            $products = Product::where('existence', 'Active')->orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.pages.product.pages.IndexProduct', ['products' => $products, 'search' => $search]);
    }

    public function searchProduct()
    {
        $searchInput = $_GET['query'];
        $products = Product::where('title', 'LIKE', '%'.$searchInput.'%')->paginate(10);
        return view('admin.pages.product.pages.SearchProducts', ['products' => $products]);
    }


    public function productCreateProcess(Request $request)
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
        $product->status = 'Approved';
        if ($request->has('preishable'))
        {
            $product->perishable = $request->perishable;
        }
        if ($request->has('preorder'))
        {
            $product->preorder = $request->preorder;
            $product->preorder_advance_amount = $request->preorder_advance_amount? $this->toPaisa($request->preorder_advance_amount) : null;
        }

        $product->created_by = session()->get('user')->id;
        $product->save();

        if ($request->has('attribute_check')){
            $product->has_attributes = $request->attribute_check;
            $product->update();

            $attributes = request('attribute');
            $values = request('value');

            $productAttributes = [];

            foreach ($attributes as $index => $attribute) {
                $valuesArray = json_decode($values[$index]);

                $valueString = implode(',', array_map(function($value) {
                    return $value->value;
                }, $valuesArray));

                $productAttributes[] = [
                    'attribute' => $attribute,
                    'value' => $valueString,
                    'product_id' => $product->id
                ];
            }

            ProductAttribute::insert($productAttributes);


        }

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



        return redirect()->back()->with('success','Product Uploaded Successfully');

    }

    public function productCreateImagePage($id)
    {
        return view('admin.pages.product.pages.CreateProductImages', ['id'=>$id]);
    }

    public function productCategoryPage($id)
    {
        $categories = Category::all();
        return view('admin.pages.product.pages.CreateProductCategory', ['categories' => $categories, 'id' => $id]);
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
            return redirect()->back()->with('success', 'Product Categories added successfully');
        }

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

        return redirect()->route('InAdmin.Product.ProductCreateCategoryPage', $id);

    }


    public function productEditPage($id)
    {

        $categories = Category::orderby('title', 'asc')->get();
        $productCategories = ProductCategory::where('product_id', $id)->first();
        $vendors = Vendor::all();
        $units = Unit::all();
        $product = Product::with('attributes')->where('id', $id)->first();
        $attributes = Attribute::all();

        return view('admin.pages.product.pages.EditProduct', ['product' => $product,
            'units' => $units,
            'productCategories' => $productCategories ,
            'vendors' => $vendors,
            'categories' => $categories,
            'allAttributes' => $attributes,

            ]);
    }

    public function  productUpdateProcess(Request $request, $id)
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

        if ($request->hasFile('image')) {

            $imageFile = $request->file('image');
            $i= 50;
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

        if ($request->has('value'))
        {
            $attributes = request('attribute');
            $values = request('value');

            // Delete existing product attributes
            ProductAttribute::where('product_id', $product->id)->delete();

            $productAttributes = [];

            // Add updated product attributes to the array
            foreach ($attributes as $index => $attribute) {
                $valuesArray = json_decode($values[$index]);

                $valueString = implode(',', array_map(function($value) {
                    return $value->value;
                }, $valuesArray));

                $productAttributes[] = [
                    'attribute' => $attribute,
                    'value' => $valueString,
                    'product_id' => $product->id
                ];
            }

            // Insert updated product attributes to the database
            ProductAttribute::insert($productAttributes);
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
        $product = Product::where('id', $id)->first();
        $product->existence = 'Inactive';
        $product->update();
        return redirect()->back()->with('success', 'Product Deleted successfully');
    }

    public  function productChangeStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->update();
        return response()->json(['success' => 'Status Changed Successfully']);

    }

    public function pendingProduct(Request $request)
    {
        $search = $request['search'] ?? "";

        if ($search != ""){
            $products = Product::where('title', 'LIKE', '%'.$search.'%')->where('status','Pending')->where('existence', 'Active')->orderBy('id', 'desc')->paginate(10);
        }else{
            $products = Product::where('status','Pending')->where('existence', 'Active')->orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.pages.product.pages.PendingProduct', ['products' => $products, 'search' => $search]);
    }

    public function discountPage($id)
    {
        $product = Product::find($id);

        return view('admin.pages.product.pages.ProductDiscount', ['product' => $product]);

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
