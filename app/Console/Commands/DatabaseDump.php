<?php
namespace App\Console\Commands;
use Carbon\Carbon;
use App\Configuration;
use Illuminate\Console\Command;
class DatabaseDump extends Command
{
    protected $signature = 'db:dump {--private : Dump Configurations table with keys}
                                    {--csv : Export as .csv (default: .json)}';
    protected $description = 'Dump Configurations table to ./database/data/dumps';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $date = Carbon::now()->format('Y-m-d-His');
        $this->option('csv') ? $format = '.csv' : $format = '.json';
        if ($this->option('private')) {
            if (!file_exists('./database/data/dumps/private')) {
                mkdir('./database/data/dumps/private', 0700);
            }
            $configurations = Configuration::all()->makeVisible('key')->toJson();
            $file = fopen('./database/data/dumps/private/'.$date.'_dump-private'.$format, 'w');
        } else {
            $configurations = Configuration::all()->makeHidden('id')->toJson();
            $file = fopen('./database/data/dumps/'.$date.'_dump'.$format, 'w');
        }
        if ($this->option('csv')) {
            $decodedJson = json_decode($configurations, true);
            foreach ($decodedJson as $configuration) {
                fputcsv($file, $configuration);
            }
            fclose($file);
        } else {
            fwrite($file, $configurations);
            fclose($file);
        }
        return true;
    }
}
