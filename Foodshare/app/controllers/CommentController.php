<?php

class CommentController extends BaseController {

	public function postComment(){
		$owneruser = Session::get('Ownername');																				//get Session of Owner
		$comment = Input::get('comment');																					//get comment
		$user= Session::get('name');																						//get Session of user
		if(DB::insert('insert into comment (Email,Comment,OwnerEmail) values (?,?,?)',array($user,$comment,$owneruser))){
			return Redirect::route('profile-user',$owneruser);																//redirect to profile of owner
		}else{
			return Redirect::route('profile-user',$owneruser);													
		}
	}
}