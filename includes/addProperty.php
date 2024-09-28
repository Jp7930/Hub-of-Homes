<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include_once 'db_connect.php';
        $newPropertyId = mysqli_fetch_row($mysqli->query('SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = \'properties\''))[0];

        $folder = '../images/'; //Folder to save uploaded files
        for ($i = 0; $i < 4; $i++) {
            $fileName = $newPropertyId . ($i > 0 ? "_$i" : "") . ".png";
            $fileLocation = $folder . $fileName;
            $headerFileNames = ['ext-photo', 'int-photo1', 'int-photo2', 'int-photo3'];
            if ($_FILES["$headerFileNames[$i]"]["type"] === "image/png") {
                // Move the uploaded file to the specified location
                if (move_uploaded_file($_FILES["$headerFileNames[$i]"]["tmp_name"], $fileLocation)) {
                    echo "File $fileName uploaded successfully.";
                } else {
                    echo "Error uploading file $fileName.";
                }
            } else {
                echo "Error: File $fileName is not a PNG file.";
            }
        }

        $name = $_POST['property-name'];
        $addr = $_POST['property-addr'];
        $bedrooms = $_POST['bedrooms'];
        $bathrooms = $_POST['bathrooms'];
        $area = $_POST['area'];
        $residence_type = $_POST['res_type'];
        $price = $_POST['price'];
        $rent = $_POST['rent'];
        $short_desc = $_POST['short-desc'];
        $description = $_POST['description'];
        $mysqli -> query("INSERT INTO properties (property_name, address, bedrooms, bathrooms, area, residencetype, price, rent, short_desc, description)
                          VALUES ('$name', '$addr', '$bedrooms', '$bathrooms', '$area', '$residence_type', '$price', '$rent', '$short_desc', '$description')");
        
        header("Location: ../property-details.php?id=$newPropertyId");
    }
    else {
        header('Location: ../error.php?err=You are not authorised to access this page');
    }
?>