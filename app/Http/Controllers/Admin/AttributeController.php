<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeController extends Controller
{

    public function attributeCreatePage()
    {
        return view('admin.pages.attribute.pages.CreateAttribute');
    }

    public function attributeCreateProcess(Request $request)
    {

        $attribute = new Attribute();
        $attribute->title = $request->title;
        $attribute->created_by = session()->get('user')->id;
        $attribute->save();


        return redirect()->back()->with('success', 'Attribute Created Successfully');

    }

    public function attributeValues(Request $request)
    {
        $attribute = Attribute::where('id', $request->id)->first();
        return view('admin.pages.product.widgets.SelectedAttribute', ['attribute' => $attribute]);
    }
}
