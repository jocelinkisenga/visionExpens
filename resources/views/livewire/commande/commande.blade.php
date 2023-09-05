<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       <h5 class="card-title text-uppercase">Ajout des produits à la commande</h5>
                        {{--  <input type="text" id="myInput" class=""
                            onkeyup="myFunction()" placeholder="Search for names.."> --}}
                        <p class="card-description">
                            @if (session('message'))
                            <p class="alert alert-danger">{{session('message')}}</p>
                        @endif
                        </p>
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-green">selectionner un produit</th>
                                        
                                        <th>Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form>
                                    <tr>
                                        <td>
                                            <select wire:model="produit_id" id="" class="form-control">
                                                <option selected>selectioner un produit</option>
                                                @foreach ($products as $index => $item)
                                                <option value="{{$item->id }}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number"  value="1" autocomplete="off"
                                            wire:model="quantity_commande" autocomplete="off"/>
                                        <input type="submit" value="ajouter"
                                            wire:click.prevent="ajouter( {{ $commande_id }})"
                                            class="btn btn-success btn-sm" />
                                            @error('quantity_commande')
                                             <p class="text-danger"></p>
                                            @enderror
                                        </td>
                                    </tr>
                                </form>
                                    {{-- @foreach ($products as $index => $item)
                                        

                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                
                                                <td wire:key="{{$item->id}}"> 
                                                    <form >
                                                    <input type="number"  value="1" autocomplete="off"
                                                        wire:model="quantity_commande" autocomplete="off"/>
                                                    <input type="submit" value="ajouter"
                                                        wire:click.prevent="ajouter({{ $item->id }},{{ $commande_id }})"
                                                        class="btn btn-success btn-sm" />
                                                    </form>
                                                    </td>
                                            </tr>
                                        
                                    @endforeach --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">commande</h4>
                        <p class="card-description">
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>produit</th>
                                        <th>quantite</th>
                                        <th>action</th>
                                        <th>Annuler</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($commandes as $item)
                                        <tr>

                                            <td>
                                                {{ $item->name }}

                                            </td>
                                            <td>
                                                {{ $item->quantity_commande }}
                                            </td>
                                            <td class="text-white">
                                                <form>

                                                    <input type="submit" value="reduire "
                                                        class="btn btn-warning btn-sm"
                                                        wire:click.prevent="reduire({{ $commande_id }},{{ $item->pId }})" />
                                                </form>

                                            </td>
                                            <td class="text-danger">
                                                <form>

                                                    <input type="submit" value="Annuler "
                                                        class="btn btn-danger btn-sm"
                                                        wire:click.prevent="annuler({{ $commande_id }},{{ $item->pId }}, {{ $item->quantity_commande }})" />
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('commandes') }}" id="basic" class="btn btn-primary btn-sm"><i
                                class="fas fa-print"></i> retour aux commandes </a>
                        <a href="{{ route('facture', ['id' => $commande_id]) }}" type="button"
                            class="float-right m-auto btn btn-success btn-sm" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> imprimer la facture
                        </a>
                        {{-- <button type="button" class="float-right m-auto btn btn-danger btn-sm"><i
                                class="far fa-credit-card"></i>
                            confirmer la commande
                        </button> --}}

                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
</div>



<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
