
    <div id="myBtnContainer filters" class="filters">
        <div style="display: inline-block;  margin-right:2%; margin-left: 2%; margin-bottom:5%;">
            <a style="" onclick="filterSelection('all')">
            <img src="assets/img/product/product62.png" alt="img">
            <h6 class=" text-uppercase">ALL</h6>
            </a>
        </div>
        @foreach ($categories as $category)
        
            <a id="{{$category->id}}">

                <div style="display: inline-block; margin-right:2%; margin-left: 2%; margin-bottom:5%;">
                    <a  class="filter-option" >
                    <img src="assets/img/product/product62.png" alt="img">
                    <h6 class=" text-uppercase">{{ $category->name }}</h6>
                    </a>
                </div>


            </a>
        @endforeach



        </div>

        
    <div class="tabs_container ">
        <div class="tab_content active" data-tab="{{$category->id}}">
            <div class="row ">

                @foreach ($produits as $produit)
                    <div class="col-lg-3 col-sm-6 d-flex   {{ $produit->category_id}} ">
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


    
