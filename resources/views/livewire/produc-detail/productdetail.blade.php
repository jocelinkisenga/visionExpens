

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Produit detail</h4>
            </div>
            @if (Auth::user()->role_id === App\Enums\RoleEnum::ADMIN)
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#quantity" class="btn btn-success"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">Ajouter de la quantité</a>
            </div>
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#price" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">Màj du prix de vente</a>
            </div>
            @endif
        </div>
        <!-- /add -->
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bar-code-view">
                            <img src="{{asset('assets/img/barcode1.png')}}" alt="barcode">
                            <a class="printimg">
                                <img src="{{asset('assets/img/icons/printer.svg')}}" alt="print">
                            </a>
                        </div>
                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>produit</h4>
                                    <h6>{{ $data->name }}	</h6>
                                </li>
                                <li>
                                    <h4>categorie</h4>
                                    <h6>{{ $data->categorie->name }}</h6>
                                </li>
                                <li>
                                    <h4>prix</h4>
                                    <h6>{{ $data->price }} $</h6>
                                </li>
                                <li>
                                    <h4>quantité</h4>
                                    <h6>{{ $data->quantity }} pcs</h6>
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
                                    <img src="{{ asset('storage/uploads/' . $data->path) }}" alt="img">
                                    <h4>{{$data->name}}</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /add -->
    </div>

{{-- mise à jour de la quantité --}}

<div wire:ignore.self class="modal fade" id="quantity" tabindex="-1" aria-labelledby="quantity"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" >Ajouter la quantité</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>prix d'achat</label>
                            <input type="number" wire:model="prix_achat">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>quantité</label>
                            <input type="number" wire:model="produit_quantity">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-submit me-2" wire:click.prevent="ajouter({{$data->id}})"     onclick="Swal.fire(
                        'Good job!',
                        'quantité ajouté avec succès',
                        'success'
                      )">ajouter</a>
                    <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- end mise à jour quantité --}}

{{-- modifier prix --}}
<div wire:ignore.self class="modal fade" id="price" tabindex="-1" aria-labelledby="price"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" >Modifier le prix</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>prix </label>
                            <input type="number" wire:model="prix">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-submit me-2" wire:click.prevent="modifier_prix({{$data->id}})"     onclick="Swal.fire(
                        'Good job!',
                        'prix modifier avec succès',
                        'success'
                      )">modifier</a>
                    <a class="btn btn-cancel" data-bs-dismiss="modal">annuler</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- end modifier prix --}}

</div>
