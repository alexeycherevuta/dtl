<?php
namespace App\Mail;
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
        return $this->to(config('app.ADMIN_EMAIL'))
                    ->subject('Configuration created: #'.$this->configuration->id.' ['.$this->created_at->format('d.m.Y').']')
                    ->markdown('emails.configurations.created', ['configuration' => $this->configuration]);
    }
}
