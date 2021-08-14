<!--Scripts tablas-->
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script>
  $(document).ready(function() {
    $('#example2').DataTable();
} );
</script>
<!--Script subir-->
 <script>
$(document).ready(function(){ 
 
	$('.subir').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.subir').slideDown(300);
		} else {
			$('.subir').slideUp(300);
		}
	});
 
});
</script>


 <!-- MENU NAV-->

<script>
 
$(document).ready(main);
 
var contador = 1;
 
function main () {
	$('.menu_bar').click(function(){
		if (contador == 1) {
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
	});
 
	// Mostramos y ocultamos submenus
	$('.submenu').click(function(){
		$(this).children('.children').slideToggle();
	});
}

 </script>

 <script>
 
$(document).ready(main);
 
var contador = 1;
 
function main () {
	$('.menu_bar2').click(function(){
		if (contador == 1) {
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
	});
 

}

 </script>

 
 <script>
 
$(document).ready(main);
 
var contador = 1;
 
function main () {
	$('.menu_bar3').click(function(){
		if (contador == 1) {
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
	});
 
	
}

 </script>
 
 <!-- OPACITY -->
 
<script>

function showLightbox() {
    document.getElementById('over').style.display='block';
    document.getElementById('fade').style.display='block';
}
function hideLightbox() {
    document.getElementById('over').style.display='none';
    document.getElementById('fade').style.display='none';
}


</script>



 
 