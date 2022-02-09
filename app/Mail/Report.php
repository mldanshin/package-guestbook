<?php

namespace Danshin\Guestbook\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Danshin\Guestbook\Models\Report as ReportModel;

class Report extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public ReportModel $report)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->subject(config('danshin-guestbook.mail.subject'))
            ->view('danshin/guestbook::emails.report');
    }
}
