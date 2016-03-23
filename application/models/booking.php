<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Booking{

   public $instructor;
   public $room;
   public $type;
   public $time;
   public $day;
   public $course;
   
   
   
   public function __construct($booking){

       
       $this->instructor = $booking->instructor;
       $this->room = $booking->room;
       $this->type = $booking->type;
       $this->time = $booking->time;
       $this->day = $booking->day;
       $this->course = $booking->course;
   }
   
}