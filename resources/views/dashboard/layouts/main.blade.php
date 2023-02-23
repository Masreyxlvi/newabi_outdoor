<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Newabi Outdoor - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor') }}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets') }}/dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- sweeatalert link-->
    <link rel="stylesheet" href="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.css" />
    {{-- datTables bs4 --}}
    <link rel="stylesheet" href="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.css" type="text/css">

    @stack('head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('dashboard.partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard.partials.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
                    @yield('container')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('vendor') }}/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('assets') }}/build/sweetalert/sweetalert.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor') }}/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets') }}/dashboard/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor') }}/chart.js/Chart.min.js"></script>
    {{-- dataTables bs4 --}}
    <script src="{{ asset('vendor') }}/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets') }}/dashboard/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('assets') }}/dashbooard/js/demo/chart-pie-demo.js"></script>


    <script>
        $('.delete').click(function(e) {
            e.preventDefault()
            let data = $(this).closest('form').find('buttom').text()
            swal({
                    title: "Kamu Yakin?",
                    text: "Pesanan ini Ingin Dicancel?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((req) => {
                    if (req) $(e.target).closest('form').submit()
                    else swal.close()
                })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @stack('script')
</body>

</html>
