<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "smarthome";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

function login(){
    global $conn;

    if (isset($_SESSION['username'])) {
        header("Location: welcome.php");
    }
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard/dashboard.php");
        } else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }
    }
    return mysqli_affected_rows($conn);
}

function register(){
    global $conn;

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        $command = 'bash code.sh ' . $username . ' ' . $_POST['password'];
        $bash = shell_exec($command);
    
        if ($password == $cpassword) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO users (id, username, email, password)
                        VALUES (UUID(), '$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Wow! User Registration Completed.')</script>";
                    echo "<pre>$bash</pre>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
            }
            
        } else {
            echo "<script>alert('Password Not Matched.')</script>";
        }
    }
    return mysqli_affected_rows($conn);
}


?>