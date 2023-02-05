@extends('layout.app')
@section('style')
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>All Vendors List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($whole_sellers as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>@foreach($data->roles as $role){{ $role->name }}@endforeach</td>
                                                    <td>{{ $data->phone }}</td>
                                                    <td>@if($data->action == 1)
                                                            <div class="badge badge-success badge-shadow">Activate</div>
                                                        @else
                                                            <div class="badge badge-danger badge-shadow">DeActivate</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.whole_seller.edit', ['whole_seller' => $data->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                                                        @if ($data->action == 0)
                                                            <a href="{{ route('admin.whole_seller.activate', ['whole_seller' => $data->id]) }}" class="btn btn-danger">
                                                                <i data-feather="toggle-left"></i></a>
                                                        @else
                                                            <a href="{{ route('admin.whole_seller.deactivate', ['whole_seller' => $data->id]) }}" class="btn btn-primary">
                                                                <i data-feather="toggle-right"></i></a>
                                                        @endif
                                                        <a href="{{ route('admin.whole_seller.destroy', ['whole_seller' => $data->id]) }}" class="btn btn-primary">
                                                            <i data-feather="trash-2"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7"> No More Users In this Table.</td>
                                                </tr>
                                            @endforelse
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
@section('script')
@endsection
