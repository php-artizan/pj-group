<?php 



class User extends CustomOperations {
    
    public function  __construct(){

    }

    public static function find($id=false){
        global $db;
        if(!$id){
            return false;
        }

        $query = $db->query("SELECT * FROM  users WHERE id= $id");


        $user = parent::get_row($query);        
        return $user;

    }
   
}

?>