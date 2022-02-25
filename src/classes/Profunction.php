<?php
session_start();
class functions{
    public $products = array(
        array( "id"=> 101, "name"=> "Basket Ball", "image"=> "basketball.png", "price"=> 150,"quantity"=>1 ),
        array( "id"=> 102, "name"=> "Football", "image"=> "football.png", "price"=> 120,"quantity"=>1 ),
        array( "id"=> 103, "name"=> "Soccer", "image"=> "soccer.png", "price"=> 110,"quantity"=>1 ),
        array( "id"=> 104, "name"=> "Table Tennis", "image"=> "table-tennis.png", "price"=> 130,"quantity"=>1 ),
        array( "id"=> 105, "name"=> "Tennis", "image"=> "tennis.png", "price"=> 100,"quantity"=>1 )
    );
    
    public function DisplayItem(){          
        $htm="";
        foreach($this->products as $key => $val){
            $htm.='<div id="product-101" class="product">
                 <img src="images/' . $val['image'] . '">
				 <h3 class="title"><a href="#">' . $val['name'] . '</a></h3>
                 <span>Price=> ' . $val['price'] . '</span>
                 <button class="add-to-cart" value="'.$val['id'].'">Add To Cart</button>
                 </div>';
        }
        return $htm;
    }

     
    function checkid($id){
        foreach($_SESSION['tempSession'] as $key=> $val){
            if($val['id']==$id){
                return true;
            }
        }
        return false;
    }
    public function ADDtocart($id){
        
        if(count($_SESSION)==0){
            $tempSession = isset($_SESSION['tempSession']) ? $_SESSION['tempSession'] : array();
            foreach($this->products as $key=>$val){
                if($val['id']==$id){
                    array_push($tempSession,$val);
                    $_SESSION['tempSession']=$tempSession;
                    break;
                }
            }
        }
        else if($this->checkid($id)==false){
            $tempSession = isset($_SESSION['tempSession']) ? $_SESSION['tempSession'] : array();
            foreach($this->products as $key=>$val){
                if($val['id']==$id){
                    array_push($tempSession,$val);
                    $_SESSION['tempSession']=$tempSession;
                    break;
                }
            }
        }
        else if($this->checkid($id)==true){
             
            foreach($_SESSION['tempSession'] as $key => $val){
                if($val['id']==$id){
                    $_SESSION['tempSession'][$key]['quantity']++;
                    $temp=$val['quantity'];
                    $_SESSION['tempSession'][$key]['price']*=$temp;
                }
            }
        }

        echo json_encode($_SESSION['tempSession']);
    }

    public function addManual($num,$id){
        foreach($_SESSION['tempSession'] as $key => $val){
            if($val['id']==$id){
                $_SESSION['tempSession'][$key]['quantity']+=$num;
                $_SESSION['tempSession'][$key]['price']*=$num;
            }
        }
        echo json_encode($_SESSION['tempSession']);
    }

    public function deleteValue($id){
        foreach($_SESSION['tempSession'] as $key => $val){
            if($id==$val['id']){
                array_splice($_SESSION['tempSession'],$key,1);
            }
        }
        echo json_encode($_SESSION['tempSession']);

    }

    public function clearCart(){
        
        session_unset();
        echo json_encode($_SESSION);
    }


}
