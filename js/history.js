let rate = document.getElementById("rate");
let rater = document.getElementById("rater");
let rated = document.getElementById("rated");

function rateValueChange(){
	rate.innerHTML = "星" + rater.value;
	
	let button = document.getElementById("submittt");
	button.disabled = false;
	button.innerHTML = rated ? "変更する" : "評価する";
}