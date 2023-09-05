@extends("layouts.app")
@section('content')
<div class="main-panel" id="page">
    <div class="content-wrapper">
      <div class="row">



<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title"></h4>
<p class="card-description">
<button type="button" class="btn btn-success" onclick="generatePDF()" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Télécharger le rapport</button>

</p>
<div id="text">

<div class="col-lg-12 stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">rapport du</h4>
              <p class="card-description">
              </p>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr  class="table-info">

                      <th>
                        produit
                      </th>
                      <th>
                        entrées
                      </th>
                      <th>
                        sorties
                      </th>
                      <th>
                        soldes
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $item)
                    <tr>

                      <td >
                   {{$item->name}}
                    </td>
                    <td >
                      
                    {{$item->entries}}    
                    </td>
                    <td>
                   {{$item->outputs}}
                    </td>
                    <td >
                   
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
</div>
    </div>
  </div>
@endsection