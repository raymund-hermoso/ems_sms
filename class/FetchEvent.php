<?php
include_once('DbConnection.php');
include_once('InsertUserDetails.php');
 
class FetchEvent extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Events (Admin)
    public function getEvents(){
 
        $sql = "SELECT * FROM tbl_event";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
        
                $date_start = date('F j, Y', strtotime($row['date_start']));
                $time_start = date('g:i a', strtotime($row['time_start']));
                $date_end = date('F j, Y', strtotime($row['date_end']));
                $time_end = date('g:i a', strtotime($row['time_end']));

                echo '<tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$date_start.' | '.$time_start.'</td>
                        <td>'.$date_end.' | '.$time_end.'</td>
                        <td>'.$row['venue'].'</td>
                        <td>';
                        if($row['status'] == 'request'){
                            echo '<span class="badge badge-warning">';
                        }
                        else if($row['status'] == 'disapproved'){
                            echo '<span class="badge badge-danger">';
                        }
                        else if($row['status'] == 'posted'){
                            echo '<span class="badge badge-success">';
                        }
                        else if($row['status'] == 'approved'){
                            echo '<span class="badge badge-primary">';
                        }
                        else{
                            echo 'error badge';
                        }
                echo    ucfirst($row['status']).'</span>
                        </td>
                        <td><a href="view-event.php?id='.$row['event_id'].'&date_start='.$row['date_start'].'&time_start='.$row['time_start'].'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Preview</a></td>
                    </tr>';
            }
        }
        else{
            return false;
        }
    }

    //My Events (Admin)
    public function getMyEvents(){
        
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM tbl_event WHERE user_id = '$user_id'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
        
                $date_start = date('F j, Y', strtotime($row['date_start']));
                $time_start = date('g:i a', strtotime($row['time_start']));
                $date_end = date('F j, Y', strtotime($row['date_end']));
                $time_end = date('g:i a', strtotime($row['time_end']));

                echo '<tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$date_start.' | '.$time_start.'</td>
                        <td>'.$date_end.' | '.$time_end.'</td>
                        <td>'.$row['venue'].'</td>
                        <td>';
                        if($row['status'] == 'request'){
                            echo '<span class="badge badge-warning">';
                        }
                        else if($row['status'] == 'disapproved'){
                            echo '<span class="badge badge-danger">';
                        }
                        else if($row['status'] == 'posted'){
                            echo '<span class="badge badge-success">';
                        }
                        else if($row['status'] == 'approved'){
                            echo '<span class="badge badge-primary">';
                        }
                        else{
                            echo 'error badge';
                        }
                echo    ucfirst($row['status']).'</span>
                        </td>
                        <td><a href="my-view-event.php?id='.$row['event_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Preview</a></td>
                    </tr>';
            }
        }
        else{
            return false;
        }
    }
    
    //Events Details
    public function getEventDetails(){
        
        $role = $_SESSION['role'];

        $limit = 4;

        // $limit += isset($_GET['event_add']);

        $sql = "SELECT * FROM tbl_event WHERE status = 'posted' ORDER BY event_id DESC LIMIT $limit";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<div class="col-lg-6">

                        <!-- Dropdown Card -->
                        <div class="card shadow mb-4" data-aos="fade-down">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">'.$row['title'].'</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">View</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">'.
                                $row['event_desc']   
                            .'
                                <hr>
                                <h5>Venue: '.$row['venue'].'</h5>
                                <h6>'.date("F j, Y", strtotime($row['date_start'])).' - '.date("F j, Y", strtotime($row['date_end'])).'</h6>
                                <h6>'.date("g:i a", strtotime($row['time_start'])).' - '.date("g:i a", strtotime($row['time_end'])).'</h6>
                                
                                
                            </div>
                        </div>

                    </div>';
            }
        }
        else{
            echo '<div class="col-lg-12">

                    <!-- Dropdown Card -->
                    <div class="card shadow mb-4" data-aos="fade-down">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">No Event</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">No Event for today.</div>
                    </div>

                </div>';
        }
    }

    //Events Details Requested
    public function getEventRequested(){

        $user_id = $_SESSION['user_id'];
        
        $sql = "SELECT a.*, b.* FROM tbl_event AS a LEFT JOIN tbl_role AS b ON a.invitee = b.id WHERE a.user_id = '$user_id'";
        
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['venue'].'</td>
                        <td>'.ucfirst($row['role_desc']).'</td>
                        <td>';
                        if($row['event_type'] == 1) {
                            echo 'For Department';
                        }
                        else {
                            echo 'Request to Admin';
                        }
                echo '</td>
                        <td>';
                        if($row['status'] == 'request'){
                            echo '<span class="badge badge-warning">';
                        }
                        else if($row['status'] == 'posted'){
                            echo '<span class="badge badge-success">';
                        }
                        else if($row['status'] == 'approved'){
                            echo '<span class="badge badge-primary">';
                        }
                        else if($row['status'] == 'disapproved'){
                            echo '<span class="badge badge-danger">';
                        }
                        else{
                            echo 'error badge';
                        }
                echo    ucfirst($row['status']).'</span>
                        </td>
                        <td>';
                        if($row['status'] == 'approved'){
                            echo '<a href="view-event.php?id='.$row['event_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>';
                            // echo '<a href="#" data-toggle="modal" data-target="#PostEventModal" class="btn btn-success btn-user btn-sm"><i class="fas fa-sticky-note"></i> Post</a>';
                        }
                        else if($row['status'] == 'posted'){
                            echo '<a href="send_sms.php?inv_dept='.$row['invited_department'].'&invitee='.$row['invitee'].'&event_id='.$row['event_id'].'&event_type='.$row['event_type'].'" class="btn btn-primary btn-sm"><i class="fas fa-envelope"></i> Send Message</a>';
                        }else{
                            echo '<a href="view-event.php?id='.$row['event_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>';
                        }
                echo    '</td>
                    </tr>';
            }
        }
        else{
            // echo 'None';
        }
    }

    //Event Preview Details
    public function getPreviewEventDetails(){

        $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

        $event_id = isset($_GET['id']) ? $_GET['id'] : '';

        $sql = "SELECT a.*, b.*, c.* FROM tbl_event AS a LEFT JOIN tbl_department AS b ON a.invited_department = b.id LEFT JOIN tbl_role AS c ON a.invitee = c.id WHERE event_id = '$event_id'";
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_assoc();

            $date_start = date('F j, Y', strtotime($row['date_start']));
            $time_start = date('g:i A', strtotime($row['time_start']));
            $date_end = date('F j, Y', strtotime($row['date_end']));
            $time_end = date('g:i A', strtotime($row['time_end']));

            echo '<div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Event Details</h6>
                    </div>
                    <div class="card-body">
                    <p><b>Title:</b> '.$row['title'].'</p>
                    <p><b>Venue:</b> '.$row['venue'].'</p>
                    <p><b>Start:</b> '.$date_start.' - '.$time_start.'</p>
                    <p><b>End:</b> '.$date_end.' - '.$time_end.'</p>
                    <p><b>Status:</b>'; if($row['status'] == 'request' || $row['status'] == 'disapproved'){ echo ' <span class="badge badge-warning">'.ucfirst($row['status']); } else { echo ' <span class="badge badge-success">'.ucfirst($row['status']); } echo '</span></p>
                    <p><b>Details:</b> </br>'.$row['event_desc'].'</p>
                    <p><b>Invited Department:</b> '.$row['department_name'].'</p>
                    <p><b>Invitee:</b> '.ucfirst($row['role_desc']).'</p>
                    <hr>
                    <div class="form-group">';
                    if($row['status'] == 'request'){
                        if($_SESSION['role'] == 1){
                            echo '<a href="#" data-toggle="modal" data-target="#UpdateEventModal" class="btn btn-success btn-user">Approved</a> 
                                    <a href="#" data-toggle="modal" data-target="#UpdateEventModal-da" class="btn btn-warning btn-user">Disapproved</a>';
                        }
                        else{
                            echo '<a href="event.php" class="btn btn-primary btn-user">Back</a>';
                        }
                    }
                    else if($row['status'] == 'approved'){
                        echo '<a href="#" data-toggle="modal" data-target="#PostEventModal" class="btn btn-success btn-user">Post</a>';
                    }
                    else{
                        if($page == 'my-view-event.php'){
                            echo '<a href="send-sms.php?inv_dept='.$row['invited_department'].'&invitee='.$row['invitee'].'&event_id='.$row['event_id'].'" class="btn btn-primary btn-user">Send SMS</a>';
                        }
                        else{
                            echo '<a href="event.php" class="btn btn-primary btn-user">Back</a>';
                        }
                        
                    }
            echo    '</div>
                    </div>
                    
                </div>';
        }
        else{
            echo '<div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Title</h6>
                    </div>
                    <div class="card-body">
                        Description
                    </div>
                </div>';
        }
    }

    //Events Details Recipient Student
    public function getEventRecipient(){

        $inv_dept = isset($_GET['inv_dept']) ? $_GET['inv_dept'] : '';
        $invitee = isset($_GET['invitee']) ? $_GET['invitee'] : '';
        $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';
        $event_type = isset($_GET['event_type']) ? $_GET['event_type'] : '';
        $department_id = isset($_SESSION['department_id']) ? $_SESSION['department_id'] : "";

        if($event_type == 1) {

            // Department Head All Invited - event type = 1
            $sql = "SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.* FROM tbl_student a, 
                                                        tbl_course b, 
                                                        tbl_department c,
                                                        tbl_users d, 
                                                        tbl_event e,
                                                        tbl_role f, 
                                                        tbl_faculty g
                                            
                                                    WHERE 
                                                            (
                                                                (g.school_id_number = d.id_number AND g.dept_id = '$department_id') 
                                                                OR 
                                                                (a.school_id_number = d.id_number)
                                                            ) AND 
                                                            b.dept_id = c.id AND
                                                            a.course_id = b.id AND
                                                            d.role = f.id AND 
                                                            c.id = '$department_id' AND 
                                                            e.event_id = '$event_id' 
                                                    GROUP BY d.id_number";
        }
        else if($event_type == 2) {

            if($invitee == 5 && $inv_dept == 6) {

                // Department Head Invited the selected invitee (Request to admin) - event type = 2 and invitee is all
                $sql = "SELECT a.*, b.*, c.* FROM tbl_users a,
                                                tbl_event b,
                                                tbl_role c
                                                
                                                WHERE 
                                                a.role = c.id AND
                                                b.event_id = '$event_id' AND
                                                (a.role = '$invitee' OR a.role_all = '$invitee')";
            }
            elseif($invitee == 5) {

                $sql = "SELECT a.*, b.*, c.*, d.*, e.*, f.* FROM tbl_student a, 
                                                        tbl_course b, 
                                                        tbl_department c,
                                                        tbl_users d, 
                                                        tbl_event e,
                                                        tbl_role f, 
                                                        tbl_faculty g
                                            
                                                    WHERE 
                                                            (
                                                                a.school_id_number = d.id_number OR 
                                                                g.school_id_number = d.id_number
                                                            ) 
                                                            AND 
                                                            (
                                                                a.course_id = b.id AND b.dept_id = c.id AND g.dept_id = c.id
                                                            ) 
                                                            AND 
                                                            (
                                                                c.id = '$inv_dept' AND b.dept_id = '$inv_dept' OR f.id = '$invitee'
                                                            )   
                                                            -- AND
                                                            -- e.invited_department = '$inv_dept'
                                                            AND
                                                            d.role = f.id AND
                                                            e.event_id = '$event_id'
                                                    GROUP BY d.id_number";

            }
            elseif($invitee == 2) {

                // Student
                $sql = "SELECT a.*, b.*, c.*, d.*, e.*, f.* FROM tbl_student a, 
                                                        tbl_course b, 
                                                        tbl_department c,
                                                        tbl_users d, 
                                                        tbl_event e,
                                                        tbl_role f
                                            
                                                    WHERE
                                                            (
                                                                a.school_id_number = d.id_number
                                                            ) 
                                                            AND 
                                                            (
                                                                a.course_id = b.id AND b.dept_id = c.id 
                                                            ) 
                                                            AND 
                                                            (
                                                                c.id = '$inv_dept' AND b.dept_id = '$inv_dept'
                                                            ) 
                                                            -- AND
                                                            -- e.invited_department = '$inv_dept'
                                                            AND
                                                            d.role = f.id 
                                                            AND
                                                            e.event_id = '$event_id'
                                                    GROUP BY d.id_number";

            }
            elseif ($invitee == 4) {

                // Faculty
                $sql = "SELECT a.*, c.*, d.*, e.*, f.* FROM tbl_faculty a, 
                                                        tbl_department c,
                                                        tbl_users d, 
                                                        tbl_event e,
                                                        tbl_role f 
                                            
                                                    WHERE 
                                                            (
                                                                a.school_id_number = d.id_number
                                                            ) AND 
                                                            a.dept_id = c.id AND
                                                            d.role = f.id AND 
                                                            c.id = '$department_id' AND 
                                                            e.event_id = '$event_id' 
                                                    GROUP BY d.id_number";

            }
        }
        else {

            if($inv_dept == 6 && $invitee == 5) {

                $sql = "SELECT a.*, b.*, c.* FROM tbl_users a,
                                                tbl_event b,
                                                tbl_role c
                                                
                                                WHERE 
                                                a.role = c.id AND
                                                b.event_id = '$event_id' AND
                                                (a.role = '$invitee' OR a.role_all = '$invitee')";
            }
            else if($invitee == 2 || $invitee == 4) {

                // Student or faculty
                $sql = "SELECT a.*, b.*, c.*, d.*, e.*, f.* FROM tbl_student a, 
                                                        tbl_course b, 
                                                        tbl_department c,
                                                        tbl_users d, 
                                                        tbl_event e,
                                                        tbl_role f, 
                                                        tbl_faculty g
                                            
                                                    WHERE 
                                                            (
                                                                a.school_id_number = d.id_number OR 
                                                                g.school_id_number = d.id_number
                                                            ) 
                                                            AND 
                                                            (
                                                                a.course_id = b.id AND b.dept_id = c.id AND g.dept_id = c.id
                                                            ) 
                                                            AND 
                                                            (
                                                                c.id = '$inv_dept' AND b.dept_id = '$inv_dept' AND f.id = '$invitee'
                                                            )   
                                                            -- AND
                                                            -- e.invited_department = '$inv_dept'
                                                            AND
                                                            d.role = f.id AND
                                                            e.event_id = '$event_id'
                                                    GROUP BY d.id_number";

                       
            }
            else if($invitee == 5) {

                $sql = "SELECT a.*, b.*, c.*, d.*, e.*, f.* FROM tbl_student a, 
                                                        tbl_course b, 
                                                        tbl_department c,
                                                        tbl_users d, 
                                                        tbl_event e,
                                                        tbl_role f, 
                                                        tbl_faculty g
                                            
                                                    WHERE 
                                                            (
                                                                a.school_id_number = d.id_number OR 
                                                                g.school_id_number = d.id_number
                                                            ) 
                                                            AND 
                                                            (
                                                                a.course_id = b.id AND b.dept_id = c.id AND g.dept_id = c.id
                                                            ) 
                                                            AND 
                                                            (
                                                                c.id = '$inv_dept' AND b.dept_id = '$inv_dept' OR f.id = '$invitee'
                                                            )   
                                                            -- AND
                                                            -- e.invited_department = '$inv_dept'
                                                            AND
                                                            d.role = f.id AND
                                                            e.event_id = '$event_id'
                                                    GROUP BY d.id_number";
                
            }

        }

        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){

                echo '<tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['id_number'].'</td>
                        <td><span class="badge ';
                        
                        if($row['role_desc'] == 'student'){ 
                            echo 'badge-primary';
                        }
                        else if($row['role_desc'] == 'faculty') {
                            echo 'badge-secondary';
                        }
                        else if($row['role_desc'] == 'admin') {
                            echo 'badge-success';
                        }
                        else if($row['role_desc'] == 'department head') {
                            echo 'badge-warning';
                        }
                        else {
                            echo 'n';
                        }
                echo '">'.ucfirst($row['role_desc']).'</span></td>
                        <td>'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'</td>
                        <td>'.$row['mobile_number'].'</td>';

                        $sql_sms = "SELECT * FROM tbl_sms_recipient WHERE school_id_number = '".$row['id_number']."' AND event_id = '".$row['event_id']."'";
                        $query_sms = $this->connection->query($sql_sms);

                        if($query_sms->num_rows > 0){
                            $broadcast = '<span class="badge badge-success">Broadcast</span>';
                        }
                        else {
                            $broadcast = '<span class="badge badge-warning">Non-Broadcast</span>';
                        }

                echo    '<td>'.$broadcast.'</td>
                        <td>
                            <a class="';
                            if($query_sms->num_rows > 0){
                                echo 'disabled ';
                            }
                            echo 'btn btn-primary btn-sm" href="?send_sms=one&school_id_number='.$row['id_number'].'&number='.$row['mobile_number'].'&inv_dept='.$inv_dept.'&invitee='.$invitee.'&event_id='.$event_id.'&event_type='.$row['event_type'].'" >Send</a>';
                        // if($row['status'] == 'approved'){
                        //     echo '<a href="view-event.php?id='.$row['event_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>';
                        // }else{
                        //     echo '<a href="send_sms.php?inv_role='.$row['invited_role'].'&inv_course='.$row['invited_course'].'" class="btn btn-primary btn-sm">Send Message</a>';
                        // }
                echo    '</td>
                    </tr>';

            }
        }
        else{
            // echo 'None';
        }
    }
    
    public function itexmo($event_id){

        $sql = "SELECT * FROM tbl_event WHERE event_id = '$event_id'";
        $query = $this->connection->query($sql);

        $number = isset($_GET['number']) ? $_GET['number'] : '';

        $apicode = 'ST-RAYMU997571_K5CDJ';
        $passwd = '6jkq[lc@83';

        if($query->num_rows > 0){

            $row = $query->fetch_assoc();

            $message =  'This is to inform you that we have an event.'.PHP_EOL;
            $message .=  ''.PHP_EOL;
            $message .= 'Title: '.$row['title'].PHP_EOL;
            $message .= 'Description: '.$row['event_desc'].PHP_EOL;
            $message .= 'Venue: '.$row['venue'].PHP_EOL;
            $message .= date("F j, Y", strtotime($row['date_start'])).' - '.date("F j, Y", strtotime($row['date_end'])).PHP_EOL;
            $message .= date("g:i a", strtotime($row['time_start'])).' - '.date("g:i a", strtotime($row['time_end'])).PHP_EOL;

            $message .=  ''.PHP_EOL;
            $message .=  'Thankyou.'.PHP_EOL;
            $message .=  ''.PHP_EOL;
        }

        $ch = curl_init();
        // $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        // $param = array(
        //         'http'    => array(
        //         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        //         'method'  => 'POST',
        //         'content' => http_build_query($itexmo),
        //     ),
        // );
        // $context  = stream_context_create($param);
        // return file_get_contents($url, false, $context);

        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec ($ch);
        curl_close ($ch); 
        
    }

    public function broadcast($school_id_number, $event_id){

        $inv_dept = isset($_GET['inv_dept']) ? $_GET['inv_dept'] : '';
        $invitee = isset($_GET['invitee']) ? $_GET['invitee'] : '';
        $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';
        $event_type = isset($_GET['event_type']) ? $_GET['event_type'] : '';

        $sql_broadcast = "INSERT INTO tbl_sms_recipient (school_id_number, event_id, sent) VALUES ('".$school_id_number."', '".$event_id."', 1)";
        $query = $this->connection->query($sql_broadcast);

        if ($query === TRUE) {

            $_SESSION['message'] = "Message Sent!";
            if($_SESSION['role'] == 1){
                header("location: send-sms.php?inv_dept=".$inv_dept."&invitee=".$invitee."&event_id=".$event_id);
            }
            else {
                header("location: send_sms.php?inv_dept=".$inv_dept."&invitee=".$invitee."&event_id=".$event_id."&event_type=".$event_type);
            }
        } else {
            return false;
        }

    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}

