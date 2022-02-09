<?php

namespace Danshin\Guestbook\Models;

final class Guest
{
    public readonly string $ip;
    public readonly ?string $browser;
    public readonly \DateTime $date;
    public readonly string $route;
    public readonly string $request;

    public function __construct(
        string $ip,
        ?string $browser,
        \DateTime $date,
        string $route,
        string $request
    ) {
        $this->ip = $ip;
        $this->browser = $browser;
        $this->date = $date;
        $this->route = $route;
        $this->request = $request;
    }
}
