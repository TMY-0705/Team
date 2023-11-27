function reCalc(){
	cost = document.getElementById("total");
	amount = document.getElementById("amount");
	document.getElementById("total").innerHTML = "￥"+cost*amount;
}