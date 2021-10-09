<?php
namespace App\Console\Commands;
use App\Configuration;
use Illuminate\Console\Command;
class DatabaseImport extends Command
{
    protected $signature = 'db:import
                            {filename : Name of the JSON file stored in ./database/data/dumps/{private}}
                            {--private : Import data including key}';
    protected $description = 'Import data from dump.';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $filename = $this->argument('filename');
        if ($this->option('private')) {
            $file = file_get_contents('./database/data/dumps/private/'.$filename);
        } else {
            $file = file_get_contents('./database/data/dumps/'.$filename);
        }
        $configurations = json_decode($file, true);
        $i = 1; 
        foreach ($configurations as $configuration) {
            Configuration::create([
                'device_type' => $configuration['device_type'],
                'device_manufacturer' => $configuration['device_manufacturer'],
                'device_model' => $configuration['device_model'],
                'cpu_manufacturer' => $configuration['cpu_manufacturer'],
                'cpu_model' => $configuration['cpu_model'],
                'gpu_manufacturer' => $configuration['gpu_manufacturer'],
                'gpu_model' => $configuration['gpu_model'],
                'gpu_driver' => $configuration['gpu_driver'],
                'distribution' => $configuration['distribution'],
                'kernel' => $configuration['kernel'],
                'comment' => $configuration['comment'],
                'key' => $configuration['key'],
            ]);
            dump($i);
            ++$i;
        }
    }
}
