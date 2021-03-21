<?php
namespace App\Mail;
use App\Configuration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class ConfigurationUpdated extends Mailable
{
    use Queueable, SerializesModels;
    private $configuration;
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }
    public function build()
    {
        return $this->to(env('ADMIN_EMAIL'))
                    ->subject('Configuration updated: #'.$this->configuration->id.' ['.$this->configuration->updated_at->format('d.m.Y | H:i:s').']')
                    ->markdown('emails.configurations.updated', ['configuration' => $this->configuration]);
    }
}
