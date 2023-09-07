@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="row profile-body">
        <!-- ... other content ... -->
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
        <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('all.types-transfers')}}" class="btn btn-inverse-secondary">Les Type de Réglement</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Type de Réglement</h6>


                        <form method="POST" action="{{route('store.type-transfer')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="type_transfer" class="form-label">Type</label>
                                <input type="text" name="type_transfer" class="form-control @error('type_transfer') is-invalid @enderror" id="type_transfer" autocomplete="off">
                                @error('type_transfer')
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

       

        @endsection