<?php
    session_start();
    if(!isset($_SESSION['userdata']))
    {
        header("location:../");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata= $_SESSION['groupsdata'];

    if($userdata['status']==0)
    {
        $status = '<b style="color:red">Not Voted</b>';
    }
    else
    {
        $status = '<b style="color:green">Voted</b>';  
    }
?>
<html>
    <head>
        <title>Online voting system-dasboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
            #backbtn{
                padding: 7px;
                border-radius: 10px;
                color: white;
                background-color: blue;
                float: left;
                font-size: 15px;
                margin: 10px;
            }

            #logoutbtn{
                padding: 7px;
                border-radius: 10px;
                color: rgb(255, 255, 255);
                background-color: blue;
                float: right;
                font-size: 15px;
                margin: 10px;
            }
            #profile
            {
                background-color: white;
                width: 30%;
                padding: 5px;
                float: left;
            }
            #Group{
                background-color: white;
                width: 60%;
                padding: 20px;
                float: right;

            }

            #votebtn{
            padding: px;
                border-radius: 10px;
                color: white;
                background-color: blue;
                font-size: 15px;
            }

            #mainpanel{
                padding: 10px;
            }
         
           
        
        
        </style>


        <div id="mainsection">
            <center>
        <div id="headersection">
            <button id="backbtn">back</button>
            <button id="logoutbtn">Logout</button>
            <h1>Online Voting System</h1>
        </div>
        </center>
        <hr>
        <div id="mainpanel">
        <div id="profile">

            <center><img src="../uploads/profile.jpg" height="100" width="100"><br><br>
            <b>Name:</b><?php echo $userdata['name']?> <br><br>
            <b>mobile:</b><?php echo $userdata['mobile']?> <br><br>
            <b>addres:</b> <?php echo $userdata['address']?> <br><br>
            <b>status:</b> <?php echo $status ?><br><br>
        </div>

        <div id="Group">
            <?php
                if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){
                ?>
                <div>
                    <img src="../uploads/profile.jpg" height="100" width="100"><br><br>
                    <b>Group Name: </b> <?php echo $groupsdata[$i]['name']?><br><br>
                    <b>votes: </b><?php echo $groupsdata[$i]['votes']?><br><br>
                    <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                        <?php
                        if($_SESSION['userdata']['status']==0)
                        {
                            ?>
                        <input type="submit" name="votebtn" value="Vote" id="votebtn"> 
                        <?php
                        }
                        else{
                            ?>
                            <input type="button" name="votebtn" value="Vote">
                            <?php
                        }
                        ?>
                    </form>
                </div>   
                <hr>
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