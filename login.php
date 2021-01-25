<?php

function getVersion() {
    return md5(file_get_contents(__DIR__ . '/aplication.js'));
}
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $data = json_decode(file_get_contents('php://input'));
    $email = $data->email;
    $user_password = md5($data->password);
    
    $servername = 'localhost';
    $database = 'register';
    $username = 'register_user';
    $password = 'vu5axC7xagCyOViL';

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    $sql = "SELECT * FROM users WHERE email='{$email}' AND user_password='{$user_password}'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $name = $row["user_name"];
            $response = [
                'sucess'=> true,
                'message'=> "welcome {$name}",
            ];
        }
    }else{
        $response = ['sucess'=>false, 'error'=> "not match"];
    }
    echo json_encode($response);
    exit;
}elseif($_SERVER['REQUEST_METHOD']!=='GET'){
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loging</title>
</head>
<body>
    <main>
        <form action="" id="loginForm">
            <label>E-mail</label>
            <input id="email" type="email" placeholder="Insert your email">

            <label for="">Password</label>
            <input id="password" type="password" placeholder="Password">

            <input type="submit" class="btn-primary btn">Access</button>
        </form>
    </main>
    <script type="text/javascript" src="aplication.js?v=<?php echo getVersion() ?>"></script>
</body>
</html>