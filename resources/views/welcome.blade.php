@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
                        <i class="fas fa-laptop-code" style="font-size: 100px;"></i>
                        <i class="fas fa-plus mx-4" style="font-size: 50px;"></i>
                        <i class="fab fa-linux" style="font-size: 100px;"></i>
                    </div>
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
                            We're trying to build a crowd-sourced, up-to-date database to reference
                            which Linux distribution runs on what hardware.
                        </p>
                    </p>
                    <div class="mt-3">
                        <a href="{{ route('configurations.create') }}"
                            class="btn btn-primary text-uppercase font-weight-bold">
                            Share your configuration!
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
</div>
@endsection
