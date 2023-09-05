@php
    use App\Enums\RoleEnum;
@endphp
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Liste des entreprises</h4>
                <h6></h6>
            </div>
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-added"><img
                        src="assets/img/icons/plus.svg" alt="img" class="me-1">Ajouter une entreprise</a>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="assets/img/icons/filter.svg" alt="img">
                                <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                    alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                </th>
                                <th>N°</th>
                                <th>nom</th>
                                <th>email / telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>{{ $item->email ?? $item->phone }}</td>
                                    <td>
                                        <a class="me-3" href="{{route('user-detail',['id'=>$item->id])}}">
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
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un personnel</h5>
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
                            <label for="">un role <span class="text-danger">*</span>:</label>
                            <select class="form-control" wire:model="role_id" id="">
                                <option selected>selectionner un role</option>
                                    <option value="{{ RoleEnum::COMPANY}}">société</option>



                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">telephone <span
                                    class="text-danger">*</span>
                                :</label>
                            <input type="number" wire:model="phone" class="form-control" id="recipient-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">sexe <span class="text-danger">*</span>:</label>
                            <select class="form-control" wire:model="sexe" id="">
                                <option selected>selectionner le sexe</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">mot de passe
                                :</label>
                            <input type="text" wire:model="password" class="form-control" id="recipient-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">email
                                :</label>
                            <input type="text" wire:model="email" class="form-control" id="recipient-name">
                        </div>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2"wire:click.prevent="ajouter()" onclick="Swal.fire(
                            'Good job!',
                            'produit créé avec succès',
                            'success'
                          )">enregistrer </a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal create --}}
</div>
