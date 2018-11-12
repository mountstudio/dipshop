<?php

namespace App\Console\Commands;

use App\Helpers\CreateStripeSKU;
use Illuminate\Console\Command;

class CreateStripeSKUCommand extends Command
{
    private $createStripeSKU;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:sku';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CreateStripeSKU $createStripeSKU)
    {
        parent::__construct();
        $this->createStripeSKU = $createStripeSKU;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createStripeSKU->create();

        $this->info('Successfull');
    }
}
