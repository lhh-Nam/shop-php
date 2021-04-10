<?php
    class Cart{
        public $db = null;

        public function __construct(DBController $db)
        {
                if(!isset($db -> con)) return null;
                $this -> db = $db;
        }

        public function insertIntoCart($params = null, $table = "cart"){
            if($this -> db -> con != null){
                if($params != null){
                    // Get table colums
                    $columns = implode(',', array_keys($params));
                    print_r($columns);
                    $values = implode(',', array_values($params));
                    print_r($values);

                    //Create sql query
                    $query_String = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);

                    // Execute query
                    $result = $this -> db -> con -> query($query_String);
                    return $result;
                }
            }
        }

        // Get user_id & item_id & insert into cart table
        public function addToCart($userId,$itemId) {
            if(isset($userId) && isset($itemId)){
                $params = array(
                    "user_id" => $userId,
                    "item_id" => $itemId
                );

                //insertn data into cart
                $result = $this -> insertIntoCart($params);
                if($result){
                    //Reload Page
                    header("Location:" . $_SERVER['PHP_SELF']);    
                }
            }
        }

        // Calculate sub total 
        public function getSum($arr){
            if(isset($arr)){
                $sum = 0;
                foreach ($arr as $item){
                    $sum += floatval($item[0]);
                }

                return sprintf('%.2f', $sum);
            }
        }
    }
?>