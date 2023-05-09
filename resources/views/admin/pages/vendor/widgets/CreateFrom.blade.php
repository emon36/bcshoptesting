<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Create Vendor</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Vendor.CreateProcess')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span style="color: red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Phone</label>
                            <input type="number"  class="form-control" name="phone" required value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span style="color: red">{{ $errors->first('password') }}</span>
                            @endif

                        </div>
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Applicant Image</label>
                            <input type="file" name="owner_image" class="form-control"  required="required">
                            @if ($errors->has('owner_image'))
                                <span style="color: red">{{ $errors->first('owner_image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Name</label>
                            <input type="text" class="form-control"  name="shop_name" required value="{{ old('shop_name') }}" >
                            @if ($errors->has('shop_name'))
                                <span style="color: red">{{ $errors->first('shop_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Username</label>
                            <input type="text"  class="form-control" name="shop_url" required value="{{ old('shop_url') }}" >
                            @if ($errors->has('shop_url'))
                                <span style="color: red">{{ $errors->first('shop_url') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Email</label>
                            <input type="email" class="form-control" name="shop_email" required value="{{ old('shop_email') }}">
                            @if ($errors->has('shop_email'))
                                <span style="color: red">{{ $errors->first('shop_email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop Phone</label>
                            <input type="text" name="shop_phone" class="form-control" required value="{{ old('shop_phone') }}">
                            @if ($errors->has('shop_phone'))
                                <span style="color: red">{{ $errors->first('shop_phone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Address</label>
                            <input type="text" class="form-control" name="shop_address" required value="{{ old('shop_address') }}">
                            @if ($errors->has('shop_address'))
                                <span style="color: red">{{ $errors->first('shop_address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop City</label>
                            <select name="shop_city" class="form-control city" >
                                @foreach($districts as $city)
                                    <option value="{{$city->name}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                                @if ($errors->has('shop_city'))
                                <span class="text-danger">{{ $errors->first('shop_city') }}</span>
                                @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Zip</label>
                            <input type="text" class="form-control" name="shop_zip" required value="{{ old('shop_zip') }}">
                            @if ($errors->has('shop_zip'))
                                <span style="color: red">{{ $errors->first('shop_zip') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-1">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Shop Description</label>
                            <textarea class="form-control" cols="5" name="shop_description">{{ old('shop_description') }}</textarea>
                            @if ($errors->has('shop_description'))
                                <span style="color: red">{{ $errors->first('shop_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Shop Facebook URL</label>
                            <input type="text"  class="form-control" name="shop_facebook" value="{{ old('shop_facebook') }}" >
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Instagram URL</label>
                            <input type="text" class="form-control" name="shop_instagram"  value="{{ old('shop_instagram') }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Shop Youtube URL</label>
                            <input type="text" class="form-control" name="shop_youtube"  value="{{ old('shop_youtube') }}">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">NID</label>
                            <input type="file"  class="form-control" name="nid" >
                            @if ($errors->has('nid'))
                                <span style="color: red">{{ $errors->first('nid') }}</span>
                            @endif

                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Trade Licence</label>
                            <input type="file" class="form-control" name="trade_licence">
                            @if ($errors->has('trade_licence'))
                                <span style="color: red">{{ $errors->first('trade_licence') }}</span>
                            @endif
                        </div>

                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Shop logo</label>
                            <input type="file"  class="form-control" name="shop_logo" required >
                            @if ($errors->has('shop_logo'))
                                <span style="color: red">{{ $errors->first('shop_logo') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Shop Banner</label>
                            <input type="file" class="form-control" name="shop_banner" required>
                            @if ($errors->has('shop_banner'))
                                <span style="color: red">{{ $errors->first('shop_banner') }}</span>
                            @endif
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>

</div>
