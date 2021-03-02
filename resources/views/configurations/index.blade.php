@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <form id="filterConfigurationsForm" method="get" action="{{ route('configurations.index') }}">
                @csrf
                <div class="accordion my-3" id="accordionFilter">
                    <div class="card">
                        <a type="button" data-toggle="collapse" data-target="#deviceCollapse" aria-expanded="true"
                            aria-controls="deviceCollapse" data-parent="#filterConfigurationsForm">
                            <div class="card-header py-0" id="headingDevice">
                                <button class="btn btn-link dropdown-toggle px-0 text-uppercase">
                                    Device
                                </button>
                            </div>
                        </a>
                        <div id="deviceCollapse" class="collapse show" aria-labelledby="headingDevice"
                            data-parent="#accordionFilter">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <label class="text-capitalize">Type</label>
                                            <select id="device_type" class="form-control" name="device_type">
                                                <option value="" {{ request()->device_type ? '' : 'selected' }}>-
                                                </option>
                                                @foreach($distinctValues['device_types'] as $device_type)
                                                <option value="{{ $device_type->name }}"
                                                    {{ request()->device_type == $device_type->name ? 'selected' : '' }}>
                                                    {{ $device_type->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <label for="device_manufacturer"
                                                class="text-capitalize">Manufacturer</label>
                                            <select id="device_manufacturer" class="form-control"
                                                name="device_manufacturer">
                                                <option value="" {{ request()->device_manufacturer ? '' : 'selected' }}>
                                                    -
                                                </option>
                                                @foreach($distinctValues['device_manufacturers'] as
                                                $device_manufacturer)
                                                <option value="{{ $device_manufacturer->name }}"
                                                    {{ request()->device_manufacturer == $device_manufacturer->name ? 'selected' : '' }}>
                                                    {{ $device_manufacturer->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <label for="device_model" class="text-capitalize">Model</label>
                                            <select id="device_model" class="form-control" name="device_model">
                                                <option value="" {{ request()->device_model ? '' : 'selected' }}>-
                                                </option>
                                                @foreach($distinctValues['device_models'] as $device_model)
                                                <option value="{{ $device_model->name }}"
                                                    {{ request()->device_model == $device_model->name ? 'selected' : '' }}>
                                                    {{ $device_model->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a type="button" data-toggle="collapse" data-target="#cpuCollapse" aria-expanded="false"
                            aria-controls="cpuCollapse" data-parent="#filterConfigurationsForm">
                            <div class="card-header py-0" id="headingCpu">
                                <button class="btn btn-link dropdown-toggle px-0">
                                    CPU
                                </button>
                            </div>
                        </a>
                        <div id="cpuCollapse" class="collapse show" aria-labelledby="headingCpu"
                            data-parent="#accordionFilter">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <label for="cpu_manufacturer" class="text-capitalize">Manufacturer</label>
                                            <select id="cpu_manufacturer" class="form-control" name="cpu_manufacturer">
                                                <option value="" {{ request()->cpu_manufacturer ? '' : 'selected' }}>-
                                                </option>
                                                @foreach($distinctValues['cpu_manufacturers'] as $cpu_manufacturer)
                                                <option value="{{ $cpu_manufacturer->name }}"
                                                    {{ request()->cpu_manufacturer == $cpu_manufacturer->name ? 'selected' : '' }}>
                                                    {{ $cpu_manufacturer->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <label for="cpu_model" class="text-capitalize">Model</label>
                                            <select id="cpu_model" class="form-control" name="cpu_model">
                                                <option value="" {{ request()->cpu_model ? '' : 'selected' }}>-</option>
                                                @foreach($distinctValues['cpu_models'] as $cpu_model)
                                                <option value="{{ $cpu_model->name }}"
                                                    {{ request()->cpu_model == $cpu_model->name ? 'selected' : '' }}>
                                                    {{ $cpu_model->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a type="button" data-toggle="collapse" data-target="#collapseLinux" aria-expanded="false"
                            aria-controls="collapseLinux" data-parent="#filterConfigurationsForm">
                            <div class="card-header py-0" id="headingLinux">
                                <button class="btn btn-link dropdown-toggle px-0 text-uppercase">
                                    Linux
                                </button>
                            </div>
                        </a>
                        <div id="collapseLinux" class="collapse show" aria-labelledby="headingLinux"
                            data-parent="#accordionFilter">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <label for="distribution" class="text-capitalize">Distribution</label>
                                            <select id="distribution" class="form-control" name="distribution">
                                                <option value="" {{ request()->distribution ? '' : 'selected' }}>-
                                                </option>
                                                @foreach($distinctValues['distributions'] as $distribution)
                                                <option value="{{ $distribution->name }}"
                                                    {{ request()->distribution == $distribution->name ? 'selected' : '' }}>
                                                    {{ $distribution->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <label for="kernel" class="text-capitalize">Kernel</label>
                                            <select id="kernel" class="form-control" name="kernel">
                                                <option value="" {{ request()->kernel ? '' : 'selected' }}>-</option>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-center justify-content-sm-end">
                            <a href="{{ route('configurations.create') }}"
                                class="btn btn-success text-uppercase font-weight-bold">
                                <i class="fas fa-plus mr-2"></i>Add
                            </a>
                            <a href="{{ route('configurations.index') }}"
                                class="btn btn-warning text-uppercase font-weight-bold ml-2">
                                <i class="fas fa-trash mr-2"></i>Clear
                            </a>
                            <button type="submit" class="btn btn-primary text-uppercase font-weight-bold ml-2">
                                <i class="fas fa-search mr-2"></i>Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if ($configurations->isNotEmpty())
    <div class="row my-3">
        <div class="col-12">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Device</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Model</th>
                        <th scope="col">CPU</th>
                        <th scope="col">Distribution</th>
                        <th scope="col">Kernel</th>
                        <th scope="col">Last edited</th>
                        <th scope="col">Show</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($configurations as $configuration)
                    <tr>
                        <th scope="row">{{ $loop->iteration + request()->page*25 }}</th>
                        <td>{{ $configuration->device_type }}</td>
                        <td>{{ $configuration->device_manufacturer }}</td>
                        <td>{{ $configuration->device_model }}</td>
                        <td>{{ $configuration->cpu_model }}</td>
                        <td>{{ $configuration->distribution }}</td>
                        <td>{{ $configuration->kernel }}</td>
                        <td>{{ $configuration->updated_at->format('d.m.Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('configurations.show', $configuration->id) }}" target="_blank"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-5 align-items-center justify-content-center">
        {{ $configurations->appends([
                                        'device_type' => request()->device_type,
                                        'device_manufacturer' => request()->device_manufacturer,
                                        'device_model' => request()->device_model,
                                        'cpu_manufacturer' => request()->cpu_manufacturer,
                                        'cpu_model' => request()->cpu_model,
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
        $('#device_type, #device_manufacturer, #device_model, #cpu_manufacturer, #cpu_model, #distribution, #kernel').select2({});
    });
</script>
@endsection
