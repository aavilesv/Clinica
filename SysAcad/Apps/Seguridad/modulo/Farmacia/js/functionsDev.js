function addProduct(code){
	var amount = document.getElementById(code).value;
	window.location.href = 'ListarDevolucion.php?action=add&code='+code+'&amount='+amount;
}
function deleteProduct(code){
	window.location.href = 'ListarDevolucion.php?action=remove&code='+code;
}
