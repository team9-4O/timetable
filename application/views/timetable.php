{pagetitle}
<div class ="row container">
    <div class = "table-responsive">

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

    <div class = "table-responsive">

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

     <div class = "table-striped">

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
