@extends('layout.app')
@section('title', 'Banner')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Banners</h4>
                            </div>
                            <div class="card-body">
                                <div class=" mb-4">
                                    <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label>Banner</label>
                                                <input type="file" class="form-control" name="image"
                                                       value="{{ old('image') }}">
                                                @error('image')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Banner Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="" selected></option>
                                                    <option value="header">Header</option>
                                                    <option value="footer">Footer</option>
                                                </select>
                                                @error('type')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label></label>
                                                <input type="submit" class="form-control btn btn-primary mt-2"
                                                       value="Create Banner">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($banner as $data)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{ asset($data->image) }}" alt="" width="150px"
                                                         height="100px"></td>
                                                <td>{{ $data->type }}</td>
                                                <td>
                                                    <a href="{{ route('admin.banner.edit', $data->id) }}"
                                                       class="btn btn-primary"><i data-feather="edit"></i></a>
                                                    <form action="{{ route('admin.banner.destroy', $data->id) }}"
                                                          method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-primary" type="submit"><i
                                                                data-feather="trash-2"></i></button>
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

