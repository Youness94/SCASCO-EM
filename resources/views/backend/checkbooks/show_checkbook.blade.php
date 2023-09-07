@extends('admin.admin_dashboard')
@section('admin')

@if(session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('all.checkbooks')}}" class="btn btn-inverse-secondary">Les Chèquiers</a></li>
      <li class="breadcrumb-item"><a href="{{route('add.checkbook')}}" class="btn btn-inverse-secondary">Ajouet Chèquier</a></li>
      <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Checkbook</h6>
          <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
          <div class="table-responsive">
            <table id="dataTableExample" class="table table-striped">
              <thead>

                <tr>
                  <th>Sèrie de Chèquier</th>
                  <th>Numéro de Chèque</th>
                  <th>Status</th> <!-- Add the Status column header -->

                </tr>

              </thead>
              <tbody>

                @for ($i = $checkbooks->start_number; $i <= ($checkbooks->start_number + $checkbooks->quantity - 1); $i++)

                  <tr>
                    <td>{{ $checkbooks->series }}</td>
                    <td>N° {{ $i }}</td>
                    <td>{{ $checkbooks->status }}</td> <!-- Display dynamic status -->
                  </tr>
                  @endfor
              </tbody>
            </table>
          </div>
          <!--  -->
          
        </div>

      </div>
    </div>
    
    <div class="col-md-3">
    <div class="card">
    <div class="card-body">
      <h6 class="card-text mb-3">Series: <p>{{ $checkbooks->series }}</p></h6>
                <h6 class="card-text mb-3">Start Number: <p>{{ $checkbooks->start_number }}</p></h6>
                <h6 class="card-text mb-3">Quantity: <p>{{ $checkbooks->quantity }}</p></h6>

                @if ($checkbooks->checks()->count() < $checkbooks->quantity)
                  <form method="POST" action="{{ route('add.fillChecks', $checkbooks->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Fill Check Schedule Automatically</button>
                    
                  </form>
                  @else
                  <h4 class="card-text mb-3">Checkbook is already filled.</h4>
                  @endif
            <!--  -->
    </div>
  </div>
          
                
    </div>
    
  </div>


  <!--  -->


  @endsection