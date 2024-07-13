<?php 



class Ad extends CustomOperations {
    
    public function  __construct(){

    }

    public function get_active_properties(){
        global $db;
        $query = $db->query("SELECT * FROM ads, ads_types WHERE ads.ad_type_id = ads_types.id AND ads_types.slug = 'property' AND ads.status = 'active'      ");
        $data = parent::get_rows($query);
        $ret = []; 
        foreach($data as $item){
            $new_item = $item;
            $new_item["info"] = $this->get_ad_all_info($item['id']);
            $ret[] = $new_item;
        }
        
        return $ret;

    }
    public function get_ad_all_info($ad_id = null){

        if(!$ad_id){
            return false;
        }
        return array("meta"=> []);
        




    }
}

?>