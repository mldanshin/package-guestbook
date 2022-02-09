<?php

namespace Danshin\Guestbook\Console\Commands;

use Illuminate\Console\Command;
use Danshin\Guestbook\Support\ManagerReport;
use Danshin\Guestbook\Support\ManagerRepository;

class Cut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guestbook:cut';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Frees up space in the guestbook file';

    public function handle(ManagerRepository $managerRepository): int
    {
        $slice = $managerRepository->cut();
        if ($slice !== null) {
            (new ManagerReport($slice))->send();
        }

        $this->info("Danshin, guestbook:cut OK");
        return 1;
    }
}
