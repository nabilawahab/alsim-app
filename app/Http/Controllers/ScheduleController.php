<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{

    public function index(Request $request){
        return view('select_date_and_shift');
    }

    public function store(Request $request){
        // dd($request);

        try{
            $jumlah_shift = 3;
            $validatedData = $request->validate([
                'date' => 'required|date'
            ]);

            $dateExists = Date::where('date', $validatedData['date'])->exists();
            if ($dateExists) {
                return redirect('/')->with('message', ['text' => 'Tanggal Sudah Ada', 'class' => 'danger']);
            } 
            
            try {
                DB::beginTransaction();

                // Simpan ke tabel date_schedules
                $date = Date::create([
                    'date' =>  $validatedData['date'],
                ]);
                $id_date = $date->id;
                $date = $date->date;
                
                for ($i = 0; $i < $jumlah_shift; $i++) {
                    $shift = $i+1;
                    $data = [
                        'schedule_shift' => $shift,
                        'schedule_defined_id' => $this->createArtificialId($date, $shift),
                        'id_date' => $id_date
                    ];
                    Schedule::create($data);
                }
        
                DB::commit();

                return redirect('/schedule?date=' . $date);
        
            } catch (\Exception $e) {
                DB::rollBack();
        
                return redirect('/')->with('message', ['text' => $e->getMessage(), 'class' => 'danger']);
            }

        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    public function check(Request $request){
        $validatedData = $request->validate([
            'date' => 'required|date'
        ]);

        $dateExists = Date::where('date', $validatedData['date'])->exists();

        if ($dateExists) {
            return redirect('/schedule?date='.$validatedData['date']);
        } else {
            return redirect('/')->with('message_history', ['text' => 'Tanggal Tidak Ditemukan', 'class' => 'danger']);
        }
    }
}
