<?php

use App\Models\User;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get("mail", function () {
    $user = User::find(4);
    Mail::to($user->email)->send(new TestMail($user));
    dd("Mail success");
});

Route::get("rawMail", function () {
    $user = User::find(1);
    Mail::raw('Welcome to our platform!', function ($message) use ($user) {
        $message->to($user->email)
            ->subject('Welcome Email');
    });
    dd("raw mail success");
});


// Mail::raw('This is a plain text message.', function ($message) {
//     $message->to('recipient@example.com')
//             ->from('sender@example.com', 'Sender Name')
//             ->cc('cc@example.com')
//             ->bcc('bcc@example.com')
//             ->subject('Plain Text Email with CC and BCC');
// });


// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Attachment;

// class InvoiceMail extends Mailable
// {
//     public function build()
//     {
//         return $this->view('emails.invoice');
//     }

//     public function attachments(): array
//     {
//         return [
//             Attachment::fromPath(storage_path('invoices/invoice.pdf'))
//                       ->as('Customer_Invoice.pdf')
//                       ->withMime('application/pdf')
//         ];
//     }
// }
