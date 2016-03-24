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

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {

        $this->data['title'] = 'TimeTable';
        $this->data['pagebody'] = 'timetable';
        $this->load->model('timetable');
        $this->data['days'] = $this->timetable->getDays();
        $this->data['timeslots'] = $this->timetable->getTimes();
        $this->data['bycourse'] = $this->timetable->getCourses();
        
        $this->render();
    }

}
