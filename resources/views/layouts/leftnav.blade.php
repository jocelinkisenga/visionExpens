@php
    use App\Enums\RoleEnum;
@endphp
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}"
                            alt="img"><span> Dashboard</span> </a>
                </li>
                @if (Auth::user()->role_id == RoleEnum::ADMIN)
                    <li class="">
                        <a href="{{ route('categories') }}"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span class="text-success text-uppercase"> categories</span></a>
                        {{-- <ul>
                            <li><a href="{{ route('categories') }}">liste des categories </a></li>
                        </ul> --}}

                    </li>

                    <li class="">
                        <a  href="{{ route('products') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span class="text-success text-uppercase"> produits</span>
                            </a>

                    </li>
                    <li class="">
                        <a href="{{ route('admin-commande') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span class="text-success text-uppercase" class=""> commandes</span>
                            </a>

                    </li>
                    <li class="">
                        <a href="{{ route('depenses') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span class="text-success text-uppercase"> depenses</span>
                            </a>

                    </li>
                    <li class="">
                        <a href="{{route('inputs')}}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span class="text-success text-uppercase"> Rapport</span>
                            </a>

                    </li>
                    {{-- <li class="">
                        <a href="{{route('outputs')}}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span class="text-success text-uppercase"> sorties</span>
                            </a>

                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span class="text-success text-uppercase"> rapport</span> </a>

                    </li>
                    --}}
                @endif




                <li class="text-white bg-warning">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span>
                            rentrer à l'acceuil</span> </a>
                </li>




            </ul>
        </div>
    </div>
</div>
