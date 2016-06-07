	function navOpen() {
		var nav = document.getElementById("mobile-nav");
		nav.style.display = "block";
		var buttonOpen = document.getElementById("m-navOpen");
		buttonOpen.style.display = "none";
		var buttonClose = document.getElementById("m-navClose");
		buttonClose.style.display = "block";
	}
	function navClose() {
		var nav = document.getElementById("mobile-nav");
		nav.style.display = "none";
		var buttonOpen = document.getElementById("m-navOpen");
		buttonOpen.style.display = "block";
		var buttonClose = document.getElementById("m-navClose");
		buttonClose.style.display = "none";
	}//		choice is open or close
	function openSubNav(x, div) {
			var table = document.getElementById("m-" + div);
			table.style.display = "table";
			var buttonOpen = document.getElementById("plus" + x);
			buttonOpen.style.display = "none";
			var buttonClose = document.getElementById("minus" + x);
			buttonClose.style.display = "block";
			var label1 = document.getElementById("a-" + div);
			label1.style.backgroundColor = "#22679f";
	}
	function closeSubNav(x, div) {
			var table = document.getElementById("m-" + div);
			table.style.display = "none";
			var buttonOpen = document.getElementById("plus" + x);
			buttonOpen.style.display = "block";
			var buttonClose = document.getElementById("minus" + x);
			buttonClose.style.display = "none";
			var label1 = document.getElementById("a-" + div);
			label1.style.backgroundColor = "#275981";
	}
	/*
        function change(link, divClose, th) {
		var label = document.getElementById(th);
		var div = document.getElementById(divClose);
		//alert(label.style.backgroundColor);
		//We are opening it
		if(div.style.display == "none") {
			label.style.backgroundColor = "#22679f";
			link.style.backgroundImage = "url('images/minus.jpg')";
			div.style.display = "table";
		}
		else {
			label.style.backgroundColor = "#275981";
			link.style.backgroundImage = "url('images/plus.jpg')";
			div.style.display = "none";
		}
	}*/
