<?php
    session_start();

    session_destroy();
    echo "
        <script>
            alert('Anda telah logout');
            document.location.href= 'index.php';
        </script> 
    ";  
?>