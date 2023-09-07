@extends('admin.admin_dashboard')
@section('admin')


    

      <div class="page-content">

            <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('add.checkbook')}}" class="btn btn-inverse-secondary">Ajouetr Chèquier</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>

<div class="row">
 <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Checkbooks Table</h6>
    <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
    <div class="table-responsive">
                  <table id="dataTableExample" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Date de reciption</th>
                        <th>Serie de Chèquier</th>
                        <th>Numéro de Départ</th>
                        <th>Qnt des chèques</th>
                        <th>Status</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Cree par</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($checkbooks as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item -> reception_date}}</td>
                        <td>{{$item -> series}}</td>
                        <td>N° {{$item -> start_number}}</td>
                        <td>{{$item -> quantity}}</td>
                        <td>{{$item -> status}}</td>
                        <td>
                        <a href="{{route('show.checkbook',$item->id)}}" class="btn btn-inverse-primary">Show</a>
                        </td>
                        <td>
                        <a href="{{route('edit.checkbook',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                        </td>
                        <td>
                        <a href="{{route('delete.checkbook',$item->id)}}"" class="btn btn-inverse-danger">Delete</a>
                        </td>
                        <td>{{$item -> user->name}}</td>
                    </tr>
                    @endforeach 
                     
                    </tbody>
                  </table>
                </div>
  </div>
</div>
</div>
</div>


<!--  -->


@endsection