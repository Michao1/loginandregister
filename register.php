<?php

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $data = json_decode(file_get_contents('php://input'));
    $name = $data->name;
    $email = $data->email;
    $user_password = md5($data->password);
    
    $servername ='localhost';
    $database ='register';
    $username ='register_user';
    $password ='vu5axC7xagCyOViL';

    $conn = mysqli_connect($servername, $username, $password, $database);
    if($conn){
    
        $sql="INSERT INTO users (user_name,email,user_password)
        VALUES('$name', '$email', '$user_password')";

        if($result = mysqli_query($conn, $sql)){
            $response = [
                'success' => true,
                'result' => $result,
                'user' => [
                    'email' => $email,
                ]
            ];
            
        } else{
            $response = ['success' => false, 'error' => mysqli_error($conn)];
        }
        mysqli_close($conn);
    } else {
        $response = ['success' => false, 'error' => mysqli_connect_error()];
    }
    echo json_encode($response);
    exit();
} elseif($_SERVER['REQUEST_METHOD']!=='GET') {
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script type="text/javascript" src="aplication.js"></script>
</head>
<body>
    <main>
        <form action="" id=form>
            <label for="">Full Name:</label>
            <input id="name" type="text" placeholder="Insert your full name">

            <label for="">Email</label>
            <input id="email" type="email" placeholder="Insert ypur E-mail">

            <label for="">Password</label>
            <input id="password" type="password" placeholder="Password">

            <input type="button" value="Send" onclick="getData()">
        </form>
    </main>
</body>
</html>