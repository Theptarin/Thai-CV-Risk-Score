<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thai CV Risk Ccore</title>
    <link href="jquery-ui.css" rel="stylesheet">
    <script src="external/jquery.min.js"></script>
    <script src="external/bootstrap.min.js"></script>
    <link rel="stylesheet" href="external/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
        }
        p {
            font-size: 130%;
        }
        
        .demoHeaders {
            margin-top: 2em;
        }
        
        .fakewindowcontain .ui-widget-overlay {
            position: absolute;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 110%;
        }
    </style>
</head>

<body>
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Thai CV Risk Score</h4>
            </div>
            <div class="panel-body">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โปรแกรมนี้ใช้ประเมินความเสี่ยงต่อการเกิดโรคหัวใจและหลอดเลือด โดยแสดงผลการประเมินเป็นความเสี่ยงต่อการเสียชีวิตหรือเจ็บป่วยจากโรคเส้นเลือดหัวใจและสมองตีบตันในระยะเวลา 10 ปีข้างหน้า ซึ่งสามารถใช้ได้ทั้งในกรณีที่ท่านไม่มีผลเลือดโดยให้ใช้ขนาดรอบเอว(นิ้ว)หรือขนาดรอบเอวหารด้วยส่วนสูง(ซม.)แทน และในกรณีที่มีผลการตรวจระดับไขมันในเลือด แบบประเมินนี้สร้างขึ้นจากการติดตามศึกษาหาปัจจัยเสี่ยงต่อการเกิดโรคหัวใจและหลอดเลือดในประชากรไทยภายใต้โครงการศึกษาพนักงานการไฟฟ้าฝ่ายผลิตแห่งประเทศไทย เป็นระยะเวลายาวนานกว่า 20 ปี แบบประเมินความเสี่ยงนี้จึงควรใช้เฉพาะในคนไทยที่มีอายุ  35-70 ปี ที่ยังไม่มีโรคหัวใจและหลอดเลือด</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><span class="glyphicon glyphicon-hand-right"></span></a>&nbsp;ผลลัพธ์ที่ได้เป็นการประเมินความเสี่ยงต่อการเจ็บป่วยหรือเสียชีวิตจากโรคเส้นเลือดหัวใจตีบตันและโรคเส้นเลือดสมองตีบตันในระยะเวลา 10 ปีข้างหน้า</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><span class="glyphicon glyphicon-hand-right"></span></a>&nbsp;ผลการประเมินและคำแนะนำที่ได้รับจากโปรแกรมนี้ไม่สามารถใช้แทนการตัดสินใจของแพทย์ได้ การตรวจรักษาเพิ่มเติมหรือการให้ยารักษาขึ้นอยู่กับดุลยพินิจของแพทย์และการปรึกษากันระหว่างแพทย์และตัวท่าน</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><span class="glyphicon glyphicon-hand-right"></span></a>&nbsp;ผลการประเมินนี้ห้ามนำไปใช้อ้างอิงในการค้า เช่น การทำประกันชีวิต และไม่สามารถใช้กับผู้ป่วยโรคลิ้นหัวใจหรือโรคหัวใจเต้นผิดจังหวะได้</p><br>


                <form class="form-inline" name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">

                    <table class="table table-condensed">
                        <h4>ข้อมูลเบื้องต้นก่อนการประเมิน</h4>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon ">HN.</div>
                                            <input class="form-control input-sm" name="txtHN" type="text" placeholder="XXXXXX" size="12" id="txtHN" value="<?php echo $strHN;?>">
                                        </div>
                                    </div>
                                    <button input class="btn btn-primary btn-sm" type="submit"> <span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>

                                    <?php
	if(isset($_POST["txtHN"]))
	{
		$strHN = $_POST["txtHN"];
	}
?>
                                        <?php
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "ThepCom15";
   $dbName = "mydatabase";
   
   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   
    if (!$conn) {
        echo "Can't connect to MySQL Server. Errorcode: %s\n". mysqli_connect_error();
        exit;
    }
    mysqli_set_charset($conn, "utf8"); 
                  
   $sql = "SELECT hn, prefix, fname, lname, sex,birthday_date FROM `patient` WHERE hn = ".$strHN."";

   $query = mysqli_query($conn,$sql);
?>
                                            <?php
    while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HN :
                                                <?php echo $result["hn"];?>&nbsp;&nbsp;
                                                <?php echo $result["prefix"];?>
                                                <?php echo $result["fname"];?>&nbsp;
                                                <?php echo $result["lname"];?>&nbsp;&nbsp; เพศ :
                                                <?php
                            $Sex = $result["sex"];
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
                            $birthday = $result["birthday_date"];
                        ?>
    <!--
    <?php
 	$birthday = $birthday;      
	$today = date("Y-m-d");   
		
	list($byear, $bmonth, $bday)= explode("-",$birthday);       
	list($tyear, $tmonth, $tday)= explode("-",$today);                
		
	$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
	$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
	$mage = ($mnow - $mbirthday);

    $u_y=date("Y", $mage)-1970;
    $u_m=date("m",$mage)-1;
    $u_d=date("d",$mage)-1;
    echo"อายุ : $u_y ปี $u_m เดือน $u_d วัน";
    ?> -->
                

                                                        <?php
  $HN_tstring = $result["hn"];
  $HN_result = (string)$HN_tstring;
  $URL = 'Upload_file/';
  $name_file = $HN_result;
  $last_file ='.pdf';
  $hn_file = $URL.$name_file.$last_file;
  //echo"$hn_file";
    
