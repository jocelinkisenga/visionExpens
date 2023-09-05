
    <div class="tabs_container">
        <div class="tab_content active" data-tab="fruits">
            <div class="row ">

                @foreach ($produits as $produit)
                    <div class="col-lg-3 col-sm-6 d-flex ">
                        <form>
                            <div class="productset flex-fill">
                                <div class="productsetimg">
                                    <img src="assets/img/product/product67.png" alt="img">
                                    <h6>{{ $produit->quantity }}</h6>
                                    <div class="check-product">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                                <div class="productsetcontent">
                                    <h5><a class="btn btn-success btn-sm"
                                            wire:click.prevent="ajouter( {{ $produit->id }})">ajouter</a>
                                    </h5>
                                    <h4>{{ $produit->name }}</h4>
                                    <h6>{{ $produit->price }}</h6>
                                </div>
                            </div>
                            <form>
                    </div>
                @endforeach


            </div>
        </div>
    </div>