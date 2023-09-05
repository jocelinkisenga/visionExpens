<div>
    @php
        use App\Models\produit;
        global $total_item;
        global $facture_total;
        global $pourcentage;
    @endphp

    <div class="main-wrappers" style="background-color: #f6f1f1;">
        <div class="header">
            <!-- Logo -->
            <div class="border-0 header-left ">
                <a href="" class="logo">
                    <img src="assets/img/logo.png" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="assets/img/logo-small.png" alt="">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Header Menu -->
            <ul class="nav user-menu">

                <!-- Search -->
                <li class="nav-item">
                    <div class="top-nav-search">

                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
                        </form>
                    </div>
                </li>
                <!-- /Search -->

                <!-- Flag -->
                <!-- /Flag -->

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <img src="assets/img/icons/notification-bing.svg" alt="img"> <span
                            class="badge rounded-pill"><livewire:components.reduced></span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">

                                @foreach ($reductions as $item)
                                    <li class="notification-message">
                                        <a>
                                            <div class="media d-flex">
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details">{{ $item->precommande->code }} <span
                                                            class="noti-title">      </span>
                                                            {{--  --}}
                                                        <span class="noti-title"> <strong>{{ $item->pourcentage }}
                                                                %</strong> reduction
                                                            <button class="btn btn-success btn-sm"
                                                                data-bs-toggle="modal" data-bs-target="#commandeFacture"
                                                                wire:click="reduction_facture({{ $item->precommande->id }})">voir
                                                                plus</button> </span>
                                                    </p>
                                                    <p class="noti-time"><span class="notification-time"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <span class="dropdown-item"><a href="{{ route('dashboard') }}"
                                    class="text-white bg-success nav-link">tableau de bord</a></span>
                            {{-- <span class="dropdown-item"><a data-bs-toggle="modal" data-bs-target="#allcommandes" class="text-white bg-success nav-link">rapport
                                    des commandes</a></span> --}}
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <span class="dropdown-item logout"> <input type="submit" value="se deconnecter"
                                        class="text-white bg-danger nav-link"></span>


                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <span class="dropdown-item"> <input type="submit" value="se deconnecter"
                                class="text-white bg-danger nav-link"></span>


                    </form>
                </div>
            </div>
            <!-- /Mobile Menu -->
        </div>

        <div class="page-wrapper ms-0">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 col-sm-12 tabs_wrapper">
                        <div class="page-header ">
                            <div class="page-title">
                                <h4></h4>
                                @if (session('message'))
                                    <h6
                                        class="Swal.fire(
                                    'bon boulot!',
                                    'reduction confirmée avec succés!',
                                    'success'
                                  )">
                                    </h6>
                                @endif

                            </div>
                        </div>

                        <ul class="border-0 tabs owl-carousel owl-theme owl-product" wire:ignore>
                            @foreach ($categories as $item)
                                <li class="" id="{{ $item->id }}">
                                    <div class="product-details ">
                                        <img src="assets/img/product/product62.png" alt="img">
                                        <h6>{{ $item->name }}</h6>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tabs_container">

                            @foreach ($categories as $item)
                                <div class="tab_content active" data-tab="{{ $item->id }}">
                                    <div class="row ">
                                        @foreach (Produit::whereCategorie_id($item->id)->get() as $produit)
                                            <div class="col-lg-3 col-sm-6 d-flex"
                                            
                                                wire:click.prevent="ajouter( {{ $produit->id }})"
                                                    @if ($produit->quantity <= 0) onClick="Swal.fire(
                                                    'oups !!',
                                                    'la quantité ne suffit pas pour ajouter à la commande!',
                                                    'danger'
                                                  )"
                                                   @endif>
                                                <div class="productset flex-fill ">
                                                    <div class="productsetimg">
                                                        <img src="{{ asset('storage/uploads/' . $produit->path) }}"
                                                            alt="img">
                                                        <h6>Qty: {{ $produit->quantity }}</h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h5>{{ $produit->categorie->name }}</h5>
                                                        <h4>{{ $produit->name }}</h4>
                                                        <h6>{{ $produit->price }} $</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach

                        

                        </div>
                    </div>
                    <div class="p-3 bg-white shadow-sm col-lg-4 col-sm-12 rounded-2xl ">


                        <div class="col-12">
                            <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                data-bs-target="#create"><i class="fa fa-plus me-2"></i>créer une commande</a>
                        </div>
                        <div class="setvaluecash">

                            <ul>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#recents" class="paymentmethod">
                                        <img src="assets/img/icons/sales1.svg" alt="img" class="me-2">
                                        COMMANDES
                                    </a>
                                </li>
                                @if (!empty($last_commande))
                                    {{-- <li>
                                        <a class="paymentmethod"
                                            wire:click="confirmer({{ $last_commande->id }})">
                                            <img src="assets/img/icons/debitcard.svg" alt="img"
                                                class="me-2">
                                            CONFIRMER
                                        </a>
                                    </li> --}}
                                @endif
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#reductions" class="paymentmethod">
                                        <img src="assets/img/icons/scan.svg" alt="img" class="me-2">
                                        REDUCTIONS
                                    </a>
                                </li>
                            </ul>


                            <div class="btn-totallabel">
                                <h5></h5>
                                <h6></h6>
                            </div>

                            <ul>
                                @if (!empty($last_commande))
                                    <li>
                                        <a class="paymentmethod" data-bs-toggle="modal" data-bs-target="#facture">
                                            <img src="assets/img/icons/purchase1.svg" alt="img" class="me-2">
                                            FACTURE
                                        </a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="modal" data-bs-target="#coupon"class="paymentmethod">
                                            <img src="assets/img/icons/purchase.svg" alt="img" class="me-2">
                                            COUPON
                                        </a>
                                    </li>
                                    @if (isset($last_commande->reductions[0]['precommande_id']))
                                        @if ($last_commande->reductions[0]['precommande_id'] != $last_commande->id)
                                            <li>
                                                <a wire:click="reduction({{ $last_commande->id }})"
                                                    class="paymentmethod">
                                                    <img src="assets/img/icons/return1.svg" alt="img"
                                                        class="me-2">
                                                    REDUIRE
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            @if ($last_commande)
                                                <a wire:click="reduction({{ $last_commande->id }})"
                                                    onclick="Swal.fire(
                                                    'bon boulot!',
                                                    'vous venez de soumettre la reduction, patientez la confirmation de l\'admin !',
                                                    'success'
                                                  )"
                                                    class="paymentmethod">
                                                    <img src="assets/img/icons/return1.svg" alt="img"
                                                        class="me-2">
                                                    REDUIRE
                                                </a>
                                            @endif

                                        </li>
                                    @endif

                                @endif





                            </ul>


                        </div>
                        <div class="order-list">
                            <div class="orderid">
                                @if (!empty($last_commande))
                                    <h4>votre commande</h4>
                                    <h5>Code:

                                        <span class="text-strong"> {{ $last_commande->code }} </span>

                                    </h5>
                                @else
                                    <h3 class="text-lg font-bold text-red font-size-8">veuillez créer une commande ou selectionnez une</h3>
                                @endif
                            </div>
                            <div class="actionproducts">

                            </div>
                        </div>
                        <div class="card card-order">
                            <div class="card-body">

                            </div>
                            <div class="split-card">
                            </div>
                            <div class="pt-0 card-body">

                                @if (!empty($commandes))
                                    <div class="totalitem">
                                        <h4>Total items : {{ $commandes->count() }}</h4>
                                        <a href="javascript:void(0);">Clear all</a>
                                    </div>
                                    <div class="product-table">
                                        @foreach ($commandes as $commande)
                                            <ul class="product-lists">
                                                <li>
                                                    <div class="productimg">
                                                        <div class="productimgs">
                                                            <img src="{{ asset('storage/uploads/' . $commande->produit->path) }}"
                                                                alt="img">
                                                        </div>
                                                        <div class="productcontet">
                                                            <h4>{{ $commande->produit->name }}
                                                                <a href="javascript:void(0);" class="ms-2"
                                                                    data-bs-toggle="modal" data-bs-target="#edit"><img
                                                                        src="assets/img/icons/edit-5.svg"
                                                                        alt="img"></a>
                                                            </h4>
                                                            <div class="productlinkset">
                                                                <h5>PT001</h5>
                                                            </div>
                                                            <div class="increment-decrement">
                                                                <div class="input-groups">
                                                                    <input type="button" value="-" wire:click="reduire({{ $last_commande->id }},{{ $commande->produit->id }})"
                                                                        class="button-minus dec button">
                                                                    <input type="text" name="child"
                                                                        value="{{ $commande->quantity_commande }}"
                                                                        class="quantity-field">
                                                                    <input type="button" value="+"
                                                                        class="button-plus inc button "
                                                                        wire:click.prevent="ajouter( {{ $commande->produit->id }})"
                                                                        @if ($commande->produit->quantity <= 0) onClick="Swal.fire(
                                                                            'oups !!',
                                                                            'la quantité ne suffit pas pour ajouter à la commande!',
                                                                            'danger'
                                                                          )" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $total_item += $commande->quantity_commande * $commande->produit->price; ?>
                                                <li>{{ $commande->quantity_commande * $commande->produit->price }} $
                                                </li>
                                                @if (!empty($last_commande))
                                                    <li><a class="confirm"
                                                        wire:click="annuler({{ $last_commande->id }},{{ $commande->produit->id }}, {{ $commande->quantity_commande }})"><img
                                                                src="assets/img/icons/delete-2.svg"
                                                                alt="img"></a>
                                                    </li>
                                                @endif

                                            </ul>
                                        @endforeach

                                    </div>
                                @endif


                            </div>
                            <div class="split-card">
                            </div>
                            <div class="pt-0 pb-2 card-body">
                                <div class="setvalue">
                                    <ul>
                                        @if (!empty($last_commande))
                                            <li class="total-value">
                                                <h5>sous total </h5>
                                                <h6><?= $total_item ?> $</h6>
                                            </li>
                                            <li class="total-value">
                                                <h5>TVA </h5>
                                                <h6>{{ ($total_item / 100) * 16 }} $</h6>
                                            </li>
                                            <li class="total-value">
                                                <h5>Total </h5>
                                                <h6><?= $total_item + ($total_item / 100) * 16 ?> $</h6>
                                            </li>
                                        @endif
                                    </ul>
                                </div>







                                <div class="col-12">
                                    <a href="/home" class="btn btn-adds text-red"><i class="fa fa-backward"></i>
                                        rentrer à l'acceuil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Define Quantity</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="calculator-set">
                        <div class="calculatortotal">
                            <h4>0</h4>
                        </div>
                        <ul>
                            <li>
                                <a href="javascript:void(0);">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">2</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">3</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">4</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">5</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">6</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">8</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">9</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-closes"><img
                                        src="assets/img/icons/close-circle.svg" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">0</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-reverse"><img
                                        src="assets/img/icons/reverse.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="hold-order">
                        <h2>4500.00</h2>
                    </div>
                    <div class="form-group">
                        <label>Order Reference</label>
                        <input type="text">
                    </div>
                    <div class="para-set">
                        <p>The current order will be set on hold. You can retreive this order from the pending order
                            button. Providing a reference to it might help you to identify the order more quickly.</p>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <select class="select">
                                    <option>Exclusive</option>
                                    <option>Inclusive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label> Tax</label>
                                <div class="input-group">
                                    <input type="text">
                                    <a class="scanner-set input-group-text">
                                        %
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select class="select">
                                    <option>Fixed</option>
                                    <option>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Sales Unit</label>
                                <select class="select">
                                    <option>Kilogram</option>
                                    <option>Grams</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <form>
                                <div class="form-group">
                                    <label for="">selectionner un serveur :</label>
                                    <select class="form-control" wire:model="server_id" id="">
                                        <option selected>selectionner un serveur</option>
                                        @foreach ($serveurs as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2 "
                            onclick="Swal.fire(
                            'Good job!',
                            'commande créée  avec succés! clicker sur le bouton commandes pour ajouter vos produits',
                            'success'
                          )"
                            wire:click.prevent="store()">créer la commande</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Annuler la commande</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="delete-order">
                        <img src="assets/img/icons/close-circle1.svg" alt="img">
                    </div>
                    <div class="text-center para-set">
                        <p>The current order will be deleted as no payment has been <br> made so far.</p>
                    </div>
                    <div class="text-center col-lg-12">
                        <a class="btn btn-danger me-2">Yes</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent commande --}}

    <div wire:ignore.self class="modal fade" id="recents"aria-labelledby="recents"
    aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Commandes recentes</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <div class="tab-content">
                            <div class="tab-pane fade show active"  role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div   class="table-top">
                                    <div wire:ignore class="search-set">
                                        <div class="">
                                            <input id="myInput" placeholder="entrer le code de la commande" class=" search-input form-control" onkeyup="commande_search()">
                                        </div>
                                    </div>

                                </div>
                                <div class="table">
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>

                                                <th>commande</th>
                                                <th>serveur</th>
                                                <th>status</th>
                                                <th>confirmer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($precommandes))
                                            @foreach ($precommandes as $item)
                                            <tr>
                                               
                                                <td>
                                                    <form>
                                                    <button  class="btn btn-success"
                                                      wire:click.prevent="edit({{ $item->id }})" >{{ $item->code }}</button>
                                                    </form>
                                                </td>
                                                <td>{{ $item->server->name }}</td>
                                                <td>
                                                    @if ($item->invoiced == false)
                                                        <span class="text-white p-2 tex-bold bg-warning"> non facturé</span>
                                                    @else
                                                    <span class="text-success">  facturé</span>
                                                    @endif
                                                </td>
                                                <td><button class="btn btn-danger btn-sm"
                                                        wire:click="confirmer({{ $item->id }})">confirmer</button>
                                                </td>
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
        </div>
    </div>



    {{-- end recent commande --}}


    {{-- toutes les commandes --}}
    {{-- <div wire:ignore class="modal fade" id="allcommandes" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">les commandes du jour</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a onkeyup="myFunction()" id="myinput" class="btn btn-searchset"><img
                                                    src="assets/img/icons/search-white.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="pdf"><img src="assets/img/icons/pdf.svg"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="excel"><img src="assets/img/icons/excel.svg"
                                                        alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="print"><img src="assets/img/icons/printer.svg"
                                                        alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>produit</th>
                                                <th>quantité</th>
                                                <th>prix unitaire</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($todays as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->quantity_commande }}</td>
                                                    <td>{{ $item->price }} $</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- end toutes les commandes --}}


    {{-- facture component --}}

    <div wire:ignore.self class="modal fade" id="facture" tabindex="-1" aria-labelledby="facture" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Facture</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        @if (!empty($invoce))
                        <li class="nav-item" role="presentation">
                           
                            <button class="nav-link " class="btn btn-primary" style="background-color: blue; color:white"
                              onclick="printDiv()" 
                                id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" 
                                aria-controls="purchase" aria-selected="true" role="tab">imprimer</button>
                               
                        </li>
                        @if ($invoce[0]->invoiced == 0)
                        <li class="nav-item" style="margin-left: 16px"><button wire:click="invoice({{$invoce[0]->pId}})" class="ml-4 btn btn-success">facturer</button></li>
                        @endif
                       
                        @endif
                    </ul>
                    <div class="justify-center row" id="printDiv">
                        <div class="mt-4 wrapper ml-9 col-12">
                            <div id="printdivcontent">
                                <div class="card">
                                    <div class="card-header ">
                                        <a class="pt-2 ">The king</a>
                                        <div class="float-right">
                                            <strong> Fax:</strong> 2233455 <br>
                                            <strong>avenue :</strong> square 23,67 <br>
                                            <strong>contact :</strong> +243 994 445 56 <br>
                                            <strong>code :</strong>
                                            @if (!empty($invoce))
                                                {{ $invoce[0]->code }}
                                            @endif
                                            <br>
                                            <h3 class="mb-0"></h3>


                                        </div>
                                        <div class="float-right">
                                            <strong>Date:</strong> <?= date('Y/m/d') ?>
                                        </div>
                                    </div>
                                    <div class="card-body" id="elem">
                                        <div class="mb-4 row">
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>

                                                        <th>produit</th>
                                                        <th class="right">quantité</th>
                                                        <th class="right">sous-total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($invoce))
                                                        @foreach ($invoce as $item)
                                                            <tr>

                                                                <td class="left strong text-uppercase">
                                                                    {{ $item->name }}
                                                                </td>
                                                                <td class="right">{{ $item->qty }}</td>
                                                                <td class="right">{{ $item->qty * $item->price }} $
                                                                </td>
                                                                <?php $facture_total += $item->qty * $item->price; ?>
                                                                @php
                                                                    // $pourcentage = $item->reduction;
                                                                @endphp

                                                            </tr>
                                                        @endforeach


                                                    @endif


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @if ($invoce != null and $invoce[0]->pourcentage > 0)
                                <div class="bg-white card-footer">
                                    <p class="mb-0"><span class="text-uppercase font-weight-bold">reduction :
                                           
                                              {{ ($facture_total / 100) * $invoce[0]->pourcentage }} $
                                            
                                        </span></p>
                                </div>
                                @endif
                                <div class="bg-white card-footer">
                                    <p class="mb-0"><span class="text-uppercase font-weight-bold">Total :
                                        @if ($invoce != null and $invoce[0]->pourcentage != 0)
                                         
                                        
                                             <?= $facture_total - ($facture_total / 100) * $invoce[0]->pourcentage; ?> $
                                            
                                        @else
                                            {{$facture_total }} $
                                        @endif
                                            </span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- end facture component --}}

    {{-- coupon  --}}
    <div wire:ignore.self class="modal fade" id="coupon" tabindex="-1" aria-labelledby="coupon"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">coupon</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab"
                                data-bs-target="#purchase" type="button" aria-controls="purchase"
                                aria-selected="true" role="tab" onclick="printCoupon()">imprimer</button>
                        </li>
                    </ul>
                    <div class="justify-center row" id="printCoupon">
                        <div class="mt-4 wrapper ml-9 col-12">
                            <div id="printdivcontent">
                                <div class="card">
                                    <div class="card-header ">
                                        <a class="pt-2 ">The king</a>
                                        <div class="float-right">
                                            <strong> Fax:</strong> 2233455 <br>
                                            <strong>avenue :</strong> square 23,67 <br>
                                            <strong>contact :</strong> +243 994 445 56 <br>
                                            <strong>code :</strong>
                                            @if (!empty($invoce))
                                                {{ $invoce[0]->code }}
                                            @endif
                                            <br>
                                            <h3 class="mb-0"></h3>
                                            Date: <?= date('Y/m/d') ?>
                                        </div>
                                    </div>
                                    <div class="card-body" id="elem">
                                        <div class="mb-4 row">
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>

                                                        <th>produit</th>
                                                        <th class="right">quantité</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($invoce != null)
                                                        @foreach ($invoce as $item)
                                                            <tr>

                                                                <td class="left strong text-uppercase">
                                                                    {{ $item->name }}
                                                                </td>
                                                                <td class="right">{{ $item->qty }}</td>
                                                                </td>
                                                                <?php $facture_total += $item->qty * $item->price; ?>

                                                            </tr>
                                                        @endforeach


                                                    @endif


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white card-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- end coupon --}}





