<?php

namespace Danshin\Guestbook\Console\Commands;

use Illuminate\Console\Command;
use Danshin\Guestbook\Support\ManagerRepository;

class Clear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "guestbook:clear";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Clears the guestbook repository completely";

    public function handle(ManagerRepository $managerRepository): int
    {
        $managerRepository->clear();
        $this->info("Danshin, guestbook:clear OK");
        return 1;
    }
}
