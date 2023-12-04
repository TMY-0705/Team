function recalc(){
	// $_SESSION['cart'][$acc_id]
	const user = window.sessionStorage.getItem(['loginfo'],['acc_id']);
	var n = window.sessionStorage.getItem(['cart'],[user]);
	var num = 0;

	for(var i=0; i<n; i++){
		var x = document.getElementById("price");
		var y = document.getElementById("amount");
		var z = document.getElementById("total");

		num += x.innerHTML.replace(/,/g, "");
	}

	z.innerHTML = "￥" + (num * y.value).toLocaleString();
}