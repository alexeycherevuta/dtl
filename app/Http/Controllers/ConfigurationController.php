<?php
namespace App\Http\Controllers;
use App\Configuration;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class ConfigurationController extends Controller
{
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
        if (!empty(request()->gpu_manufacturer)) {
            $configurations->where('gpu_manufacturer', 'like', '%'.request()->gpu_manufacturer.'%');
        }
        if (!empty(request()->gpu_model)) {
            $configurations->where('gpu_model', 'like', '%'.request()->gpu_model.'%');
        }
        if (!empty(request()->gpu_driver)) {
            $configurations->where('gpu_driver', 'like', '%'.request()->gpu_driver.'%');
        }
        if (!empty(request()->distribution)) {
            $configurations->where('distribution', 'like', '%'.request()->distribution.'%');
        }
        if (!empty(request()->kernel)) {
            $configurations->where('kernel', 'like', '%'.request()->kernel.'%');
        }
        $configurations = $configurations->simplePaginate(25);
        $distinctValues = Configuration::distinctValues();
        return view('configurations.index', compact('configurations', 'distinctValues'));
    }
    public function create()
    {
        $distinctValues = Configuration::distinctValues();
        return view('configurations.create', compact('distinctValues'));
    }
    public function store(Request $request)
    {
        $configuration = Configuration::create([
            'device_type' => $request->device_type,
            'device_manufacturer' => $request->device_manufacturer,
            'device_model' => $request->device_model,
            'cpu_manufacturer' => $request->cpu_manufacturer,
            'cpu_model' => $request->cpu_model,
            'gpu_manufacturer' => $request->gpu_manufacturer,
            'gpu_model' => $request->gpu_model,
            'gpu_driver' => $request->gpu_driver,
            'distribution' => $request->distribution,
            'kernel' => $request->kernel,
            'comment' => $request->comment,
            'key' => Str::random(50),
        ]);
        return redirect()->route('configurations.edit', [$configuration->id, $configuration->key])->with('success', 'Configuration #'.$configuration->id.' successfully created. Thanks for your time!');
    }
    public function show(Configuration $configuration)
    {
        return view('configurations.show', compact('configuration'));
    }
    public function edit(Configuration $configuration, $key)
    {
        $this->authorize('update', [$configuration, $key]);
        $distinctValues = Configuration::distinctValues();
        return view('configurations.edit', compact('configuration', 'distinctValues'));
    }
    public function update(Configuration $configuration, $key)
    {
        $this->authorize('update', [$configuration, $key]);
        $configuration->device_type = empty(request()->device_type) ? null : request()->device_type;
        $configuration->device_manufacturer = empty(request()->device_manufacturer) ? null : request()->device_manufacturer;
        $configuration->device_model = empty(request()->device_model) ? null : request()->device_model;
        $configuration->cpu_manufacturer = empty(request()->cpu_manufacturer) ? null : request()->cpu_manufacturer;
        $configuration->cpu_model = empty(request()->cpu_model) ? null : request()->cpu_model;
        $configuration->gpu_manufacturer = empty(request()->gpu_manufacturer) ? null : request()->gpu_manufacturer;
        $configuration->gpu_model = empty(request()->gpu_model) ? null : request()->gpu_model;
        $configuration->gpu_driver = empty(request()->gpu_driver) ? null : request()->gpu_driver;
        $configuration->distribution = empty(request()->distribution) ? null : request()->distribution;
        $configuration->kernel = empty(request()->kernel) ? null : request()->kernel;
        $configuration->comment = empty(request()->comment) ? null : request()->comment;
        $configuration->save();
        return redirect()->route('configurations.edit', [$configuration->id, $configuration->key])->with('success', 'Successfully updated Configuration #'.$configuration->id.'.');
    }
    public function destroy(Configuration $configuration, $key)
    {
        $this->authorize('delete', [$configuration, $key]);
        $configuration->delete();
        return redirect()->route('configurations.index')->with('success', 'Configuration #'.$configuration->id.' successfully deleted!');
    }
}
