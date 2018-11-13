<?php
session_start();

if (isset($_POST['submit'])) {


                $conn = mysqli_connect('localhost' , 'root' , '' , 'wt');

                //$sql = "select * from user where username='".$_POST['username']."' and password='".$_POST['password']."'";
                $sql = "select * from user where id='".$_POST['username']."' and password='".$_POST['password']."'";

                echo $sql;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                echo $row['name'];
                echo $row['password'];

                mysqli_close($conn);



                if($_POST['username']==$row['name'] && $_POST['password']==$row['password'] )
                {   

                    $_SESSION['user_id_s'] = $row['id'];
                    $_SESSION['user_name_s'] = $row['name'];
                    $_SESSION['email_s'] = $row['email'];
                    $_SESSION['type_p'] = $row['type'];

                    if($_SESSION['type_p'] == 'User')
                    {
                        header('Location: user_home.php');
                    }
                    else if($_SESSION['type_p'] == 'Admin')
                    {
                        header('Location: user_home.php');
                    }
                    else
                    {
                        echo 'something went wrong';
                    }



                }




                
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>

        <form method="post" action="#">
            <fieldset>
                <legend>LOGIN</legend>
                <table>
                    <tr>
                        <td>USERNAME</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Remember Me</td>
                        <td><input type="checkbox" name="remember">
                            <a href="reg.php">Register here</a>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Submit"></td>
                    </tr>



                </table>
            </fieldset>
        </form>
    </body>
</html>