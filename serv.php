<?php
session_start();
    if (isset($_POST['insert'])) {
        
        $file = "saved/img/labels/upload.txt";
        if (file_exists($file)) {
            unlink($file);
        } else {        
        }

        $lampiran = basename("upload.jpg");

        move_uploaded_file($_FILES['inputGambar']['tmp_name'], $lampiran);

        $command = escapeshellcmd("python yolov5/detect.py --source upload.jpg --weights best.pt --conf 0.3 --iou 0.6 --augment --project saved --name img --exist-ok --save-txt");
        $output = shell_exec($command);

        $_SESSION["output"] = "ada";

        header("Location:index.php");
        //"document.getElementById('gambar').src = window.URL.createObjectURL(this.files[0])"

        //echo '<img src="savedImage.jpg" style="display:block; margin: auto; width: 500px; height: 500px;">';
    }
?>