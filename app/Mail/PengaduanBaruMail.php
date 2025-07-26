<?php

namespace App\Mail;

use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address; // PENTING: Import class Address
use Illuminate\Queue\SerializesModels;

class PengaduanBaruMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;

    /**
     * Create a new message instance.
     */
    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // PERBAIKAN: Mengatur alamat pengirim dan subjek secara dinamis
        return new Envelope(
            from: new Address('zikraahady@gmail.com', 'Notifikasi Portal UMKM'),
            subject: 'Pengaduan Baru dari ' . $this->pengaduan->nama_pelaku_usaha,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pengaduan-baru',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
