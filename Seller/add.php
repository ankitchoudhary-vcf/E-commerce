<?php
    include('conn.php');

    // if(isset($_POST['submit'])){

        $name = $_POST['pname'];
        $category = $_POST['category'];
        $Price = $_POST['Price'];
        $des = $_POST['description'];
        $Sold = $_POST['SoldBy'];
        $Number = $_POST['Number'];

        $files_loc = array();
        
        // $uploadsDir = "http://jaipurplaza.com/upload/";
        // $allowedFileType = array('jpg','png','jpeg');
        
        // Velidate if files exist
        if (!empty(array_filter($_FILES['fileUpload']['name']))) {
            
            // Loop through file items
            foreach($_FILES['fileUpload']['name'] as $id=>$val){
                // Get files upload path
                $file = rand(1000,100000)."-".$_FILES['fileUpload']['name'][$id];
                $file_loc = $_FILES['fileUpload']['tmp_name'][$id];
                $file_size = $_FILES['fileUpload']['size'][$id];
                $file_type = $_FILES['fileUpload']['type'][$id];
                $folder="upload/";
                echo $id;

                /* new file size in KB */
                $new_size = $file_size/1024;  
                /* new file size in KB */
                
                /* make file name in lower case */
                $new_file_name = strtolower($file);
                /* make file name in lower case */
                
                $final_file=str_replace(' ','-',$new_file_name);

                if(move_uploaded_file($file_loc,$folder.$final_file))
                {
                    $files_loc[$id] = $final_file;
                    echo "File Successfully Uploaded";
                    // header('Location: ./');
                }
                else
                {
                    echo "Error. Please try again";
                }

            }
            $loc = serialize($files_loc);
            // echo unserialize($loc)[0];
            $aq = "INSERT INTO `products`(`Product_Name`, `Category`, `Product_Detail`, `Product_Price`, `Product_Image`, `Sold_By`, `WhatsApp_No`) VALUES ('$name', '$category', '$des', '$Price', '$loc', '$Sold', '$Number')";
            mysqli_query($conn, $aq);
            header('Location: ./');
        }
?>