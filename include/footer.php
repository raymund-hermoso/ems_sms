    
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], "pages") !== false){
    ?>
            <!-- Bootstrap core JavaScript-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../js/sb-admin-2.min.js"></script>

            <!-- AOS -->
            <script src="../js/aos.js"></script>
            
            <script>
                AOS.init();
            </script>

            <!-- sticky nav -->
            <script src="../js/sticky-nav.js"></script>

            <!-- moment -->
            <script src="../js/moment.min.js"></script>

            <!-- date_time -->
            <script src="../js/date_time.js"></script>

    <?php	
        }
        else{
    ?>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- AOS -->
            <script src="js/aos.js"></script>

            <script>
                AOS.init();
            </script>

            <!-- moment -->
            <script src="js/moment.min.js"></script>

            

    <?php
        }
    ?>

</body>

</html>