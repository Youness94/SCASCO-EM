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
                   
                        <h6 class="card-title">Modifier <span class="badge bg-info text-wrap">{{$apcommissions -> ap_commission_name}}</span></h6>
                   
                        <form method="POST" action="{{route('update.auto-particulier-commission')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"  value="{{$apcommissions->id}}">
                            <div class="mb-3">
                                <label for="ap_commission_name" class="form-label">Nom</label>
                                <input type="text" name="ap_commission_name" class="form-control @error('ap_commission_name') is-invalid @enderror" id="ap_commission_name" autocomplete="off" value="{{$apcommissions->ap_commission_name}}">
                                @error('ap_commission_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="ap_commission_desc" type="text" name="ap_commission_desc" rows="5" value="{{$apcommissions->ap_commission_desc}}">{{$apcommissions->ap_commission_desc}}</textarea>
                                    </div>
                                </div>
                            </div></br>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Modifier</button>
                            </div>

                        </form>

                       
                    </div>
                </div>
            </div>
        </div>
        <!-- list client -->


        @endsection