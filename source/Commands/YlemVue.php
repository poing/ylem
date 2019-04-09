<?php

namespace Poing\Ylem\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use WeblaborMX\FileModifier\FileModifier;

class YlemVue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ylem:vue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure Vue <fg=red>DRAFT';

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
        $file = base_path('resources/js/app.js');
        $line = "import VueRouter from 'vue-router';";
        $check = FileModifier::file($file)->find($line)->first();
        if ($check) {
         $this->comment("You could replace line " . $check->line . " here.");
        }
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
