<?php


$sqltotal = "SELECT COUNT(*) as count FROM `entrance_log` a
JOIN `sample_stud_data` b 
ON a.`student_number` = b.`student_id`
WHERE a.logdate = CURRENT_DATE();";

$result = mysqli_query($conn, $sqltotal);

$count = mysqli_fetch_assoc($result);
$total = $count['count'];



$sqlverfied = "SELECT COUNT(*) as count FROM `entrance_log` a
JOIN `sample_stud_data` b 
ON a.`student_number` = b.`student_id`
WHERE b.`Status` = 'Verified' AND a.logdate = CURRENT_DATE();";

$result1 = mysqli_query($conn, $sqlverfied);

$count_verified = mysqli_fetch_assoc($result1);
$verified_total = $count_verified['count'];



$sqlnotverified = "SELECT COUNT(*) as count FROM `entrance_log` a
JOIN `sample_stud_data` b 
ON a.`student_number` = b.`student_id`
WHERE b.`Status` = 'Pending' AND a.logdate = CURRENT_DATE();";

$result2 = mysqli_query($conn, $sqlnotverified);

$count_not_verified = mysqli_fetch_assoc($result2);
$notverified_total = $count_not_verified['count'];


$sel_cnt_archive = "SELECT COUNT(*) as count FROM `stud_archive` WHERE date_archive = CURRENT_DATE();";

$res_cnt_archive =  mysqli_query($conn, $sel_cnt_archive);

$count_archive = mysqli_fetch_assoc($res_cnt_archive);
$archive_total = $count_archive['count'];


$sel_entrance_log_query ="SELECT *, LEFT(b.middlename, 1) AS `middle_initial` FROM `entrance_log` a
JOIN `stud_data` b
ON a.student_number = b.student_id
JOIN `sample_stud_data` c
ON a.student_number = c.student_id
WHERE (c.Status = 'Verified' OR c.Status = 'Pending') AND a.logdate = CURRENT_DATE() ORDER BY a.id DESC LIMIT 5;";

$res_entrance_log = mysqli_query($conn, $sel_entrance_log_query);









?>