<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Thai CV Risk Score</title>
    <link href="jquery-ui.css" rel="stylesheet">
    <script src="external/jquery.min.js"></script>
    <script src="external/bootstrap.min.js"></script>
    <link rel="stylesheet" href="external/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



    <style type="text/css">
        body,
        html {
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0px;
        }
        
        .content {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0%;
            top: 50px;
        }
        
        .contents {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0%;
            top: 5px;
        }
        
        .demoHeaders {
            margin-top: 2em;
        }
        
        .bgHeaders {
            height: 55px;
        }
        
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 115%;
        }
        
        td,
        th {
            border: 0px solid #111111;
            padding: 2px;
        }
        
        div.relative {
            position: relative;
            width: 100%;
            height: 89%;
            top: 0px;
        }
        
        .icon-success {
            color: #FFFFFF;
        }
        
        tab1 {
            padding-left: 4em;
        }

    </style>
</head>

<body>
    <div class="bg-primary bgHeaders">
        <!--<p>Copyright © Theptrarin.</p>-->
        <?php 
        $Receive_HN = $_POST["send_HN"]; 
        $Prefix_Receive = $_POST["send_Prefix"]; 
        $Fname_Receive = $_POST["send_Fname"]; 
        $Lname_Receive = $_POST["send_Lname"]; 
                                                           
        ?>
        <table border="0" class="contents">
            <tr>
                <td>&nbsp;
                    <a onclick="location.href='index.php'">
                        <span class="glyphicon glyphicon-home icon-success"></span>
                    </a>&nbsp;
                    <a onclick="location.href='form_upload.php'">
                        <span class="glyphicon glyphicon-hdd icon-success"></span>
                    </a>
                    <?php
                     echo "&nbsp;HN : $Receive_HN&nbsp;&nbsp;";
            echo "&nbsp;$Prefix_Receive&nbsp;";
            echo "$Fname_Receive";
            echo "&nbsp;&nbsp;$Lname_Receive<br><tab1>เพศ : </tab3>";
            $Sex = $_POST["send_Sex"]; 
                            $Sex_string = (string)$Sex;
                            if($Sex_string=="M"){
                                $Sex_T = "ชาย";
                                echo $Sex_T,"&nbsp;";
                            }
                            else if($Sex_string=="F"){
                                $Sex_T = "หญิง";
                                echo $Sex_T,"&nbsp;";
                            }
                            else{
                                $Sex_T = "ไม่ได้บันทึกข้อมูล";
                                echo $Sex_T,"&nbsp;";
                            }

        
    $birthday = $_POST["send_Birthday"];        
    $date = date("Y-m-d");
    $time = date("H:i:s");

     

		
	list($byear, $bmonth, $bday)= explode("-",$birthday);       
	list($tyear, $tmonth, $tday)= explode("-",$date);                
		
	$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
	$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
	$mage = ($mnow - $mbirthday);

    $u_y=date("Y", $mage)-1970;
    $u_m=date("m",$mage)-1;
    $u_d=date("d",$mage)-1;
    echo"&nbsp;อายุ : $u_y ปี $u_m เดือน $u_d วัน";
                    ?>
                </td>
                <td align='right'>
                    <a onclick="window.print();">
                        <span class="glyphicon glyphicon-print icon-success"></span>
                    </a>
                    <?php echo "วันที่ $date&nbsp;<br>"."เวลา : ".$time."&nbsp;";?>
                </td>
            </tr>

        </table>

    </div>

    <div class="relative">

        <iframe width="100%" height="100%" frameborder="0" src="http://med.mahidol.ac.th/cardio_vascular_risk/thai_cv_risk_score/" />

    </div>

    <script src="external/jquery/jquery.js"></script>
    <script src="jquery-ui.js"></script>
    <hr>
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright © Theptarin Hospital.</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
