<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\WorkResource;
use App\Models\Work;
use App\Models\Cancel;
class WorkApiController extends Controller
{
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => ['required', 'string', 'max:30', 'unique:works,id'],
                'work_name' => ['required', 'string', 'max:50']
            ]);
            $random = random_int(100000, 999999);
            $work = Work::create([
                'work_name' => $validated['work_name'],
                'status' => 'Wait',
                'id' => $validated['id'],
                'request_id' => $random + now()->format('s') * now()->format('i'),
                'cancel_id' => 0,
            ]);
            $work->save();

            return new WorkResource($work);
        }
        catch (\Exception $e)
        {
            $data = ['success'=>false, "error" => [
                "code" => "100",
                "message" => "Переданы неверные данные"
            ]
            ];
            return response()->json($data);
        }
    }

    public function checkId(Request $request)
    {
        try{
            $work = Work::where('request_id', $request->request_id)->get()->toArray();
            $data = ['success' => true, "data" => [
                "status" => $work[0]['status'],
            ]
            ];
            return response()->json($data, 200);
        } catch (\Exception $e){
            $data = ['success'=>false, "error" => [
                "code" => "100",
                "message" => "Переданы неверные даfнные"
            ]
            ];
            return response()->json($data);
        }
    }
}
