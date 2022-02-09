<?php

namespace Danshin\Guestbook\Repository;

use Danshin\Guestbook\Models\Guest;

final class Repository
{
    private const SEPARATOR = "\n#############################################";

    public function __construct(private File $file)
    {
        $this->file->createIfNotExist();
    }

    /**
     * @return string[]
     */
    public function get(): array
    {
        $array = explode(self::SEPARATOR, $this->file->get());
        array_pop($array);
        return $array;
    }

    public function add(Guest $guest): void
    {
        $this->file->append($this->convertToString($guest) . self::SEPARATOR);
    }

    public function count(): int
    {
        $content = $this->get();
        return count($content);
    }

    /**
     * @return string[]
     */
    public function cutFirst(int $length): array
    {
        if (!($length >= 1 && $length <= 5000)) {
            throw new \Exception("The $length parameter can have a value from 1 to 5000.");
        }

        $content = $this->get();
        $truncated = array_splice($content, 0, $length - 1);
        $this->file->put(implode(self::SEPARATOR, $content));
        return $truncated;
    }

    public function clear(): void
    {
        $this->file->clear();
    }

    private function convertToString(Guest $guest): string
    {
        $browser = ($guest->browser === null) ? "" : $guest->browser;
        return "date - {$guest->date->format('Y-m-d h:i:s')};\nip - $guest->ip;\nroute - $guest->route;\nrequest - $guest->request;\nbrowser - $browser;";
    }
}
