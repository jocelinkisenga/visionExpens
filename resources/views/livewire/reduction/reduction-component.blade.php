@php
global $total;
use App\Enums\PercentEnum;
@endphp



<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Liste des categories</h4>
                <h6></h6>
            </div>
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">faites une reduction</a>
            </div>
        </div>
        

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="{{asset('assets/img/icons/filter.svg')}}" alt="img">
                                <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{asset('assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->

                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                </th>
                                <th>N°</th>
                                <th>nom</th>
                                <th>quantité</th>
                                <th>sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reduction as $key => $item)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td >
                                    {{$item->name}}
                                </td>
                                <td>{{$item->qty}}</td>
                                <td> {{ $item->qty * $item->price }} $</td>
                              
                                   
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>

    {{-- modal create --}}
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title" >REDUIRE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            
                                <div class="form-group">
                                    <label for="">pourcentage </label>
                                    <input  wire:model="percent" type="text" class="form-control">
                                  
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2" wire:click.prevent="update({{$reduction_id}})">confirmer</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal create --}}
</div>