@extends('admin/layout/layout')

@section('header-script')
@endsection

@section('body-section')
    <br>
    <section class="input-validation dashboard-analytics">
        <div class="row">
            <div class="col-12">

                <!-- account start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Account</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="users-view-image">
                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                        class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                                </div>
                                <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                    <table>
                                        @if (isset($user->first_name))
                                            <tr>
                                                <td class="font-weight-bold">First Name</td>
                                                <td>{{ $user->first_name }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($user->last_name))
                                            <tr>
                                                <td class="font-weight-bold">Last Name</td>
                                                <td>{{ $user->last_name }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($user->email))
                                            <tr>
                                                <td class="font-weight-bold">Email</td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($user->phone_number))
                                            <tr>
                                                <td class="font-weight-bold">Phone Number</td>
                                                <td>{{ $user->phone_number }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($user->status))
                                            <tr>
                                                <td class="font-weight-bold  ">Status</td>
                                                <td>
                                                    @if ($user->status == 1)
                                                        Active
                                                    @else
                                                        Deactive
                                                    @endif

                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>

                                <div class="col-12">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-1"><i
                                            class="feather icon-edit-1"></i> Edit</a>
                                    <form method="post" action="{{ route('users.destroy', $user->id) }}"
                                        style="margin-top: -38px;margin-left: 150px";>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Are You Sure Want To Delete This..??')"
                                            class="btn btn-default generalsetting_admin"><i class="feather icon-trash-2"></i>Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- account end -->
            </div>
        </div>


    </section>
@endsection


@section('footer-section')
@endsection

@section('footer-script')
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
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
@endsection
