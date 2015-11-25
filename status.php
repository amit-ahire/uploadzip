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
                
                <p style="font-size: 200%;">
                <?php
                $path = "CL1/";
                $alldir = scandir($path);
                $exits = array();
                foreach ($alldir as $value) {
                    array_push($exits, $value);
                        
                }
                
                for($i=423001;$i<423090;$i++){
                    if(array_search($i, $exits)){
                        echo "<div class='btn btn-success status'>".$i."</div>";
                    }
                    else{
                        echo "<div class='btn btn-danger status' disabled>".$i."</div>";
                    }
                }
                
                ?>
                    
                </p>
                </div>
            </div>
        </header>
    </body>
</html>

    
