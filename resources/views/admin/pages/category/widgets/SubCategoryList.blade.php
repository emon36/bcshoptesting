<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <?php $_SESSION['i']++; ?>
    <tr>
        <td>{{$_SESSION['i']}}</td>
        <td>{{$dash}}{{$subcategory->title}}</td>
        <td>{{$subcategory->slug}}</td>
        <td>{{$subcategory->parent->title}}</td>
        <td><img src="{{asset('uploads/images/category/'.$subcategory->image)}}" width="100" height="100"></td>
        <td>
            <a href="{{route('InAdmin.Category.EditPage', $subcategory->id)}}"  class="edit btn btn-info btn-sm">  <i class="mdi mdi-pencil"></i> </a>
            <a href="javascript:void(0)"  data-id="{{$subcategory->id}}" class="delete btn btn-danger btn-sm"> <i class="mdi mdi-delete"></i> </a>
        </td>
    </tr>
    @if(count($subcategory->subcategory))
        @include('admin.pages.category.widgets.SubCategoryList',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
