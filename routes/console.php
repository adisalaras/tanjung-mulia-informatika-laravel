<?php

use App\Mail\MyTestEmail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Artisan::command('send-welcome-mail', function () {
//     Mail::to('adrianramadhan881@gmail.com')->send(new MyTestEmail("adrian"));
//     // Also, you can use specific mailer if your default mailer is not "mailtrap" but you want to use it for welcome mails
//     // Mail::mailer('mailtrap')->to('testreceiver@gmail.com')->send(new WelcomeMail("Jon"));
// })->purpose('Send welcome mail');

Artisan::command('send-welcome-mail', function () {
    try {
        Mail::mailer('mailtrap')->to('adisalaras41@gmail.com')->send(new MyTestEmail("Adisa"));
        Log::info('Email sent successfully.');
    } catch (\Exception $e) {
        Log::error('Failed to send email: ' . $e->getMessage());
    }
})->purpose('Send welcome mail');

