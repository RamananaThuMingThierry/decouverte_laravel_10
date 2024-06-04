<?php

namespace App\Mail;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public Property $property;
    public array $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Property $property, array $data)
    {
        $this->property = $property;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->to($this->data['email'])
                    ->subject('Demande un contact')
                    ->markdown('emails.property.contact')
                    ->with([
                        'property' => $this->property,
                        'data' => $this->data,
                    ]);
    }
}
