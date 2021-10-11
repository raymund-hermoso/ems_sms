    
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

            <!-- Page level plugins -->
            <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
            
            <!-- Page level custom scripts -->
            <script src="../js/demo/datatables-demo.js"></script>

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
    <!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="../include/logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>

</body>

</html>