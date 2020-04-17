<?php
	if(isset($_FILES['files'])){

    for($x = 0; $x < count($_FILES['files']['name']); $x++)
    {
        $file_name = $_FILES['files']['name'][$x];
        $temp_file_location = $_FILES['files']['tmp_name'][$x];

        require 'vendor/autoload.php';

        $s3 = new Aws\S3\S3Client([
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => "AKIAJWK3ZYCSS6YZYEOA",
                'secret' => "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",
            ]
        ]);

        $result = $s3->putObject([
            'Bucket' => 'topdial',
            'Key'    => $file_name,
            'SourceFile' => $temp_file_location
        ]);

        //var_dump($result);
        echo $result->get('ObjectURL') . "<br />";
    }
	}
?>


<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">



    <div class="wrapper">
  <div class="file-upload">
    <input type="file" name="files[]" class="file-upload-input" multiple id="files"/>
    <i class="fa fa-arrow-up"></i>
    <input type="submit" class="file-upload-btn"/>
  </div>
</div>




	
</form>      

<style>
body {
    font-family: sans-serif;
    background-color: #eeeeee;
  }
  .file-upload {
    background-color: #ffffff;
    width: 340px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .file-upload-btn {
    margin: 0;
    color: #fff;
    background: #1FB264;
    border: none;
    padding: 10px;
    border-radius: 4px;
    border-bottom: 4px solid #15824B;
    transition: all .2s ease;
    outline: none;
    text-transform: uppercase;
    font-weight: 700;
  }
  .file-upload-btn:hover {
    background: #1AA059;
    color: #ffffff;
    transition: all .2s ease;
    cursor: pointer;
  }
  .file-upload-btn:active {
    border: 0;
    transition: all .2s ease;
  }
  .file-upload-content {
    display: none;
    text-align: center;
  }
 
</style>