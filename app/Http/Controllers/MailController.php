<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\tickets;
//use App\Mail\KinoMail;

class MailController extends Controller {

    public function mail(Request $request){
        $tickets=DB::table('tickets')
            ->where('tickets.id_schedule','=',$request->id_schedule)
            ->select('tickets.Row','tickets.Column')
            ->get();
        $mail=$request->email;
        $rows=$request->Row;
        $columns=$request->Column;
        $idr=-1;
        foreach ($rows as $row){
            $flag=true;
            $idr++;
            $idc=-1;
            foreach ($columns as $col){
                $idc++;
                if($idr==$idc){
                    foreach ($tickets as $ticket){
                        if(($ticket->Row == $row)&&($ticket->Column == $col)){
                            $flag=false;
                        }
                    }
                    if($flag==true){
                        $reg = new tickets();
                        $reg -> id_schedule = $request->id_schedule;
                        $reg -> Row = $row;
                        $reg -> Column = $col;
                        $reg -> save();
                    }
                }
            }
        }
//        Mail::to($mail)->send(new KinoMail());
        $this->sendmail($mail,$request->text);
        return response()->json('Чек отправлен');
    }

    public function sendmail($mail,$content){
//        $data = ['name'=>"KinoKill"];
//        Mail::send('mail', $data, function($message) use ($mail) {
//            $message->to($mail, 'Вы')->subject('Ваш чек');
//            $message->from('KinoKill@kino.com','KinoKill');
//        });
        Mail::raw($content,function ($message) use ($mail) {
            $message->to($mail, 'Вы')->subject('Ваш чек');
            $message->from('KinoKill@kino.com', 'KinoKill');
        });
    }
}