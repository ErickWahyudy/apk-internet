<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    timeout = setTimeout(function () {
        $('#myModal').modal('show');
    }, 1000);

        function backupDatabaseTables(){
            $.get("database.php", function(){
            })
            setTimeout(() => {
                Timeout(backupDatabaseTables, 1000);
            }, timeout);
        }
        backupDatabaseTables();     
</script>