<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{asset('feather/feather.css')}}">
        <link rel="stylesheet" href="{{asset('ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('css/vendor.bundle.base.css')}}">
      
        <script src="{{asset('assets/js/jquery.js')}}"></script>
        
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
    <?php global $item_total; ?>
    <div class="main-panel" id="page">
        <div class="content-wrapper">
            <div class="row justify-start">
                <div class="card-footer">
                    <button id="basic" class="btn btn-default"><i class="fas fa-print"></i> </button>
                    <button type="" class="float-right"><i class="far fa-credit-card"></i>
                       
                    </button>
                    <button  onclick="printDiv()" class="float-right btn btn-primary" style="margin-right: 5px;">
                       imprimer la facture
                    </button>
                </div>
            </div>
            <div class="row justify-center">
                <div class="wrapper ml-9 mt-4 col-6">
                    <div id="printdivcontent">
                        <div class="card">
                            <div class="card-header ">
                                <a class="pt-2 ">The king</a>
                                <div class="float-right">
                                    <h3 class="mb-0"></h3>
                                    Date: <?= date('Y/m/d') ?>
                                </div>
                            </div>
                            <div class="card-body" id="elem">
                                <div class="row mb-4">
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>produit</th>
                                                <th class="right">quantité</th>
                                                <th class="right">sous-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($results as $item)
                                                <tr>

                                                    <td class="left strong text-uppercase">{{ $item->name }}</td>
                                                    <td class="right">{{ $item->qty }}</td>
                                                    <td class="right">{{ $item->qty * $item->price }} fc</td>
                                                    <?php $item_total += $item->qty * $item->price; ?>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <p class="mb-0"><span class="text-uppercase font-weight-bold">Total : <?= $item_total ?>
                                    fc</span></p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


  
  @livewireScripts

  <script type="text/javascript">  
    function printDiv() {  
        var divContents = document.getElementById("printdivcontent").innerHTML;  
        var printWindow = window.open('', '', 'height=200,width=400');  
        printWindow.document.write('<html><head><title>Print DIV Content</title>');  
        printWindow.document.write('</head><body >');  
        printWindow.document.write(divContents);  
        printWindow.document.write('</body></html>');  
        printWindow.document.close();  
        printWindow.print();  
    }  
</script>  
  <script src="{{asset('js/vendor.bundle.base.js')}}"></script>
   <script src="{{asset('js/off-canvas.js')}}"></script>
   <script src="{{asset('js/hoverable-collapse.js')}}"></script>
   <script src="{{asset('js/template.js')}}"></script>
   <script src="{{asset('js/printThis.js')}}"></script>
   <script src="{{asset('js/settings.js')}}"></script>
   <script src="{{asset('js/todolist.js')}}"></script>
   <script src="{{asset('js/dashboard.js')}}"></script>
   <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/html2pdf.bundle.min.js')}}"></script>
   

   <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
</body>
</html>

