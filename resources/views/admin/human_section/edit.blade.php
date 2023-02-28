@extends('admin/layout/layout')

@section('header-script')
@endsection

@section('body-section')
    <br>
    <section class="input-validation dashboard-analytics">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('human.update',$data->id) }}" novalidate
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method("PATCH")
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <div class="form-group">
                                            <label>Title</label>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control"
                                                    data-validation-required-message="This field is required"
                                                    value="{{ $data->title ?? null }}" placeholder="Title">
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    value="{{ $data->name ?? null }}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div class="controls">
                                                <input type="file" name="image" class="form-control"
                                                    value="{{ $data->image ?? null }}" placeholder="Image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Body</label>
                                            <div class="controls">
                                                <textarea name="body" class="form-control editor" id="basicTextarea" rows="3"
                                                      placeholder="Textarea" style="height: 325px;">{!! $data->body ?? null !!}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Additional Information</label>
                                            <div class="controls">
                                                <textarea name="add_info" class="form-control editor" id="basicTextarea1" rows="3"    placeholder="Additional Information" style="height: 325px;">{!! $data->add_info ?? null !!}</textarea>
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
    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": []
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script type="text/javascript">
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        var APP_URL = {!! json_encode(url('/')) !!}


        function ajaxCall() {
            this.send = function(data, url, method, success, type) {
                type = 'json';
                var successRes = function(data) {
                    success(data);
                }

                var errorRes = function(xhr, ajaxOptions, thrownError) {

                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);

                }
                jQuery.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: successRes,
                    error: errorRes,
                    dataType: type,
                    timeout: 60000
                });

            }

        }


        function locationInfo() {
            var rootUrl = "https://geodata.phplift.net/api/index.php";
            var call = new ajaxCall();



            this.getCities = function(id) {
                jQuery(".cities option:gt(0)").remove();
                //get additional fields

                var url = rootUrl + '?type=getCities&countryId=' + '&stateId=' + id;
                var method = "post";
                var data = {};
                jQuery('.cities').find("option:eq(0)").html("Please wait..");
                call.send(data, url, method, function(data) {
                    jQuery('.cities').find("option:eq(0)").html("Select City");
                    var listlen = Object.keys(data['result']).length;

                    if (listlen > 0) {
                        jQuery.each(data['result'], function(key, val) {

                            var option = jQuery('<option />');
                            option.attr('value', val.name).text(val.name);
                            jQuery('.cities').append(option);
                        });
                    }


                    jQuery(".cities").prop("disabled", false);

                });
            };

            this.getStates = function(id) {
                jQuery(".states option:gt(0)").remove();
                jQuery(".cities option:gt(0)").remove();
                //get additional fields
                var stateClasses = jQuery('#stateId').attr('class');


                var url = rootUrl + '?type=getStates&countryId=' + id;
                var method = "post";
                var data = {};
                jQuery('.states').find("option:eq(0)").html("Please wait..");
                call.send(data, url, method, function(data) {
                    jQuery('.states').find("option:eq(0)").html("Select State");

                    jQuery.each(data['result'], function(key, val) {
                        var option = jQuery('<option />');
                        option.attr('value', val.name).text(val.name);
                        option.attr('stateid', val.id);
                        jQuery('.states').append(option);
                    });
                    jQuery(".states").prop("disabled", false);

                });
            };

            this.getCountries = function() {
                var url = rootUrl + '?type=getCountries';
                var method = "post";
                var data = {};
                jQuery('.countries').find("option:eq(0)").html("Please wait..");
                call.send(data, url, method, function(data) {
                    jQuery('.countries').find("option:eq(0)").html("Select Country");

                    jQuery.each(data['result'], function(key, val) {
                        var option = jQuery('<option />');

                        option.attr('value', val.name).text(val.name);
                        option.attr('countryid', val.id);

                        jQuery('.countries').append(option);
                    });
                    // jQuery(".countries").prop("disabled",false);

                });
            };

        }

        jQuery(function() {
            var loc = new locationInfo();
            loc.getCountries();
            jQuery(".countries").on("change", function(ev) {
                var countryId = jQuery("option:selected", this).attr('countryid');
                if (countryId != '') {
                    loc.getStates(countryId);
                } else {
                    jQuery(".states option:gt(0)").remove();
                }
            });
            jQuery(".states").on("change", function(ev) {
                var stateId = jQuery("option:selected", this).attr('stateid');
                if (stateId != '') {
                    loc.getCities(stateId);
                } else {
                    jQuery(".cities option:gt(0)").remove();
                }
            });
        });
    </script>
@endsection
