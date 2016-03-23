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
    
        echo print_r($this->xml);    
        foreach($this->xml->days->dayinner as $day){
            foreach($day->booking as $book){
                $ok = array();
                $ok['instructor'] = $day['code'];
                $ok['room'] = $book['room'];
                $ok['time'] = $book['time'];
                $ok['course'] = $book['course'];
                $ok['instructor'] = $book['instructor'];
                $ok['type'] = $book['type'];
                $this->daysofweek[] = new Booking($ok);
                
            }
        }
         foreach($this->xml->courses->courseinner as $course){
            foreach($course->booking as $book){
                $ok = array();
                $ok['course'] = $course['name'];
                $ok['room'] = $book['room'];
                $ok['time'] = $book['time'];
                $ok['instructor'] = $book['instructor'];
                $ok['type'] = $book['type'];
                $this->courses[] = new Booking($ok);
                
            }
        }
   
         foreach($this->xml->timeslots->timeslot as $time){
            foreach($time->booking as $book){
                $ok = array();
                $ok['time'] = $time['time'];
                $ok['room'] = $book['room'];
                $ok['day'] = $book['day'];
                $ok['course'] = $book['course'];
                $ok['instructor'] = $book['instructor'];
                $ok['type'] = $book['type'];
                $this->timeslots[] = new Booking($ok);
                
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
   
   
}