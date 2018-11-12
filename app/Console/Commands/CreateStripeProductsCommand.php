<?php

namespace App\Console\Commands;

use App\Helpers\CreateStripeProducts;
use Illuminate\Console\Command;

class CreateStripeProductsCommand extends Command
{
    private $createStripeProducts;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:products';

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
    public function __construct(CreateStripeProducts $createStripeProducts)
    {
        parent::__construct();
        $this->createStripeProducts = $createStripeProducts;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createStripeProducts->create();

        $this->info('Successful!');
    }
}
