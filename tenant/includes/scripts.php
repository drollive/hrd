    
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>

    
    <!-- Add the evo-calendar.js -->
    <script src="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/js/evo-calendar.min.js"></script>

    <!-- Data Table -->
    <script>
        $(document).ready( function () 
        {
            //it's in a hash there for I need to call it into an id
            $('#myDataTable').DataTable();
        } );
    </script>


    <script>
      $("#calendar").evoCalendar();
    </script>

    
</body>
</html>
