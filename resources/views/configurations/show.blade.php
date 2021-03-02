@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <h1>Configuration #{{ $configuration->id }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h5 class="text-primary text-uppercase font-weight-bold">Device</h5>
            <p>
                <strong>Type:</strong> {{ $configuration->device_type }} <br>
                <strong>Manufacturer:</strong> {{ $configuration->device_manufacturer }} <br>
                <strong>Model:</strong> {{ $configuration->device_model }}
            </p>
        </div>
        <div class="col-4">
            <h5 class="text-primary text-uppercase font-weight-bold">CPU</h5>
            <p>
                <strong>Manufacturer:</strong> {{ $configuration->cpu_manufacturer }} <br>
                <strong>Model:</strong> {{ $configuration->cpu_model }}
            </p>
        </div>
        <div class="col-4">
            <h5 class="text-primary text-uppercase font-weight-bold">Linux</h5>
            <p>
                <strong>Distribution:</strong> {{ $configuration->distribution }} <br>
                <strong>Kernel:</strong> {{ $configuration->kernel }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h5 class="text-primary text-uppercase font-weight-bold">Meta</h5>
            <p>
                <strong>Comment:</strong><br>
                {{ $configuration->comment }}
            </p>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
</script>
@endsection
