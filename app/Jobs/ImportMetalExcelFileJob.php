<?php

namespace App\Jobs;

use App\Imports\MetalImport;
use App\Imports\ProjectDynamicImport;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ImportMetalExcelFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $path;
//    private $task;

    /**
     * Create a new job instance.
     *
     * @param $path
     * @param $task
     */
    public function __construct($path,
//                                $task
    )
    {
        $this->path = $path;
//        $this->task = $task;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $this->task->update(['status' => Task::STATUS_SUCCESS]);
//
//        $methodName = 'import' . $this->task->type;
//
//        $this->$methodName();

        Excel::import(new MetalImport(), $this->path, 'public');
    }

//    public function import1()
//    {
//        Excel::import(new MetalImport($this->task), $this->path, 'public');
//    }
//
//    public function import2()
//    {
//        Excel::import(new ProjectDynamicImport($this->task), $this->path, 'public');
//    }
}
