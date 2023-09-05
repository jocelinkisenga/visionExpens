@extends('layouts.home')
@section('content')
    <livewire:home>
    @endsection
    @section('script')
        <script>
            window.addEventListener('close-modal', event => {
                $("#recents").modal('hide');
                $("#create").modal('hide');
            })

            function commande_search() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
        <script type="text/javascript">
            function printDiv() {

                var divContents = document.getElementById("printDiv").innerHTML;
                var printWindow = window.open('', '', 'height=200,width=400');
                printWindow.document.write('<html><head><title>Print DIV Content</title>');
                printWindow.document.write('</head><body >');
                printWindow.document.write(divContents);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            }
            //printJS({printable:'fact', type: 'html', targetStyles: ['*']})

            function printCoupon() {

                var divContents = document.getElementById("printCoupon").innerHTML;
                var printWindow = window.open('', '', 'height=200,width=400');
                printWindow.document.write('<html><head><title>Print DIV Content</title>');
                printWindow.document.write('</head><body >');
                printWindow.document.write(divContents);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            }
        </script>
    @endsection
