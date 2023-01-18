<?php

namespace App\Http\Controllers;

use App\Http\Requests\Metal\ImportStoreRequest;
use App\Http\Resources\Metal\MetalResource;
use App\Jobs\ImportMetalExcelFileJob;
use App\Models\File;
use App\Models\Metal;
use App\Models\Task;
use Illuminate\Http\Request;

class MetalController extends Controller
{
    public function index()
    {
        $metals = MetalResource::collection(Metal::paginate(15));
        return inertia('Metal/Index', compact('metals'));
    }

    public function import()
    {
        return inertia('Metal/Import');
    }

    public function importStore(ImportStoreRequest $request)
    {
        $data = $request->validated();
        $file = File::putAndCreate($data['file']);

//        $task = Task::create([
//            'file_id' => $file->id,
//            'user_id' => auth()->id(),
//            'type' => $data['type'],
//        ]);

        ImportMetalExcelFileJob::dispatchNow($file->path,
//            $task
        )
//            ->onQueue('imports')
        ;
//
//        return redirect()->back()->with(['message' => 'Excel import in process']);
    }
}
