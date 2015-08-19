<?php

class PultController extends BaseController {
        //////////////////////////////////////////////////////
        //main functions
        //
        //protected $s_q_operplace;
        //protected $MainQueue;
    
    	public function index()
	{
		return View::make('Pult.index')
                        //->with('message', '<PRE>'.var_dump($MainQueue1).'</pRE>')
                        //->with('message', '<PRE>'.dd($str).'</PRE>')
                ;
	}
    
	//public function callNextVisiter()
        public function callNextVisiter()
        {
            $input = Input::all();
            $current_Date=new DateTime;
            $user = Sentry::getUser();
            /*
                $table->increments('id');
                $table->dateTime('datetime');
                $table->integer('number');
                $table->string('prefix');
                $table->string('status');
             //status: 
                        //Created, InQueue%NUMB%, InService, Finished, Retranslated, Cancelled
                        
                $table->integer('service_id')->unsigned()->nullable();
                $table->integer('s_q_operplaces_id')->unsigned()->nullable();
                $table->integer('user_id')->unsigned()->nullable();
            */    
            
            $Tickets = MainQueue::
                    where('status','=','created')->
                //->where('service_id','in',)
                whereRaw('DATE_FORMAT( datetime, \'%Y%m%d\' )=DATE_FORMAT(CURRENT_DATE(),\'%Y%m%d\')')->
                    orderBy('id')->get()
                    ;
            
            $temp_array=array();
            foreach ($Tickets as $NextVisiterTicket) {
                
                if (($NextVisiterTicket)
                        &&($user->hasAccess(strval($NextVisiterTicket->service_id)))
                        )
                    {
                    Log::info('Service_id='.$NextVisiterTicket->service_id);
                    Log::info($user->hasAccess(strval($NextVisiterTicket->service_id)));
                    Log::info($user->hasAccess($NextVisiterTicket->service_id));
                    
                    $NextVisiterTicket->status='InService';
                    $NextVisiterTicket->s_q_operplaces_id=Session::get('operplace_id');
                    $NextVisiterTicket->user_id=Session::get('user_id');
                    $NextVisiterTicket->StartDatetimeProcessing=$current_Date;
                    $NextVisiterTicket->save();
                    
                    //PROCEDURE Generate Zvuk
                    //TODO Symbols with str_split()
                    if ($NextVisiterTicket->prefix)
                    {
                        file_put_contents(public_path().'/tmp/'.date("Ymd").'_'.$NextVisiterTicket->number.'.mp3',
                            file_get_contents(public_path().'/Audio/msg_start.mp3') . //Klient 
                            file_get_contents(public_path().'/Audio/prefix_'.$NextVisiterTicket->prefix.'.mp3'). //#prefix
                            file_get_contents(public_path().'/Audio/ticket_'.$NextVisiterTicket->number.'.mp3'). //#number
                            file_get_contents(public_path().'/Audio/msg_middle.mp3') . // Podoidite k oknu
                            file_get_contents(public_path().'/Audio/Place_'. $NextVisiterTicket->s_q_operplaces_id.'.mp3') // 
                        );
                    }else {
                        file_put_contents(public_path().'/tmp/'.date("Ymd").'_'.$NextVisiterTicket->number.'.mp3',
                            file_get_contents(public_path().'/Audio/msg_start.mp3') . //Klient 
                            file_get_contents(public_path().'/Audio/ticket_'.$NextVisiterTicket->number.'.mp3'). //#number
                            file_get_contents(public_path().'/Audio/msg_middle.mp3') . // Podoidite k oknu
                            file_get_contents(public_path().'/Audio/Place_'. $NextVisiterTicket->s_q_operplaces_id.'.mp3') // 
                        ); 
                    };
                    return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'callNextVisiter')
                    ;
                    break;//TODO: REFACTORING NEEDED
                }
                
            } 
             
            return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'callNextVisiter')
                    //->with('message', 'callNextVisiter'.dd($NextVisiterTicket))
                    ->with('message', ''.dd('SOLVED')
                            )
                    ;   
                
            
	}
        
        public function FinishServing()
	{
            $input = Input::all();
            $current_Date=new DateTime;
            
            $CurrentVisiterTicket = MainQueue::
            where('s_q_operplaces_id','=',Session::get('operplace_id'))->
            firstOrFail();
                       
            if ($CurrentVisiterTicket){
                $CurrentVisiterTicket->status='Finished';
                $CurrentVisiterTicket->s_q_operplaces_id=Session::get('operplace_id');
                $CurrentVisiterTicket->user_id=Session::get('user_id');
                $CurrentVisiterTicket->StopDatetimeProcessing=$current_Date;
                $CurrentVisiterTicket->save();
            }
            
            return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'FinishServing')
                    ->with('message', 'FinishServing')

                    ;
	}
        
        public function StartPause()
	{
            $input = Input::all();
            return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'FinishServing')
                    ->with('message', 'StartPause')
                    ;
	}
        
        public function StopPause()
        {
            $input = Input::all();
            return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'FinishServing')
                    ->with('message', 'StopPause')
                    ;
        }
        public function RedirectVisiterTo()
        {
            $input = Input::all();
            return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'FinishServing')
                    ->with('message', 'Redirected to OperPlace Number')
                    ;           
        }
        
        public function GetNextUserBeforeChoosen()
        {
            $input = Input::all();
            return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'FinishServing')
                    ->with('message', 'GetNextUserBeforeChoosen')
                    ;           
        }
        
        //COMPLETE        
        public function ExitPult()
        {
            return Redirect::to('logout')
                    ->with('message', 'ExitPult')
                    ;           
        }
        
}
