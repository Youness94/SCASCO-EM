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
                        <h6 class="card-title">Edit Checkbook</h6>


                        <form method="POST" action="{{route('update.checkbook')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                         
                            <input type="hidden" name="id"  value="{{$checkbooks->id}}">
                            <div class="mb-3">
                            <label for="reception_date">Reception Date:</label>
                            <input type="date" class="form-control @error('reception_date') is-invalid @enderror" id="reception_date" name="reception_date" required value="{{$checkbooks->reception_date}}">
                                
                                <!-- @error('reception_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Serie de Chèquier</label>
                                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series"  autocomplete="off" required value="{{$checkbooks->series}}">
                                <!-- @error('series')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="mb-3">
                                <label for="cci" class="form-label">Qnt des chèques</label>
                                <input type="number"  class="form-control" id="quantity" name="quantity" required autocomplete="off" value="{{$checkbooks->quantity}}">
                                <!-- @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> -->
                            <div class="mb-3">
                                <label for="start_number">Start Number:</label>
                                <input type="number" class="form-control" id="start_number" name="start_number" required value="{{$checkbooks->start_number}}">
                            </div>
                            <div class="mb-3">
                            <label for="start_number">Status:</label>
                                <input type="text" class="form-control" id="status" name="status"  value="{{$checkbooks->status}}">
                            <!-- <select class="form-control" name="status" id="status">
                               
                                <option value="{{$checkbooks->status}}">{{$checkbooks->status}}</option>
                               
                            </select> -->
                            </div>
                            </br>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Edit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- list client -->


        @endsection