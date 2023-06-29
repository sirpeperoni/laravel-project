<?php

namespace App\Http\Controllers;


use App\Http\Resources\WorkResource;
use App\Jobs\CheckProcessWorkJob;
use App\Jobs\CheckWorkJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Job;
use App\Models\Cancel;
use Illuminate\Support\Str;

class WorkController extends Controller
{

    public function index(Request $request, $id_job = "")
    {
        $works = Work::query()->get(['id', 'work_name', 'created_at', 'status']);

        return view('work.index', compact('works'));
    }

    public function create()
    {
        return view('work.create');
    }

    public function delete($work)
    {
        $del_work = Work::find($work);
        if($del_work){
            Work::destroy([$del_work->id]);
        }
        return redirect()->route('works');
    }

    public function check()
    {
        return view('work.check');
    }

    public function edit($work)
    {
        return view('work.time', compact('work'));
    }
    public function startWork(Request $request, $work)
    {
        if($request->hours == null)
        {
            $request->hours = 0;
        }
        if($request->minutes == null)
        {
            $request->minutes = 0;
        }
        if($request->seconds == null)
        {
            $request->seconds = 0;
        }
        $time = $request->hours * 3600 + $request->minutes * 60 + $request->seconds;
        $start_work = Work::find($work);
        dispatch(new CheckProcessWorkJob($start_work));
        dispatch(new CheckWorkJob($start_work))->delay(Carbon::now()->addSeconds($time));
        Work::where('id', $work)->update(['cancel_id' => Job::latest('id')->first()->id]);

        $works = Work::query()->get(['id', 'work_name', 'created_at', 'status']);
        return view('work.index', compact('works'));
    }

    public function cancel(Request $request, $work)
    {
        $cancel_work = Work::where('id', $work)->get()->toArray();;
        $del_work = Job::find($cancel_work[0]["cancel_id"]);
        if($del_work){
            Job::destroy([$del_work->id]);
        }
        Work::where('id', $work)->update(['status' => 'Wait']);
        return redirect()->route('works');
    }

}



//Work::find($work->id);
//        for ($i = 0; $i < 99; $i++)
//        {
//            Work::query()->create([
//                'id' => $i,
//                'work_name' => fake()->sentence(),
//                'request_id' => fake()->numberBetween(),
//                'success_time' => now()->addYear(10),
//                'status' => 'Wait',
//            ]);
//        }

//        $validated = $request->validate([
//            'id' => ['required', 'max:30', 'unique:works,id'],
//            'work_name' => ['required', 'string', 'max:50']
//        ]);
//        $random = random_int(100000, 999999);
//        $work = Work::create([
//            'work_name' => $validated['work_name'],
//            'status' => 'Wait',
//            'id' => $validated['id'],
//            'request_id' => $random + now()->format('s') * now()->format('i'),
//        ]);
//        $work->save();
//        $data = ['success' => true, "data" => [
//            "status" => "Wait",
//            "request_id" => $work->request_id,
//            ]
//        ];
//        return new WorkResource($work);
