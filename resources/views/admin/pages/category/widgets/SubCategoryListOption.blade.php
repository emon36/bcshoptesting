<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
<option value="{{$subcategory->id}}">{{$dash}}{{$subcategory->title}}</option>
@if(count($subcategory->subcategory))
@include('admin.pages.category.widgets.SubCategoryListOption',['subcategories' => $subcategory->subcategory])
@endif
@endforeach
