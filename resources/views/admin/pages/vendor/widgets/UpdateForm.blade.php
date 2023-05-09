<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Update Vendor</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Vendor.UpdateProcess' , $vendor->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Full Name</label>
                            <input type="hidden" name="owner_id" value="{{$vendor->owner_id}}">
                            <input type="text" name="name" value="{{$vendor->users->name}}" class="form-control" required >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">Email</label>
                            <input type="emial" class="form-control" name="email" value="{{$vendor->users->email}}" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Phone</label>
                            <input type="text"  class="form-control" name="phone" value="{{$vendor->users->phone}}" required >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Name</label>
                            <input type="text" class="form-control"  name="shop_name" value="{{$vendor->shop_name}}" required >
                        </div>
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Url</label>
                            <input type="text"  class="form-control" name="shop_url"  value="{{$vendor->shop_url}}" required >
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Email</label>
                            <input type="email" class="form-control" name="shop_email"  value="{{$vendor->shop_email}}" required>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop Phone</label>
                            <input type="text" name="shop_phone" class="form-control"  value="{{$vendor->shop_phone}}" required >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Address</label>
                            <input type="text" class="form-control" name="shop_address"  value="{{$vendor->shop_address}}" required>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop City</label>
                            <select name="shop_city" class="form-control city" >
                                <option value="{{$vendor->shop_city}}" selected>{{$vendor->shop_city}}</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Zip</label>
                            <input type="text" class="form-control" name="shop_zip"  value="{{$vendor->shop_zip}}" required>
                        </div>
                    </div>

                    <div class="row g-1">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Shop Description</label>
                            <textarea class="form-control" cols="5" name="shop_description">{{$vendor->shop_description}}</textarea>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Facebook URL</label>
                            <input type="text"  class="form-control" name="shop_facebook" value="{{$vendor->shop_facebook}}"  >
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Instagram URL</label>
                            <input type="text" class="form-control" name="shop_instagram"  value="{{$vendor->shop_instagram}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Youtube URL</label>
                            <input type="text" class="form-control" name="shop_youtube"  value="{{$vendor->shop_youtube}}">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Owner Image </label>
                            <input type="file"  class="form-control" name="owner_image" >
                            <div class="mt-3">
                                <img src="{{asset('uploads/images/vendor/owner/'.$vendor->owner_image)}}" height="200" width="200" accept="images/*">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">NID</label>
                            <input type="file"  class="form-control" name="nid" >
                            <div class="mt-3">
                                <img src="{{asset('uploads/images/vendor/documents/'.$vendor->nid)}}" height="200" width="300" accept="images/*">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Trade Licence</label>
                            <input type="file" class="form-control" name="trade_licence" accept="images/*">
                            <div class="mt-3">
                                <img src="{{asset('uploads/images/vendor/documents/'.$vendor->trade_licence)}}" height="200" width="300">
                            </div>
                        </div>

                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop logo</label>
                            <input type="file"  class="form-control" name="shop_logo" >
                            <div class="mt-3">
                                <img src="{{asset('uploads/images/vendor/logo/'.$vendor->shop_logo)}}" height="100" width="100">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Banner</label>
                            <input type="file" class="form-control" name="shop_banner">
                            <div class="mt-3">
                                <img src="{{asset('uploads/images/vendor/banner/'.$vendor->shop_banner)}}" height="200" width="200">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>

</div>
