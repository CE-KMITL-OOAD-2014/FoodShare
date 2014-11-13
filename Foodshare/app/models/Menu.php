<?php

class Menu extends Eloquent {
    protected $fillable = array('Namemenu','Price','Nameshop','Image');
    protected $table = 'menu'; // ชื่อตาราง
   
}