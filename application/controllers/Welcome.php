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


        $this->data['title'] = 'ALL TimeTable';
        $this->data['showday'] = '';
        $this->data['showclass'] = '';
        $this->data['showtimeslot'] = '';

        $this->load->model('timetable');
        $this->load->helper('form');
        $this->data['pagebody'] = 'timetable';
        $this->data['timetitle'] = 'TimeTable by class time';
        $this->data['daytitle'] = 'TimeTable by day';
        $this->data['coursetitle'] = 'TimeTable by course';
        $this->data['days'] = $this->timetable->getDays();
        $this->data['timeslots'] = $this->timetable->getTimes();
        $this->data['bycourse'] = $this->timetable->getCourses();

        $day = $this->input->post('day');
        if(isset($day)){
            $this->search();
        }
        else{
            $this->data['sbingo'] = "Perform a search!";
            $this->data['showsingle'] = "";
            $this->render();    
        }
        
    }
   public function search(){
        $this->load->model('timetable');
        $day = $this->input->post('day');
        $period = $this->input->post('period');
        $byDay = $this->timetable->searchByDay($day, $period);
        $byCourse = $this->timetable->searchByCourse($day, $period);
        $byTimeslot = $this->timetable->searchByTimeslot($day, $period);
        
        $ok = "";
        if(count($byDay) == 1 && count($byCourse) == 1 && count($byTimeslot) == 1
                && ($byDay[0] == $byCourse[0]) && ($byDay[0] == $byTimeslot[0])){
            $ew = array('howdoiparsethis' => "Booking From DAY");
            $int = (array)$byDay[0];
            $ew = array_merge($ew, $int);
            $this->data['sbingo'] = "Bingo";
            $ok = $this->parser->parse('bookingparse', $ew, true);
            $this->data['showsingle'] = $ok;
           
           
       }
       else if(count($byDay) > 1 || count($byCourse) > 1 || count($byTimeslot) > 1){
           $this->data['bingo'] = "No Bingo";
           $this->data['showsingle'] = "Day Count: " . count($byDay) . " Course Count: " . count($byCourse) .
                   " Timeslot Count: " . count($byTimeslot);
           
       }
       else{
            $this->data['sbingo'] = "No Bingo";

            if(!count($byDay) && !count($byCourse) && !count($byTimeslot)){
              
                $this->data['showsingle'] = "No results found";
            }
            else{

                $this->data['showsingle'] = "Some results were found, displaying below:";

                if(count($byDay)){
                    $d = array('howdoiparsethis' => "Booking From DAY");
                    $intd = (array)$byDay[0];
                    $d = array_merge($d, $intd);
                    $ok = $this->parser->parse('bookingparse', $d, true);
                    $this->data['showday'] = $ok;
                }
                if(count($byCourse)){
                    $c = array('howdoiparsethis' => "Booking From COURSE");
                    $intc = (array)$byCourse[0];
                    $c = array_merge($c, $intc);
                    $ok = $this->parser->parse('bookingparse', $c, true); 
                    $this->data['showclass'] = $ok;
                }
                if(count($byTimeslot)){
                    $t = array('howdoiparsethis' => "Booking From TIMESLOT");
                    $intt = (array)$byTimeslot[0];
                    $t = array_merge($t, $intt);
                    $ok = $this->parser->parse('bookingparse', $t, true);
                    $this->data['showtimeslot'] = $ok;
                }
          }
       }
       
        $this->render();
      
   }
   
    
}
