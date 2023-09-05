
@extends('layouts.app')
@section('content')

			<div class="page-wrapper">
				<div class="content">
					<div class="row">
					
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count">
								<div class="dash-counts">
									<h4>{{App\Models\Produit::where("user_id",Auth::user()->id)->count()}}</h4>
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
									<h4>{{App\Models\Categorie::count()}}</h4>
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
									<h4>{{App\Models\Precommande::count()}}</h4>
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
									<h4>{{App\Models\user::count()}}</h4>
									<h5>PERSONNEL</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i>
								</div>
							</div>
						</div>
					</div>
					<!-- Button trigger modal -->


					<div class="mb-0 card">
						<div class="card-body">
							<h4 class="card-title">listes des produits</h4>
							<div class="table-responsive dataview">
								<table class="table datatable ">
									<thead>
										<tr>
											<th>SNo</th>
											
											<th>nom</th>
											<th>categorie</th>
											<th>quantité</th>
											<th>prix</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($produits as $key => $item )
										<tr>
											<td>{{$key+1}}</td>
											<td class="productimgname">
												<a class="product-img" href="productlist.html">
													<img src="{{ asset('storage/uploads/' . $item->path) }}" alt="product">
												</a>
												<a href="productlist.html">{{$item->name}}</a>
											</td>
											<td>{{$item->categorie->name}}</td>
											<td>{{$item->quantity}}</td>
											<th>{{$item->price}} $</th>
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
		<!-- /Main Wrapper -->
		
@endsection