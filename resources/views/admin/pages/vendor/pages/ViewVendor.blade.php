@extends('admin.layouts.Master')
@section('title', 'Vendor View')

@section('content')
   <div class="row">
       <div class="col-9">
           <div class="card">
               <div class="card-body">
                   <div class="row">
                       <div class="col-12">
                           <h4>Seller Details</h4>
                           <div class="row">
                               <div class="col-3">
                                   <img src="{{asset('uploads/images/vendor/owner/'.$vendor->owner_image)}}" height="250" width="200"/>
                               </div>
                               <div class="col-9">
                                   <table class="table table-borderless table-responsive">
                                       <thead>
                                       <tr>
                                           <td>Name</td>
                                           <td>Phone</td>
                                           <td>Email</td>
                                           <td>NID</td>
                                           <td>Trade Licence</td>
                                       </tr>
                                       </thead>
                                       <tbody>
                                       <tr>
                                           <td>{{$vendor->users->name}}</td>
                                           <td>{{$vendor->users->phone}}</td>
                                           <td>{{$vendor->users->email}}</td>
                                           <td><a href="{{asset('uploads/images/vendor/documents/'.$vendor->nid)}}">View</a></td>
                                           <td><a href="{{asset('uploads/images/vendor/documents/'.$vendor->trade_licence)}}">View</a></td>
                                       </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>

                       </div>
                       <div class="col-12 mt-5">
                           <h4>Shop Details</h4>
                           <div class="col-12">
                               <table class="table table-borderless table-striped table-responsive">
                                   <thead>
                                   <tr>
                                       <td>Shop Name</td>
                                       <td>Shop Phone</td>
                                       <td>Shop Email</td>
                                       <td>Shop URL</td>
                                       <td>Shop Address</td>
                                       <td>Shop city</td>
                                       <td>Shop zip</td>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td>{{$vendor->shop_name}}</td>
                                       <td>{{$vendor->shop_phone}}</td>
                                       <td>{{$vendor->shop_email}}</td>
                                       <td>{{$vendor->shop_url}}</td>
                                       <td>{{$vendor->shop_address}}</td>
                                       <td>{{$vendor->shop_city}}</td>
                                       <td>{{$vendor->shop_zip}}</td>
                                   </tr>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <div class="col-12 mt-5">
                           <h4>Shop Media Details</h4>
                           <div class="col-12">
                               <table class="table table-borderless table-striped table-responsive">
                                   <thead>
                                   <tr>
                                       <td>Shop Logo</td>
                                       <td>Shop Banner</td>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td> <img src="{{asset('uploads/images/vendor/logo/'.$vendor->shop_logo)}}" height="100" width="100"/></td>
                                       <td><img src="{{asset('uploads/images/vendor/banner/'.$vendor->shop_banner)}}" height="250" width="250"/></td>
                                   </tr>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-3 mt-3">
           <div class="card">
               <div class="card-body">
                   <form action="{{route('InAdmin.Vendor.StatusChange',$vendor->id )}}" method="POST">
                       @include('admin.widgets.FlashMessage')
                       @csrf
                       <div class="row g-2">
                           <div class="mb-3">
                               <label for="">Status</label>
                           <select name="status" class="form-control" >
                               <option value="Pending" @if($vendor->status == 'Pending') selected @endif >Pending</option>
                               <option value="Approved" @if($vendor->status == 'Approved') selected @endif >Approved</option>
                               <option value="Rejected" @if($vendor->status == 'Rejected') selected @endif >Rejected</option>
                           </select>
                           </div>
                       </div>
                       <button type="submit" class="btn btn-primary" >Submit</button>
                   </form>
               </div>
           </div>
           <div class="card">
               <div class="card-body">
                   <form action="{{route('InAdmin.Vendor.CommissionChange',$vendor->id )}}" method="POST">
                       @csrf
                       <div class="row g-2">
                           <div class="mb-3">
                               <label>Commission Percentage</label>
                               <input type="number" name="commission" class="form-control" value="{{$vendor->commission}}">
                           </div>
                       </div>
                       <button type="submit" class="btn btn-primary" >Submit</button>
                   </form>
               </div>
           </div>
       </div>


   </div>
@endsection
