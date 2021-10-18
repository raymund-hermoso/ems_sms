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
                        else if($row['status'] == 'post'){
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
 
        $sql = "SELECT * FROM tbl_event WHERE status = 'post' ORDER BY event_id DESC";
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
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">'.
                                $row['event_desc']   
                            .'</div>
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
                                    <a class="dropdown-item" href="#">Something else here</a>
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
 
        $sql = "SELECT * FROM tbl_event WHERE user_id = '$user_id' ORDER BY event_id DESC";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['venue'].'</td>
                        <td>';
                        if($row['status'] == 'request'){
                            echo '<span class="badge badge-warning">';
                        }
                        else if($row['status'] == 'post'){
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
                        <td>';
                        if($row['status'] == 'approved'){
                            echo '<a href="view-event.php?id='.$row['event_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-sticky-note"></i> Post</a> <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-sticky-note"></i> Details</a>';
                        }else{

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

            echo '<div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">'.$row['title'].'</h6>
                    </div>
                    <div class="card-body">
                    <p>'
                        .$row['event_desc'].
                    '</p>
                    <div class="form-group">';
                    if($row['status'] == 'request'){
                        echo '<a href="#" data-toggle="modal" data-target="#UpdateEventModal" class="btn btn-success btn-user">Approved</a>';
                    }
                    else if($row['status'] == 'approved'){
                        echo '<a href="#" data-toggle="modal" data-target="#PostEventModal" class="btn btn-success btn-user">Post</a>';
                    }
                    else{
                        
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
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}