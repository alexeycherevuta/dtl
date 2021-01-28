@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-12">
            <form id="filterConfigurationsForm" method="get" action="{{ route('configurations.index') }}">
                @csrf
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label class="text-capitalize">Device type</label>
                            <select id="device_type" class="form-control" name="device_type">
                                <option value="" {{ request()->device_type ? '' : 'selected' }}>-</option>
                                @foreach($device_types as $device_type)
                                <option value="{{ $device_type->name }}"
                                    {{ request()->device_type == $device_type->name ? 'selected' : '' }}>
                                    {{ $device_type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="device_vendor" class="text-capitalize">Device vendor</label>
                            <select id="device_vendor" class="form-control" name="device_vendor">
                                <option value="" {{ request()->device_vendor ? '' : 'selected' }}>-</option>
                                @foreach($device_vendors as $device_vendor)
                                <option value="{{ $device_vendor->name }}"
                                    {{ request()->device_vendor == $device_vendor->name ? 'selected' : '' }}>
                                    {{ $device_vendor->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="device_model" class="text-capitalize">Device model</label>
                            <select id="device_model" class="form-control" name="device_model">
                                <option value="" {{ request()->device_model ? '' : 'selected' }}>-</option>
                                @foreach($device_models as $device_model)
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
                            <label for="processor_vendor" class="text-capitalize">Processor vendor</label>
                            <select id="processor_vendor" class="form-control" name="processor_vendor">
                                <option value="" {{ request()->processor_vendor ? '' : 'selected' }}>-</option>
                                @foreach($processor_vendors as $processor_vendor)
                                <option value="{{ $processor_vendor->name }}"
                                    {{ request()->processor_vendor == $processor_vendor->name ? 'selected' : '' }}>
                                    {{ $processor_vendor->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="processor_model" class="text-capitalize">Processor model</label>
                            <select id="processor_model" class="form-control" name="processor_model">
                                <option value="" {{ request()->processor_model ? '' : 'selected' }}>-</option>
                                @foreach($processor_models as $processor_model)
                                <option value="{{ $processor_model->name }}"
                                    {{ request()->processor_model == $processor_model->name ? 'selected' : '' }}>
                                    {{ $processor_model->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="distribution" class="text-capitalize">Distribution</label>
                            <select id="distribution" class="form-control" name="distribution">
                                <option value="" {{ request()->distribution ? '' : 'selected' }}>-</option>
                                @foreach($distributions as $distribution)
                                <option value="{{ $distribution->name }}"
                                    {{ request()->distribution == $distribution->name ? 'selected' : '' }}>
                                    {{ $distribution->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kernel" class="text-capitalize">Kernel</label>
                            <select id="kernel" class="form-control" name="kernel">
                                <option value="" {{ request()->kernel ? '' : 'selected' }}>-</option>
                                @foreach($kernels as $kernel)
                                <option value="{{ $kernel->name }}"
                                    {{ request()->kernel == $kernel->name ? 'selected' : '' }}>
                                    {{ $kernel->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary text-uppercase font-weight-bold"
                                value="Search" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if ($configurations->isNotEmpty())
    <div class="row my-5">
        <div class="col-12">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Device</th>
                        <th scope="col">Vendor</th>
                        <th scope="col">Model</th>
                        <th scope="col">Processor</th>
                        <th scope="col">Distribution</th>
                        <th scope="col">Kernel</th>
                        <th scope="col">Last edited</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($configurations as $configuration)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $configuration->device_type }}</td>
                        <td>{{ $configuration->device_vendor }}</td>
                        <td>{{ $configuration->device_model }}</td>
                        <td>{{ $configuration->processor_model }}</td>
                        <td>{{ $configuration->distribution }}</td>
                        <td>{{ $configuration->kernel }}</td>
                        <td>{{ $configuration->updated_at->format('d.m.Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row my-5 align-items-center justify-content-center">
        {{ $configurations->appends([
                                        'device_type' => request()->device_type,
                                        'device_vendor' => request()->device_vendor,
                                        'device_model' => request()->device_model,
                                        'processor_vendor' => request()->processor_vendor,
                                        'processor_model' => request()->processor_model,
                                        'distribution' => request()->distribution,
                                        'kernel' => request()->kernel,
                                    ])->links() }}
    </div>
    @else
    <div class="row my-5">
        <div class="col-12 justify-content-center">
            <p class="text-center m-0">
                <i class="fas fa-ban mb-3" style="font-size: 50px;"></i><br>
                No results found.
            </p>
        </div>
    </div>
    @endif
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#device_type, #device_vendor, #device_model, #processor_vendor, #processor_model, #distribution, #kernel').select2({});
    });
</script>
@endsection
