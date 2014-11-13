<?php

class OrderController extends BaseController {

	public function getOrder(){
		$name = Session::get('nameshop');
		$menus = DB::select('select * from menu where Nameshop = ?', array($name));
		return View::make('Order.OrderForm')->with('menus',$menus);
	}
	public function postOrder()	{
		
		$validator = Validator::make(Input::all(), //check condition
			array(
				'description' => 'required',  // have an input
				'name' => 'required',   //have an input
				'lastname' => 'required',   //have an input
				'phonenumber' => 'required',   //have an input
				'address' => 'required'   //have an input
			)
		);
		if($validator->fails()){            //redirect to signin if error
			return Redirect::route('signin-get')
				->withErrors($validator)
				->withInput();
			
		}else{
			$name = Input::get('name');
			$lastname = Input::get('lastname');
			$description = Input::get('description');
			$phonenumber = Input::get('phonenumber');
			$address = Input::get('address');
			$nameshop=Session::get('nameshop');
			Mail::send('emails.order', array('name' => $name,'lastname' => $lastname,'phonenumber' => $phonenumber,'address' => $address,'description' => $description), function ($message) {
			$nameshop=Session::get('nameshop');
			$emails = DB::select('select Email from shop where Nameshop = ?', array($nameshop));
			$sendemail;
			foreach($emails as $email){
				$sendemail=$email->Email;
			}
			$message->to($sendemail,'Dear')->subject('Order');
			});
			return Redirect::route('shop-user',$nameshop);
		}
		
		
	}
			
}