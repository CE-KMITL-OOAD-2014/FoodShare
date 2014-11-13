<?php

class Order extends Eloquent {
    protected $fillable = array('Namemenu','Email','Nameshop','housenumber','road','street','city');
    protected $table = 'order'; // ชื่อตาราง
   
}