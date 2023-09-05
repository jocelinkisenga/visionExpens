@extends("layouts.app")
@section("content")
    <livewire:depense.depenses>
@endsection
@section('script')
<script>

    
     window.addEventListener('close-modal', event => {
         
         $("#create").modal('hide');
         
     })
 </script>
   