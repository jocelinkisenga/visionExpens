<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>the king</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.theme.default.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">


    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">


    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    @livewireStyles

</head>
@include('sweetalert::alert')


<body style="background-color: hsl(0, 8%, 47%);">


@yield('content')

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    @livewireScripts
@yield('script')
    <!-- jQuery -->


    <script src="{{asset('js/printThis.js')}}"></script>

    <!-- Feather Icon JS -->
    <script src="assets/js/feather.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Datatable JS -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <!-- Owl JS -->
    <script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <!-- Sweetalert 2 -->
    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script>
        Livewire.on('closeModal', () =>{
            // $("#recents").modal('hide');
            // console.log("ok")
            alert('jocelin');
        })
    </script>
    <script>
        $("#facture-commande").click(function(){
                    $("#fac").printThis({
                        debug: false,
                        importCSS: true,
                        importStyle: false,
                        printContainer: true,
                        loadCSS: "",
                        pageTitle: "UTOPIAN PRINT",
                        removeInline: false,
                        printDelay: 1,
                        header: null,
                        footer: null,
                        base: false ,
                        formValues: true,
                        canvas: false,
                        doctypeString: "",
                        removeScripts: false,
                        copyTagClasses: false
                    });
                });
    </script>

</body>

</html>