if(isset($_GET['send_sms'])) {

    $inv_dept = isset($_GET['inv_dept']) ? $_GET['inv_dept'] : '';
    $invitee = isset($_GET['invitee']) ? $_GET['invitee'] : '';
    $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';
    $event_type = isset($_GET['event_type']) ? $_GET['event_type'] : '';

    if(isset($_GET['send_sms']) == 'one'){
    
        $sms = new FetchEvent();
        
        $result = $sms->itexmo($event_id);

        // $_SESSION['res'] = $result;

    
        if ($result == ""){

            $_SESSION['message'] = "iTexMo: No response from server!!!";

            echo "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
            Please CONTACT US for help. ";	
        }
        else if ($result == 0){

            $school_id_number = isset($_GET['school_id_number']) ? $_GET['school_id_number'] : '';
            $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';

            $result_broadcast = $sms->broadcast($school_id_number, $event_id);

        }
        else{	
            $_SESSION['message'] = "Unable to send!";

            if($_SESSION['role'] == 1){
                header("location: send-sms.php?inv_dept=".$inv_dept."&invitee=".$invitee."&event_id=".$event_id);
            }
            else {
                header("location: send_sms.php?inv_dept=".$inv_dept."&invitee=".$invitee."&event_id=".$event_id."&event_type=".$event_type);
            }
            // echo "Error Num ". $result . " was encountered!";
        }
    }
    else {
        echo 'error';
    }
}
