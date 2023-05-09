<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Vendors</h4>
        </div>

        <div class="card vendor-card">
            <div class="card-body">
                <table class="table dt-responsive nowrap w-100"  id="basic-datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Owner Name</th>
                        <th>Shop Name</th>
                        <th>Shop Phone</th>
                        <th>Shop City</th>
                        <th>Shop logo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vendors as $vendor)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$vendor->users->name}}</td>
                                <td>{{$vendor->shop_name}}</td>
                                <td>{{$vendor->shop_phone}}</td>
                                <td>{{$vendor->shop_city}}</td>
                                <td><img src="{{asset('uploads/images/vendor/logo/'.$vendor->shop_logo)}}" width="100" height="100"></td>
                                <td>
                                    <h4> <span class="badge bg-info">{{$vendor->status}}</span></h4>
                                </td>
                                <td>
                                    <a href="{{route('InAdmin.Vendor.Products', $vendor->id)}}" class="btn btn-success btn-sm">Products</a>
                                </td>
                            </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
