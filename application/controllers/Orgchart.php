<?php

class Orgchart extends  CI_Controller
{
    function chart()
    {
        $this->load->view('orgchart');


    }

    function fetch_menu($data){

        foreach($data as $menu){

            echo "<li>".$menu->member_name."</li>";

            if(!empty($menu->sub)){

                echo "<ul>";

                $this->fetch_sub_menu($menu->sub);

                echo "</ul>";
            }

        }

    }
    function fetch_sub_menu($sub_menu){

        foreach($sub_menu as $menu){

            echo "<li>".$menu->member_name."</li>";

            if(!empty($menu->sub)){

                echo "<ul>";

                $this->fetch_sub_menu($menu->sub);

                echo "</ul>";
            }

        }

    }
}