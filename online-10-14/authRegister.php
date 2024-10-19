<?php
$fullname=$_POST["fullname"];
$password=$_POST["password"];
$username=$_POST["username"];
$confirmPassword=$_POST["confirmPassword"];
echo $fullname."<br>";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(trim($password)==trim($confirmPassword))
    {
        $host = "localhost";
        $database = "ecommerce";
        $dbusername = "root";
        $dbpassword = "";

        $dsn = "mysql: host=$host;dbname=$database;";
        try {
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt=$conn->prepare('INSERT INTO users (fullname,username,password,created_ai,updated_ai) VALUES (:p_fullname, :p_username, :p_password, NOW(), NOW())');
            $stmt->bindParam(':p_username', $username);
            $stmt->bindParam(':p_fullname', $fullname);
            $stmt->bindParam(':p_password', $password);
            $stmt->execute();
            header("location: /registration.php?success=Registration Successful");
            echo "Connection Successful.";
        } catch (Exception $e){
            echo "Connection Failed: " . $e->getMessage();
        }
    } else {
        header("location: /registration.php/error=Password not the same");
    exit;
    }
    
}
?>