<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Orders</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table dt-responsive nowrap w-100"  id="basic-datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->order_number}}</td>
                            <td>{{$order->created_at->format('d-m-Y')}}</td>
                            <td>{{$order->shipping->name}}</td>
                            <td>{{$order->shipping->phone}}</td>
                            <td><div class="badge badge-info-lighten">{{$order->status}}</div></td>
                            <td><a href="{{route('InVendor.Order.OrderView',$order->id)}}"  class="view btn btn-info btn-sm"> <i class="mdi mdi-eye"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5">
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>

    </div>
</div>
