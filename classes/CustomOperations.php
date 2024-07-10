<?php 
class CustomOperations {
    public function get_rows($query){
        $data = [];
        while ($row = $query->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
        
    }
}
?>