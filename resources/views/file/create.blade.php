@extends('layout.app')
@section('title', 'file upload')
@section('style')
    <style>
        .drop-area {
            border: 2px dashed #ccc;
            padding: 50px;
            text-align: center;
            background-color: #f2f2f2;
        }

        .drop-area img {
            max-width: 100%;
        }
    </style>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Upload Image</h4>
                            </div>
                            <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Image</label>
                                            <input type="hidden" name="new_img" class="form-control" id="newImg" multiple value="">
                                            <div class="file-loading">
                                                <input id="file-input" name="image[]" multiple type="file">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">upload image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('script')
    <script>
        let img;
        $("#file-input").fileinput({
            uploadUrl: "{{ route('file.upload') }}",
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
            maxFileSize: 2000,
            append: true,
            previewFileIcon: '<i class="fas fa-file"></i>',
            allowedPreviewTypes: ['image'], // allow only preview of image & text files
            uploadAsync: false,
            previewFileIconSettings: {
                'docx': '<i class="fas fa-file-word text-primary"></i>',
                'xlsx': '<i class="fas fa-file-excel text-success"></i>',
                'pptx': '<i class="fas fa-file-powerpoint text-danger"></i>',
                'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                'zip': '<i class="fas fa-file-archive text-muted"></i>',
            },
            overwriteInitial: false,
            uploadExtraData: function () {
                return {
                    _token: $("input[name='_token']").val()
                };
            },
        });
        $('#file-input').on('filebatchuploadsuccess', function (event, data) {
            $('#newImg').val(data.response.img);
            console.log(data.response.img);
        });
    </script>

    <script>
        $("form").submit(function (e) {
            var newImg = $('#newImg').val();
            //console.log(newImg == '', newImg);
            if (newImg == '') {
                e.preventDefault();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'warning',
                    title: 'First Image Upload!',
                });
            }
        });
    </script>
@endsection
