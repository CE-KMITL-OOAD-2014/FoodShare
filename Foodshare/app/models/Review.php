<?php

class Review extends Eloquent {
    protected $fillable = array('Email','Comment','Nameshop');
    protected $table = 'review'; // ชื่อตาราง
   
}