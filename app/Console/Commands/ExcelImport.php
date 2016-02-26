<?php

namespace App\Console\Commands;

use App\Excel\Importer;
use App\Excel\PhpExcelImporter;
use App\Excel\SimpleExcelImporter;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;

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
     * @param Importer $importer
     * @return mixed
     */
    public function handle(Importer $importer)
    {
//        $pathToExcel = realpath(public_path('storage/import.XLSX'));

//        $progressBar = $this->output->createProgressBar();
//        $importer->setProgressBar($progressBar);
        $pathToExcel = $this->argument('path');
        $this->laravelImporter($pathToExcel);
//        $progressBar->finish();
    }

    private function laravelImporter($pathToExcel)
    {
        $importer = new Importer();
        $importer->import($pathToExcel);
    }

    private function simpleImporter($pathToExcel)
    {
        $importer = new SimpleExcelImporter();
        $importer->import($pathToExcel);
    }

    private function phpExcelImporter($pathToExcel)
    {
        $importer = new PhpExcelImporter();
        $importer->import($pathToExcel);
    }
}
