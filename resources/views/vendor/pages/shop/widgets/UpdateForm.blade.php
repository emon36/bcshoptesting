<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Update Shop Details</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InVendor.Update.Shop' , $vendor->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Name</label>
                            <input type="text" class="form-control"  name="shop_name" value="{{$vendor->shop_name}}" required >
                            @if ($errors->has('shop_name'))
                                <span style="color: red">{{ $errors->first('shop_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Url</label>
                            <input type="text"  class="form-control" name="shop_url"  value="{{$vendor->shop_url}}" required >
                            @if ($errors->has('shop_url'))
                                <span style="color: red">{{ $errors->first('shop_url') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Email</label>
                            <input type="email" class="form-control" name="shop_email"  value="{{$vendor->shop_email}}" required>
                            @if ($errors->has('shop_email'))
                                <span style="color: red">{{ $errors->first('shop_email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop Phone</label>
                            <input type="text" name="shop_phone" class="form-control"  value="{{$vendor->shop_phone}}" required >
                            @if ($errors->has('shop_phone'))
                                <span style="color: red">{{ $errors->first('shop_phone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Address</label>
                            <input type="text" class="form-control" name="shop_address"  value="{{$vendor->shop_address}}" required>
                            @if ($errors->has('shop_address'))
                                <span style="color: red">{{ $errors->first('shop_address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop City</label>
                            <select name="shop_city" class="form-control city" >
                                @foreach($districts as $district)
                                <option value="{{$vendor->shop_city}}" @if($vendor->shop_city == $district->name) selected @endif>{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Zip</label>
                            <input type="text" class="form-control" name="shop_zip"  value="{{$vendor->shop_zip}}" required>
                            @if ($errors->has('shop_zip'))
                                <span style="color: red">{{ $errors->first('shop_address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-1">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Shop Description</label>
                            <textarea class="form-control" cols="5" name="shop_description">{{$vendor->shop_description}}</textarea>
                            @if ($errors->has('shop_description'))
                                <span style="color: red">{{ $errors->first('shop_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Facebook URL</label>
                            <input type="text"  class="form-control" name="shop_facebook" value="{{$vendor->shop_facebook}}"  >
                            @if ($errors->has('shop_facebook'))
                                <span style="color: red">{{ $errors->first('shop_facebook') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Instagram URL</label>
                            <input type="text" class="form-control" name="shop_instagram"  value="{{$vendor->shop_instagram}}">
                            @if ($errors->has('shop_instagram'))
                                <span style="color: red">{{ $errors->first('shop_instagram') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Youtube URL</label>
                            <input type="text" class="form-control" name="shop_youtube"  value="{{$vendor->shop_youtube}}">
                            @if ($errors->has('shop_youtube'))
                                <span style="color: red">{{ $errors->first('shop_youtube') }}</span>
                            @endif
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
