<?php

class PhotoController extends BaseController{
	public function setPhoto(){
		return View::make('Photo.photo');
	}

	public function addPhoto(){

		$validator = Validator::make(Input::all(), //check condition
			array(
				'uploadimage'=>'required|image',
				'detail' => 'required'  // have an input  
			)
		);
		if($validator->fails()){            //redirect to signin if error
			return Redirect::route('Photo-set')
				->withErrors($validator)
				->withInput();
		//retrieve image and set parameter image
		}else{
		$image=Input::file('uploadimage');
		$img_path=$image->getRealPath();
		$filename=$image->getClientOriginalName();
		$extension = $image->getClientOriginalExtension();
		
		if(Image::make($image->getRealPath())->resize(300,300)->save(public_path('img/'.$filename)))
		{	
				$newpath = public_path('img/'.$filename);
				$img_data = file_get_contents($newpath);
				$type = pathinfo($newpath, PATHINFO_EXTENSION);
				$base64 = base64_encode($img_data);
		}

		$email = Session::get('name');
		$detail = Input::get('detail');
		$photo = Photo::create(array(
			'image'=> $base64,
			'Email' => $email,
			'Detail' => $detail
		));

		if($photo){
			File::delete($newpath);
			return Redirect::route('home');
			}
		}
	}
}