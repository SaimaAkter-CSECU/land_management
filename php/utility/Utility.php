<?php
    /**
     *
     */
    class Utility
    {
        function __construct(){
        }

        public function generateRandomString($length = 10) {
          $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
          return $randomString;
        }

        public function getPassPhrase($password){
            $passphrase = password_hash($password, PASSWORD_DEFAULT);
            return $passphrase;
        }

        // Product directory
        public function getImageDirectory($imageName){
            $parentDir = 'assets/images/product/';

            $filedirectory = $parentDir.$imageName;

            // if(file_exists($filedirectory) && is_dir($filedirectory))
            //
            // else
            //     return "-1";

            return $filedirectory;
        }

        // Store image directory
        public function getStoreImageDirectory($imageName){
            $parentDir = 'assets/images/storeimages/';

            $filedirectory = $parentDir.$imageName;

            return $filedirectory;
            // if(file_exists($filedirectory))
            //     return $filedirectory;
            // else
            //     return "-1";
        }

        // Matser slider directory
        public function getMasterSliderImageDirectory($imageName){
            $parentDir = 'assets/images/masterslider/';

            $filedirectory = $parentDir.$imageName;

            return $filedirectory;
        }

        // User image directory
        public function getUsersImageDirectory($imageName){
            $parentDir = 'assets/images/users/';

            $filedirectory = $parentDir.$imageName;

            return $filedirectory;

            // if(file_exists($filedirectory))
            //     return $filedirectory;
            // else
            //     return "-1";
        }

        public function calculateStoreDistance($latdiff, $londiff){
            $distance = ($latdiff*$latdiff) - ($londiff*$londiff);

            if($distance>=0){
                $range = sqrt($distance);
                return $range;
            }else{
                return -1;
            }
        }

        // Upload an image
        public function upload_image($target_file,$target_dir,$file)
        {
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          // Check if image file is a actual image or fake image
          $response = array();
          $response['error'] = false;

          if (file_exists($target_dir)) {
              //echo "dir exists"."<br>";
          }
          else  {
            $response['error'] = true;
            $response['message'] = 'dir not existed'."<dir>";
            return $response;
          }
          if (is_uploaded_file($file['tmp_name']) && $file['error']==0) {
            }
            else {
              $response['error'] = true;
              $response['message'] = 'The file was not uploaded successfully.'."<dir>"."(Error Code:" . $file['error'] . ")";
              return $response;
            }
          // Check if file already exists
          // if (file_exists($target_file)) {
          //   $response['error'] = true;
          //   $response['message'] = "Sorry, file already exists.";
          //   $uploadOk = 0;
          //   return $response;
          // }
          // Check file size
          if ($file["size"] > 10000000) {
            $response['error'] = true;
            $response['message'] = "Sorry, your file is too large.";
            $uploadOk = 0;
            return $response;
          }
          // Allow certain file formats
          //echo $imageFileType;
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG") {
            $response['error'] = true;
            $response['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return $response;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            $response['error'] = true;
            $response['message'] = "Sorry, your file was not uploaded.";
            return $response;
          // if everything is ok, try to upload file
          } else {
              if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $response['error'] = false;
                $response['message'] = "The file ". basename( $file["name"]). " has been uploaded.";
                return $response;
              } else {
                  //print_r($_FILES);
                  //echo "<br>".$target_file."<br>";
                  //echo "<br>".$file["tmp_name"]."<br>";
                  $response['error'] = true;
                  $response['message'] = "Sorry, there was an error uploading your file.";
                  return $response;
              }
          }
        }


        // Save image to the server
        public function saveImageToServer($path, $image){
            list($type, $image) = explode(';', $image);
            list(, $image) = explode(',', $image);
            $image = base64_decode($image);

            $replaced = file_put_contents($path,$image);

            return $replaced;
        }
    }




 ?>
