<?php

namespace Danshin\Guestbook\Support;

use Danshin\Guestbook\Repository\File;
use Danshin\Guestbook\Repository\Repository;
use Illuminate\Support\Facades\Storage;

final class ManagerRepository
{
    private Repository $repository;

    public function __construct()
    {
        $this->repository = new Repository(
            new File(Storage::disk("local"))
        );
    }

    /**
     * return slice or null
     * @return string[]|null
     */
    public function cut(): ?array
    {
        $maxCount = config('danshin-guestbook.limit_guest');
        $countCurrent = $this->repository->count();

        if ($countCurrent > $maxCount) {
            return $this->repository->cutFirst($countCurrent - $maxCount);
        } else {
            return null;
        }
    }

    public function clear(): void
    {
        $this->repository->clear();
    }
}
