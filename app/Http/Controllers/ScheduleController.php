<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\films;
use App\schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films =DB::table('films')
            ->get();
        $schedule=DB::table('schedule')
            ->get();
        return view('schedule.index')->with(['films'=>$films,'schedule'=>$schedule]);
    }

    public function show($id,$id_schedule)
    {
        $data=DB::table('schedule')
            ->where('schedule.id_schedule','=', $id_schedule)
            ->join('films','schedule.ID_Film','=','films.id')
            ->join('halls','schedule.ID_Hall','=','halls.ID_Hall')
            ->select( 'halls.ID_Hall','halls.Name_Hall','halls.Price','halls.Price1','halls.Num_Row','halls.Num_Column',
                'films.id','films.Name_Film','films.Producer','films.Country','films.Genres','films.Duration','films.Rating','films.Age_Limit','films.Icon','films.Description',
                'schedule.DateS','schedule.TimeS','schedule.id_schedule')
            ->get();
        $schedule=DB::table('schedule')
            ->where('schedule.ID_Film','=',$id)
            ->select('schedule.DateS','schedule.TimeS','schedule.id_schedule')
            ->get();
        $tickets = DB::table('tickets')
            ->where('tickets.id_schedule','=', $id_schedule)
            ->select('tickets.id_schedule','tickets.Row','tickets.Column')
            ->get();
        return view('schedule.show')->with(['data'=>$data,'schedule'=>$schedule,'tickets'=>$tickets]);
    }

    public function indexAdmin()
    {
        if(Auth::user()){
            $films = DB::table('films')
                ->select('films.id','films.Name_Film')
                ->get();
            $halls = DB::table('halls')
                ->select('halls.ID_Hall','halls.Name_Hall')
                ->get();
            $schedule = DB::table('schedule')
                ->join('films','schedule.ID_Film','=','films.id')
                ->join('halls','schedule.ID_Hall','=','halls.ID_Hall')
                ->select('schedule.id_schedule','schedule.TimeS','halls.Name_Hall','films.Name_Film')
                ->get();
            return view('schedule.create')->with(['schedule'=>$schedule,'films'=>$films,'halls'=>$halls]);
        }
        else {
            return view('auth.login');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'film'=> 'required|string',
            'hall' => 'required|string',
            'timeS' => 'required|string',
        ]);

        $reg = new schedule();
        $reg -> ID_Film = $request->input('film');
        $reg -> ID_Hall = $request->input('hall');
        $reg -> DateS = Carbon::now();
        $reg -> TimeS = $request->input('timeS');
        $reg -> save();

        return redirect()->route('schedule.create');
    }

    public function DelRent(Request $request)
    {
        $this->validate($request, [
            'outRent'=> 'required|string',
        ]);

        films::where('id',$request->input('outRent'))->delete();

        return redirect()->route('schedule.create');
    }

    public function DelS(Request $request)
    {
        $this->validate($request, [
            'session'=> 'required|string',
        ]);

        schedule::where('id_schedule',$request->input('session'))->delete();

        return redirect()->route('schedule.create');
    }
}
