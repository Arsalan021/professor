@extends('admin/layout/layout')

@section('header-script')
@endsection

@section('body-section')
    <section class="input-validation dashboard-analytics">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('writter.store') }}" novalidate
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <div class="form-group">
                                            <label>Title</label>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control"
                                                    data-validation-required-message="This field is required"
                                                    placeholder="Title">
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div class="controls">
                                                <input type="file" name="image" class="form-control"

                                                    placeholder="Image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Body</label>
                                            <div class="controls">
                                                <textarea name="body" class="form-control editor" id="basicTextarea" rows="3"    placeholder="Textarea" style="height: 325px;"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Additional Information</label>
                                            <div class="controls">
                                                <textarea name="add_info" class="form-control editor" id="basicTextarea1" rows="3"    placeholder="Additional Information" style="height: 325px;"></textarea>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('footer-section')
@endsection

@section('footer-script')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149371669-1"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyDMzBtl2TKTecLe_NEmSup5U-nkj93Ch7o"></script>
    <link rel="stylesheet" href="{{ asset('app-assets/css/toastr.min.css') }}" />

    <script src="{{ asset('app-assets/js/waitMe.js') }}"></script>
    <script src="{{ asset('app-assets/js/toastr.min.js') }}"></script>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
        var type = "{{ Session::get('type') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;

        }
    </script>
@endsection
