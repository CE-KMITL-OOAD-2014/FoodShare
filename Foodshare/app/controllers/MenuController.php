<?php

class MenuController extends BaseController {

	public function getMenu(){
		return View::make('Menu.MenuShow');	
	}
	public function addMenu(){
		$validator = Validator::make(Input::all(), 																//check condition
			array(
				'uploadimage'=>'required|image',
				'name' => 'required',  																			// have an input
				'price' => 'required|numeric',  																//have an input
			)
		);
		if($validator->fails()){            																	//redirect to signin if error
			return Redirect::route('Menu-add')
				->withErrors($validator)
				->withInput();
		//retrieve image and set parameter image
		}else{
		$image=Input::file('uploadimage');																		//input file pic and set path
		$img_path=$image->getRealPath();
		$filename=$image->getClientOriginalName();
		$extension = $image->getClientOriginalExtension();
		
		if(Image::make($image->getRealPath())->resize(150,150)->save(public_path('img/'.$filename)))				
		{	
				$newpath = public_path('img/'.$filename);
				$img_data = file_get_contents($newpath);
				$type = pathinfo($newpath, PATHINFO_EXTENSION);
				$base64 = base64_encode($img_data);
		}
		//retrieve other information
		$namemenu = Input::get('name');
		$price = Input::get('price');
		$Nameshop = Session::get('nameshop');

		$addmenu = Menu::create(array(																			 //Store in DB and call Class Menu
			'Nameshop'=>$Nameshop,
			'Price'=>$price,
			'Namemenu'=>$namemenu,
			'Image'=>$base64
		));

		if($addmenu){
			File::delete($newpath);
			return Redirect::route('shop-user',$Nameshop);														//if menu added redirect to shop profile
			}
		}
	}
}