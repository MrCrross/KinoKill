<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\films;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = DB::table('films')
            ->get();
        return view('films.index')->with(['films'=>$films]);
    }

    public function show($id)
    {
        $data=DB::table('films')
            ->find($id);
        $schedule=DB::table('schedule')
            ->where('schedule.ID_Film','=',$id)
            ->select('schedule.TimeS','schedule.id_schedule')
            ->get();
        if(Auth::user()) {
            $userRole = Auth::user()->id;
            $role = DB::table('users')->find($userRole);
            if($role->role == 1) {
                return view('films.showAdmin')->with(['data' => $data, 'schedule' => $schedule]);
            }
            else { return view('films.show')->with(['data' => $data, 'schedule' => $schedule]); }
        }
        else { return view('films.show')->with(['data' => $data, 'schedule' => $schedule]); }
    }

    public function indexAdmin()
    {
        if(Auth::user()) {
            $genres = DB::table('genres')
                ->get();
            return view('films.create')->with(['genres'=>$genres]);
        }
        else {
            return view('auth.login');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Img'=> 'required|file',
            'Name' => 'required|string',
            'Prod' => 'required|string',
            'Country' => 'required|string',
            'Genre' => 'required|string',
            'Dur' => 'required',
            'Age' => 'required',
            'Rat' => 'required',
            'Desc' => 'required|string',
        ]);

//Сохранение постера в файловой системе
        $img = $request->file('Img');
        $nameImg = $img->getClientOriginalName();
        $dir = '/public/poster/';
        $url = url('/').'/storage/poster/';
        Storage::putFileAs($dir,$img,$nameImg);
//Сохранение данных в БД
        $reg = new films();
        $reg -> id = 0;
        $reg -> Name_Film = $request->input('Name');
        $reg -> Producer = $request-> input('Prod');
        $reg -> Country = $request-> input('Country');
        $reg -> Genres = $request-> input('Genre');
        $reg -> Duration = $request-> input('Dur');
        $reg -> Age_Limit = $request-> input('Age');
        $reg -> Rating = $request-> input('Rat');
        $reg -> Description = $request-> input('Desc');
        $reg -> Icon = $url.$nameImg;
        $reg -> save();

        return redirect()->route('home');
    }

}