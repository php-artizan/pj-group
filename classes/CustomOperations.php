<?php 
class CustomOperations {
    public static function get_rows($query){
        $data = [];
        global $db;
        $query = $db->query($query);
        if(mysqli_num_rows($query)==0){
            return false;
        }
        while ($row = $query->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
        
    }
    public static function get_row($query){
        global $db;
        $query = $db->query($query);
        if(mysqli_num_rows($query)==0){
            return false;
        }
        $data = mysqli_fetch_assoc($query);
        // dd($data);
        if(count($data)==0){
            return false;
        }
        return $data;
        
    }
    public static function price($price){

        return "$".number_format($price);

    }
    public static function keyToText($input_string) {
        // Replace underscores with spaces
        $no_underscores = str_replace('_', ' ', $input_string);
        // Capitalize the first letter of each word
        $capitalized = ucwords($no_underscores);
        return $capitalized;
    }
}
?>