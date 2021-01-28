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
        $device_vendors = Configuration::select('device_vendor AS name')->groupBy('device_vendor')->get();
        $device_models = Configuration::select('device_model AS name')->groupBy('device_model')->get();
        $processor_vendors = Configuration::select('processor_vendor AS name')->groupBy('processor_vendor')->get();
        $processor_models = Configuration::select('processor_model AS name')->groupBy('processor_model')->get();
        $distributions = Configuration::select('distribution  AS name')->groupBy('distribution')->get();
        $kernels = Configuration::select('kernel AS name')->groupBy('kernel')->get();
        if (!empty(request()->device_type)) {
            $configurations->where('device_type', 'like', '%'.request()->device_type.'%');
        }
        if (!empty(request()->device_vendor)) {
            $configurations->where('device_vendor', 'like', '%'.request()->device_vendor.'%');
        }
        if (!empty(request()->device_model)) {
            $configurations->where('device_model', 'like', '%'.request()->device_model.'%');
        }
        if (!empty(request()->processor_vendor)) {
            $configurations->where('processor_vendor', 'like', '%'.request()->processor_vendor.'%');
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
        return view('configurations.index', compact('configurations', 'device_types', 'device_vendors',
                                                    'device_models', 'processor_vendors', 'processor_models',
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
