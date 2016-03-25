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
    
        //echo print_r($this->xml);    
        foreach($this->xml->days->dayinner as $day){
            foreach($day->booking as $book){
                $book->day = $day['code'];
                $this->daysofweek[] = new Booking($book);
                
            }
        }
        //print_r($this->daysofweek);
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
    public function dropdownDays(){
        $ret = array("Monday"=>"Monday", "Tuesday"=>"Tuesday", "Wednesday"=>"Wednesday", "Thursday"=>"Thursday",
            "Friday"=>"Friday", "Saturday"=>"Saturday", "Sunday"=>"Sunday");
        return $ret;
    }
    public function dropdownTimes(){
        $ret = array("830"=>"830", "930"=>"930", "1030"=>"1030", "1130"=>"1130", "1230"=>"1230",
            "1330"=>"1330", "1430"=>"1430", "1530"=>"1530", "1630"=>"1630");
        return $ret;
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
    
    public function searchByDay($dayok, $time){
        $day = array();
        foreach($this->daysofweek as $book){
            if($book->day == $dayok  && $book->time == $time){
               $day[] = $book;
            }
        }
       
        return $day;
    }
    
    public function searchByCourse($day, $time){
        $course = array();
        foreach($this->courses as $book){
            if($book->day == $day  && $book->time == $time){
               $course[] = $book;
            }
        }
        return $course;
    }
    public function searchByTimeslot($day, $time){
        $times = array();
        foreach($this->timeslots as $book){
            if($book->day == $day  && $book->time == $time){
               $times[] = $book;
            }
        }
        return $times;
    }
}

class Booking extends CI_Model {
   public $instructor;
   public $room;
   public $type;
   public $time;
   public $day;
   public $course;
   
     public function __construct($booking){

       
       $this->instructor = (string)$booking->instructor;
       $this->room = (string)$booking->room;
       $this->type = (string)$booking->type;
       $this->time = (string)$booking->time;
       $this->day = (string)$booking->day;
       $this->course = (string)$booking->course;
   }
   
}