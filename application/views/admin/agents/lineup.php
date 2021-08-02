<div class="row mb-3">
    <div class="col-md-12">
        <link rel="stylesheet" href="<?=base_url('assets/orgchart/')?>jquery.orgchart.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="<?=base_url('assets/orgchart/')?>jquery.orgchart.js"></script>
        <script>
            $(function() {
                $("#organisation").orgChart({container: $("#main")});
            });
        </script>
        <style>
            #left{
                display: none;
            }
            #main{
                width: 100%!important;
            }
        </style>


        <div id="left">
            <?php
            $data = $this->ChartQuery->get_categorie($_GET['member_id']);
            echo '<ul id="organisation">';
            fetch_menu($data);
            echo '</ul>';
            ?>

        </div>



        <div id="main">
        </div>



        <?php
        function fetch_menu($data){

            foreach($data as $menu){

                if($menu->member_image == ''){
                    echo '<li> <img src="' . base_url('assets/boy.png') . '" width="30%"> <br/> '.$menu->member_code.'<br/>' . $menu->member_name;

                }else {
                    echo '<li> <img src="' . base_url('images/members/'.$menu->member_image) . '" width="30%"> <br/>' .$menu->member_code.'<br/>' . $menu->member_name;
                }
                if(!empty($menu->sub)){
                    echo "<ul>";
                    fetch_sub_menu($menu->sub);
                    echo "</ul>";
                }
                echo "</li>";
            }

        }
        function fetch_sub_menu($sub_menu){

            foreach($sub_menu as $menu){

                if($menu->member_image == ''){
                    echo '<li> <img src="' . base_url('assets/boy.png') . '" width="30%"> <br/>' .$menu->member_code.'<br/>' .$menu->member_name;

                }else {
                    echo '<li> <img src="' . base_url('images/members/'.$menu->member_image) . '" width="30%"> <br/>' .$menu->member_code.'<br/>' . $menu->member_name;
                }

                if(!empty($menu->sub)){

                    echo "<ul>";

                    fetch_sub_menu($menu->sub);

                    echo "</ul>";
                }
                echo "</li>" ;
            }

        }
        ?>


    </div>
</div>
