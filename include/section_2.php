<?php 
    include_once '../class/FetchEvent.php';
?>
<section id="event-sec" class="section">
    <div class="container">
        <h2 class="m-0 text-dark custom-heading-h2" data-aos="fade-down">Event</h2>
        
        <div class="row">
            <?php 
                $event = new FetchEvent();
                $event->getEventDetails();
            ?>
            
        </div>
        <div class="row">
            <div class="col col-md-12">
                
                <button type="button" class="btn btn-primary" onclick="event_add()" data-aos="fade-down">Load More</button>
            </div>
        </div>
    </div>
</section>

<script>

    var e = 4;

    function event_add() {
        e += 2;

        if (history.pushState) {
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?event_add=' + e;
            
            window.history.pushState({path:newurl},'',newurl);
        }

        console.log(e);
    }
    
</script>