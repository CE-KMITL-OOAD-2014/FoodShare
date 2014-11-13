<?php
class ProfileController extends BaseController {
	public function user($email){
		Session::put('Ownername',$email);
		$user = User::where('email', '=', $email);
		$shops =  DB::select('select * from shop where Email = ?', array($email));
		$photos = DB::select('select * from photo where Email = ?', array($email));
		$comments = DB::select('select * from comment where OwnerEmail = ?', array($email));
		if($user->count()){
			$user = $user->first();
			return View::make('profile.UserProfile')  
				->with('user',$user)->with('shops',$shops)->with('photos',$photos)->with('comments',$comments);
		}
		return App::abort(404);
	}
}
