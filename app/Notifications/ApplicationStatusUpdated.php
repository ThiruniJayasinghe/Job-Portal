<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusUpdated extends Notification
{
    use Queueable;

    private $application;

    // Accept the application object
    public function __construct($application)
    {
        $this->application = $application;
    }

    // Specify that the notification will be sent via email
    public function via($notifiable)
    {
        return ['mail'];
    }

    // Build the email notification
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Application Status Has Been Updated')
            ->line('Your application for the job ' . $this->application->job->title . ' has been updated.')
            ->line('Status: ' . ucfirst($this->application->status))
            ->action('View Your Application', url('/applications/' . $this->application->id))
            ->line('Thank you for using our job portal!');
    }

    
}
