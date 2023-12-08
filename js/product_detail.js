function recalc(){
	var x = document.getElementById("price");
	var y = document.getElementById("amount");
	var z = document.getElementById("total");

	var num = x.innerHTML.replace(/,/g, "");

	z.innerHTML = "￥ " + (num * y.value).toLocaleString();
}