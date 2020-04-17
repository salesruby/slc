<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailCron extends Mailable
{
    use Queueable, SerializesModels;

    protected $lead;
    protected $title;
    protected $message;

    /**
     * EmailCron constructor.
     * @param $lead
     * @param $title
     * @param $message
     */
    public function __construct($lead, $title, $message)
    {
        $this->title = $title;
        $this->lead = $lead;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('oyindamola.sofoluwe@salesruby.com', 'SalesRuby')->subject($this->title)->view($this->message)->with('lead', $this->lead);
    }
}
