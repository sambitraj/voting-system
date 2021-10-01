<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';

    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <title>ONLINE VOTING SYSTEM</title>
    </head>

    <body>
        <style>
        #backbtn{  
            float: left;       
            border-radius: 5px;
            font-size: 15px;
            background-color: #2f3542;
            color: white;
            border-radius: 5px
            margin: 10px;
        }
        #logoutbtn{
            border-radius: 5px;
            font-size: 15px;
            background-color: #2f3542;
            color: white;
            border-radius: 5px;
            float: right;
            margin: 10px;
        }
        #profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
        }
        #profile_own{
            padding:0px;
        }

        #group{
            background-color: white; 
            width: 55%;
            padding:20px;
            float: right;
        }

        #votebtn{
            float: left;       
            border-radius: 5px;
            font-size: 15px;
            background-color: #2f3542;
            color: white;
        }
        #bo{
            border: 3px solid black;
            border-radius: 5px;
        }
        #main{
            padding:10px;
        }
        </style>
        <div id="mainsection">
            <div id="header_section">
                 <a href="../"><button id="backbtn">Back</button></a> 
                 <a href="logout.php"><button id="logoutbtn">Logout</button></a> 
                <center>
                    <h1>ONLINE VOTING SYSTEM</h1>
                </center>
            </div>  
            <hr>
            <br><br>

            <div id="main">
                <div id="profile">
                    <center>
                        <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100"width="100"><br>
                    </center>
                    <b>NAME :</b><?php echo $userdata['name'] ?><br><br>
                    <b>MOBILE :</b><?php echo $userdata['mobile'] ?><br><br>
                    <b>ADDRESS :</b><?php echo $userdata['address'] ?><br><br>
                    <b>STATUS :</b><?php echo $status ?><br><br>
                </div>
                <div id="group">
                    <?php
                        if($_SESSION['groupsdata']){
                            for($i=0; $i<count($groupsdata); $i++){
                                ?>
                                <div>
                                    <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                                    <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
                                    <b>Vote:</b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                                    <form action="../api/vote.php" method="POST">
                                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                        <input type="submit" name="votebtn" value="Vote" id="votebtn"><br><br><br>
                                    </form>
                                    
                                    <div id="bo">
                                        <br><br>
                                    </div><br><br>
                                </div>
                                <?php
                            }
                        }
                        else{

                        }
                    ?>
                </div>
            </div>
        </div>          
    </body>
</html>