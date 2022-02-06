<?php
include_once('DbConnection.php');
 
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
                        <td><a href="view-event.php?id='.$row['event_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Preview</a></td>
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

        $sql = "SELECT * FROM tbl_event WHERE status = 'posted' ORDER BY event_id DESC LIMIT 4";
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
                            echo '<a href="send_sms.php?inv_dept='.$row['invited_department'].'&invitee='.$row['invitee'].'&event_id='.$row['event_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-envelope"></i> Send Message</a>';
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

        $event_id = isset($_GET['id']) ? $_GET['id'] : '';

        $sql = "SELECT * FROM tbl_event WHERE event_id = '$event_id'";
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
                        echo '<a href="event.php" class="btn btn-primary btn-user">Back</a>';
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

    //Events Details Recipient
    public function getEventRecipient(){

        $inv_dept = isset($_GET['inv_dept']) ? $_GET['inv_dept'] : '';
        $invitee = isset($_GET['invitee']) ? $_GET['invitee'] : '';
        $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';

        if($invitee == 5) {
            $sql = "SELECT a.*, b.* FROM tbl_event AS a LEFT JOIN tbl_users AS b ON a.invitee = b.role_all WHERE b.role != 1 AND a.event_type = 1";
        }
        else {
            $sql = "SELECT a.*, b.*, c.*, d.*, e.* FROM tbl_users AS a LEFT JOIN tbl_student AS b ON a.id_number = b.school_id_number LEFT JOIN tbl_faculty AS c ON a.id_number = c.school_id_number LEFT JOIN tbl_department_head AS d ON a.id_number = d.school_id_number LEFT JOIN tbl_event AS e ON a.role = e.invitee WHERE a.role = '$inv_dept' OR b.course_id = '$invitee' AND e.event_id = '$event_id'";
        }

        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['lastname'].', '.$row['firstname'].' '.$row['lastname'].'</td>
                        <td>'.$row['mobile_number'].'</td>
                        <td>
                            <a href="?send_sms=one&number='.$row['mobile_number'].'&inv_dept='.$inv_dept.'&invitee='.$invitee.'&event_id='.$event_id.'" class="btn btn-primary btn-sm">Send</a>';
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

        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
                'http'    => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
        
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}

if(isset($_GET['send_sms'])) {

    $inv_dept = isset($_GET['inv_dept']) ? $_GET['inv_dept'] : '';
    $invitee = isset($_GET['invitee']) ? $_GET['invitee'] : '';
    $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';

    if(isset($_GET['send_sms']) == 'one'){

        $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';
    
        $sms = new FetchEvent();
        
        $result = $sms->itexmo($event_id);
    
        if ($result == ""){
            echo "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
            Please CONTACT US for help. ";	
        }
        else if ($result == 0){
            $_SESSION['message'] = "Message Sent!";
            header("location: send_sms.php?invitee=".$invitee."&event_id=".$event_id);
        }
        else{	
            echo "Error Num ". $result . " was encountered!";
        }
    }
    else {
        echo 'error';
    }
}
