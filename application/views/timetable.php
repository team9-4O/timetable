
<div class ="row container">
    <div>
    <h2>{sbingo}</h2>
    
    {showsingle}
    {showday}
    {showclass}
    {showtimeslot}
    
</div>
    <div class = "col-md-12">
       <h3>{timetitle}</h3>
       <table class ="table table-responsive">
           <tr>
               <th>time</th>
               <th>Day</th>
               <th>Course</th>
               <th>Lecture Type</th>
               <th>Room </th>               
               <th>Instructor</th>
           </tr>
           {timeslots}
            <tr>
                <td>{time}</td>
                <td>{day}</td>
                <td>{course}</td>
                <td>{type}</td>
                <td>{room}</td>
                <td>{instructor}</td>
            </tr>
           {/timeslots}
       </table>
    </div>

    <div class = "col-md-12">
        <h3>{daytitle}</h3>
       <table class ="table">
           <tr>
               <th>time</th>
               <th>Day</th>
               <th>Course</th>
               <th>Lecture Type</th>
               <th>Room </th>               
               <th>Instructor</th>
           </tr>
           {days}
           <tr>
               <td>{time}</td>
               <td>{day}</td>
               <td>{course}</td>
               <td>{type}</td>
               <td>{room}</td>
               <td>{instructor}</td>
           </tr>
           {/days}
       </table>
    </div>

     <div class = "col-md-12">
         <h3>{coursetitle}</h3>
       <table class ="table">
           <tr>
               <th>time</th>
               <th>Day</th>
               <th>Course</th>
               <th>Lecture Type</th>
               <th>Room </th>               
               <th>Instructor</th>
           </tr>
           {bycourse}
           <tr>
               <td>{time}</td>
               <td>{day}</td>
               <td>{course}</td>
               <td>{type}</td>
               <td>{room}</td>
               <td>{instructor}</td>
           </tr>
           {/bycourse}
       </table>
    </div>
</div>
