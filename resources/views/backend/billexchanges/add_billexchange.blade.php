@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
<nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('all.billexchanges')}}" class="btn btn-inverse-secondary">Les Effets</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>
    <div class="row profile-body">
        <!-- ... other content ... -->
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Effet de Commerce</h6>


                        <form method="POST" action="{{route('store.billexchange')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                            <label for="reception_date">Reception Date:</label>
                            <input type="date" class="form-control @error('reception_date') is-invalid @enderror" id="reception_date" name="reception_date" required>
                                
                                <!-- @error('reception_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Serie de Effet</label>
                                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series"  autocomplete="off" required>
                                <!-- @error('series')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="mb-3">
                                <label for="cci" class="form-label">Qnt des Effet</label>
                                <input type="number"  class="form-control" id="quantity" name="quantity" required autocomplete="off">
                                <!-- <!-- @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div> 
                            <div class="mb-3">
                                <label for="start_number">Numéro de Départ:</label>
                                <input type="number" class="form-control" id="start_number" name="start_number" required>
                            </div>

                            </br>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Ajouetr</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- list client -->

        <!-- <nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Tables</a></li>
						<li class="breadcrumb-item active" aria-current="page">Data Table</li>
					</ol>
		</nav> -->

        <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Liste Clients</h6> -->

                        <!--  -->
                        <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                        <!--  -->

                        <!-- <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>ICE</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billexchanges as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item -> name}}</td>
                                        <td>{{$item -> email}}</td>
                                        <td>{{$item -> cci}}</td>
                                        <td>{{$item -> description}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        @endsection