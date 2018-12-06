<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KinoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Экземпляр заказа.
     *
     * @var Order
     */
    public $order;

    /**
     * Создание нового экземпляра сообщения.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from($this->order->mail)
                    ->view('mail');
        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()
                ->addTextHeader('Custom-Header', 'HeaderValue');
        });
    }
}
