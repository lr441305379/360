$(function(){
	$('.add').click(function(){
		$('.address').css({"display":"block"});
		$('.add').css({"display":"none"});
		$('.sec_adrlast').css({"display":"block"});
	})
	$('.sec_adr .sec_adr_ul').click(function(){
		console.log($(this).index());
		$('.address').css({"display":"none"});
		$('.add').css({"display":"block"});
		$('.sec_adrlast').css({"display":"none"});
	})

	//$('.edit').click(function(){
	//	var n=$('#s_city option:selected') .val();
	//	var r=$('#s_county option:selected').val();
	//	var s=$('#s_province option:selected').val();
	//	var na=$('#name').attr();
	//	alert(na);
	//	//alert(r);
	//	//alert(n);
	//	//alert(s);
	//})
	//$('.del').click(function(){
	//	alert(1);
	//})
})
