/*
 * # Semantic - Navigation Bar (Customised)
 */

$(document).ready(function(){ 
	$('.navbar.right.menu.open').on("click",function(e){
		e.preventDefault();
		$('.navbar.ui.vertical.menu').toggle();
	});
	$('.navbar.ui.dropdown').dropdown();
});