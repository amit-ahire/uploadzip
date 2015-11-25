<html>
    <head>
        <title>CL1 Submission</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href=' http://fonts.googleapis.com/css?family=Ubuntu:200,300,400' rel='stylesheet' type='text/css'>
        <link media="handheld, only screen and (max-width: 480px), only screen and (max-device-width: 480px)" href="css/mobile_index.css" type="text/css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>CL1 Submission Status</h1>
                <p class="pull-right" id="credits">Credits: <a href="http://www.facebook.com/amit1.ahire">Amit Ahire</a></p>
                <p><a href="index.php" class="btn btn-primary pull-left">Back</a></p>
                <hr>
                
                <form class="form-group" method="POST" enctype="multipart/form-data">
                    <p>After clicking on create wait for download button</p>
                    <input type="submit" name="create_zip" value="Create zip" class="btn btn-primary buttons">
                </form>
                <p style="">
                    
                <?php
                $path = "CL1/";
                $backup_file = "cl1.zip";
                ?>
                
                       
                <?php
                
                if(isset($_POST['create_zip'])){
			exec("rm -rf cl1.zip");
                    exec("zip -r cl1.zip CL1/*");
                    echo ""."File zipped successfully";
                    echo "<br>"."Click on download button to download link";
                    echo "<br><br>";
                    echo '<a href="cl1.zip" class="btn btn-primary buttons" style="font-size=100%;">Download</a>';
                }
                       
                
                
                ?>
                    
                </p>
                </div>
            </div>
        </header>
    </body>
</html>

    
