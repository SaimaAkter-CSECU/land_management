<?php
    /**
     *
     */
    class Validator
    {

    	function __construct(){

    	}

        public function validate_product_categories($categoryjsonarray){
            $array = $categoryjsonarray["categories"];
            $flagnull = 0;
            $flagzero = 0;
            $flagkey = 0;
            $response = array();
            if(count($array)>0){
                for($i=0; $i<count($array); $i++){
                    if(array_key_exists("catno", $array[$i])){
                        if($array[$i]["catno"]==null){
                            $flagnull = 1;
                        }else if($array[$i]["catno"]<=0){
                            $flagzero = 1;
                        }
                    }else{
                        $flagkey = 1;
                    }
                }
                if($flagkey == 1){
                    $response['error'] = true;
                    $response['message'] = 'Array keys do no exist!';
                    echo json_encode($response);
                    exit();
                }
                else if($flagnull == 1){
                    $response['error'] = true;
                    $response['message'] = 'Error! Array keys are empty!';
                    echo json_encode($response);
                    exit();
                }else if($flagzero == 1){
                    $response['error'] = true;
                    $response['message'] = 'Error! Array keys must be greater than zero!';
                    echo json_encode($response);
                    exit();
                }
            }else{
                $response['error'] = true;
                $response['message'] = 'Empty JSON array!';
                echo json_encode($response);
                exit();
            }
        }


    }


?>
