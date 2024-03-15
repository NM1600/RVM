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
                color: yellow;
                font-size: 45px;
                font-family: cursive;                
                font-weight: 400;
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
        <form>
            <h1>REDEEM REWARD</h1><br><br>
            <div class="container">
                <input type="submit" value="Generate QR" class="GenerateQRBtn" name="GenerateQR_Btn" >
                <input type="submit" value="Go Back" class="GoBackBtn" name="GoBack_Btn" formaction="studentDashboard.php" target="_blank">
            </div>
        </form>
        <div class="rowDB">
                <hr>
                <?php
                    $con = mysqli_connect("localhost", "root", "", "student_login");
                    if(isset($_GET['idnumber'])){
                        $idnumber = $_GET['idnumber'];
                        $query = "SELECT * FROM student_details WHERE id='$idnumber'";
                        $query_run = mysqli_query($con, $query);
                        
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                                ?>
                                <div class="container">
                                    <p class="txt">Recycler ID Number:</p>
                                    <input type="text" value="<?= $row['idnumber']; ?>" class="form-control">
                                </div>
                                <div class="container">
                                    <p class="txt">Redeemable Points Earned:</p>
                                    <input type="text"  class="form-control">
                                </div>
                                <div class="container">
                                    <p class="txt">Number of Plastic Bottles Collected:</p>
                                    <input type="text"  class="form-control">
                                </div>
                                <div class="container">
                                    <p class="txt">Number of Cans Collected:</p>
                                    <input type="text"  class="form-control">
                                </div>
                                <?php
                            }
                        }
                        else{
                            echo "No Record Found!";
                        }
                    }
                ?>
   
            </div>
    </body>
</html>