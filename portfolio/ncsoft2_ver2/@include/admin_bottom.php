<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Warning</h3>
	</div>
	<div class="modal-body">
		<p>Here settings can be configured...</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn modalCls" data-dismiss="modal">Close</a>
		<!--<a href="#" class="btn btn-primary">Save changes</a>-->
	</div>
</div>
<div class="btn-setting" style="display:none;"></div>

<!-- start: JavaScript-->
<script src="/js/jquery-1.9.1.min.js"></script>
<script src="/js/jquery-migrate-1.0.0.min.js"></script>
<script src="/js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="/js/jquery.ui.touch-punch.js"></script>
<script src="/js/modernizr.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/jquery.dataTables.min.js'></script>
<script src="/js/excanvas.js"></script>
<script src="/js/jquery.flot.js"></script>
<script src="/js/jquery.flot.pie.js"></script>
<script src="/js/jquery.flot.stack.js"></script>
<script src="/js/jquery.flot.resize.min.js"></script>
<script src="/js/jquery.chosen.min.js"></script>
<script src="/js/jquery.uniform.min.js"></script>
<script src="/js/jquery.cleditor.min.js"></script>
<script src="/js/jquery.noty.js"></script>
<script src="/js/jquery.elfinder.min.js"></script>
<script src="/js/jquery.raty.min.js"></script>
<script src="/js/jquery.iphone.toggle.js"></script>
<script src="/js/jquery.uploadify-3.1.min.js"></script>
<script src="/js/jquery.gritter.min.js"></script>
<script src="/js/jquery.imagesloaded.js"></script>
<script src="/js/jquery.masonry.min.js"></script>
<script src="/js/jquery.knob.modified.js"></script>
<script src="/js/jquery.sparkline.min.js"></script>
<script src="/js/counter.js"></script>
<script src="/js/retina.js"></script>
<script src="/js/custom.js"></script>
<script type="text/javascript" src="/@resources/js/@common.js"></script>
<!-- end: JavaScript-->
<iframe name="procFrm" id="procFrm" width="0"  height="0" frameborder="0" style="display:none;"></iframe>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("A").each(function(){
		if ( $(this).attr("href") == "#")
		{
			$(this).attr("href", "javascript:void(0)")
		}
	});
	$("input").each(function(){
		var ref = $(this).attr("ref");
		if (ref=="num")
		{
			$(this).bind("keyup",function(){
				if(number_check( $(this) )==false){return;}	
			});
		}
	});
});
function bootAlert(msg){
	$(".modal-body").find("p").html(msg);
	$(".btn-setting").click();
}
function goPage(cPage, pPage){
	$("#PosPage").val(pPage)
	$("#CurPage").val(cPage)
	$("#searchFrm").submit();
}
function number_check(wjd){
	var	wjdV = wjd.val();
	var    wjdL = wjdV.length;

	for(i=0;i<wjdL;i++) {
		var val = "0123456789";
		if(parseInt(val.indexOf(wjdV.substring(i,i+1))) < 0) {
			wjd.val('');
			return false;
		}
	}
}
</script>