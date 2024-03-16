<html>
    <head>
        <title>Student Dashboard</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background: linear-gradient(to bottom, #053d02, #187f13, #18d22e, #60ff04);
            }
            h1{
                text-align: center;
                margin-bottom: 65px;
                color: white;
                font-size: 45px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;                
            }
            p{
                text-align: left;
                margin-bottom: 5px;
                color: white;
                font-size: 18px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
            }
            form{
                background: rgba(255, 255, 255, 0); /* RGBA color with 80% opacity */
                width: 550px;
                height: 580px;
                padding: 75px 50px;
                position:absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
            }
            .rewardDisplay_container{
                border-bottom: 2px solid rgb(79, 239, 5);
                position: relative;
                margin: 15px 0;
            }
            .rewardDisplay_container input{
                background: white;
                border: green;
                outline: green;
                width: 100%;
                color: rgb(0, 0, 0);
                height: 30px;
                font-size: 15px;
            }
            .GenerateQRBtn{
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
            .GenerateQRBtn:hover {
                background-color: #0bd830; /* New background color when hovering */
                background-position: right;
                font-size: 16px;
                color: black;
            }
            .GoBackBtn{
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
            .GoBackBtn:hover {
                background-color: #0bd830; /* New background color when hovering */
                background-position: right;
                font-size: 16px;
                color: black;
            }
        </style>
    </head>
    <body>
        <form method="post" action="">
            <h1>REDEEM REWARD</h1>
                <?php
                   $servername="localhost";
                   $username="root";
                   $password="";
                   $dbname="studentdetails";

                   $conn=mysqli_connect($servername, $username, $password, $dbname);
                   if(!$conn){
                    die('connection error:'. mysqli_connect_error());
                   }
                   $connectDb=mysqli_select_db($conn,'studentdetails');
                   $result=mysqli_query($conn,'select idnumber,bottlesCollected,cansCollected,rewardPts from studtable');
                   while($row=mysqli_fetch_array($result)){
                    ?>
                        <p class="txt">Recycler ID Number:</p>
                        <input type="text" name="idnumber" value="<?php echo $row['idnumber']; ?>">
                        <p class="txt">Number of plastic bottles collected:</p>
                        <input type="text" name="idnumber" value="<?php echo $row['bottlesCollected']; ?>">
                        <p class="txt">Number of cans collected:</p>
                        <input type="text" name="idnumber" value="<?php echo $row['cansCollected']; ?>">
                        <p class="txt">Total redeemable points:</p>
                        <input type="text" name="idnumber" value="<?php echo $row['rewardPts']; ?>">
                    <?php
                   }

                ?>
            <div class="container">
                <input type="submit" value="Generate QR" class="GenerateQRBtn" name="GenerateQR_Btn">
                <input type="submit" value="Go Back" class="GoBackBtn" name="GoBack_Btn" formaction="studentDashboard.php" target="_blank">
            </div>
        </form>
    </body>
</html>
