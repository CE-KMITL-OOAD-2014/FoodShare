<?php

class Reserve extends Eloquent {
    protected $fillable = array('Name','Phonenumber','Seat','Nameshop');
    protected $table = 'reserv'; // ชื่อตาราง
   
}