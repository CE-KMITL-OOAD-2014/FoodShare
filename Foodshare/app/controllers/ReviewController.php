<?php

class ReviewController extends BaseController {

	public function getReview(){
		return View::make('Form.ReviewForm');	
	}
	public function postReview(){
		$validator = Validator::make(Input::all(), //check condition
			array(
				'comment'=>'required'
			)
		);
		if($validator->fails()){            //redirect to signin if error
			return Redirect::route('Review-get')
				->withErrors($validator)
				->withInput();
		}else{
		$name = Session::get('name');
		$comment = Input::get('comment');
		$Nameshop = Session::get('nameshop');

		$Review = Review::create(array(
			'Email'=>$name,
			'Comment'=>$comment,
			'Nameshop'=>$Nameshop
		));

			if($Review){
				return Redirect::route('shop-user',$Nameshop);
			}

		}
	}
}