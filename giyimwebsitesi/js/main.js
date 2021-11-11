$(document).ready(function(){

	$(".btn_sepeteEkle").click(function(){
		var url = "http://localhost/giyimwebsitesi/sepetdb.php";
		var data = {
			p : "sepeteEkle",
			urun_id : $(this).attr("urun_id")
		}

		$.post(url, data, function(response){
			$(".badge").text(response);
		})

	})

	$(".btn_sepetSil").click(function(){
		var url = "http://localhost/giyimwebsitesi/sepetdb.php";
		var data = {
			p : "sepetSil",
			urun_id : $(this).attr("urun_id")
		}

		$.post(url, data, function(response){
			window.location.reload();
			
		})

	})


})