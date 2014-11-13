<?php
class Photo extends Eloquent  {

    protected $fillable = array('image','Detail','Email');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photo';
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	*/
	/* Define primary key for Identifier */
}