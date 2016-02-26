<?php

namespace App\Jobs;

use App\Excel\Importer;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExcelImportJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    private $pathToExcelFile;

    /**
     * Create a new job instance.
     *
     * @param $pathToExcelFile
     */
    public function __construct($pathToExcelFile)
    {
        $this->pathToExcelFile = $pathToExcelFile;
    }

    /**
     * Execute the job.
     *
     * @param Importer $importer
     */
    public function handle(Importer $importer)
    {
        $importer->import($this->pathToExcelFile);
    }
}
