<?php
namespace App\Console\Commands;
use Carbon\Carbon;
use App\Configuration;
use Illuminate\Console\Command;
class DatabaseDump extends Command
{
    protected $signature = 'db:dump {--private : Dump Configurations table with keys}';
    protected $description = 'Dump Configurations table to ./database/data/dumps';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $date = Carbon::now()->format('Y-m-d-His');
        if ($this->option('private')) {
            if (!file_exists('./database/data/dumps/private')){
                mkdir("./database/data/dumps/private", 0700);
            }
            $configurations = Configuration::all()->makeVisible('key')->toJson();
            $file = fopen('./database/data/dumps/private/'.$date.'_dump-private.json', 'w');
        } else{
            $configurations = Configuration::all()->makeHidden('id')->toJson();
            $file = fopen('./database/data/dumps/'.$date.'_dump.json', 'w');
        }
        fwrite($file, $configurations);
        fclose($file);
        return true;
    }
}
