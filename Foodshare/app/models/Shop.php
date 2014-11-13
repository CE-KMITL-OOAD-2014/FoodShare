<?php
class Shop extends Eloquent  {

       protected $fillable = array('Nameshop','Detail','Price','City','Type','Email','Seat');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shop';
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	*/
	/* Define primary key for Identifier */
}