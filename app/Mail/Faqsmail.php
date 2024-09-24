<?php

namespace App\Mail;

use App\Models\Faq;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FaqsMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $faqs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Faq $faqs)
    {
        //
        $this->faqs = $faqs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Drawchart - FAQs';
        //return $this->view('view.name');
        return $this->view('emails.faqs_email')
            ->with([
                'name' => $this->faqs->name,
                'email' => $this->faqs->email,
                'content' => $this->faqs->content,
                'reply' => $this->faqs->reply,
            ])
            ->subject($subject);
    }
}
