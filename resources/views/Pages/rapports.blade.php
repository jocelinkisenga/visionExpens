@extends('layouts.new')
@if (isset($data["from"]) and isset($data['to']))
@section("title", 'rapport du '.$data['from'] .' au '.$data['to'])
@endif

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4></h4>
                    <h6></h6>
                </div>

                <div class="page-btn">
                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                       <h2> filtrer par date</h2>

                        {{-- <div id="example1_wrapper"></div> --}}
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="">
                        <div class="pb-0 card-body">
                            <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="mr-3 col-lg-2 col-sm-6 col-12">

                                        <div class="form-group">
                                            <div class="input-groupicon">
                                                <input type="date" name="date_from" >
                                                {{-- <div class="addonset">
                                                <img src="assets/img/icons/calendars.svg" alt="img">
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mr-3 col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="input-groupicon">
                                                <input type="date" name="date_to">
                                                {{-- <div class="addonset">
                                                <img src="assets/img/icons/calendars.svg" alt="img">
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                        <div class="form-group">
                                            <button class="btn btn-filters ms-auto" type="submit"
                                                wire:click.prevent="search()"><img src="assets/img/icons/search-whites.svg"
                                                    alt="img"></button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->

                <!-- /Filter -->



                {{-- <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    </th>
                                    <th>N°</th>
                                    <th>produit</th>
                                    <th>entrées</th>
                                    <th>sorties</th>
                                    <th>solde</th>
                                    <th>prix de vente</th>
                                    <th>vente total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            @if (!empty($item->entries))
                                                {{ $item->entries }}
                                            @else
                                                --
                                            @endif

                                        </td>
                                        <td>
                                            @if (!empty($item->outputs))
                                                {{ $item->outputs }}
                                            @else
                                                --
                                            @endif

                                        </td>
                                        <td>
                                            @if ($item->solde + $item->entries - $item->outputs > 0)
                                                {{ $item->solde + $item->entries - $item->outputs }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $item->vente }} $</td>
                                        <td>
                                            @if ($item->vente * $item->outputs > 0)
                                                {{ $item->vente * $item->outputs }} $
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}



            </div>
        </div>
        <!-- /product list -->





        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
               
                  <!-- /.card -->
      
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">rapport du </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                          </th>
                          <th>N°</th>
                          <th>produit</th>
                          <th>entrées</th>
                          <th>sorties</th>
                          <th>solde</th>
                          <th>prix de vente</th>
                          <th>vente total</th>
                      </tr>
                        </thead>
                        @isset($data['results'])
                        <tbody>
                            @foreach ($data['results'] as $key => $item)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    @if (!empty($item->entries))
                                        {{ $item->entries }}
                                    @else
                                        --
                                    @endif
        
                                </td>
                                <td>
                                    @if (!empty($item->outputs))
                                        {{ $item->outputs }}
                                    @else
                                        --
                                    @endif
        
                                </td>
                                <td>
                                    @if ($item->solde + $item->entries - $item->outputs > 0)
                                        {{ $item->solde + $item->entries - $item->outputs }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>{{ $item->vente }} $</td>
                                <td>
                                    @if ($item->vente * $item->outputs > 0)
                                        {{ $item->vente * $item->outputs }} $
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                        @endforeach
        
                          </tbody>
                        @endisset

                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
      
    </div>

    
@endsection
@section('scripto')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
