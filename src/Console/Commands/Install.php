<?php

namespace Datascaled\FathomStats\Console\Commands;

use Illuminate\Console\Command;
use Statamic\Console\RunsInPlease;

class Install extends Command
{
    use RunsInPlease;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fathom-stats:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the Laravel Fathom Stats configuration.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        return $this->call('vendor:publish', ['--tag' => 'fathom:config', '--force' => true]);
    }
}
