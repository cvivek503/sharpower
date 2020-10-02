<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Sharpower - Admin</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    
    @include('admin.includes.head')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        
        <!-- Top Bar End -->
        @include('admin.includes.sidemenu')
        
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">Role</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Role</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <form class="form-horizontal m-t-30"  method="POST" action="{{url('admin/update_role')}}">
                                        {{ csrf_field() }}
                                            <input type="hidden" name="id" value={{$role->id}} />
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label>Name</label>
                                                    <input class="form-control" value="{{$role->name}}" name="name" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>Manage roles</label>
                                                    <input type="checkbox" @if($role->manage_roles == "Yes") checked @endif value="Yes" name="manage_roles" >
                                                </div>
                                                <div class="col-3">
                                                    <label>View Admin users</label>
                                                    <input type="checkbox" @if($role->view_users == "Yes") checked @endif value="Yes" name="view_users" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Manage Admin users</label>
                                                    <input type="checkbox" @if($role->manage_users == "Yes") checked @endif value="Yes" name="manage_users" >
                                                </div>
                                                <div class="col-3">
                                                    <label>View customers</label>
                                                    <input type="checkbox" @if($role->view_customers == "Yes") checked @endif value="Yes" name="view_customers" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>View all transactions</label>
                                                    <input type="checkbox" @if($role->view_all_transactions == "Yes") checked @endif value="Yes" name="view_all_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Create transactions</label>
                                                    <input type="checkbox" @if($role->create_transactions == "Yes") checked @endif value="Yes" name="create_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>View electricity transactions</label>
                                                    <input type="checkbox" @if($role->view_electricity_transactions == "Yes") checked @endif value="Yes" name="view_electricity_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Refund electicity txns</label>
                                                    <input type="checkbox" @if($role->refund_electricity_transactions == "Yes") checked @endif value="Yes" name="refund_electricity_transactions" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>View airtime transactions</label>
                                                    <input type="checkbox" @if($role->view_airtime_transactions == "Yes") checked @endif value="Yes" name="view_airtime_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Refund airtime transactions</label>
                                                    <input type="checkbox" @if($role->refund_airtime_transactions == "Yes") checked @endif value="Yes" name="refund_airtime_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>View data transactions</label>
                                                    <input type="checkbox" @if($role->view_data_transactions == "Yes") checked @endif value="Yes" name="view_data_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Refund data transactions</label>
                                                    <input type="checkbox" @if($role->refund_data_transactions == "Yes") checked @endif value="Yes" name="refund_data_transactions" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>View tv transactions</label>
                                                    <input type="checkbox" @if($role->view_tv_transactions == "Yes") checked @endif value="Yes" name="view_tv_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Refund tv transactions</label>
                                                    <input type="checkbox" @if($role->refund_tv_transactions == "Yes") checked @endif value="Yes" name="refund_tv_transactions" >
                                                </div>
                                                
                                            </div>
                                            <div class="form-group text-center m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Update role</button>
                                                </div>
                                            </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- content -->
            <footer class="footer">
                © 2019 - 2020 RaedarXpress <span class="d-none d-sm-inline-block"><a href="https://imperial.com.ng"> Developed by Imperial soft services</a></span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    @include('admin.includes.script')

</body>

</html>