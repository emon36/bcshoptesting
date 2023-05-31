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
                <form action="{{route('InAdmin.Category.CreateProcess')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required  placeholder="Give a Category Title">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="example-color" class="form-label">Title Color</label>
                            <input class="form-control" id="example-color" type="color" name="title_color_code" value="#FF0000">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" required name="description"></textarea>
                    </div>

                    <div class="row">
                        <div class=" mb-3 col-md-6">
                            <label  class="form-label">Select a Parent Category</label>
                            <select name="parent_id" class="form-select">
                                <option value="">None</option>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <?php $dash=''; ?>
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @if(count($category->subcategory))
                                            @include('admin.pages.category.widgets.SubCategoryListOption',['subcategories' => $category->subcategory])
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
