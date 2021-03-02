<?php
session_start();
session_destroy();
header('Location: /tcc/home/index.html');//mandar pra home!
exit();

?>