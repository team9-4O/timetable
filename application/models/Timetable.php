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
    protected $periods = array();
    public function __construct(){
         $this->xml = simplexml_load_file(DATA_FOLDER . 'schedule' . XMLSUFFIX );
    
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
                $this->days[] = new Booking($ok);
                print_r($days);
            }
        }


                    
                   
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