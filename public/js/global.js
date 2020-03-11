var IVA = 0.16;

function toCurency(value){
	var newVal = "$" + (value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
	return newVal;
}

