<?php
use App\Configuration;
use Illuminate\Database\Seeder;
class ConfigurationsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Configuration::class, 500)->create();
    }
}
