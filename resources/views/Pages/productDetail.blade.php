@extends('layouts.app')
@section('content')
    <livewire:produc-detail.productdetail :product_id="$id">
@endsection
@section('script')
<script>

    
     window.addEventListener('close-modal', event => {
        $("#quantity").modal('hide');
         $("#price").modal('hide');
         
     })
 </script>
