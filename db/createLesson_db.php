<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["grade"]) &&
        isset($_POST["subject"]) &&
        isset($_POST["topic"]) &&
        isset($_POST["lessonsName"]) &&
        isset($_POST["fileCount"]) &&
        !empty($_POST["grade"]) &&
        !empty($_POST["subject"]) &&
        !empty($_POST["topic"]) &&
        !empty($_POST["fileCount"]) &&
        !empty($_POST["lessonsName"])
    ) {

        $grade = $_POST["grade"];
        $subject = $_POST["subject"];
        $topic = $_POST["topic"];
        $lessonsName = $_POST["lessonsName"];
        $fileCount = $_POST["fileCount"];

        $userId = $_COOKIE['userId'];

        //insert
        $sql = "INSERT INTO lesson (
        grade,
        subject,
        topic,
        lessonsName,
        userId
        ) VALUES (
          '$grade',
          '$subject',
          '$topic',
          '$lessonsName',
           $userId
          )";

        if (mysqli_query($conn, $sql)) {
            $lessonId = mysqli_insert_id($conn);

            //collect file data from view
            for ($x = 1; $x <= $fileCount; $x++) {

                // $file = $_POST["file" . $x];
                $fileText = $_POST["fileText" . $x];

                // die($_FILES["file" . $x]["name"]);

                if (isset($_FILES["file" . $x]["name"]) && !empty($_FILES["file" . $x]["name"]) && isset($fileText) && !empty($fileText)) {

                    // move files
                    if (!empty($_FILES["file" . $x]["name"])) {
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["file" . $x]["name"]);
                        $uploadOk = false;
                        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        $myFileType = '';

                        // check file formats
                        if (
                            $fileType == "jpg" ||
                            $fileType == "png" ||
                            $fileType == "jpeg" ||
                            $fileType == "gif"
                        ) {
                            $myFileType = 'image';
                        } elseif (
                            $fileType == "mp4" ||
                            $fileType == "mkv" ||
                            $fileType == "avi" ||
                            $fileType == "webm" ||
                            $fileType == "wmv" ||
                            $fileType == "3gp"
                        ) {
                            $myFileType = 'video';
                        } elseif ($fileType == "pdf") {
                            $myFileType = 'pdf';
                        }

                        if (move_uploaded_file($_FILES["file" . $x]["tmp_name"], $target_file)) {
                            $uploadOk = true;
                        } else {
                            $uploadOk = false;
                            break;
                        }
                    }

                    // save file data
                    $sql = "INSERT INTO lessonFiles (fileText, filePath, fileType, lessonId) VALUES ('$fileText', '$target_file', '$myFileType', '$lessonId')";
                    mysqli_query($conn, $sql);
                } //end for()
            } //end if()

            header('Location: index.php?msg=SUCCESS: Lesson created successfully&type=true#lessons');
        }
    } else {

        header('Location: createLesson.php?msg=ERROR: Unable to create lesson. Please try again&type=false');
    }
}//end if(POST)
