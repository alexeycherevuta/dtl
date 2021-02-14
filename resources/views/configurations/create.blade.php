@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-12">
            <form id="createConfigurationsForm" method="post" action="{{ route('configurations.store') }}">
                @csrf
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label class="text-capitalize">Device type</label>
                            <select id="device_type" class="form-control" name="device_type" multiple>
                                @foreach($distinctValues['device_types'] as $device_type)
                                <option value="{{ $device_type->name }}"
                                    {{ request()->device_type == $device_type->name ? 'selected' : '' }}>
                                    {{ $device_type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="device_manufacturer" class="text-capitalize">Manufacturer</label>
                            <select id="device_manufacturer" class="form-control" name="device_manufacturer" multiple>
                                @foreach($distinctValues['device_manufacturers'] as $device_manufacturer)
                                <option value="{{ $device_manufacturer->name }}"
                                    {{ request()->device_manufacturer == $device_manufacturer->name ? 'selected' : '' }}>
                                    {{ $device_manufacturer->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="device_model" class="text-capitalize">Device model</label>
                            <select id="device_model" class="form-control" name="device_model" multiple>
                                @foreach($distinctValues['device_models'] as $device_model)
                                <option value="{{ $device_model->name }}"
                                    {{ request()->device_model == $device_model->name ? 'selected' : '' }}>
                                    {{ $device_model->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="cpu_manufacturer" class="text-capitalize">CPU manufacturer</label>
                            <select id="cpu_manufacturer" class="form-control" name="cpu_manufacturer" multiple>
                                @foreach($distinctValues['cpu_manufacturers'] as $cpu_manufacturer)
                                <option value="{{ $cpu_manufacturer->name }}"
                                    {{ request()->cpu_manufacturer == $cpu_manufacturer->name ? 'selected' : '' }}>
                                    {{ $cpu_manufacturer->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cpu_model" class="text-capitalize">CPU model</label>
                            <select id="cpu_model" class="form-control" name="cpu_model" multiple>
                                @foreach($distinctValues['cpu_models'] as $cpu_model)
                                <option value="{{ $cpu_model->name }}"
                                    {{ request()->cpu_model == $cpu_model->name ? 'selected' : '' }}>
                                    {{ $cpu_model->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="distribution" class="text-capitalize">Distribution</label>
                            <select id="distribution" class="form-control" name="distribution" multiple>
                                @foreach($distinctValues['distributions'] as $distribution)
                                <option value="{{ $distribution->name }}"
                                    {{ request()->distribution == $distribution->name ? 'selected' : '' }}>
                                    {{ $distribution->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kernel" class="text-capitalize">Kernel</label>
                            <select id="kernel" class="form-control" name="kernel" multiple>
                                @foreach($distinctValues['kernels'] as $kernel)
                                <option value="{{ $kernel->name }}"
                                    {{ request()->kernel == $kernel->name ? 'selected' : '' }}>
                                    {{ $kernel->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-success text-uppercase font-weight-bold">
                                <i class="fas fa-check mr-2"></i>Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#device_type').select2({
            placeholder: "Laptop, Desktop, ...",
            tags: true,
            maximumSelectionLength: 1,
        });
        $('#device_manufacturer').select2({
            placeholder: "Acer, Dell, HP, Apple, Lenovo, ...",
            tags: true,
            maximumSelectionLength: 1,
        });
        $('#device_model').select2({
            placeholder: "Thinkpad E495, MacBook Air 13\" MQD32D/A, Precision 3540, ...",
            tags: true,
            maximumSelectionLength: 1,
        });
        $('#cpu_manufacturer').select2({
            placeholder: "AMD, Intel, ...",
            tags: true,
            maximumSelectionLength: 1,
        });
        $('#cpu_model').select2({
            placeholder: "i7-9700K, i9-9900K, Ryzen 5 1600X, ...",
            tags: true,
            maximumSelectionLength: 1,
        });
        $('#distribution').select2({
            placeholder: "Ubuntu 19.04, Manjaro 18.1, Fedora 30, ...",
            tags: true,
            maximumSelectionLength: 1,
        });
        $('#kernel').select2({
            placeholder: "4.20-rc4, 3.18-rc3, 5.2, ...",
            tags: true,
            maximumSelectionLength: 1,
        });
    });
</script>
@endsection
