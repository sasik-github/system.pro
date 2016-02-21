<?php

namespace App\Console\Commands;

use App\Excel\Importer;
use Illuminate\Console\Command;

class ExcelImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make children import from excel file';

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
    public function handle(Importer $importer)
    {
        $pathToExcel = realpath(public_path('storage/import.XLSX'));

//        $progressBar = $this->output->createProgressBar();
//        $importer->setProgressBar($progressBar);
        $importer->import($pathToExcel);
//        $progressBar->finish();
    }
}
