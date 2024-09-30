<?php
    // include('../api/connect.php');   
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }else{
        $status = '<b style="color:green">Voted</b>';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background-color: antiquewhite;">
    
        <a href="logout.php">
            <button style="width: 15%;
                        padding: 10px;
                        border-radius: 10px;
                        background-color: rgb(111, 212, 252);
                        color: white;
                        font-size: 15px;
                        float: left;" 
            >Back</button>
        </a>
        <a href="../">
            <button style="width: 15%;
                        padding: 10px;
                        border-radius: 10px;
                        background-color: rgb(111, 212, 252);
                        color: white;
                        font-size: 15px;
                        float: right;"
            >Logout</button>
        </a>

        <h1 style="text-align:center;">Online Voting System</h1>
        <hr>

        <div style="padding:10px;">
            <div id="profile" style="background-color:white; width:30%; padding:20px; float:left;">
                <center><img src="../uploads/<?php echo $userdata['photo'] ?>" heigt="100" width="100"></center><br><br>
                <b>Name:</b><?php echo $userdata['name'] ?><br><br>
                <b>Mobile:</b><?php echo $userdata['mobile'] ?><br><br>
                <b>Address:</b><?php echo $userdata['address'] ?><br><br>
                <b>Status:</b><?php echo $status ?><br><br>
            </div>
            <div id="group" style="background-color:white; width:60%; padding:20px; float:right;">
                <?php
                    if($_SESSION['groupdata']){
                        for($i=0;$i<count($groupdata);$i++){
                            ?>
                            <div>
                                <img style="float:right;" src="../uploads/<?php echo $groupdata[$i]['photo'] ?>" height="80" width="80">
                                <b>Group Name: </b> <?php echo $groupdata[$i]['name'] ?> <br><br>
                                <b>Votes: </b> <?php echo $groupdata[$i]['votes'] ?> <br><br>
                                <form action="../api/vote.php" method="post">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id'] ?>">
                                    <?php
                                        if($_SESSION['userdata']['status']==0){
                                            ?>
                                            <input type="submit" name="votebtn" value="vote" 
                                            style="width: 10%;
                                                padding: 10px;
                                                border-radius: 10px;
                                                background-color: rgb(111, 212, 252);
                                                color: white;
                                                font-size: 15px;
                                                float: left;"
                                            >
                                            <?php
                                        }else{
                                            ?>
                                            <button disabled type="button" name="votebtn" value="vote"
                                            style="width: 10%;
                                                padding: 10px;
                                                border-radius: 10px;
                                                background-color: green;
                                                color: white;
                                                font-size: 15px;
                                                float: left;"
                                            >Voted</button>
                                            <?php
                                        }
                                    ?>
                                    
                                </form>
                            </div>
                            <br><br>
                            <hr>
                            <?php
                        }
                    }
                
                ?>
            </div>
    
        </div>
        
    
</body>
</html>