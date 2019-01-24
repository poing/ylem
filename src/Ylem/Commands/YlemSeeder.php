<?php

namespace Poing\Ylem\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;


class YlemSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ylem:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate ylem with seed data';

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

        // Check that the Base Table Model Exists
        if (!\Schema::hasTable('party_relationships')) {

            // Show Migrations Status
            $this->call('migrate:status');
            $this->comment('Migrations have not been run');

            // Prompt User to Run Migrations
            if ($this->confirm('Do you wish to run ylem migrations?')) {
                $this->call('migrate');
            } else {
                $this->error ('Migrations have not been run');
            }
            //Artisan::call('db:seed');
        }
        if (\Schema::hasTable('party_relationships')) {
            if ($this->confirm('Do you install the ylem demo data?')) {
                $this->call('db:seed', [
                    '--class' => 'Poing\Ylem\Database\Seeds\StubSeeder',
                ]);
            }
        }
    }
}
