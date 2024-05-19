<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Schedule;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request){

        $scheduleExist = Schedule::select([
            'schedule_defined_id'
        ])
        ->join('dates', 'schedules.id_date', '=', 'dates.id')
        ->where('dates.date', '=', request('date'))
        ->where('schedules.schedule_shift', '=',  request('shift'))
        ->first();

        if(!request('date') || !request('shift') || !$scheduleExist){
            return redirect('/schedule?date=' . request('date') . '&shift=' . request('shift'))
            ->with('message', ['text' => 'Tanggal atau shift Tidak Ditemukan', 'class' => 'danger']);
        }

        $logExist = Schedule::select([
            'schedules.schedule_defined_id', 'logs.log_amount', 'logs.time_in', 'logs.id_alsim'
        ])
        ->join('dates', 'schedules.id_date', '=', 'dates.id')
        ->join('logs', 'logs.schedule_defined_id', '=', 'schedules.schedule_defined_id')
        ->where('dates.date', '=', request('date'))
        ->where('schedules.schedule_shift', '=', request('shift'))
        ->get();

        return view('log', [
            'logs' => $logExist
        ]); 
    }

    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'log_amount' => 'required|numeric',
                'date' => 'date|required|exists:dates,date',
                'shift' => 'required|numeric|between:1,3',
                'time_in' => 'required|between:1,8|numeric',
                'id_alsim' => 'required|numeric|between:1,2'
            ]);
    
            $scheduleExist = Schedule::select([
                'schedule_defined_id'
            ])
            ->join('dates', 'schedules.id_date', '=', 'dates.id')
            ->where('dates.date', '=', $validatedData['date'])
            ->where('schedules.schedule_shift', '=', $validatedData['shift'])
            ->first();

            if(!$scheduleExist){
                return redirect('/schedule?date=' . $validatedData['date'] . '&shift=' . $validatedData['shift'])
                ->with('message', ['text' => 'Tanggal atau shift Tidak Ditemukan', 'class' => 'danger']);
            }
    
            $logExist = Log::select([
                'log_defined_id'
            ])
            ->where('schedule_defined_id', '=', $scheduleExist['schedule_defined_id'])
            ->where('time_in', '=', $validatedData['time_in'])
            ->where('id_alsim', '=', $validatedData['id_alsim'])
            ->first();

            //kalau logExist true maka update kalau false bikin baru
            if($logExist){
                Log::where('log_defined_id', '=', $this->logDefinedId($validatedData['date'], $validatedData['shift'], $validatedData['time_in'], $validatedData['id_alsim']))
                ->update([
                    'log_amount' => $validatedData['log_amount']
                ]);
                return redirect('/log?date=' . $validatedData['date'] . '&shift=' . $validatedData['shift']);
            }else{
                $validatedData['schedule_defined_id'] = $scheduleExist['schedule_defined_id'];
                $validatedData['log_defined_id'] = $this->logDefinedId($validatedData['date'], $validatedData['shift'], $validatedData['time_in'], $validatedData['id_alsim']);
                Log::create($validatedData);
                return redirect('/log?date=' . $validatedData['date'] . '&shift=' . $validatedData['shift']);
            }
            

        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
