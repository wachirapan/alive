<?php

class AUpdateData extends CI_Controller
{
    function cancel_memberregister()
    {
        $member_id = $_POST['member_id'];

        $this->db->where('member_id',$member_id)->update('member',array(
            'member_status'=>3
        ));
    }

    function update_profile()
    {
        $member_id = $_POST['member_id'];
        $member_name = $_POST['member_name'];
        $member_phone = $_POST['member_phone'];
        $member_idcard = $_POST['member_idcard'];
        $member_address = $_POST['member_address'];
        $province = $_POST['province'];
        $member_zipcode = $_POST['member_zipcode'];
        $member_email = $_POST['member_email'];
        $memebr_line = $_POST['memebr_line'];
        $memebr_facebook = $_POST['memebr_facebook'];

        $bankname = $_POST['bankname'];
        $deposit = $_POST['deposit'];
        $branch = $_POST['branch'];
        $bank_account = $_POST['bank_account'];
        $bank_serial = $_POST['bank_serial'];

        $member_pwd = $_POST['member_pwd'];


        $data = array(
            'member_name' => $member_name,
            'member_phone' => $member_phone,
            'member_address' => $member_address,
            'province_id' => $province,
            'zipcode' => $member_zipcode,
            'member_idcard' => $member_idcard,
            'member_bank_name' => $bankname,
            'member_bank_branch' => $branch,
            'member_bank_serial' => $bank_serial,
            'member_bank_account' => $bank_account,
            'member_bank_deposit' => $deposit,
            'member_email' => $member_email,
            'member_line' => $memebr_line,
            'member_facebook' => $memebr_facebook,
            'member_pwd' => $member_pwd
        );
        $this->db->where('member_id', $member_id)->update('member', $data);
    }
    function update_category()
    {
        $category_id = $_POST['category_id'];
        $review_picture = $_POST['review_picture'];
        $category_name = $_POST['category_name'];
        $seraillab = $_POST['seraillab'];
        $editor = $_POST['editor'];
        $category_subname = $_POST['category_subname'];

        $this->db->where('category_id', $category_id)->update('category', array(
            'category_name' => $category_name,
            'category_image' => $review_picture,
            'category_seraillab'=>$seraillab,
            'category_detail'=>$editor,
            'category_subname'=>$category_subname
        ));
    }

