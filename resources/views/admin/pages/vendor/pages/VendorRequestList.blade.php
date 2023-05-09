@extends('admin.layouts.Master')
@section('title', 'Vendor Lists')

@section('content')
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
                            <th>Owner Phone</th>
                            <th>Registration Data</th>
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
                                <td>{{$vendor->users->phone}}</td>
                                <td>{{$vendor->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <h4> <span class="badge bg-info">{{$vendor->status}}</span></h4>
                                </td>
                                <td>
                                    <a href="{{route('InAdmin.Vendor.ViewPage' , $vendor->id)}}"  class="view btn btn-success btn-sm"> <i class="mdi mdi-eye"></i> </a>
                                    <a href="{{route('InAdmin.Vendor.EditPage' , $vendor->id)}}"  class="edit btn btn-info btn-sm"> <i class="mdi mdi-pencil"></i> </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-5">
                        {!! $vendors->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
