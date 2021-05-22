<?php

$filename = $_FILES["favicon"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    $filesize = $_FILES["logo"]["size"];
    $allowed_file_types = array('.jpg','.png');

    if (isset($file_ext) && ($filesize < 200000))
    {
        // Rename file
        $newfilename = md5($file_basename) . $file_ext;
        if (file_exists("uploads/global/" . $newfilename))
        {
            // file already exists error
            echo "You have already uploaded this file.";
        }
        else
        {
            move_uploaded_file($_FILES["favicon"]["tmp_name"], "uploads/global/" . "favicon.png");
        }
    }
    elseif (empty($file_basename))
    {
        // file selection error
        echo "Please select a file to upload.";
    }
    elseif ($filesize > 2000000)
    {
        // file size error
        echo "The file you are trying to upload is too large.";
    }
    else
    {
     move_uploaded_file($_FILES["favicon"]["tmp_name"], "uploads/global/" . "favicon.png");
    }