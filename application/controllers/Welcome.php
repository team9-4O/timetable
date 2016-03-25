<?php

/**
 * Our homepage.
 * 
 * Present a summary of the completed orders.
 * 
 * controllers/welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }
    function index() {

        $this->data['title'] = 'TimeTable';
        $this->data['pagebody'] = 'singlebooking';
        $this->load->model('timetable');
        $this->load->helper('form');
        
        
        $this->render();
    }
   public function search(){
        $this->load->model('timetable');
        $this->data['title'] = "Your Courses";
        $day = $this->input->post('day');
        $period = $this->input->post('period');
        $byDay = $this->timetable->searchByDay($day, $period);
        $byCourse = $this->timetable->searchByCourse($day, $period);
        $byTimeslot = $this->timetable->searchByTimeslot($day, $period);
       
     
        if(count($byDay) == 1 && count($byCourse) == 1 && count($byTimeslot) == 1
                && ($byDay[0] == $byCourse[0]) && ($byDay[0] == $byTimeslot[0])){
           
            $this->data['sbingo'] = "Bingo";
            $ok = $this->parser->parse('bookingparse', $byCourse[0], true);
            $this->data['showsingle'] = $ok;
           
           
       }
       else if(count($byDay) > 1 || count($byCourse) > 1 || count($byTimeslot) > 1){
           $this->data['bingo'] = "No Bingo";
           $this->data['showsingle'] = "Day Count: " . count($byDay) . " Course Count: " . count($byCourse) .
                   " Timeslot Count: " . count($byTimeslot);
           
       }
       else{
           $this->data['sbingo'] = "No Bingo";
           $this->data['showsingle'] = "";
       }
       
       
        $this->data['pagebody'] = 'singlebooking';
        $this->data['pagetitle'] = "Results";
	$this->render();
      
   }
    
}
