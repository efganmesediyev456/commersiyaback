<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class firstStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'first:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'First Start';

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
     * @return int
     */
    public function handle()
    {
//        Artisan::command('first:start', function () {
//            $this->info("Migrate");
//        });


        Artisan::call('migrate:fresh') ;
        Artisan::call('db:seed --class=AdminTableSeeder') ;
        Artisan::call('db:seed --class=HomePageSeeder') ;
        Artisan::call('key:generate') ;
        Artisan::call('storage:link') ;

        $this->info('Success  ---- Starta hazırıq :)  ') ;
        $this->info('© Akif Ismayilov <akifIsmayilov@outlook.com>') ;


    }


}
