<?php

class ReserveController extends BaseController {

	public function getReserve(){
		return View::make('Form.ReserveForm');	
	}
	public function postReserve()	{
		
		$validator = Validator::make(Input::all(),   //check condition
			array(
				'name' => 'required',
				'phonenumber' => 'required|numeric',
				'numpeople' => 'required|numeric',
				'Date'=>'required'
			)
		);
		
		if($validator->fails()){   //if fail redirect to register page
			return Redirect::route('Reserve-get')
				->withErrors($validator)
				->withInput();
		}else{
			$name = Input::get('name');  // retrieve inputs
			$phonenumber = Input::get('phonenumber');
			$Seat = Input::get('numpeople');
			$nameshop=Session::get('nameshop');
			$Date=Input::get('Date');

			$num1;
			$num1=(int)$Seat;
			$seats = DB::select('select Seat from shop where Nameshop = ?', array($nameshop));
			$numkeep;
			foreach($seats as $seat){
				$numkeep=$seat->Seat;
			}
			$Seat2=(string)$Seat;

			if($num1<$numkeep){

				$Reserve = Reserve::create(array(
					'Name'=>$name,
					'Phonenumber'=>$phonenumber,
					'Seat' =>$Seat,
					'Nameshop'=>$nameshop

				));
				
				Mail::send('emails.reserve', array('name' => $name,'phonenumber' => $phonenumber, 'numpeople' => $Seat2 ,'Date'=>$Date), function ($message){
					$nameshop=Session::get('nameshop');
					$emails = DB::select('select Email from shop where Nameshop = ?', array($nameshop));
					$sendemail;
					foreach($emails as $email){
						$sendemail=$email->Email;
					}
				$message->to($sendemail,'Dear')->subject('Reserv');
			});
				$newseat = $numkeep-$num1;
				DB::table('shop')
            		->where('Nameshop', $nameshop)
            		->update(array('Seat' => $newseat));

				//Send email
				if($Reserve)
				return Redirect::route('shop-user',$nameshop);
			}else{
				return Redirect::route('Reserve-status');
			}
		}
		
	}
	public function setReserve(){
		$Seat = Input::get('avaliable');
		$nameshop = Session::get('nameshop');
		DB::table('shop')
            ->where('Nameshop', $nameshop)
            ->update(array('Seat' => $Seat));
		return Redirect::route('shop-user',$nameshop);
	}
	public function showReserve(){
		return View::make('Reserve.setReserve');
	}
	public function statusReserve(){
		return View::make('Reserve.StatusReserve');
	}
					
}