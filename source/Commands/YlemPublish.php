<?php

namespace Poing\Ylem\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class YlemPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ylem:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the public assets';

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

        File::deleteDirectory(public_path('ylem'));
        $this->comment(
            '<fg=green>Removed Directory <fg=yellow>' .
            public_path('ylem')
        );

        // vendor:publish --tag=ylem --force
        $this->call('vendor:publish', [
            '--tag' => 'ylem',
            '--force' => null,
        ]);

        $this->comment(
            '<fg=red>Example: <fg=blue>js <fg=green>assests are now accessable via http://localhost<fg=blue>/ylem/js');

    }
}
