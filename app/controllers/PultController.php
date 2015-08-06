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
		$NextVisiterTicket = MainQueue::where('status','=','Created')
                        ->orderBy('id')->firstOrFail();

                if ($NextVisiterTicket){
                    $NextVisiterTicket->status='InService';
                    $NextVisiterTicket->s_q_operplaces_id=Session::get('operplace_id');
                    $NextVisiterTicket->user_id=Session::get('user_id');
                    $NextVisiterTicket->save();
                }
                //PROCEDURE CallUserZVUK
            return Redirect::to('pult/index')
                    //->with('message', '<PRE>'.dd($input).'</PRE>'.'callNextVisiter')
                    ->with('message', 'callNextVisiter'.dd($NextVisiterTicket))
                    ;
	}
        
        public function FinishServing()
	{
            $input = Input::all();
            
            $CurrentVisiterTicket = MainQueue::
            where('s_q_operplaces_id','=',Session::get('operplace_id'))->
            firstOrFail();
                       
            if ($CurrentVisiterTicket){
                $CurrentVisiterTicket->status='Finished';
                $CurrentVisiterTicket->s_q_operplaces_id=Session::get('operplace_id');
                $CurrentVisiterTicket->user_id=Session::get('user_id');
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
