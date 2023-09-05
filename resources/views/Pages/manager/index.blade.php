@extends("layouts.app")
@section('content')

@livewire('index')
@endsection
@section('script')
<script>


     window.addEventListener('close-modal', event => {

         $("#create").modal('hide');

     })
 </script>

@endsection
