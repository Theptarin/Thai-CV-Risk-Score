<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Thai CV Risk Score</title>
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
                <h4>Thai CV Risk Ccore</h4>
            </div>
            <div class="panel-body">
                <p>&nbsp;<a><span class="glyphicon glyphicon-warning-sign"></span></a>&nbsp;การอัพโหลดไฟล์ผลการประเมินให้ตั้งชื่อไฟล์ให้ตรงกับ HN. ของผู้ป่วยทุกครั้งและต้องเป็นนามสกุล (.PDF) ตัวอย่าง 111160.PDF</p><br>
                <form action="upload.php" method="post" enctype="multipart/form-data" name="form_upload">
                    <input type="file" class="filestyle" data-buttonBefore="true" data-buttonName="btn-primary" data-placeholder="No file..." name="fileUpload"> <br>
                    <button class="btn btn-primary" id="button_up" name="Submit" type="submit"><span class="glyphicon glyphicon-floppy-open"></span> Upload</button>
                </form>
            </div>
        </div>
    </div>

    <script src="external/jquery/jquery.js"></script>
    <script src="jquery-ui.js"></script>
    <script>
        $("#button_up").button().buttonset().width(90);

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
