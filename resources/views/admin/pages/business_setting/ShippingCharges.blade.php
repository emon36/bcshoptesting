@extends('admin.layouts.Master')
@section('title', 'Shipping Charges')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Shipping Charges</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shippingCharges as $shippingCharge)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$shippingCharge->type}}</td>
                        <td>{{$shippingCharge->amount}}Taka</td>
                        <td>
                            <a href=""  class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="mdi mdi-pencil"></i>  </a>
                        </td>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('InAdmin.Update.Shipping.Charge', $shippingCharge->id)}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label  class="form-label">Amount</label>
                                                <input type="text"  class="form-control" name="amount" value="{{$shippingCharge->amount}}" required>
                                                @if ($errors->has('amount'))
                                                    <span style="color: red">{{ $errors->first('amount') }}</span>
                                                @endif
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

