<div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">votre panier  </h5><span class="ml-6">{{\CartFacade::getTotal()}}$ total</span>
                <button wire:click.prevent="store_order()" class="bg-success text-white border-white border-raduis-5">confirmer</button>


                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($cardContents as $key => $item)
                <div wire:key="{{$key+1}}" class="row mt-2">
                    <div class="col-2">{{$item->name}}</div>
                    <div class="col-2">{{$item->quantity}}</div>
                    <div class="col-4"><span><button wire:click.prevent="minus({{ $item->id }})" class="bg-primary text-white"><i class="fa fa-minus"></i></button></span>
                        <input type="text" wire:model.defer="input_quantity" value="{{$item->quantity}}" class="" style="width:15%;">
                        <span><button wire:click.prevent="plus({{ $item->id }})" class="bg-primary text-white"><i class="fa fa-plus"></i></button></span></div>
                    <div class="col-2">{{$item->quantity * $item->price}} $</div>
                    <div class="col-2"><button wire:click="delete({{$item->id}})"><i class="fa fa-window-close text-danger"></i></button></div>
                    <div class="col-2"></div>
                </div>
            @endforeach
                {{-- <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cardContents as $key => $item)
                                <form>
                                    <tr wire:key="{{ $item->id }}">
                                        <td class="productimgname">

                                            <a>{{ $item->name }}</a>
                                        </td>
                                        <td>{{ $item->quantity }} pcs</td>
                                        <td>{{ $item->price * $item->quantity}} $</td>
                                        <td><span><button wire:click.prevent="minus({{ $item->id }})"
                                                    class="bg-danger text-white"><i
                                                        class="fa fa-minus"></i></button></span>
                                            <span><button wire:click.prevent="plus({{ $item->id }})"
                                                    class="bg-primary text-white"><i
                                                        class="fa fa-plus"></i></button></span>
                                            <form>
                                                <input wire:model.defer="input_quantity" id="{{ $item->id }}"
                                                    class="w-2" :key="{{ $item->id }}"
                                                    >
                                                <span><button type="submit" wire:click.prevent="addQuantity({{$item->id}})" class="bg-success text-white">Ajouter</button></span>
                                            </form>
                                        </td>
                                        <td>
                                            <button wire:click.prevent="delete({{ $item->id }})"><i
                                                    class="fa fa-window-close text-danger"></i></button>
                                        </td>
                                    </tr>

                                </form>
                            @endforeach

                        </tbody>
                        <tfoot class="mt-4">
                            <th><button class="bg-primary text-white br-1">confirmer</button></th>
                            <th><button class="bg-danger text-white br-1">annuler</button></th>
                        </tfoot>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
</div>
