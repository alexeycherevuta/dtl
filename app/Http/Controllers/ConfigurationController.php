<?php
namespace App\Http\Controllers;
use App\Configuration;
use Illuminate\Http\Request;
class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::orderBy('updated_at', 'DESC');
        $device_types = Configuration::select('device_type AS name')->groupBy('device_type')->get();
        $device_manufacturers = Configuration::select('device_manufacturer AS name')->groupBy('device_manufacturer')->get();
        $device_models = Configuration::select('device_model AS name')->groupBy('device_model')->get();
        $processor_manufacturers = Configuration::select('processor_manufacturer AS name')->groupBy('processor_manufacturer')->get();
        $processor_models = Configuration::select('processor_model AS name')->groupBy('processor_model')->get();
        $distributions = Configuration::select('distribution  AS name')->groupBy('distribution')->get();
        $kernels = Configuration::select('kernel AS name')->groupBy('kernel')->get();
        if (!empty(request()->device_type)) {
            $configurations->where('device_type', 'like', '%'.request()->device_type.'%');
        }
        if (!empty(request()->device_manufacturer)) {
            $configurations->where('device_manufacturer', 'like', '%'.request()->device_manufacturer.'%');
        }
        if (!empty(request()->device_model)) {
            $configurations->where('device_model', 'like', '%'.request()->device_model.'%');
        }
        if (!empty(request()->processor_manufacturer)) {
            $configurations->where('processor_manufacturer', 'like', '%'.request()->processor_manufacturer.'%');
        }
        if (!empty(request()->processor_model)) {
            $configurations->where('processor_model', 'like', '%'.request()->processor_model.'%');
        }
        if (!empty(request()->distribution)) {
            $configurations->where('distribution', 'like', '%'.request()->distribution.'%');
        }
        if (!empty(request()->kernel)) {
            $configurations->where('kernel', 'like', '%'.request()->kernel.'%');
        }
        $configurations = $configurations->simplePaginate(10);
        return view('configurations.index', compact('configurations', 'device_types', 'device_manufacturers',
                                                    'device_models', 'processor_manufacturers', 'processor_models',
                                                    'distributions', 'kernels'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show(Configuration $configuration)
    {
    }
    public function edit(Configuration $configuration)
    {
    }
    public function update(Request $request, Configuration $configuration)
    {
    }
    public function destroy(Configuration $configuration)
    {
    }
}
