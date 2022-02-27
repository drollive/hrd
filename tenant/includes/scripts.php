    
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>

    <!-- Data Table -->
    <script>
        $(document).ready( function () 
        {
            //it's in a hash there for I need to call it into an id
            $('#myDataTable').DataTable();
        } );
    </script>

    <script>
        $(document).ready( function () 
        {
            //it's in a hash there for I need to call it into an id
            $('#myDataTable2').DataTable();
        } );
    </script>


    <script src="js/scripts.js"></script>
    
    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() 
        {
            // $("#summernote").summernote();

            $('#summernote').summernote
            ({
                placeholder: 'Type your Description',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script src="js/sweetalert.min.js"></script>

     <!-- Delete User -->
    <script>
        $(document).ready(function() {
            $('.delete_btn_ajax').click(function(e){
            e.preventDefault();
                // console.log('Hello'); i just checked if this shit is working
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                //console.log(deleteid);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type:"POST",
                                url:"code.php",
                                data:{
                                    "delete_btn_users" : 1,
                                    "delete_id" : deleteid,
                                },
                                success: function (response){

                                    swal("Data Deleted Successfully!", {
                                        icon:"success",
                                    }).then((result) =>{
                                        location.reload();
                                    });

                                }
                            });
                            
                        } 
                    });
            });
        });
    </script>

     <!-- Delete House-->
    <script>
        $(document).ready(function() {
            $('.delete_btn_ajax').click(function(e){
            e.preventDefault();
                // console.log('Hello'); i just checked if this shit is working
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                //console.log(deleteid);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type:"POST",
                                url:"code.php",
                                data:{
                                    "delete_btn_users" : 1,
                                    "delete_id" : deleteid,
                                },
                                success: function (response){

                                    swal("Data Deleted Successfully!", {
                                        icon:"success",
                                    }).then((result) =>{
                                        location.reload();
                                    });

                                }
                            });
                            
                        } 
                    });
            });
        });
    </script>
    
    <!-- Delete Bill-->
    <script>
        $(document).ready(function() {
            $('.delete_btn_ajax').click(function(e){
            e.preventDefault();
                // console.log('Hello'); i just checked if this shit is working
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                //console.log(deleteid);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type:"POST",
                                url:"code.php",
                                data:{
                                    "delete_btn_bill" : 1,
                                    "delete_id" : deleteid,
                                },
                                success: function (response){

                                    swal("Data Deleted Successfully!", {
                                        icon:"success",
                                    }).then((result) =>{
                                        location.reload();
                                    });

                                }
                            });
                            
                        } 
                    });
            });
        });
    </script>

    <!-- Delete Tenant-->
    <script>
        $(document).ready(function() {
            $('.delete_btn_ajax').click(function(e){
            e.preventDefault();
                // console.log('Hello'); i just checked if this shit is working
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                //console.log(deleteid);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type:"POST",
                                url:"code.php",
                                data:{
                                    "delete_btn_tenant" : 1,
                                    "delete_id" : deleteid,
                                },
                                success: function (response){

                                    swal("Data Deleted Successfully!", {
                                        icon:"success",
                                    }).then((result) =>{
                                        location.reload();
                                    });

                                }
                            });
                            
                        } 
                    });
            });
        });
    </script>

    <!-- Delete Payment-->
    <script>
        $(document).ready(function() {
            $('.delete_btn_ajax').click(function(e){
            e.preventDefault();
                // console.log('Hello'); i just checked if this shit is working
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                //console.log(deleteid);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type:"POST",
                                url:"code.php",
                                data:{
                                    "delete_btn_payment" : 1,
                                    "delete_id" : deleteid,
                                },
                                success: function (response){

                                    swal("Data Deleted Successfully!", {
                                        icon:"success",
                                    }).then((result) =>{
                                        location.reload();
                                    });

                                }
                            });
                            
                        } 
                    });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Date Picker-->
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>

        


</body>
</html>
