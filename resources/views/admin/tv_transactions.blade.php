<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Sharpower - Cable TV transactions</title>
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
                                <h4 class="page-title">Cable TV Transactions</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Cable TV Transactions</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Cable TV Transactions</h4>
                                    <div class="friends-suggestions">
                                        <table id="Cable TVtable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Customer</th>
                                                    <th>Trn Ref</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <td>Description</td>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach ($transactions as $key=>$transaction)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td><a href="{{url('admin/customer/'.$transaction->user_id)}}">{{$transaction->user_name}}</a></td>
                                                    <td><a href="{{url('admin/customer/'.$transaction->user_id)}}">#{{$transaction->trn_ref}}</a></td>
                                                    <td>₦{{number_format($transaction->amount)}}</td>
                                                    <td>@if($transaction->type == "Debit")
                                                        <span class="badge badge-danger">Debit</span>
                                                        @elseif($transaction->type == "Credit")
                                                        <span class="badge badge-success">Credit</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$transaction->description}}</td>
                                                    <td>{{$transaction->created_at}}</td>
                                                </tr>
                                                 @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
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
<!-- Required Cable TVtable js -->
<script src="{{asset('public/customer/plugins/Cable TVtables/jquery.Cable TVTables.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/Cable TVTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('public/customer/plugins/Cable TVtables/Cable TVTables.buttons.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/jszip.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/pdfmake.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/vfs_fonts.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/buttons.print.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('public/customer/plugins/Cable TVtables/Cable TVTables.responsive.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/Cable TVtables/responsive.bootstrap4.min.js')}}"></script>

<!-- Cable TVtable init js -->
<script src="{{asset('public/customer/pages/Cable TVtables.init.js')}}"></script>   

</body>

</html>