<?php

namespace Danshin\Guestbook\Models;

final class Report
{
    public readonly string $title;
    public readonly string $date;

    /**
     * @property string[] $content
     */
    public readonly array $content;

    /**
     * @param string[] $content
     */
    public function __construct(string $date, array $content)
    {
        $this->date = $date;
        $this->content = $content;
        $this->title = __("danshin/guestbook::report.title");
    }
}
