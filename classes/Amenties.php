<?php 



class Amenties extends CustomOperations {
    
    public function __construct(){
        // Constructor code
    }

    public static function get_single_amenity($id){
        if(!$id){
            return false;
        }

        global $db;
        $query = 
        "SELECT 
            a.name as name, 
            a.slug as slug , 
            a.description as description,
            a.icon as icon, 
            a.id as id,
            g.name as group_name , 
            g.icon as group_icon,
            g.description as group_description,
            g.slug as group_slug,
            g.id as group_id 
        FROM amenties as a, amenties_groups as g
        WHERE a.group_slug = g.slug 
        AND a.id = $id";
// echo "SELECT 
// a.name as name, 
// a.slug as slug , 
// a.description as description,
// a.icon as icon, 
// g.name as group_name , 
// g.icon as group_icon 
// FROM amenties as a, amenties_groups as g
// WHERE a.group_slug = g.slug 
// AND a.id = $id";

        $data = parent::get_row($query);
        // dd($data);
        return $data;
    
    }
    public static function all(){
       
    
        $query = "SELECT * FROM amenties ";
        $data = parent::get_rows($query);
        if(!$data){
            return false;
        }
        $ret = [];

        foreach($data as $item){
            $amenity =  self::get_single_amenity($item['id']);
            // dd($amenity);
            $ret[$amenity['group_slug']]['id'] = $amenity['group_id'];
            $ret[$amenity['group_slug']]['title'] = $amenity['group_name'];
            $ret[$amenity['group_slug']]['desc'] = $amenity['group_description'];
            $ret[$amenity['group_slug']]['items'][] = [
                "id" =>  $amenity['id'],
                "name" => $amenity['name'],
                "slug" => $amenity['slug'],
                "icon" => UPLOADS_DIR.$amenity['icon'],
                "desc" => $amenity['description']
            ];
        }
       
        return $ret;
      
    }

} 

?>