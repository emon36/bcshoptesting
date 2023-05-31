<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Create Category</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Category.UpdateProcess',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Title</label>
                            <input type="text" name="title" value="{{$category->title}}" class="form-control"  placeholder="Give a Category Title">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="example-color" class="form-label">Title Color</label>
                            <input class="form-control" id="example-color" type="color" name="title_color_code" value="{{$category->title_color_code}}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <textarea class="form-control" name="description" >{{$category->description}}</textarea>
                    </div>

                    <div class="row">
                        <div class=" mb-3 col-md-6">
                            <label  class="form-label">Select a Parent Category</label>
                            <select name="parent_id" class="form-select">
                                <option value="">None</option>
                                @if($categories)
                                    @foreach($categories as $item)
                                        <?php $dash=''; ?>
                                        <option value="{{$item->id}}" @if($category->parent_id == $item->id ) selected @endif>{{$item->title}}</option>
                                        @if(count($item->subcategory))
                                            @include('admin.pages.category.widgets.SubCategoryListOptionUpdate', ['subcategories' => $item->subcategory])
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Image ( Size 130*130 )</label>
                            <input type="file" name="image" class="form-control" >
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>

</div>
