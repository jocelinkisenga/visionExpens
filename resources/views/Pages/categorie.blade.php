@extends("layouts.app")
@section('content')
<livewire:categorie.categorie>
@endsection
@section('script')
<script>

    
     window.addEventListener('close-modal', event => {
         
         $("#create").modal('hide');
         
     })
 </script>
   
@endsection