@extends("layouts.app")
@section("content")
@php
    use \App\Models\Role;
@endphp
{{-- <div class="main-panel">
    <div class="content-wrapper">


    <div>
        @if (session('message'))
          <p class="text-success">{{session('message')}}</p>
        @endif
    </div>

        <div class="row mt-3">
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card bg-green">
                    <div class="card-body">
                        <h4 class="card-title">Fiche du personnel</h4>
                        <p class="card-description">

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-bold text-uppercase">
                                        <th>#</th>
                                        <th>valeur</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold">nom</td>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">role</td>
                                        <td>{{ $data->role->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">email/phone</td>
                                        <td>
                                         @if ($data->email != null)
                                             {{$data->email}}
                                         @else
                                         {{$data->phone}}
                                         @endif   
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold">genre</td>
                                        <td>{{ $data->sexe }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Historique de service  du jour</h4>
                        <p class="card-description">

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>produit</th>
                                        <th>quantité</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                           @if (!empty($precommandes))
                           @foreach ($precommandes as $key => $item)
                           <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$item->name}}</td>
                               <td>{{$item->quantity_commande}}</td>
                               <td>{{$item->price * $item->quantity_commande}} fc</td>
                           </tr>
                           @endforeach

                           @endif           
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}



<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>utilisateur detail</h4>
            </div>

            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#detail" class="btn btn-success"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">modifier les détails</a>
            </div>
            <div wire:ignore.self class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un personnel</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('update.user')}}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>nom</label>
                                        <input type="text" name="name" value="{{$data->name}}">
                                    </div>
                                </div>
        
                            
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="">un role <span class="text-danger">*</span>:</label>
                                    <select class="form-control" name="role_id" value="{{$data->role_id}}">
                                        <option selected>selectionner un role</option>
                                        @foreach (Role::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
        
        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">telephone <span
                                            class="text-danger">*</span>
                                        :</label>
                                    <input type="number" name="phone" class="form-control" value="{{$data->phone}}" id="recipient-name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="">sexe <span class="text-danger">*</span>:</label>
                                    <select class="form-control" name="sexe" id="">
                                        <option selected>{{$data->sexe}}</option>
                                        <option value="homme">Homme</option>
                                        <option value="femme">Femme</option>
        
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="user_id"  value="{{$data->id}}">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">mot de passe
                                        :</label>
                                    <input type="text" name="password" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">email
                                        :</label>
                                    <input type="text" name="email" value="{{$data->email}}" class="form-control" id="recipient-name">
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">enregistrer </button>
                                <a class="btn btn-cancel" data-bs-dismiss="modal">annuler</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /add -->
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bar-code-view">
                           
                            <a class="printimg">
                              
                            </a>
                        </div>
                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>nom</h4>
                                    <h6>{{ $data->name }}	</h6>
                                </li>
                                <li>
                                    <h4>email/phone</h4>
                                    <h6> 
                                   @if ($data->email != null)
                                        {{$data->email}}
                                    @else
                                    {{$data->phone}}
                                    @endif  </h6>
                                </li>
                                <li>
                                    <h4>role</h4>
                                    <h6>@if($data->role_id == App\Enums\RoleEnum::SERVER)
                                        server
                                        @elseif($data->role_id == App\Enums\RoleEnum::ADMIN)
                                        administrateur
                                        @else
                                        Gerant
                                        @endif
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12" wire:ignore>
                <div class="card">
                    <div class="card-body">
                        <div class="slider-product-details">
                            <div class="owl-carousel owl-theme product-slide">
                                <div class="slider-product">
                                    <div class="dash-imgs">
                                        <i data-feather="user-check"></i>
                                    </div>
                                    <h4>{{$data->name}}</h4>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      @if($data->role_id == App\Enums\RoleEnum::SERVER)
      <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">

                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="{{asset('assets/img/icons/search-white.svg')}}" alt="img"></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{asset('assets/img/icons/pdf.svg')}}" alt="img"></a>
                        </li>

                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{asset('assets/img/icons/printer.svg')}}" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            </th>
                            <th>code</th>
                            <th>quantité</th>
                            <th>sous-total</th>
                            <th>date</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($precommandes as $key => $item)
                        <tr>
                            <td>
                                {{$item->code}}
                            </td>
                            
                            <td>
                                {{$item->quantity_commande}}
                            </td>
                            <td>
                                {{ $item->quantity_commande * $item->produit->price }} $
                            </td>
                            <td>{{$item->precommande->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      @endif
            
        <!-- /add -->
    </div>


</div>


@endsection
