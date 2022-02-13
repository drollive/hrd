    
    
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>
    
    <script>
    $(document).ready( function () 
    {
        //its in a hash there for I need to call it into id
        $('#myDataTable').DataTable();
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
    <!-- //Summernote JS - CDN Link -->


</body>
</html>
