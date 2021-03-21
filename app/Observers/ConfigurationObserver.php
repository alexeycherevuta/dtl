<?php
namespace App\Observers;
use App\Configuration;
use App\Mail\ConfigurationCreated;
use App\Mail\ConfigurationUpdated;
use Illuminate\Support\Facades\Mail;
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
