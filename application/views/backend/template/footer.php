
<div style="height: 100px"></div>
</div>
</div>
<style>

    *, :after, :before {
        box-sizing: border-box
    }

    .clearfix:after, .clearfix:before {
        content: '';
        display: table
    }

    .clearfix:after {
        clear: both;
        display: block
    }

    input[name="menu"] {
        display: none
    }

    .menu {
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .list {
        width: 100%;
        height: 60px;
        overflow: hidden;
        background: #f7a4b2;
        position: relative;
    }

    .list .link-wrap {
        width: 100%;
        height: 100%;
        display: table;
    }

    .list .link-wrap > label {
        color: white;
        z-index: 999;
        min-width: 68px;
        max-width: 168px;
        width: 20%;
        font-size: 12px;
        cursor: pointer;
        padding: 4px 12px;
        text-align: center;
        position: relative;
        display: table-cell;
        vertical-align: middle;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .list .link-wrap > label > i,
    .list .link-wrap > label > span {
        -webkit-transition: all .2s ease-in-out 0s;
        transition: all .2s ease-in-out 0s;
    }

    .list .link-wrap > label > span {
        height: 0;
        display: block;
        font-weight: 500;
        -webkit-transform: translateY(45px);
        transform: translateY(45px);
    }

    #one:checked ~ .list label[for="one"] > span,
    #two:checked ~ .list label[for="two"] > span,
    #three:checked ~ .list label[for="three"] > span,
    #four:checked ~ .list label[for="four"] > span,
    #five:checked ~ .list label[for="five"] > span {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        height: auto;
    }

    #one:checked ~ .list .link-wrap > label[for="one"],
    #two:checked ~ .list .link-wrap > label[for="two"],
    #three:checked ~ .list .link-wrap > label[for="three"],
    #four:checked ~ .list .link-wrap > label[for="four"],
    #five:checked ~ .list .link-wrap > label[for="five"] {
        color: #fe0000;
    }

    .menu-mobile {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        .menu-mobile {
            display: block;
            z-index: 10;
        }
    }
</style>
<nav class="menu menu-mobile">
    <input type="radio" name="menu" id="one">
    <input type="radio" name="menu" id="two">
    <input type="radio" name="menu" id="three">
    <input type="radio" name="menu" id="four">
    <div class="list">
        <div class="link-wrap">
            <label for="one" onclick="toPagemennu('cardmember');">
                <i class="fa fa-id-card fa-2x"></i> <br/>
                บัตรตัวแทน
            </label>
            <label for="two">
                <i class="fa fa-user-plus fa-2x" onclick="toPagemennu('form_register_agent');"></i> <br/>
                สมัครตัวแทน
            </label>
            <label for="three">
                <i class="fa fa-picture-o fa-2x" ></i> <br/>
                รวมภาพโปรโมท
            </label>
            <label for="four">
                <i class="fa fa-shopping-cart fa-2x" onclick="toPagemennu('purchase_order');"></i> <br/>
                ชื้อสินค้า
            </label>
        </div>
    </div>
</nav>
<script>
    function toPagemennu(name) {
        location.href = "<?=site_url('Backend/')?>"+name;
    }
</script>
</body>
</html>