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
                        <h6 class="card-title">Edit Type de Réglement</h6>


                        <form method="POST" action="{{route('update.type-transfers')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"  value="{{$typetransfers->id}}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Type</label>
                                <input type="text" name="type_transfer" class="form-control @error('type_transfer') is-invalid @enderror" id="type_transfer" autocomplete="off" value="{{$typetransfers->type_transfer}}">
                                @error('type_transfer')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" type="text" name="description" rows="5" value="{{$typetransfers->description}}"></textarea>
                                    </div>
                                </div>
                            </div></br>
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