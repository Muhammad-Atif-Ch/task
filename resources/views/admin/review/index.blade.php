@extends('layout.app')
@section('title', 'Review')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Reviews</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Customer Name</th>
                                            <th>Product Id</th>
                                            <th>Star</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($reviews as $review)
                                            <tr>
                                                {{--@dd($review->user->name)--}}
                                                <td>{{$loop->iteration}}</td>
                                                <td>@if(isset($review->product)) {{ $review->product->name }} @else Null @endif </td>
                                                <td>@if(isset($review->product)) {{ $review->product->name }} @else Null @endif </td>
                                                <td>{{ $review->star }}</td>
                                                <td>{{ $review->message }}</td>
                                                <td>
                                                    {{--<a href="{{ route('admin.review.edit', ['review' => $review->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>--}}
                                                    <form action="{{ route('admin.review.destroy', ['review' => $review->id] ) }}" method="POST" style="display: inline-block">
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

