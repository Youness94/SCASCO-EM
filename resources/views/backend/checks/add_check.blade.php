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
                              <!-- resources/views/checkbooks/show.blade.php -->

                              <h1>Checkbook Details</h1>
                              <p>Series: {{ $checkbook->series }}</p>
                              <p>Start Number: {{ $checkbook->start_number }}</p>
                              <p>Quantity: {{ $checkbook->quantity }}</p>

                              @if ($checkbook->checks()->count() < $checkbook->quantity)
                              <form method="POST" action="{{ route('fillSchedule', $checkbook->id) }}">
                                    @csrf
                                    <button type="submit">Fill Check Schedule Automatically</button>
                              </form>
                              @else
                              <p>Checkbook is already filled.</p>
                              @endif

                    </div>
                </div>
            </div>
        </div>
       

        @endsection