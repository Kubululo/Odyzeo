<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string|null
     */
    private ?string $message;

    /**
     * @var int
     */
    private int $caseId;

    /**
     * @var string|null
     */
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
        $email = $this->markdown('emails.report')
            ->from($this->email, $this->name)
            ->to(env('MAIL_TO_ADDRESS'))
            ->subject('Report ' . $this->caseId)
            ->with([
                'id' => $this->caseId,
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message ?: 'Not provided'
            ]);
        if($this->filename){
            $email->attach(Storage::path($this->filename), [
                'as' => env('MAIL_ATTACHMENT_NAME'),
                'mime' => env('MAIL_ATTACHMENT_TYPE'),
            ]);
        }
        return $email;

    }
}
