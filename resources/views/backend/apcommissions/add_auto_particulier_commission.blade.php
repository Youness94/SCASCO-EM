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
                        <h6 class="card-title">Ajouter Commission Auto Particulier</h6>


                        <form method="POST" action="{{route('store.auto-particulier-commission')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="ap_commission_name" class="form-label">Nom</label>
                                <input type="text" name="ap_commission_name" class="form-control @error('ap_commission_name') is-invalid @enderror" id="ap_commission_name" autocomplete="off" required>
                                @error('ap_commission_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="ap_commission_desc" type="text" name="ap_commission_desc" rows="5"></textarea>
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
        
        @endsection