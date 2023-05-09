<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Categories</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-centered mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Parent Category</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($categories))
                        <?php $_SESSION['i'] = 0; ?>
                        @foreach($categories as $category)
                            <?php $_SESSION['i']++ ?>
                            <tr>
                                <?php $dash=''; ?>
                                <td>{{$_SESSION['i']}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    @if(isset($category->parent_id))
                                        {{$category->subcategory->title}}
                                    @else
                                        None
                                    @endif
                                </td>
                                <td><img src="{{asset('uploads/images/category/'.$category->image)}}" width="100" height="100"></td>
                                <td>
                                    <a href="{{route('InAdmin.Category.EditPage', $category->id)}}"  class="edit btn btn-info btn-sm"> <i class="mdi mdi-pencil"></i> </a>
                                    <a href="javascript:void(0)"  data-id="{{$category->id}}" class="delete btn btn-danger btn-sm">  <i class="mdi mdi-delete"></i> </a>
                                </td>
                            </tr>
                            @if(count($category->subcategory))
                                @include('admin.pages.category.widgets.SubCategoryList',['subcategories' => $category->subcategory])
                            @endif
                        @endforeach
                        <?php unset($_SESSION['i']); ?>
                    @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>

    </div>
</div>
