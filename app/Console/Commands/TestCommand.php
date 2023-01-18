<?php

namespace App\Console\Commands;

use App\Imports\ProjectDynamicImport;
use App\Imports\MetalImport;
use App\Models\Task;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Command\Command as CommandAlias;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Excel::import(new MetalImport(),'files/work_file.xlsx', 'public');
        return Command::SUCCESS;
    }
}
