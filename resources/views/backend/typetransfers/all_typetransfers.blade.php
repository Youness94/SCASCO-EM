@extends('admin.admin_dashboard')
@section('admin')


    

      <div class="page-content">

            <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('add.type-transfer')}}" class="btn btn-inverse-secondary">Ajouter Type de Réglement</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>

<div class="row">
 <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Les Type de Réglement</h6>
    <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
    <div class="table-responsive">
                  <table id="dataTableExample" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Cree par</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($typetransfers as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item -> type_transfer}}</td>
                        <td>{{$item -> description}}</td>
                        <td>
                        <a href="{{route('edit.type-transfer',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                        </td>
                        <td>
                        <a href="{{route('delete.type-transfer',$item->id)}}"" class="btn btn-inverse-danger">Delete</a>
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