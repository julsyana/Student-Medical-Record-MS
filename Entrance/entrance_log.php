<?php 
   // session_start(); 
   include "./connection.php";
   include './queries.php';
?>

<div class="message"> </div>

<table>
   <thead>
      <tr>
         <th colspan="5"> Students </th>
      </tr>

      <tr>
         <td>Student No.</td>
         <td>Name</td>
         <td>Year Level</td>
         <td>Section</td>
         <td>Time-in</td>
      </tr>
   </thead>

   <tbody>
      <?php
         if(mysqli_num_rows($res_entrance_log) > 0){
         while($entered_student = mysqli_fetch_assoc($res_entrance_log)) {
            
            $student_name = $entered_student['lastname'].", ".$entered_student['firstname']." ".$entered_student['middle_initial'];

            
            $time_in = $entered_student['timein'];
            $time_in = new DateTime("$time_in");
            
            $time_in = $time_in->format("h:i A"); 
            
            
            if($entered_student['Status'] == 'Verified') { ?>

               <tr >
                  <td style="background-color: rgb(110, 232, 120)" ><?=$entered_student['student_number']?></td>
                  <td><?=$student_name?> </td>
                  <td><?=$entered_student['year_level']?></td>
                  <td><?=$entered_student['Section']?></td>
                  <td><?=$time_in?></td>
               </tr>

            <?php } else if ($entered_student['Status'] == 'Pending') { ?>
               <tr >
                  <td style="background-color: rgb(232, 214, 110)" ><?=$entered_student['student_number']?></td>
                  <td><?=$student_name?> </td>
                  <td><?=$entered_student['year_level']?></td>
                  <td><?=$entered_student['Section']?></td>
                  <td><?=$time_in?></td>
               </tr>
               
            <?php }?>

            

            

         <?php }

         } else { ?>

            <tr>
               <td colspan="5"> No student yet </td>
            </tr>
            
         <?php }
      ?>
   </tbody>
</table>