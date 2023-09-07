@extends('admin.admin_dashboard')
@section('admin')

      <div class="page-content">

            <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('all.billexchanges')}}" class="btn btn-inverse-secondary">Les Effets de Commerce</a></li>
                        <li class="breadcrumb-item"><a href="{{route('add.billexchange')}}" class="btn btn-inverse-secondary">Ajouet Effet</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>

<div class="row">
 <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Les Effets de Commerce</h6>
    <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
    <div class="table-responsive">
                  <table id="dataTableExample" class="table table-striped">
                  <thead>
                    
                      <tr>
                          <th>Sèrie</th>
                          <th>Numéro de Effet</th>
                          <th>Status</th> <!-- Add the Status column header -->
                         
                      </tr>
                      
                  </thead>
                  <tbody>
                     
                      @for ($i = $billexchanges->start_number; $i <= ($billexchanges->start_number + $billexchanges->quantity - 1); $i++)
                      
                      <tr>
                          <td>{{ $billexchanges->series }}</td>
                          <td>N° {{ $i }}</td>
                          <td>{{ $billexchanges->status }}</td> <!-- Display dynamic status -->
                      </tr>
                      @endfor
                  </tbody>
                  </table>
                </div>
  </div>
</div>
</div>
</div>


<!--  -->


@endsection