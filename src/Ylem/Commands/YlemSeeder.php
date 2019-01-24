<?php

namespace Poing\Ylem\Commands;

use Illuminate\Console\Command;

class YlemSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ylem:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate ylem with seeder data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('db:seed', [
            '--class' => 'Poing\Ylem\Database\Seeds\StubSeeder',
        ]);
        //Artisan::call('db:seed');
    }
}
