<script>
    var KTAppOptions = {"colors":{"state":{"brand":"#5d78ff","dark":"#282a3c","light":"#ffffff","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
</script>
<script src="{{ asset('master/default/assets/js/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('master/default/assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('master/default/assets/js/app.bundle.js') }}" type="text/javascript"></script> 
        
<script type="text/javascript">
    $(function () {
        var menu = $('span.kt-menu__link-text')
        .filter(function() {
            return $(this).text().trim() === '@yield("active")';
        })
        .parents('li');
         menu.addClass('kt-menu__item  kt-menu__item--active');
     });
</script>