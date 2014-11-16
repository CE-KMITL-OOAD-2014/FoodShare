<?php
class ProfileController extends BaseController {
	public function user($email){
		Session::put('Ownername',$email);																		//put session where comment form
		$user = User::where('email', '=', $email);																//get user from class user
		$shops =  DB::select('select * from shop where Email = ?', array($email));														//get shop from class  shop
		$photos = DB::select('select * from photo where Email = ?', array($email));														//get photo from class photo
		$comments = DB::select('select * from comment where OwnerEmail = ?', array($email));					//get coment from DB
		if($user->count()){
			$user = $user->first();
			return View::make('profile.UserProfile')  															//To see User Profile
				->with('user',$user)->with('shops',$shops)->with('photos',$photos)->with('comments',$comments);
		}
		return App::abort(404);
	}
}
