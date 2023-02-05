@extends('layout.app')
@section('title', 'file')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Files</h4>
                                <a href="{{ route('file.create') }}" class="btn btn-primary" style="margin-left: auto; display: block;">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($files as $file)
                                            <tr>
                                                <td>

                                                    {{--<img src="{{ asset("public/images/new/".explode("/", $file->image)[1]) }}" alt="" width="200px" , height="150px">--}}
                                                    <img class="mt-2" src="{{ asset("public/". $file->image) }}" alt="" width="200px" , height="150px">
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