<div wire:ignore.self class="modal fade" id="commandeFacture" tabindex="-1" aria-labelledby="facture" role="dialog"
aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Facture</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link " class="btn btn-primary"
                        onclick="printDiv()"
                        id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button"
                        aria-controls="purchase" aria-selected="true" role="tab">imprimer</button>
                </li>
            </ul>
            <div class="justify-center row" id="printDiv">
                <div class="mt-4 wrapper ml-9 col-12">
                    <div id="printdivcontent">
                        <div class="card">
                            <div class="card-header ">
                                <a class="pt-2 ">The king</a>
                                <div class="float-right">
                                    <strong> Fax:</strong> 2233455 <br>
                                    <strong>avenue :</strong> square 23,67 <br>
                                    <strong>contact :</strong> +243 994 445 56 <br>
                                    <strong>code :</strong>
                          
                                    @if (empty($facture))
                                
                                     
                                    @else
                                    {{ $facture[0]->code }}
                                    @endif
                                    <br>
                                    <h3 class="mb-0"></h3>


                                </div>
                                <div class="float-right">
                                    <strong>Date:</strong> <?= date('Y/m/d') ?>
                                </div>
                            </div>
                            <div class="card-body" id="elem">
                                <div class="mb-4 row">
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>produit</th>
                                                <th class="right">quantité</th>
                                                <th class="right">sous-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($facture))
                                                @foreach ($facture as $item)
                                                    <tr>

                                                        <td class="left strong text-uppercase">
                                                            {{ $item->name }}
                                                        </td>
                                                        <td class="right">{{ $item->qty }}</td>
                                                        <td class="right">{{ $item->qty * $item->price }} $
                                                        </td>
                                                        <?php $facture_total += $item->qty * $item->price; ?>
                                                        @php
                                                            // $pourcentage = $item->reduction;
                                                        @endphp

                                                    </tr>
                                                @endforeach


                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white card-footer">
                            <p class="mb-0"><span class="text-uppercase font-weight-bold">reduction :
                                    @if ($facture != null)
                                      {{ ($facture_total / 100) * $facture[0]->pourcentage }} $
                                    @endif
                                </span></p>
                        </div>
                        <div class="bg-white card-footer">
                            <p class="mb-0"><span class="text-uppercase font-weight-bold">Total :
                                @if ($facture != null and $facture[0]->pourcentage != 0)
                                 
                                
                                     <?= $facture_total - ($facture_total / 100) * $facture[0]->pourcentage; ?> $
                                    
                                @else
                                    {{$facture_total }} $
                                @endif
                                    </span></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{{-- end reduction facture  --}}

    {{-- reduction component --}}
    <div wire:ignore.self class="modal fade" id="reductions" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Les reductions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a onkeyup="myFunction()" id="myinput" class="btn btn-searchset"><img
                                                    src="assets/img/icons/search-white.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="pdf"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="excel"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="print"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>code</th>
                                                <th>pourcentage</th>
                                                <th class="">detail</th>
                                                <th class="text-end">confirmation</th>
                                        </thead>
                                        <tbody>

                                            @foreach ($reductions as $item)
                                                <tr>
                                                    <td>{{ $item->precommande->code }}</td>
                                                    <td>{{ $item->pourcentage }} %</td>
                                                    <td>
                                                        <button class="me-3" data-bs-toggle="modal"
                                                            data-bs-target="#commandeFacture"
                                                            wire:click="reduction_facture({{ $item->precommande->id }})">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </button>
                                                           
                                                
                                                    </td>
                                                    <td>
                                                    
                                                           
                                                        <button  class="btn btn-warning btn-sm"
                                                        wire:click="confirm_reduction({{$item->id}})">confirmer</button>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end reduction component --}}

</div>
