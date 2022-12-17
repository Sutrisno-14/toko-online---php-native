<?php
    session_destroy();

    echo "
    <script>
        alert('Anda telah logout');
        document.location.href= 'login.php';
    </script> 
    ";

?>