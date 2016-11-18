$(document).ready(function(){
    $('.a_peter').change(function(){
        var el = document.querySelector('.a_peter');
		if (el != null){
			var value = el.options[el.selectedIndex].value;
			var text = el.options[el.selectedIndex].text;
			document.querySelector('#button_button_product').value = text;
			document.querySelector('#button_asin').value = value;
			document.querySelector(".a_peter").removeAttribute("name");
		}
    });
});

$(document).ready(function(){
	var el = document.querySelector('.a_peter');
		if (el == null){
    		document.querySelector('.submit_button').style.display = "none";
    	}
});