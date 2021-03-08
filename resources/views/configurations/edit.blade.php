@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <h1>Edit Configuration <strong>#{{ $configuration->id}}</strong></h1>
            <div class="alert alert-warning mt-5" role="alert">
                <h5 class="font-weight-bold"><i class="fas fa-exclamation-circle mr-2"></i>Attention</h5>
                <strong>
                    Your unique edit link:
                </strong>
                <br>
                <div class="text-truncate text-primary my-2">
                    <a href="{{route('configurations.edit', [$configuration->id, $configuration->key])}}">
                        <i class="fas fa-external-link-alt"></i>
                        {{route('configurations.edit', [$configuration->id, $configuration->key])}}
                    </a>
                </div>
                With this unique link you can always come back here and <strong>edit</strong> or <strong>delete</strong>
                your configuration.
            </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-12">
            <form id="editConfigurationsForm" method="post"
                action="{{ route('configurations.update', [$configuration->id, $configuration->key]) }}">
                @csrf
                @method('PATCH')
                <h5 class="text-primary text-uppercase font-weight-bold">Device</h5>
                <p class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod error tempore quas
                    ipsam ipsum non
                    expedita odio, laboriosam, velit ipsa iste deleniti cum reiciendis ad soluta nobis iure a
                    temporibus.
                </p>
                <div class="form-row my-2">
                    <div class="col">
                        <div class="form-group">
                            <label class="font-weight-bold">Type:</label>
                            <select id="device_type" class="form-control" name="device_type" multiple>
                                @foreach($distinctValues['device_types'] as $device_type)
                                <option value="{{ $device_type->name }}" @if ($device_type->name ==
                                    $configuration->device_type) selected="selected" @endif>
                                    {{ $device_type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="device_manufacturer" class="font-weight-bold">Manufacturer:</label>
                            <select id="device_manufacturer" class="form-control" name="device_manufacturer" multiple>
                                @foreach($distinctValues['device_manufacturers'] as $device_manufacturer)
                                <option value="{{ $device_manufacturer->name }}" @if ($device_manufacturer->name ==
                                    $configuration->device_manufacturer) selected="selected" @endif>
                                    {{ $device_manufacturer->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="device_model" class="font-weight-bold">Model:</label>
                            <select id="device_model" class="form-control" name="device_model" multiple>
                                @foreach($distinctValues['device_models'] as $device_model)
                                {{ request()->device_manufacturer == $device_manufacturer->name ? 'selected' : '' }}>
                                <option value="{{ $device_model->name }}" @if ($device_model->name ==
                                    $configuration->device_model) selected="selected" @endif>
                                    {{ $device_model->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="text-primary font-weight-bold">CPU</h5>
                <p class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod error tempore quas ipsam ipsum non
                    expedita odio, laboriosam, velit ipsa iste deleniti cum reiciendis ad soluta nobis iure a
                    temporibus.
                </p>
                <div class="form-row my-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="cpu_manufacturer" class="font-weight-bold">Manufacturer:</label>
                            <select id="cpu_manufacturer" class="form-control" name="cpu_manufacturer" multiple>
                                @foreach($distinctValues['cpu_manufacturers'] as $cpu_manufacturer)
                                <option value="{{ $cpu_manufacturer->name }}" @if ($cpu_manufacturer->name ==
                                    $configuration->cpu_manufacturer) selected="selected" @endif>
                                    {{ $cpu_manufacturer->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="cpu_model" class="font-weight-bold">Model:</label>
                            <select id="cpu_model" class="form-control" name="cpu_model" multiple>
                                @foreach($distinctValues['cpu_models'] as $cpu_model)
                                <option value="{{ $cpu_model->name }}" @if ($cpu_model->name ==
                                    $configuration->cpu_model) selected="selected" @endif>
                                    {{ $cpu_model->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="text-primary text-uppercase font-weight-bold">Linux</h5>
                <p class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod error tempore quas ipsam ipsum non
                    expedita odio, laboriosam, velit ipsa iste deleniti cum reiciendis ad soluta nobis iure a
                    temporibus.
                </p>
                <div class="form-row my-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="distribution" class="font-weight-bold">Distribution:</label>
                            <select id="distribution" class="form-control" name="distribution" multiple>
                                @foreach($distinctValues['distributions'] as $distribution)
                                <option value="{{ $distribution->name }}" @if ($distribution->name ==
                                    $configuration->distribution) selected="selected" @endif>
                                    {{ $distribution->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="kernel" class="font-weight-bold">Kernel:</label>
                            <select id="kernel" class="form-control" name="kernel" multiple>
                                @foreach($distinctValues['kernels'] as $kernel)
                                <option value="{{ $kernel->name }}" @if ($kernel->name ==
                                    $configuration->kernel) selected="selected" @endif>
                                    {{ $kernel->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="text-primary text-uppercase font-weight-bold">Meta</h5>
                <p class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod error tempore quas ipsam ipsum non
                    expedita odio, laboriosam, velit ipsa iste deleniti cum reiciendis ad soluta nobis iure a
                    temporibus.
                </p>
                <div class="form-row my-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="comment" class="font-weight-bold">Comment:</label>
                            <textarea class="form-control" id="comment" rows="5"
                                name="comment">{{ $configuration->comment }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group d-flex justify-content-end">
                            <button id="buttonDeleteConfiguration" type="button"
                                class="btn btn-danger text-uppercase font-weight-bold">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                            <button type="submit" class="btn btn-warning text-uppercase font-weight-bold ml-2">
                                <i class="fas fa-check mr-2"></i>Edit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <form id="formDeleteConfiguration"
                action="{{ route('configurations.destroy', [$configuration->id, $configuration->key]) }}" method="POST">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        /* SELECT 2 */
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
        /* DELETE CONFIGURATION */
        $('#buttonDeleteConfiguration').click(function() {
            $('#formDeleteConfiguration').submit();
        });
        $("#formDeleteConfiguration").on("submit", function(){
            return confirm("Are you sure you want to delete this configuration?");
        });
    });
</script>
@endsection
