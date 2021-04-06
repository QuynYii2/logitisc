<style>
    .hotline-footer{display:none}
    @media  (max-width: 767px) {
        .hotline-footer{display:inline-block; position:fixed; bottom:0; height:45px; width:100%; z-index:999}
        .hotline-footer .left{float:left; width:33.33%; background:#c71444; text-align:center; height:100%}
        .hotline-footer .middle{float:left; width:33.33%; background:#767676; text-align:center; height:100%}
        .hotline-footer .right{float:right; width:33.33%;background:#c71444; text-align:center; height:100%}
        .hotline-footer .clearboth{clear:both}
        .hotline-footer .right a, .hotline-footer .left a, .hotline-footer .middle a{line-height: 45px;
            font-size: 13px;color:white}
        .hotline-footer img{width:20px; padding-right:4px}}
</style>
<div class="hotline-footer">
    <div class="left">
        <a href="tel:0896159911" ><img src="https://giapdev.com/wp-content/uploads/2019/12/giapdev-icon-phone.png"/>BÁO GIÁ</a>
    </div>
    <div class="middle">
        <a href="#nhankhuyenmai" ><img src="https://giapdev.com/wp-content/uploads/2019/12/giapdev-chat-icon.png"/>NHẬN ƯU ĐÃI</a>
    </div>
    <div class="right">
        <a href="tel:0896155511"><img src="https://giapdev.com/wp-content/uploads/2019/12/giapdev-icon-phone.png"/>DỊCH VỤ</a>
    </div>
    <div class="clearboth"></div>
</div>

<a href="#nhankhuyenmai"><div class="formdangky">
        <span class="form-dangky">NHẬN KHUYẾN MÃI</span>
    </div></a>


<style>
    @media (min-width: 320px) and (max-width: 480px){
        .my-fixed-bottom-mobile-menu {
            display: block !important;
        }
    }
    .my-fixed-bottom-mobile-menu {
        display: none;
    }
    .my-fixed-bottom-mobile-menu {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        color: #fff;
        font-size: 16px;
        text-align: center;
        height: 50px;
        z-index: 9999;
    }
</style>
<div class="my-fixed-bottom-mobile-menu show-at-mm-breakpoint">

    <div class="container clr">

        <div class="my-fbmm-toggle hotline_mg">
            <a href="tel:0896159911" class="mobile-menu-toggle">
                <i class="fa fa-phone"></i> Báo giá
            </a>
        </div>
        <div class="my-fbmm-toggle uudai_mg">
            <a href="#nhankhuyenmai" class="mobile-menu-toggle pum-trigger" style="cursor: pointer;">
                <i class="fa fa-envelope"></i> Nhận ưu đãi
            </a>
        </div>
        <div class="my-fbmm-toggle hotline_mg">
            <a href="tel:0896159911" class="mobile-menu-toggle">
                <i class="fa fa-phone"></i> Dịch vụ           </a>
        </div>

    </div>

</div>
<!-- Thank you page -->
<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = '/thank-you';
    }, false );
</script>
<!-- End Thank you page -->
