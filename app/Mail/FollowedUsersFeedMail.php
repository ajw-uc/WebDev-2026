<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FollowedUsersFeedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public User $recipient) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Feed terbaru dari akun yang Anda ikuti',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $posts = Post::query()
            ->whereIn('user_id', $this->recipient->following()->select('users.id'))
            ->with('user')
            ->latest()
            ->limit(5)
            ->get();

        return new Content(
            view: 'emails.followed-users-feed',
            with: ['posts' => $posts],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
