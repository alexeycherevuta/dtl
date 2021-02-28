<?php
namespace App\Http\Controllers;
use App\Configuration;
use Illuminate\Http\Request;
class ConfigurationController extends Controller
{
    public function distinctValues()
    {
        $distinctValues = [];
        $distinctValues['device_types'] = Configuration::select('device_type AS name')->groupBy('device_type')->get();
        $distinctValues['device_manufacturers'] = Configuration::select('device_manufacturer AS name')->groupBy('device_manufacturer')->get();
        $distinctValues['device_models'] = Configuration::select('device_model AS name')->groupBy('device_model')->get();
        $distinctValues['cpu_manufacturers'] = Configuration::select('cpu_manufacturer AS name')->groupBy('cpu_manufacturer')->get();
        $distinctValues['cpu_models'] = Configuration::select('cpu_model AS name')->groupBy('cpu_model')->get();
        $distinctValues['distributions'] = Configuration::select('distribution AS name')->groupBy('distribution')->get();
        $distinctValues['kernels'] = Configuration::select('kernel AS name')->groupBy('kernel')->get();
        return $distinctValues;
    }
    public function index()
    {
        $configurations = Configuration::orderBy('updated_at', 'DESC');
        if (!empty(request()->device_type)) {
            $configurations->where('device_type', 'like', '%'.request()->device_type.'%');
        }
        if (!empty(request()->device_manufacturer)) {
            $configurations->where('device_manufacturer', 'like', '%'.request()->device_manufacturer.'%');
        }
        if (!empty(request()->device_model)) {
            $configurations->where('device_model', 'like', '%'.request()->device_model.'%');
        }
        if (!empty(request()->cpu_manufacturer)) {
            $configurations->where('cpu_manufacturer', 'like', '%'.request()->cpu_manufacturer.'%');
        }
        if (!empty(request()->cpu_model)) {
            $configurations->where('cpu_model', 'like', '%'.request()->cpu_model.'%');
        }
        if (!empty(request()->distribution)) {
            $configurations->where('distribution', 'like', '%'.request()->distribution.'%');
        }
        if (!empty(request()->kernel)) {
            $configurations->where('kernel', 'like', '%'.request()->kernel.'%');
        }
        $configurations = $configurations->simplePaginate(25);
        $distinctValues = $this->distinctValues();
        return view('configurations.index', compact('configurations', 'distinctValues'));
    }
    public function create()
    {
        $distinctValues = $this->distinctValues();
        return view('configurations.create', compact('distinctValues'));
    }
    public function store(Request $request)
    {
        return redirect()->route('configurations.index')->with('success', 'Submission successfull!');
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
