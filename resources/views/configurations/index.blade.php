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
                            <label for="device_manufacturer" class="text-capitalize">Manufacturer</label>
                            <select id="device_manufacturer" class="form-control" name="device_manufacturer">
                                <option value="" {{ request()->device_manufacturer ? '' : 'selected' }}>-</option>
                                @foreach($device_manufacturers as $device_manufacturer)
                                <option value="{{ $device_manufacturer->name }}"
                                    {{ request()->device_manufacturer == $device_manufacturer->name ? 'selected' : '' }}>
                                    {{ $device_manufacturer->name }}
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
                            <label for="processor_manufacturer" class="text-capitalize">Processor manufacturer</label>
                            <select id="processor_manufacturer" class="form-control" name="processor_manufacturer">
                                <option value="" {{ request()->processor_manufacturer ? '' : 'selected' }}>-</option>
                                @foreach($processor_manufacturers as $processor_manufacturer)
                                <option value="{{ $processor_manufacturer->name }}"
                                    {{ request()->processor_manufacturer == $processor_manufacturer->name ? 'selected' : '' }}>
                                    {{ $processor_manufacturer->name }}
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
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary text-uppercase font-weight-bold">
                                <i class="fas fa-search mr-2"></i>Search
                            </button>
                            <a href="{{ route('configurations.index') }}"
                                class="btn btn-warning text-uppercase font-weight-bold ml-0 mt-3 ml-sm-2 mt-sm-0">
                                <i class="fas fa-trash mr-2"></i>Clear
                            </a>
                            <a href="{{ route('configurations.create') }}"
                                class="btn btn-success text-uppercase font-weight-bold ml-0 mt-3 ml-sm-2 mt-sm-0">
                                <i class="fas fa-plus mr-2"></i>Add
                            </a>
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
                        <th scope="col">Manufacturer</th>
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
                        <th scope="row">{{ $loop->iteration + request()->page*10 }}</th>
                        <td>{{ $configuration->device_type }}</td>
                        <td>{{ $configuration->device_manufacturer }}</td>
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
                                        'device_manufacturer' => request()->device_manufacturer,
                                        'device_model' => request()->device_model,
                                        'processor_manufacturer' => request()->processor_manufacturer,
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
        $('#device_type, #device_manufacturer, #device_model, #processor_manufacturer, #processor_model, #distribution, #kernel').select2({});
    });
</script>
@endsection
