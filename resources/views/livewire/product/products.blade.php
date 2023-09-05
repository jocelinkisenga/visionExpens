

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Liste des produits</h4>
                <h6></h6>
            </div>
            @if (Auth::user()->role_id === App\Enums\RoleEnum::ADMIN)
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-added  bg-success"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Ajouter un produit</a>
            </div>
            @endif

        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter bg-success" id="filter_search">
                                <img src="assets/img/icons/filter.svg" alt="img">
                                <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">

                    </div>
                </div>
                <!-- /Filter -->
                {{-- <div class="mb-0 card" id="filter_inputs">
                    <div class="pb-0 card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Product</option>
                                                <option>Macbook pro</option>
                                                <option>Orange</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Category</option>
                                                <option>Computers</option>
                                                <option>Fruits</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Sub Category</option>
                                                <option>Computer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Brand</option>
                                                <option>N/D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12 ">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Price</option>
                                                <option>150.00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-12">
                                        <div class="form-group">
                                            <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                </th>
                                <th class="text-uppercase text-success">N°</th>
                                <th class="text-uppercase text-success">nom</th>
                                <th class="text-uppercase text-success">catégorie</th>
                                <th class="text-uppercase text-success">quantité</th>
                                <th class="text-uppercase text-success">prix</th>
                                <th class="text-uppercase text-success">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td >
                                    {{$item->name}}
                                </td>
                                <td>{{$item->categorie->name}}</td>
                                <td ><span class="bg-success text-white p-1 rounded-pill">{{$item->quantity}}</span></td>
                                <td>{{$item->price}} $</td>
                                <td>
                                    <a class="me-3" href="{{route('product-detail',['id'=>$item->id])}}">
                                        <img src="assets/img/icons/eye.svg" alt="img">
                                    </a>
                                </td>
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
                     <h5 class="modal-title" >Ajouter un produit</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>nom</label>
                                <input type="text" wire:model="name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>prix de vente</label>
                                <input type="text" wire:model="price">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" wire:model="photo">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">


                                <div class="form-group">
                                    <label for="my-select">catégorie</label>
                                    <select id="my-select" class="form-control" wire:model="categorie_id">
                                        <option selected>selectionner une categorie</option>
                                        @foreach ($categories as $item )
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2 bg-success" wire:click.prevent="store()"     onclick="Swal.fire(
                            'Good job!',
                            'produit créé avec succès',
                            'success'
                          )"><span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> ajouter</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal create --}}
</div>
