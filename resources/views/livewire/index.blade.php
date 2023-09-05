<div wire:ignore class="page-wrapper">
    <div class="content">

        <div class="row">

            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ App\Models\Produit::where('user_id', Auth::user()->id)->count() }}</h4>
                        <h5>PRODUITS</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ App\Models\Categorie::where('user_id', Auth::user()->id)->count() }}</h4>
                        <h5>CATEGORIES</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4></h4>
                        <h5>COMMANDES</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4></h4>
                        <h5>PERSONNEL</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-header">
            <div class="page-title">
                <h4>Liste des produits</h4>
                <h6></h6>
            </div>
            <div class="page-btn bg-success">
                <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-added bg-success"><i
                        class="fa fa-shopping-basket"></i> <span class="badge rounded-pill ">
                        @livewire('contentscount')
                    </span></a>
            </div>
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
                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                    alt="img"></a>
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
                    <table class="table">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="text-success font-bold text-bold">SNo</th>

                                <th class="text-success">nom</th>
                                <th class="text-success">quantité</th>
                                <th class="text-success">prix</th>
                                <th class="text-success">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="{{ asset('storage/uploads/' . $item->path) }}">
                                        </a>
                                        <a href="productlist.html">{{ $item->name }}</a>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }} $</td>
                                    <td>@livewire('buttonbuy', ['product_id' => $item->id])</td>
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
@livewire('cardcontents')
    {{-- end modal create --}}
</div>
