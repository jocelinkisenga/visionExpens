@extends('layouts.app')
@section("content")
    <livewire:user.user>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal',event => {
        $('#create').modal('hide');
    })
</script>
@endsection