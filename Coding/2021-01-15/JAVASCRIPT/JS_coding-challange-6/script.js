document.getElementById("result-button").onclick= fibonacci;

var n1 = 0, n2 = 1, n3;
var Result =[];

function fibonacci() {
	var length = document.getElementById('length').value;

	for (var i = 1; i <= length ; i++) 
	{
	Result[i]=n1;
    n3 =  n1 + n2;
    n1 = n2;
    n2 = n3;
	}
	document.getElementById("fibonacci").innerHTML = "<p>"+ Result +"</p>"
}