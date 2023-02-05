@extends('layout.app')
@section('title', 'Order')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Orders</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Order Id</th>
                                            <th>Customer Name</th>
                                            <th>Store Name</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($orders))
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $order->order_code }}</td>
                                                    <td>@if(isset($order->user)) {{ $order->user->name }} @else Null @endif </td>
                                                    <td>@if(isset($order->store)) {{ $order->store->name }} @else Null @endif </td>
                                                    <td>{{ $order->subtotal }}</td>
                                                    <td>{{ $order->total }}</td>
                                                    <td>
                                                        @if ($order->status == 'pending')
                                                            <div class="badge badge-success badge-shadow">{{ ucwords($order->status) }}</div>
                                                        @elseif ($order->status == 'processing')
                                                            <div class="badge badge-danger badge-shadow">{{ ucwords($order->status) }}</div>
                                                        @elseif ($order->status == 'shipped')
                                                            <div class="badge badge-danger badge-shadow">{{ ucwords($order->status) }}</div>
                                                        @elseif ($order->status == 'delivered')
                                                            <div class="badge badge-danger badge-shadow">{{ ucwords($order->status) }}</div>
                                                        @elseif ($order->status == 'cancelled')
                                                            <div class="badge badge-danger badge-shadow">{{ ucwords($order->status) }}</div>
                                                        @else<span>Not Found</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.order.edit', ['order' => $order->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                                                        <form action="{{ route('admin.order.destroy', ['order' => $order->id] ) }}" method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-primary" type="submit"><i data-feather="trash-2"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9"> Data not found!</td>
                                                </tr>
                                            @endforelse
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

