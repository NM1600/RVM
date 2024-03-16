<html>
    <head>
        <title>Welcome</title>
        <style>
            body{
                min-height: 100vh;
                background: linear-gradient(to bottom,#053d02,#187f13,#18d22e,#60ff04);
            }
            form{
                background: rgba(255, 255, 255, 0.5); /* RGBA color with 80% opacity */
                width: 350px;
                height: 580px;
                padding: 75px 50px;
                position:absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
            }
            h1{
                text-align: center;
                margin-bottom: 65px;
                color: green;
                font-size: 45px;
                font-family: cursive;                
                font-weight: 400;
            }
            p{
                text-align: left;
                margin-bottom: 5px;
                color: green;
                font-size: 18px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
            }
            .textBoxdiv{
                border-bottom: 2px solid rgb(0, 131, 7);
                position: relative;
                margin: 15px 0;
            }
            .textBoxdiv input{
                background: none;
                border: none;
                outline: none;
                width: 100%;
                color: black;
                height: 30px;
                font-size: 15px;
            }
            .loginBtn{
                height: 45px;
                width: 100%;
                margin-top: 15px;
                border: none;
                outline: none;
                background: #053d02;
                background-size: 200%;
                color: white;
                font-size: 16px;
            }
            .loginBtn:hover {
                background-color: #0bd830; /* New background color when hovering */
                background-position: right;
                font-size: 16px;
                color: black;
            }
        </style>
    </head>
    <body>
        <form method="post" action="studentLogin.php">
            <h1>Welcome Recycler!</h1>
            <p>ID Number:</p>
            <div class="textBoxdiv">
                <input type="text" placeholder="Enter student ID number" name="idnumber">
            </div>
            <input type="submit" value="Login" class="loginBtn" name="login_Btn">
        </form>
    </body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "studentdetails"); // specify the database name
if(isset($_POST['login_Btn'])){
    $idnumber = $_POST['idnumber'];
    $sql = "SELECT * FROM studtable WHERE idnumber = '$idnumber'";
    $result = mysqli_query($conn, $sql); // execute the query

    if ($result) { // check if the query was successful
        if (mysqli_num_rows($result) > 0) { // check if any rows were returned
            // Redirect to dashboard if ID number is registered
            header('Location:studentDashboard.php');
            exit(); // stop further execution
        } else {
            echo "<script>alert('ID number not registered!');</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_free_result($result); // free the result set
    mysqli_close($conn); // close the connection
}
?>