?>
                                                            <?php
                echo '<a href="'.$hn_file.'"target="_blank""><span class="glyphicon glyphicon-file"></span> ผลการประเมินครั้งล่าสุด </a> ';
            ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h4>1. เป็นคนไทย : </h4></td>
                                <td>
                                    <div id="radioset_nationality">
                                        <input type="radio" id="radio1" name="radio_nationality" value="1" onClick="Check()">
                                        <label for="radio1">ใช่</label>
                                        <input type="radio" id="radio2" name="radio_nationality" value="2" onClick="Check()">
                                        <label for="radio2">ไม่ใช่</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h4>2. อายุ : </h4></td>
                                <td>
                                    <div id="radioset_radio_age">
                                        <input type="radio" id="radio3" name="radio_age" value="3" onClick="Check()">
                                        <label for="radio3">น้อยกว่า 35 ปี</label>
                                        <input type="radio" id="radio4" name="radio_age" value="4" onClick="Check()">
                                        <label for="radio4">35-70 ปี</label>
                                        <input type="radio" id="radio5" name="radio_age" value="5" onClick="Check()">
                                        <label for="radio5">มากว่า 70 ปี</label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <form action="thai_cv_risk_score.php" method="post" name="formsubmit">
                    <?php 
                            $HN_Receive = $result["hn"];
                            $Prefix_Receive = $result["prefix"];
                            $Fname_Receive = $result["fname"];
                            $Lname_Receive = $result["lname"];
                            $Sex_Receive = $result["sex"];
                            $Birthday_Receive = $result["birthday_date"];
                        ?>
                    <input name="send_HN" type="hidden" value="<?= $HN_Receive; ?>">
                    <input name="send_Prefix" type="hidden" value="<?= $Prefix_Receive; ?>">
                    <input name="send_Fname" type="hidden" value="<?= $Fname_Receive; ?>">
                    <input name="send_Lname" type="hidden" value="<?= $Lname_Receive; ?>">
                    <input name="send_Sex" type="hidden" value="<?= $Sex_Receive; ?>">
                    <input name="send_Birthday" type="hidden" value="<?= $Birthday_Receive; ?>">
                    <button class="btn btn-primary" id="button_ok" name="Submit" type="submit">ดำเนินการต่อ</button>
                    <button class="btn btn-primary" id="button_no" type="button" onClick="location.href='index.php'">ยกเลิก</button>
                </form>

                <?php
            }
        ?>
                    <?php
    mysqli_close($conn);
?>
            </div>
        </div>
    </div>
    <!-- ui-dialog -->
    <div id="dialog-yes" title="Message">
        <p>ท่านใช้แบบประเมินนี้ได้.</p>
    </div>
    <div id="dialog-no" title="Message">
        <p>ท่านไม่ควรใช้แบบประเมินนี้.</p>
    </div>

    <script src="external/jquery/jquery.js"></script>
    <script src="jquery-ui.js"></script>
    <script>
        $("#button_ok").button().buttonset().width(105);
        $("#button_no").button().buttonset().width(105);
        $("#button-icon").button({
            icon: "ui-icon-gear",
            showLabel: false
        });

        $("#radioset_nationality").buttonset().find('label').width(120);
        $("#radioset_radio_age").buttonset().find('label').width(120);


        $("#dialog-yes").dialog({
            autoOpen: false,
            width: 300,
            buttons: [{
                    text: "Ok",
                    click: function() {
                        $(this).dialog("close");
                    }
                },
                {
                    text: "Cancel",
                    click: function() {
                        $(this).dialog("close");
                    }
                }
            ]
        });

        $("#dialog-no").dialog({
            autoOpen: false,
            width: 300,
            buttons: [{
                    text: "Ok",
                    click: function() {
                        $(this).dialog("close");
                    }
                },
                {
                    text: "Cancel",
                    click: function() {
                        $(this).dialog("close");
                    }
                }
            ]
        });

        function Message_yes() {
            $("#dialog-yes").dialog("open");
        }

        function Message_no() {
            $("#dialog-no").dialog("open");
        }

        function Check() {
            var Value_nationality = $('input[name="radio_nationality"]:checked').val();
            var Value_age = $('input[name="radio_age"]:checked').val();
            if ((Value_nationality == "1") && (Value_age == "4")) {
                Message_yes();
            } else {
                Message_no();
            }
        }

    </script>

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
