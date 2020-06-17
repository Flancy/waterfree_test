<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Http\Requests\Mail\DilerMailRequest;

class DilerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DilerMailRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@myhim.ru')
            ->subject('MYHIM.RU - Заявка от дилера!')
            ->view('emails.diler')
            ->with([
                'request' => $this->request
            ]);
    }
}
