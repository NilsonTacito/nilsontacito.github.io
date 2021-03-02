<?php
$usuario = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$sql = "SELECT email FROM cliente WHERE email = '{$usuario}' AND senha = '{$senha}'";
$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);
    if($row == 1) {
        header('Location: http://192.168.1.30/tcc/dash/examples/cadastro-veiculo.php');
        exit();
    }
?>

