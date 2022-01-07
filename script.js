$(document).ready(function(){
	$("input").val("");

	$(".Insert").click(function(){
		$(this).find("input").focus();
		$(".Insert").not(this).find("input").val("");
	});

	$('input').keypress(function(e){
 		if(e.which == 13){
 			$("#Generate").click();
 		}  
	});

	$(".Check").click(function(){
		var a = $(this).find("div").css("background-color");
		if (a == "rgb(220, 220, 220)"){
			$(this).find("div").css("background-color","rgb(0, 153, 255)");
		}else{
			$(this).find("div").css("background-color","rgb(220, 220, 220)");
		} 
	});

	$("#Create").click(function(){
		$("#Home").css("display","none");
		$("#Donate").css("display","none");
		$("#Text").css("display","block");
		$("#Text").load("under.php", {
			Paragraph : 4,
			Words : 0,
			Bytes : 0,
			List : 0,
			Caps : Refer("#Caps","Bool"),
			Shuffle : Refer("#Shuffle","Bool"),
		});
	});

	$("#Generate").click(function(){


		if (!($("#Paragraph").val() == "" && $("#Words").val() == "" && $("#Bytes").val() == "" && $("#List").val() == "")) {
			$("#Home").css("display","none");
			$("#Donate").css("display","none");
			$("#Text").css("display","block");
			$("#Text").load("under.php", {
				Paragraph : Refer("#Paragraph","Int"),
				Words : Refer("#Words","Int"),
				Bytes : Refer("#Bytes","Int"),
				List : Refer("#List","Int"),
				Caps : Refer("#Caps","Bool"),
				Shuffle : Refer("#Shuffle","Bool"),
			});
		}else{
			$("#Create").click();
		}	
	});
	
});


function Sameclick(){
	

}

function Refer(a,b){
	switch(b){
		case "Int":
			var c = ($(a).val() == "" || $(a).val() == "0") ? "0" : $(a).val();
			break;
		case "Bool":
			var c = ($(a).css("background-color") == "rgb(220, 220, 220)") ? "0" : "1";
			break;
	}
	return c;
}