<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Upload !</title>
    <link href="jquery-ui.css" rel="stylesheet">
    <script src="external/jquery.min.js"></script>
    <script src="external/bootstrap.min.js"></script>
    <script src="external/bootstrap-filestyle.js"></script>
    <link rel="stylesheet" href="external/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 40px;
        }
        
        h1 {
            font-size: 250%;
        }
        
        h2 {
            font-size: 200%;
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

    </style>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Thai CV Risk Score</h4>
            </div>
            <div class="panel-body">

                <?php
                $FILE_Name = $_FILES["fileUpload"]["name"];
                $Convert = $_FILES["fileUpload"]["size"]/1048576;
                $FILE_size = round($Convert,2);
                $TXT = $FILE_Name."&nbsp;"."size = ".$FILE_size." MB."; 


                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"Upload_file/".$_FILES["fileUpload"]["name"])) {
    
                    echo '<div class="alert alert-info alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Complete!</strong> อัพโหลดไฟล์ '.$TXT.' เสร็จสมบูรณ์</div>';
                    

                    function logIP() {
                    $ipLog="upload_log.html"; 
                    $register_globals = (bool) ini_get('register_gobals');
                    
                        if ($register_globals) $ip = getenv(REMOTE_ADDR);
                        else $ip = $_SERVER['REMOTE_ADDR'];
                        
                        $comment = $GLOBALS['TXT'];
                        $date = date("Y-m-d");
                        $time = date("H:i:s");
                        $log=fopen("$ipLog", "a+");

                        if (preg_match("/\\bhtm\\b/i", $ipLog) || preg_match("/\\bhtml\\b/i", $ipLog)){
                            fputs($log, "IP address: $ip Date: $date $time Complete $comment <br>");
                        }
                        else fputs($log, "IP address: $ip Date: $date $time Complete $comment \ ");
                            fclose($log);
                        }
                    logIp();
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissible">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>Error!</strong> การอัพโหลดไฟล์ล้มเหลว!</div>';
                    
                    function logIP() {
                    $ipLog="upload_log.html"; 
                    $register_globals = (bool) ini_get('register_gobals');
                    
                        if ($register_globals) $ip = getenv(REMOTE_ADDR);
                        else $ip = $_SERVER['REMOTE_ADDR'];
   
                        $comment = $GLOBALS['TXT'];
                        $date = date("Y-m-d");
                        $time = date("H:i:s");
                        $log=fopen("$ipLog", "a+");

                        if (preg_match("/\\bhtm\\b/i", $ipLog) || preg_match("/\\bhtml\\b/i", $ipLog)){
                            fputs($log, "IP address: $ip Date: $date $time Error! $comment <br>");
                        }
                        else fputs($log, "IP address: $ip Date: $date $time Error! $comment \ ");
                            fclose($log);
                        }
                    logIp();
                }            
            ?>
                    <button input class="btn btn-primary btn-sm" name="Submit" type="submit" onclick="location.href='index.php'"> <span class="glyphicon glyphicon-home"></span>&nbsp;กลับหน้าแรก</button>

                    <button input class="btn btn-primary btn-sm" onclick="location.href='form_upload.php'"> <span class="glyphicon glyphicon-hdd"></span>&nbsp;อัพโหลดไฟล์ใหม่</button>

            </div>
        </div>

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
