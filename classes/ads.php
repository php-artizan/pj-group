<?php 



class Ad extends CustomOperations {
    
    public function __construct(){
        // Constructor code
    }

    public static function get_active_properties(){
        global $db;
        $query = $db->query("SELECT ads.* FROM ads, ads_types WHERE ads.ad_type_id = ads_types.id AND ads_types.slug = 'property' AND ads.status = 'active'");
        $data = parent::get_rows($query);
        $ret = self::get_ad_info($data);
        return $ret;
    }
    public static function get_ad_info($data){
        if(!$data){
            return false;
        }

        $ret = []; 
        foreach($data as $item){
            
            $id = $item['id'];
            $new_item = [
                "title" => $item['title'],
                "category" => $item['category'],
                "description" => $item['description'],
                "status" => $item['status'],
              
                "created_at" => $item['created_at'],


                "meta" => self::get_ad_all_meta($id),
                "images" => self::get_ad_images($id),
                "amenties" => self::get_ad_amenties($id)
            ];
        
            $ret[] = $new_item;
            // echo "test222<pre>";
            // print_r($new_item);
            // echo "</pre>";
        }
        
        return $ret;
    }

    public static function get_ad_all_meta($ad_id = null){
        if(!$ad_id){
            return false;
        }
        global $db;
        $query = $db->query("SELECT * FROM ads_meta WHERE ad_id = ".$ad_id);
        $data = parent::get_rows($query);
        $meta = [];
        foreach($data as $item){
            $new_item = [];
            $new_item['name'] = $item['meta_key'] ;
            $new_item['value'] = $item['meta_value'] ;
            $meta[] = $new_item;
        }
        return $meta;
        // return array();
    }
    public static function get_ad_meta($ad_id = null, $meta_key = false){
        if(!$ad_id || !$meta_key){
            return false;
        } 
        global $db;
        $query = $db->query("SELECT * FROM ads_meta WHERE ad_id = $ad_id AND meta_key = '$meta_key'");
        $data = parent::get_row($query);
       
        return $data['meta_value'];
      
    }
    public static function get_ad_amenties($ad_id = null){
        if(!$ad_id ){
            return false;
        } 
        global $db;
        $query = $db->query("SELECT * FROM ad_amenties WHERE ad_id = $ad_id ");
        $data = parent::get_rows($query);
        $ret = [];

        foreach($data as $item){
            $amenity =  Amenties::get_single_amenity($item['amenty_id']);
            // dd($amenity);
            $ret[$amenity['group_slug']]['desc'] = $amenity['group_description'];
            $ret[$amenity['group_slug']]['title'] = $amenity['group_name'];
            $ret[$amenity['group_slug']]['items'] = [
                "name" => $amenity['name'],
                "slug" => $amenity['slug'],
                "icon" => UPLOADS_DIR.$amenity['icon'],
                "desc" => $amenity['description']
            ];
            
        }
       
        return $ret;
      
    }
    public static function get_ad_images($ad_id = null){
        if(!$ad_id){
            return false;
        }
        global $db;
        $query = $db->query("SELECT * FROM ads_images WHERE ad_id = ".$ad_id);
        $data = parent::get_rows($query);
        $images = [];
        foreach($data as $item){
            $new_item = [];
            $new_item['path'] = ROOT_PATH.$item['path'];
            $new_item['type'] = $item['image_type'];
            $images[] = $new_item;
        }
        return $images;

        
    }
}
?>