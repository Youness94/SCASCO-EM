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
                   
                        <h6 class="card-title">Modifier la Compagnie <span>{{$accounts -> company_name}}</span></h6>
                   
                        <form method="POST" action="{{route('update.account')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"  value="{{$accounts->id}}">
                            <div class="mb-3">
                                <label for="account_name" class="form-label">Nom de Compte</label>
                                <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror" id="account_name" autocomplete="off" value="{{$accounts->account_name}}">
                                @error('account_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="company_desc" type="text" name="company_desc" rows="5" value="{{$companies->company_desc}}">{{$companies->company_desc}}</textarea>
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