<?php

namespace Danshin\Guestbook\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Danshin\Guestbook\Models\Guest as GuestModel;
use Danshin\Guestbook\Repository\File;
use Danshin\Guestbook\Repository\Repository;
use Illuminate\Support\Facades\Storage;

final class CreatingGuest
{
    private Repository $repository;

    public function __construct()
    {
        $this->repository = new Repository(
            new File(Storage::disk("local"))
        );
    }

    /**
     * Handle an incoming request
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $record = new GuestModel(
            $request->server("REMOTE_ADDR"),
            $request->server('HTTP_USER_AGENT'),
            new \DateTime(),
            $request->path(),
            json_encode($request->all())
        );

        $this->repository->add($record);

        return $next($request);
    }
}
