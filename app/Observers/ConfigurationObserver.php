<?php
namespace App\Observers;
use App\Configuration;
class ConfigurationObserver
{
    public function created(Configuration $configuration)
    {
        Mail::send(new ConfigurationCreated($configuration));
    }
    public function updated(Configuration $configuration)
    {
        Mail::send(new ConfigurationUpdated($configuration));
    }
}
