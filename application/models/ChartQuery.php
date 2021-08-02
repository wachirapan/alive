<?php
/**
 * Created by PhpStorm.
 * User: arpo
 * Date: 24/2/2021 AD
 * Time: 12:53
 */
class ChartQuery extends CI_Model{
    public function get_categories(){
        $this->session->set_userdata(array('lineup'=>[]));

        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id', $this->session->userdata('member_login'));

        $parent = $this->db->get();

        $categories = $parent->result();

        $i= 0 ;
        foreach($categories as $p_cat){
            array_push($_SESSION['lineup'],$p_cat->member_id);

            $categories[$i]->sub = $this->sub_categories($p_cat->member_id);
            $i++;
        }
        return $categories;
    }

    public function sub_categories($id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_lineup', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            array_push($_SESSION['lineup'],$p_cat->member_id);

            $categories[$i]->sub = $this->sub_categories($p_cat->member_id);
            $i++;
        }
        return $categories;
    }


// ทดสอบ
    public function get_categorie($member_id){

        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id', $member_id);

        $parent = $this->db->get();

        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categorie($p_cat->member_id);
            $i++;
        }
        return $categories;
    }

    public function sub_categorie($id){

        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_upline', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categorie($p_cat->member_id);
            $i++;
        }
        return $categories;
    }
}