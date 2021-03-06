<?php
namespace App\Mail;
use App\Configuration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class ConfigurationCreated extends Mailable
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
                    ->subject('Configuration created: #'.$this->configuration->id.' ['.$this->configuration->created_at->format('d.m.Y | H:i:s').']')
                    ->markdown('emails.configurations.created', ['configuration' => $this->configuration]);
    }
}