    function update_product()
    {
        $product_id = $_POST['product_id'];
        $category = $_POST['category'];
        $product_name = $_POST['product_name'];
        $promotion = $_POST['promotion'];
        $cost_price = $_POST['cost_price'];
        $selling_price = $_POST['selling_price'];
        $profit = $_POST['profit'];
        $product_total = $_POST['product_total'];
        $product_express = $_POST['product_express'];
        $queryty = $_POST['queryty'];

        $editor = $_POST['editor'];
        $editor2 = $_POST['editor2'];

        $data = array(
            'product_name' => $product_name,
            'product_cost_price' => $cost_price,
            'product_selling_price' => $selling_price,
            'product_profit' => $profit,
            'product_stock' => $product_total,
            'product_detail' => $editor,
            'category_id' => $category,
            'product_tranfer' => $product_express,
            'product_promotion'=>$promotion,
            'product_queryty'=>$queryty,
            'product_properties'=>$editor2
        );
        $this->db->where('product_id', $product_id)->update('product', $data);
    }
    function confirm_requestproduct()
    {
        $product_id = $_POST['product_id'];
        $category = $_POST['category'];
        $product_name = $_POST['product_name'];
        $promotion = $_POST['promotion'];
        $cost_price = $_POST['cost_price'];
        $selling_price = $_POST['selling_price'];
        $profit = $_POST['profit'];
        $product_total = $_POST['product_total'];
        $product_express = $_POST['product_express'];
        $queryty = $_POST['queryty'];

        $editor = $_POST['editor'];
        $editor2 = $_POST['editor2'];

        $point = $_POST['point'];

        $data = array(
            'product_name' => $product_name,
            'product_cost_price' => $cost_price,
            'product_selling_price' => $selling_price,
            'product_profit' => $profit,
            'product_stock' => $product_total,
            'product_detail' => $editor,
            'category_id' => $category,
            'product_tranfer' => $product_express,
            'product_promotion'=>$promotion,
            'product_queryty'=>$queryty,
            'product_properties'=>$editor2,
            'product_point'=>$point,
            'product_status'=>1
        );
        $this->db->where('product_id', $product_id)->update('product', $data);
    }
    function update_cartmockup()
    {
        $product_id = $_POST['product_id'];
        $total = $_POST['total'];

        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->where('product_id',$product_id)->update('cartmockupline',array(
                'product_total'=>$total
            ));
    }
    function update_total_mockup()
    {
        $cartmockupline_id = $_POST['cartmockupline_id'];
        $total_product = $_POST['total_product'];
        $this->db->where('cartmockupline_id',$cartmockupline_id)->update('cartmockupline',
            array(
                'product_total'=>$total_product
            ));
    }
    function cancle_cartmcokup()
    {
        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->delete('cartmockup');

        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->delete('cartmockupline');

        $this->session->set_userdata(array('mockup_id'=>'',''=>''));
    }
    function update_checkpurchase()
    {
        $ordermove_id = $_POST['ordermove_id'];
        $this->db->where('ordermove_id', $ordermove_id)->update('sliper', array(
            'sliper_status' => 2
        ));
        $this->db->where('ordermove_id', $ordermove_id)->update("ordermove", array(
            'ordermove_payments' => 3
        ));
    }
    function cancle_purchasepayments()
    {
        $ordermove_id = $_POST['ordermove_id'];
        $this->db->where('ordermove_id', $ordermove_id)->update('sliper', array(
            'sliper_status' => 3
        ));
        $this->db->where('ordermove_id', $ordermove_id)->update("ordermove", array(
            'ordermove_payments' => 5
        ));
    }
    function update_giftbox()
    {
        $giftbox_id = $_POST['giftbox_id'];
        $review_picture = $_POST['review_picture'];
        $header_content = $_POST['header_content'];
        $score_user = $_POST['score_user'];
        $editor = $_POST['editor'];

        $this->db->where('giftbox_id',$giftbox_id)->update('giftbox',array(
            'giftbox_content'=>$header_content,
            'giftbox_score'=>$score_user,
            'giftbox_detail'=>$editor,
            'giftbox_img'=>$review_picture
        ));
    }
    function update_category_blogs()
    {
        $category_blog_id = $_POST['category_blog_id'];
        $blogs = $_POST['blogs'];

        $this->db->where('category_blog_id',$category_blog_id)->update('category_blogs',array(
            'category_blog_name'=>$blogs
        ));
    }
    function update_blogs()
    {
        $blogs_id = $_POST['blogs_id'];
        $review_picture = $_POST['review_picture'];
        $category = $_POST['category'];
        $content_detail = $_POST['content_detail'];
        $content = $_POST['content'];
        $editor = $_POST['editor'];

        $data = array(
            'blogs_img' => $review_picture,
            'blogs_content' => $content,
            'blogs_description'=>$content_detail,
            'blogs_detail' => $editor,
            'category_blog_id' => $category
        );
        $this->db->where('blogs_id',$blogs_id)->update('blogs', $data);
    }
    function showviewblogs()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $this->db->where('blogs_id',$id)->update('blogs',array(
            'blogs_views'=>$status
        ));
    }
    function update_learn_online()
    {
        $learn_id = $_POST['learn_id'];
        $content = $_POST['content'];
        $tearcher = $_POST['tearcher'];
        $link = $_POST['linkcourse'];

        $this->db->where('learn_id', $learn_id)->update("learn_online", array(
            'learn_content' => $content,
            'learn_link' => $link,
            'learn_Instructor'=>$tearcher
        ));
    }
    function update_gallary()
    {
        $gallary_id = $_POST['gallary_id'];
        $content = $_POST['content'];
        $link = $_POST['link'];
        $image = $_POST['image'];

        $this->db->where('gallary_id', $gallary_id)->update("gallary", array(
            'gallary_content' => $content,
            'gallary_link' => $link,
            'gallary_img'=>$image
        ));
    }
    function update_orderdiscount()
    {
        $order_discount_id = $_POST['order_discount_id'];
        $discount_before = $_POST['discount_before'];
        $discount_after = $_POST['discount_after'];
        $discount_payback = $_POST['discount_payback'];

        $this->db->where('order_discount_id', $order_discount_id)->update('order_discount', array(
            'order_discount_before' => $discount_before,
            'order_discount_after' => $discount_after,
            'order_discount_payback' => $discount_payback
        ));
    }
    function update_amountdiscount()
    {
        $amount_discount_id = $_POST['amount_discount_id'];
        $amount_before = $_POST['amount_before'];
        $amount_after = $_POST['amount_after'];
        $amount_payback = $_POST['amount_payback'];
        $this->db->where('amount_discount_id', $amount_discount_id)->update('amount_discount', array(
            'score_before' => $amount_before,
            'score_after' => $amount_after,
            'amount_discount_payback' => $amount_payback,
            'amount_discount_create' => date('Y-m-d'),
            'amount_discount_drop' => 1
        ));
    }
    function update_setting_lineup()
    {
        $setting_lineup_id = $_POST['setting_lineup_id'];
        $setting_lineup_layer = $_POST['setting_lineup_layer'];
        $setting_lineup_payback = $_POST['setting_lineup_payback'];
        $lineup_members = $_POST['lineup_members'];
        $lineup_members_to = $_POST['lineup_members_to'];

        $this->db->where('setting_lineup_id', $setting_lineup_id)->update('setting_lineup', array(
            'setting_lineup_layer' => $setting_lineup_layer,
            'setting_lineup_payback' => $setting_lineup_payback,
            'lineup_members' => $lineup_members,
            'lineup_members_to' => $lineup_members_to
        ));
    }
    function update_position()
    {
        $position_id = $_POST['position_id'];
        $position_name = $_POST['position_name'];
        $position_price = $_POST['position_price'];
        $position_to = $_POST['position_to'];
        $postion_payback = $_POST['postion_payback'];

        $this->db->where('position_id', $position_id)->update('position', array(
            'position_name' => $position_name,
            'position_price' => $position_price,
            'position_to' => $position_to,
            'postion_payback' => $postion_payback
        ));
    }
    function update_linetoken()
    {
        $linetoken_id = $_POST['linetoken_id'];
        $linetoken = $_POST['linetoken'];
        $review_picture = $_POST['review_picture'];

        $this->db->where('linetoken_id', $linetoken_id)->update('linetoken', array(
            'linetoken_name' => $linetoken,
            'linetoken_img'=>$review_picture
        ));
    }
    function statuslinetoken()
    {
        $this->db->where('linetoken_id',$_POST['id'])->update('linetoken',array(
            'linetoken_status'=>$_POST['status']
        ));
    }
    function update_about()
    {
        $abount_id = $_POST['abount_id'];
        $editor = $_POST['editor'];
        $this->db->where('abount_id',$abount_id)->update('abount',array(
            'abount_detal'=>$editor
        ));
    }
    function update_banner()
    {
        $banner_id = $_POST['banner_id'];
        $review_picture  = $_POST['review_picture'];
        $link = $_POST['link'];
        $this->db->where('banner_id',$banner_id)->update('banner',array(
            'banner_link'=>$link,
            'banner_img'=>$review_picture
        ));
    }
    function updateCompany()
    {
        $comp_id = $_POST['comp_id'];
        $comp_name = $_POST['comp_name'];
        $comp_phone = $_POST['comp_phone'];
        $comp_tax = $_POST['comp_tax'];
        $comp_address = $_POST['comp_address'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $subdistrict = $_POST['subdistrict'];
        $comp_zipcode = $_POST['comp_zipcode'];

        $this->db->where('company_id',$comp_id)->update('company',array(
            'company_name'=>$comp_name,
            'company_tax_id'=>$comp_tax,
            'company_phone'=>$comp_phone,
            'company_address'=>$comp_address,
            'company_subdistrict'=>$subdistrict,
            'company_district'=>$district,
            'company_province'=>$province,
            'company_zipcode'=>$comp_zipcode
        ));
    }
    function updateStatusGiftBox()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];
        if($status == 2){
            $this->db->where('selectgiftbox_id',$id)->update('selectgiftbox',array(
                'selectgiftbox_status'=>2
            ));
        }else{
            $this->db->where('selectgiftbox_id',$id)->update('selectgiftbox',array(
                'selectgiftbox_status'=>3
            ));
        }
    }
}