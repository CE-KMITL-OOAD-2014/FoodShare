<?php

class OrderController extends BaseController {

	public function getOrder(){
		$name = Session::get('nameshop');
		$menus = DB::select('select * from menu where Nameshop = ?', array($name));
		return View::make('Order.OrderForm')->with('menus',$menus);
	}
	public function postOrder()	{
		
		$validator = Validator::make(Input::all(), 																//check condition
			array(
				'description' => 'required',  																	// have an input
				'name' => 'required',   																		//have an input
				'Date' => 'required',   																		//have an input
				'phonenumber' => 'required',  																	 //have an input
				'address' => 'required'   																		//have an input
			)
		);
		if($validator->fails()){           																		 //redirect to Order-get if Error
			return Redirect::route('Order-get')
				->withErrors($validator)
				->withInput();
			
		}else{
			$name = Input::get('name');																			//to save data
			$Date = Input::get('Date');
			$description = Input::get('description');
			$phonenumber = Input::get('phonenumber');
			$address = Input::get('address');
			$nameshop=Session::get('nameshop');
			Mail::send('emails.order', array('name' => $name,'Date' => $Date,'phonenumber' => $phonenumber,'address' => $address,'description' => $description), function ($message) {
			$nameshop=Session::get('nameshop');																	//Send Email to Shop mail by email order form
			$emails = DB::select('select Email from shop where Nameshop = ?', array($nameshop));
			$sendemail;
			foreach($emails as $email){
				$sendemail=$email->Email;
			}
			$message->to($sendemail,'Dear')->subject('Order');
			});
			return Redirect::route('shop-user',$nameshop);														//return to shopuser if Finish
		}
		
		
	}
			
}