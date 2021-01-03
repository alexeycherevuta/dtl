@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <div class="card shadow">
                <p class="text-center my-5">
                    <i class="fas fa-laptop-code" style="font-size: 100px;"></i>
                </p>
                <div class="card-body">
                    <h1>Does it run Linux?</h1>
                    <h4 class="card-title">Share your hardware configuration</h4>
                    <p class="card-text">
                        <p>
                            We've all been there: enthusiastically ordered a new laptop/desktop but one question
                            remained:
                        </p>
                        <p>
                            <h5><strong>Does it run my favorite distro?</strong></h5>
                        </p>
                        <p>
                            Don't worry - we're here to help!<br>
                            We're trying to build an crowd-sourced, up-to-date database to reference
                            which Linux distribution runs on what hardware.
                        </p>
                    </p>
                    <div class="mt-3">
                        <a href="#configuration-form" class="btn btn-primary text-uppercase font-weight-bold">
                            Drop your configuration!
                        </a>
                        <a href="{{ route('configurations.index') }}"
                            class="btn btn-warning text-uppercase font-weight-bold ml-0 mt-3 ml-sm-2 mt-sm-0">
                            Does it run?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <div id="configuration-form" class="card shadow">
                <form action="{{ route('configurations.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                value="{{ old('first_name') }}" placeholder="VORNAME*" autofocus>
                            @error('first_name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input id="last_name" type="text"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{ old('last_name') }}" placeholder="NACHNAME*">
                            @error('last_name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary text-uppercase font-weight-bold">
                                Share
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <p class="text-center">
            <a href="{{ route('configurations.index') }}">Take me to the database!</a>
        </p>
    </div>
</div>
</div>
@endsection
