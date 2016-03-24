<?php

namespace App\Console\Commands;

use App\Excel\Importer;
use App\Excel\PhpExcelImporter;
use App\Excel\SimpleExcelImporter;
use App\Excel\SpoutImporter;
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

        $pathToExcel = public_path('files/' . $this->argument('path'));
        $this->spoutExcelImporter($pathToExcel);

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

    private function spoutExcelImporter($pathToExcel)
    {
        $importer = new SpoutImporter();
        $importer->import($pathToExcel);
    }
}
