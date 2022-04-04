<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $name;

    private string $email;

    private ?string $message;

    private int $caseId;

    private ?string $filename;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Report $report)
    {
        $this->message = $report->message;
        $this->name = $report->name;
        $this->email = $report->email;
        $this->caseId = $report->id;
        $this->filename = $report->filename;
    }

    /**
     * Build the message.
     *
     * @return ReportMail
     */
    public function build(): ReportMail
    {
        return $this->markdown('emails.report')
            ->from($this->email,$this->name)
            ->to(env('MAIL_TO_ADDRESS'))
            ->subject('Report '.$this->caseId)
            ->with([
                'id' => $this->caseId,
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message
            ])->attach(Storage::path($this->filename), [
                'as' => 'error.jpg',
                'mime' => 'image/jpeg',
            ]);
    }
}
