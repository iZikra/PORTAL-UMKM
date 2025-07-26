<?php

namespace App\Mail;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class TanggapanAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;
    public $tanggapan;

    /**
     * Create a new message instance.
     */
    public function __construct(Pengaduan $pengaduan, Tanggapan $tanggapan)
    {
        $this->pengaduan = $pengaduan;
        $this->tanggapan = $tanggapan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Menggunakan email yang sudah diverifikasi di SendGrid
        return new Envelope(
            from: new Address('zikraahady@gmail.com', 'Tanggapan Portal UMKM'),
            subject: 'Tanggapan Baru untuk Pengaduan Anda',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Menunjuk ke file view yang akan menjadi isi email
        return new Content(
            view: 'emails.tanggapan-admin',
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
