function recalc(){
	var num = 0;

	for(var i=0; i<n; i++){
		var x = document.getElementById("price_"+i);
		var y = document.getElementById("amount_"+i);
		console.log(x.value + ", " + y.value);

		num += x.value * y.value;
	}

	var z = document.getElementById("total");
	z.innerHTML = "￥" + (num).toLocaleString();
}