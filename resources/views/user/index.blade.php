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
                                <h4>Persons</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.time.find') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label>Users</label>
                                            <select class="form-control" name="user" required>
                                                <option selected>Select User</option>
                                                <option value="a">a</option>
                                                <option value="b">b</option>
                                                <option value="c">c</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <label>Meeting Duration</label>
                                            <input type="number" class="form-control" name="time" placeholder="Time write in minute">
                                        </div>
                                        <div class="form-group col-4 d-flex align-items-end justify-content-end">
                                            <div class="text-right">
                                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p>@if(Session::has('data'))
                                        {{ Session::get('data') }}
                                    @endif</p>
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
