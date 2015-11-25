<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                <h1>CL1 Submission</h1>
                <p class="pull-right" id="credits">Credits: <a href="http://www.facebook.com/amit1.ahire">Amit Ahire</a></p>
                <p><a href="status.php" class="btn btn-primary pull-left">Status</a></p>
                <hr>
                
                <p>You all have to make a zip file which should have one folder as your roll number</p>
		<p>That folder should contain 3 sub-folders.</p>
                <p>1.Latex 2.PDFS 3.Codes</p>
		<p>EX: <u> 4230XX.zip -> 4230xx -> Latex/PDFS/Codes -> 13 assignments </u>in each folder</p>
                <p>If you don't insert all 13 assignments in zip file then your file will not be accepted!</p>
                <div class="row" style="margin-top:-10px;">
                <form action="" enctype="multipart/form-data" method="POST" >
                    <div class="col-xs-2"></div>
                        <div class="col-sm-5">
                            <div class="fileUpload btn">
                                <span>Select Zip file ex:4230XX.zip</span>
                                <input type="file" name="uploadzip" class="upload">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="submit" value="Upload File" class="submit btn">
                        </div>
                        <div class="col-xs-1"></div>

                </form>
                </div><br>
                <p style="" class="text-center text-danger" id="response">
                <?php

                if(isset($_POST['submit']) && isset($_FILES['uploadzip'])){
                    $zipfile = $_FILES['uploadzip'];
                    $zipfile_path = $_FILES['uploadzip']['tmp_name'];
                    $zipfile_name = $zipfile['name'];
                    $zipfile_name_only = substr($zipfile_name, 0,6);
                    $path_for_extract = "CL1/";


                    $already_uploaded = FALSE;
                    $all_files = scandir($path_for_extract);
                    foreach ($all_files as $value) {
                        if($value==$zipfile_name_only)
                            $already_uploaded = TRUE;
                    }
                    if(!$already_uploaded){
                        if(strlen($zipfile_name)==10){
                            if(substr($zipfile_name, -3)=="zip"){
                                if(preg_match("/^4230/", $zipfile_name_only)){
                                    if(preg_match("/[0-9]/", $zipfile_name_only)){
                                        $zip = new ZipArchive();
                                        if($zip->open($zipfile_path)===true){
                                            $zip->extractTo($path_for_extract);
                                        }
                                        $path_for_dir = $path_for_extract.$zipfile_name_only;
                                        
                                        //shell_exec("sudo chmod 777 ".$path_for_extract.$zipfile_name."/*");
                                        if((count(scandir($path_for_extract.$zipfile_name_only))-2)==3){
                                            $pdf_count =(count(scandir($path_for_dir.'/PDFS')))-2;
                                            $latex_count =(count(scandir($path_for_dir.'/Latex')))-2; 
                                            if($pdf_count!=13 || $latex_count!=13){
                                                exec("rm ".$path_for_extract.$zipfile_name_only." -rf");
                                                echo "Please complete your submission/zip properly!!";
                                                echo "<br>"."Error:File does not contain all 13 assignments";
                                                echo "<br>"."OR Folders names are not as per format";
                                            }
                                            else{
                                                echo "File uploaded successfully"; 
                                                echo "<br>"."Thank you....";
                                            }
                                        }
                                        else{
                                            exec("rm ".$path_for_extract.$zipfile_name_only." -rf");
                                            echo "Please complete your submission/zip properly!!!";
                                            echo "<br>"."Correction:File should contain 3 folders PDFS/Latex/Codes inside your main folder";
                                            echo "<br>"."OR Create folder -> include 3 folders in it -> zip it ->upload";
                                        }
                                    }//name is not in roll number
                                    else echo "Give your roll number as filename!!";
                                }
                                else echo "You are not from BE-C div!!";//name is not for C div
                                
                            }//file type not match
                            else echo "Please upload correct ZIP file:Extension error!!";
                            
                        }
                        else echo "File name should be in proper format!!";//name length is above 10
                    }
                    else{
                       echo "Your file is already uploaded!!"; 
                       
                    }//already uploaded
                }
		elseif(isset($_POST['submit'])){
			echo "Please select file first";
		}
                ?>
                    
                </p>
                </div>
            </div>
        </header>
        <?php 
        
        ?>
        
         
        
    </body>
</html>
