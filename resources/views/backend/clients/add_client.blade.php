@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="row profile-body">
        <!-- ... other content ... -->
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Client</h6>


                        <form method="POST" action="{{route('store.client')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="old_password" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="off">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" autocomplete="off">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cci" class="form-label">ICE</label>
                                <input type="text" name="cci" class="form-control" id="cci" autocomplete="off">
                                @error('cci')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" type="text" name="description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div></br>
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
                                    @foreach ($clients as $key => $item)
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