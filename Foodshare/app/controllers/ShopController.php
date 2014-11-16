<?php
class ShopController extends BaseController {
	public function getcreateshop(){
	
		return View::make('account.shop');
	}
	public function postcreateshop(){
		$validator = Validator::make(Input::all(),   											//check condition
			array(
				'Nameshop' => 'required|max:50|unique:shop',
				'detail' => 'required',
				'price' => 'required',
				'city' => 'required',
				'type' => 'required',
				'seat' => 'required|numeric'
			)
		);
		
		if($validator->fails()){   																//if fail redirect to Createshop
			return Redirect::route('createshop-get')
				->withErrors($validator)
				->withInput();
		}else{
			$email = Session::get('name');
			$Nameshop = input::get('Nameshop');
			$detail = Input::get('detail');
			$price = Input::get('price');
			$city = Input::get('city');
			$type = Input::get('type');
			$seat = Input::get('seat');

			$shop = Shop::create(array(															//Create shop to Class Shop
				'Nameshop'=> $Nameshop,
				'Email' => $email,
				'Detail' => $detail,
				'Price'=>$price,
				'City'=>$city,
				'Type'=>$type,
				'Seat'=>$seat
			));
			if($shop){
				return Redirect::route('home');													//if created shop to redirect to home
			}
		}
	}
	
	public function shopprofile($name){															//Display the profile
		
		$nameshops = DB::select('select * from shop where Nameshop = ?', array($name));				
		$menus = DB::select('select * from menu where Nameshop = ?', array($name));
		$comments = DB::select('select * from review where Nameshop = ?', array($name));
		foreach ($nameshops as $nameshop)
		{
			$emailshop = $nameshop->Email;
			$seat=$nameshop->Seat;
		}
		if($nameshops!=null){
			Session::put('emailshop',$emailshop);
			Session::put('nameshop',$name);
			Session::put('seat',$seat);
		return View::make('profile.ShopProfile')->with('menus',$menus)->with('comments',$comments);
		}
		else{
		return Redirect::intended('/');
		}
	}
	public function getallShop(){																//To display all shop
		$shops = DB::table('shop')->get();
		return View::make('Form.ShowAllShop')->with('shops',$shops);
	}
}