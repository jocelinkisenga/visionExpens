@extends("layouts.app")
@section('content')
    <livewire:product.products>
@endsection
@section('script')
<script>

    
     window.addEventListener('close-modal', event => {
         
         $("#create").modal('hide');
         
     })
 </script>