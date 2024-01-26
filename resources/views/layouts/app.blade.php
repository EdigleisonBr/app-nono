<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bem vindo!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('../assets/img/favicon.ico') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('../assets/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.min.css') }}">

    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/select2/dist/css/select2.min.css') }}">

    <!-- datatables -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/datatables.css') }}">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
            @include('layouts.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
                @include('layouts.navbar')
            <!-- Navbar End -->

            <!-- Dashboard -->
                @yield('content')
            <!-- Dashboard End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('../assets/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('../assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('../assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('../assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('../assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('../assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- data-tables -->
    <script src="{{ asset('../assets/vendor/js/datatables.js') }}"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script> -->
    <script>
        $(document).ready( function () {
            $('.datatables').DataTable({
                language: {
                    // processing:     "Traitement en cours...",
                    search:         "Buscar&nbsp;:",
                    lengthMenu:    "&nbsp;&nbsp;Mostrar até _MENU_ elementos",
                    info:           "&nbsp;&nbsp;_END_ de _TOTAL_ elementos",
                    infoEmpty:      "&nbsp;&nbsp;Nenhum dado encontrado.",
                    infoFiltered:   "(filtrado de _MAX_ elementos)",
                    // infoPostFix:    "",
                    // loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Nenhum dado localizado.",
                    // emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Premier",
                        previous:   "<<",
                        next:       ">>",
                        last:       "Dernier"
                    },
                }
            });
        });
    </script>

    <!-- select2 -->
    <script src="{{ asset('../assets/vendor/select2/dist/js/select2.min.js') }}"></script>

    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('../assets/js/main.js') }}"></script>
    
    @stack('scripts')
</body>

</html>