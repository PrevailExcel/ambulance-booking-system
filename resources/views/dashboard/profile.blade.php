@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h4 class="card-header bg-light">Profile</h4>
                    <div class="card-body">
                        
                    <div class="row my-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Name</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Phone number</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->phone }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Email</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Registered</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d M, Y') }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
