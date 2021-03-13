<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Configuration extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'key',
    ];
    public static function distinctValues()
    {
        $distinctValues = [];
        $distinctValues['device_types'] = Configuration::select('device_type AS name')->whereNotNull('device_type')->groupBy('device_type')->get();
        $distinctValues['device_manufacturers'] = Configuration::select('device_manufacturer AS name')->whereNotNull('device_manufacturer')->groupBy('device_manufacturer')->get();
        $distinctValues['device_models'] = Configuration::select('device_model AS name')->whereNotNull('device_model')->groupBy('device_model')->get();
        $distinctValues['cpu_manufacturers'] = Configuration::select('cpu_manufacturer AS name')->whereNotNull('cpu_manufacturer')->groupBy('cpu_manufacturer')->get();
        $distinctValues['cpu_models'] = Configuration::select('cpu_model AS name')->whereNotNull('cpu_model')->groupBy('cpu_model')->get();
        $distinctValues['gpu_manufacturers'] = Configuration::select('gpu_manufacturer AS name')->whereNotNull('gpu_manufacturer')->groupBy('gpu_manufacturer')->get();
        $distinctValues['gpu_models'] = Configuration::select('gpu_model AS name')->whereNotNull('gpu_model')->groupBy('gpu_model')->get();
        $distinctValues['gpu_drivers'] = Configuration::select('gpu_driver AS name')->whereNotNull('gpu_driver')->groupBy('gpu_driver')->get();
        $distinctValues['distributions'] = Configuration::select('distribution AS name')->whereNotNull('distribution')->groupBy('distribution')->get();
        $distinctValues['kernels'] = Configuration::select('kernel AS name')->whereNotNull('kernel')->groupBy('kernel')->get();
        return $distinctValues;
    }
}
