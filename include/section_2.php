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
    </div>
</section>