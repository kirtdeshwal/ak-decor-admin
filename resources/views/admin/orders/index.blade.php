@extends('admin.layouts.master')

@section('content')

<div class="row col-6 justify-content-between align-items-center">
    <div class="col-auto">
        <h4 class="font-weight-bold text-dark">Orders</h4>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Hoverable Table</h4>
                <p class="card-description">
                    Add class <code>.table-hover</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Coupon Code</th>
                                <th>Discount Type</th>
                                <th>Valid From</th>
                                <th>Valid Till</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $index => $order)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $order->coupon_code }}</td>
                                <td>{{ $order->discount_type }}</td>
                                <td>{{ date('m/d/Y', strtotime($order->valid_from)) }}</td>
                                <td>{{ date('m/d/Y', strtotime($order->valid_to)) }}</td>
                                <td>
                                    <label class="badge {{ $order->coupon_status == 'Active' ? 'badge-success' : 'badge-danger' }}">
                                        {{ $order->coupon_status }}
                                    </label>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">No order found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
