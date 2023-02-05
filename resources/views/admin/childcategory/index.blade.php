@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add ChildCategory</h4>
                            </div>
                            <form action="{{ route('admin.childcategory.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Child Category Name</label>
                                        <input type="text" class="form-control" name="name">
                                        @error('name')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="subcategory_id">
                                            <option value="" selected>None</option>
                                            @if($subcategories)
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{$subcategory->id}}">{{ ucwords($subcategory->name) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('category_id')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--<div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" accept="image/*" name="image">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        @error('image')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>--}}
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Add ChildCategory</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>All ChildCategories</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>ChildCategory</th>
                                            <th>Parent Category</th>
                                            {{--                                            <th>Image</th>--}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($childcategories as $childCategory)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ ucwords($childCategory->name) }}</td>
                                                    <td>
                                                        @if(isset($childCategory->parentSub))
                                                            {{ $childCategory->parentSub->name }}
                                                        @else
                                                            Null
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.childcategory.edit', $childCategory->id) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                                                        <form action="{{ route('admin.childcategory.destroy', $childCategory->id ) }}" method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-primary" type="childmit"><i data-feather="trash-2"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr><td colspan="4">Data Not Found!</td></tr>
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

