<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Timetable extends MY_Model {
    
    protected $xml = null;
    protected $daysofweek = array();
    protected $courses = array();
    protected $timeslots = array();
    public function __construct(){
         $this->xml = simplexml_load_file(DATA_FOLDER . 'schedule' . XMLSUFFIX, "SimpleXMLElement", 
                 LIBXML_NOENT);
    

        foreach($this->xml->days->dayinner as $day){
            foreach($day->booking as $book){
                $book->day = $day['code'];
                $this->daysofweek[] = new Booking($book);
                
            }
        }
         foreach($this->xml->courses->courseinner as $course){
            foreach($course->booking as $book){
                $book->course = $course['name'];
                $this->courses[] = new Booking($book);
                
            }
        }
   
         foreach($this->xml->timeslots->timeslot as $time){
            foreach($time->booking as $book){
                $book->time = $time['time'];
                $this->timeslots[] = new Booking($book);
                
            }
        }


                    
                   
    }
 
    public function getDays(){
        return $this->daysofweek;
    }
    public function getCourses(){
        return $this->courses;
    }
    public function getTimes(){
        return $this->timeslots;
    }
    
    public function searchByDay($day, $time){
        $day = array();
        foreach($this->daysofweek as $book){
            if($book->day == $day  && $this->time == $time){
               $day[] = $book;
            }
        }
        return $day;
    }
    
    public function searchByCourse($day, $time){
        $course = array();
        foreach($this->course as $book){
            if($book->day == $day  && $this->time == $time){
               $course[] = $book;
            }
        }
        return $course;
    }
    public function searchByTimeslot($day, $time){
        $times = array();
        foreach($this->timeslots as $book){
            if($book->day == $day  && $this->time == $time){
               $times[] = $book;
            }
        }
        return $times;
    }
}

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