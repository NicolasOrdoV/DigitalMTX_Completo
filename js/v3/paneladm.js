$('body').css('overflow-x', 'hidden');
$('#default').show();
$('.inicio').click(function() {
	$('.row-wrapper').hide();
	$('.panel').addClass('valign-wrapper');
	$('#default').show();
});
$('.principal').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#principal').show();
});
$('.empleados').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#empleados').show();
});
$('.admemploy').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#admemploy').show();
});
$('.admusers').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#admusers').show();
});
$('.historial').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#historial').show();
});
$('.addproductos').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#addproductos').show();
});
$('.admproductos').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#admproductos').show();
});
$('.destproductos').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#destproductos').show();
});
$('.admpcupones').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#admpcupones').show();
});
$('.contenido').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#contenido').show();
});
$('.guia').click(function() {
	$('.row-wrapper').hide();
	$('.panel').removeClass('valign-wrapper');
	$('#guia').show();
});
$('.salir').click(function() {
	confirmar();
});


