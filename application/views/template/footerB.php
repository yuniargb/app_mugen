<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url('public/') ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('public/') ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('public/') ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url('public/') ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?= base_url('public/') ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?= base_url('public/') ?>vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url('public/') ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url('public/') ?>vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?= base_url('public/') ?>vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?= base_url('public/') ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url('public/') ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('public/') ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url('public/') ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url('public/') ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?= base_url('public/') ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url('public/') ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?= base_url('public/') ?>vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('public/') ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?= base_url('public/') ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url('public/') ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url('public/') ?>vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Datatables -->
<script src="<?= base_url('public/') ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url('public/') ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url('public/') ?>vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- penghilang rasa penasaran njirr -->
<!-- <script type='text/javascript'>
//<![CDATA[
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="<?= base_url() ?>"});
//]]>
</script> -->

<!-- Custom Theme Scripts -->
<script>
function baseUrl(link) {
	var baseURL = '<?= base_url() ?>';
	var url = baseURL + link;
	return url;
}

</script>

<script src="<?= base_url('public/') ?>build/js/custom.min.js"></script>
<script src="<?= base_url('public/') ?>build/js/script.js?v=1.3"></script>

</body>

</html>