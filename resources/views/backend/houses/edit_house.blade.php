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
                   
                        <h6 class="card-title">Modifier la Compagnie <span>{{$houses -> house_name}}</span></h6>
                   
                        <form method="POST" action="{{route('update.house')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"  value="{{$houses->id}}">
                            <div class="mb-3">
                                <label for="account_name" class="form-label">Nom de Maison</label>
                                <input type="text" name="house_name" class="form-control @error('house_name') is-invalid @enderror" id="house_name" autocomplete="off" value="{{$houses->house_name}}">
                                @error('house_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="house_desc" type="text" name="house_desc" rows="5" value="{{$houses->house_desc}}">{{$houses->house_desc}}</textarea>
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