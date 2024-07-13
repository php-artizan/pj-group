<?php 
class CustomOperations {
    public static function get_rows($query){
        $data = [];
        while ($row = $query->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
        
    }
    public static function get_row($query){
        $data = mysqli_fetch_assoc($query);

        if(count($data)==0){
            return false;
        }
        return $data;
        
    }
}
?>