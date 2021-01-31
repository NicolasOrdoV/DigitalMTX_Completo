/**
 * @author Diego Rodríguez Veloza (@rodvel2910).
 * @author Edwin Velasquez Jimenez (lion_3214@hotmail.com).
 */

//Colección de animaciones
var animaciones = [
	'translateY(426px)',
	'translateY(-426px)',
	'translateX(426px)',
	'translateX(-426px)',
	'rotate(360deg)',
	'rotate(-360deg)',
	'scale(0)',
	'scale(5)',
	'scaleY(0)',
	'scaleY(5)',
	'scaleX(0)',
	'scaleX(5)',
	'translateY(426px) rotate(360deg)',
	'translateY(-426px) rotate(360deg)',
	'translateX(426px) rotate(360deg)',
	'translateX(-426px) rotate(360deg)',
	'translateY(426px) rotate(-360deg)',
	'translateY(-426px) rotate(-360deg)',
	'translateX(426px) rotate(-360deg)',
	'translateX(-426px) rotate(-360deg)',
	'translateY(426px) scale(0)',
	'translateY(-426px) scale(0)',
	'translateX(426px) scale(0)',
	'translateX(-426px) scale(0)',
	'translateY(426px) scale(5)',
	'translateY(-426px) scale(5)',
	'translateX(426px) scale(5)',
	'translateX(-426px) scale(5)',
	'translateY(426px) scaleY(0)',
	'translateY(-426px) scaleY(0)',
	'translateX(426px) scaleY(0)',
	'translateX(-426px) scaleY(0)',
	'translateY(426px) scaleY(5)',
	'translateY(-426px) scaleY(5)',
	'translateX(426px) scaleY(5)',
	'translateX(-426px) scaleY(5)',
	'translateY(426px) scaleX(0)',
	'translateY(-426px) scaleX(0)',
	'translateX(426px) scaleX(0)',
	'translateX(-426px) scaleX(0)',
	'translateY(426px) scaleX(5)',
	'translateY(-426px) scaleX(5)',
	'translateX(426px) scaleX(5)',
	'translateX(-426px) scaleX(5)',
	'rotate(360deg) scale(0)',
	'rotate(-360deg) scale(0)',
	'rotate(360deg) scale(5)',
	'rotate(-360deg) scale(5)',
	'rotate(360deg) scaleY(0)',
	'rotate(-360deg) scaleY(0)',
	'rotate(360deg) scaleY(5)',
	'rotate(-360deg) scaleY(5)',
	'rotate(360deg) scaleX(0)',
	'rotate(-360deg) scaleX(0)',
	'rotate(360deg) scaleX(5)',
	'rotate(-360deg) scaleX(5)',
];

var auto;
var numero_slides = ""

var id_auto=[]; 
var id_play=[]; 

var aumatico=false;
var efectos=false;

var mas=0;
var menos=0;
var normal=0;

//---------------------------------------------------------------------------------------------------------------------------------------------
$('video').bind("play", function() {
	clearInterval(auto);
});

$('video').bind("pause", function() {

	if (menos==1) {

		var pos = id_auto.indexOf($('.visible').attr('id')==1?numero_slides.length:(parseInt($('.visible').attr('id'))-1));
		if (pos!=-1) {
			id_auto.splice(pos, 1);
		}

		id=$('.visible').attr('id')==1?numero_slides.length:(parseInt($('.visible').attr('id'))-1);
		if ($('#'+id+' video').length>0) {
			if (id_play.length==0) {
				id_play.push(id);
			}else{
				var contador=0;
				for (var i = 0; i < id_play.length; i++) {
					if (id_play[i]==id) {
						
					}else{
						contador++;
					}
				}
				if (contador>=id_play.length) {
					id_play.push(id);
				}
			}	
		}

	}else if (normal==1) {

		var pos = id_auto.indexOf(parseInt($('.visible').attr('id')));
		if (pos!=-1) {
			id_auto.splice(pos, 1);
		}

		id=parseInt($('.visible').attr('id'));
		if ($('#'+id+' video').length>0) {
			if (id_play.length==0) {
				id_play.push(id);
			}else{
				var contador=0;
				for (var i = 0; i < id_play.length; i++) {
					if (id_play[i]==id) {
						
					}else{
						contador++;
					}
				}
				if (contador>=id_play.length) {
					id_play.push(id);
				}
			}	
		}

	}else if (mas==1) {

		var pos = id_auto.indexOf($('.visible').attr('id')==numero_slides.length?1:(parseInt($('.visible').attr('id'))+1));
		if (pos!=-1) {
			id_auto.splice(pos, 1);
		}

		id=$('.visible').attr('id')==numero_slides.length?1:(parseInt($('.visible').attr('id'))+1);
		if ($('#'+id+' video').length>0) {
			if (id_play.length==0) {
				id_play.push(id);
			}else{
				var contador=0;
				for (var i = 0; i < id_play.length; i++) {
					if (id_play[i]==id) {
						
					}else{
						contador++;
					}
				}
				if (contador>=id_play.length) {
					id_play.push(id);
				}
			}	
		}
	}
		
	clearInterval(auto);
	if (aumatico==true) {
		inter();
	}

	console.log(id_auto);
	console.log(id_play);

});

$('video').bind("ended", function() {

	var contador=0;
	for (var i = 0; i < id_auto.length; i++) {
		if (id_auto[i]!=$('.visible').attr('id')&&id_auto[i]!="") {
			contador++;
		}
	}

	if (contador>=id_auto.length) {
		id_auto.push(parseInt($('.visible').attr('id')));
	}

	var pos = id_play.indexOf($('.visible').attr('id'));
	if (pos!=-1) {
		id_play.splice(pos, 1);
	}
		
	clearInterval(auto);
	if (aumatico==true) {
		inter();
	}

	console.log(id_auto);
	console.log(id_play);
	
});
//---------------------------------------------------------------------------------------------------------------------------------------------



function random_animacion() {

	if (efectos==true) {
		return Math.floor((Math.random() * animaciones.length) + 0);
	}else if (isNaN(efectos) == false&&efectos!=false) {
		return efectos;
	}else{
		return 2;
	}
}

function sub_botones() {

	var sub_botones = "";
	for (var i = 0; i < numero_slides.length; i++) {//Aplicar las animaciones en el cargue de la página
		if(i != 0) {
			var animacion_elegida = random_animacion();
			$('.item:nth-child('+(i+1)+')').css('transform', animaciones[animacion_elegida]);
		}
		if(i == 0) {
			sub_botones += '<div class="sub_boton sub_boton_active '+(i+1)+'"></div>';
		} else {
			sub_botones += '<div class="sub_boton '+(i+1)+'"></div>';
		}
	}

	$('.caja_sub_botones').html(sub_botones);
	sub_boton_evento();
}

function asingnacion(id,animacion) {//esconde el anterior y muestra el actual

	$('.item.visible').css('opacity', '0');
	$('.item.visible').css('transform', animaciones[animacion]);
	$('.item.visible').removeClass('visible');
	$('.item:nth-child('+id+')').addClass('visible');

	if($('.item:nth-child('+id+')').html() == undefined) {
		id = 1;
		$('.item.visible').removeClass('visible');
		$('.item:nth-child('+id+')').addClass('visible');
	}

	return id;
}

function mostrar(id) {

	var pos = id_auto.indexOf(id);
	if (pos!=-1) {
		$('#'+id_auto[pos]+' video').get(0).currentTime = 0;
		$('#'+id_auto[pos]+' video').get(0).play();
	}

	setTimeout(function() {
		$('.item:nth-child('+id+')').css('opacity', '1');
		$('.item:nth-child('+id+')').css('transform', 'none');
	}, 200);
}

function sub_asignacion(id) {

	$('.sub_boton.sub_boton_active').removeClass('sub_boton_active');
	$('.sub_boton.'+id).addClass('sub_boton_active');
}

function sub_boton_evento() {
	
	$('.sub_boton').click(function() {//Click en alguno de los sub_botones

		menos=0;
		mas=0;
		normal=1;

		if ($('.visible video').length>0) {
			$('.visible video').get(0).pause();
		}

		clearInterval(auto);

		var id = $(this).attr("class");
		id = id.split(" ");
		id= id[1];

		var animacion_elegida_sub = random_animacion();
		id = asingnacion(id,animacion_elegida_sub);
			
		mostrar(id);
		sub_asignacion(id);

		id_play.push(id);
		if ($('.visible video').length>0) {
			var contador=0;
			for (var i = 0; i < id_play.length; i++) {
				if (id_play[i]==$('.visible').attr('id')) {
					$('.visible video').get(0).play();
					id_play.splice(i, 1);
				}
			}
		}
	});
}

function siguiente() {

	var id = $('.visible').attr('id');
	id++;

	var animacion_elegida_pos = random_animacion();
	id = asingnacion(id,animacion_elegida_pos);
		
	mostrar(id);
	sub_asignacion(id);

	if ($('.visible video').length>0) {
		var contador=0;
		for (var i = 0; i < id_play.length; i++) {
			if (id_play[i]==$('.visible').attr('id')) {
				$('.visible video').get(0).play();
				id_play.splice(i, 1);
			}
		}
	}
}

function inter() {
	auto = setInterval(siguiente, 3500);
}

function botones_der() {
	
	$('.button_der').click(function() {//Click en el botón de "Siguiente"
		menos=1;
		mas=0;
		normal=0;

		if ($('.visible video').length>0) {
			$('.visible video').get(0).pause();
		}

		siguiente();
	});
}

function botones_izq() {
	
	$('.button_izq').click(function() {//Click en el botón de "Atras"
		menos=0;
		mas=1;
		normal=0;

		if ($('.visible video').length>0) {
			$('.visible video').get(0).pause();
		}

		var id = $('.visible').attr('id');
		id--;

		var animacion_elegida_pre = random_animacion();
		id = asingnacion(id,animacion_elegida_pre);

		mostrar(id);
		sub_asignacion(id);

		if ($('.visible video').length>0) {
			var contador=0;
			for (var i = 0; i < id_play.length; i++) {
				if (id_play[i]==$('.visible').attr('id')) {
					$('.visible video').get(0).play();
					id_play.splice(i, 1);
				}
			}
		}
	});
}

function sub_botones_size(a) {//tamaño de los botones inferiores

	if(a == 1) { /* grande */
		$('.sub_boton').css('height', '35px');
		$('.sub_boton').css('width', '35px');
	} else if(a == 2) { /* medio */
		$('.sub_boton').css('height', '25px');
		$('.sub_boton').css('width', '25px');
	} else if(a == 3) { /* pequeño */
		$('.sub_boton').css('height', '15px');
		$('.sub_boton').css('width', '15px');
	}
}

function sub_botones_border_width(a) {//tamaño de los botones inferiores en el borde

	if(a == 1) { /* grande */
		$('.sub_boton').css('border-width', '6px');
	} else if(a == 2) { /* medio */
		$('.sub_boton').css('border-width', '2px');
	} else if(a == 3) { /* pequeño */
		$('.sub_boton').css('border-width', '0px');
	}
}

function sub_botones_border_color(a) {//color del borde de los botones inferiores
	$('.sub_boton').css('border-color', a);
}

function sub_botones_background_color(a) {//color de fonde de los botones inferiores
	$('.sub_boton').css('background', a);
}

function der_izq_botones_size(a) {//tamaños de los botones izquierdo y derecho

	if(a == 1) { /* grande */
		$('.caja_atras button, .caja_pos button').css('height', '60px');
		$('.caja_atras button, .caja_pos button').css('width', '60px');
	} else if(a == 2) { /* medio */
		$('.caja_atras button, .caja_pos button').css('height', '40px');
		$('.caja_atras button, .caja_pos button').css('width', '40px');
	} else if(a == 3) { /* pequeño */
		$('.caja_atras button, .caja_pos button').css('height', '20px');
		$('.caja_atras button, .caja_pos button').css('width', '20px');
	}
}

function der_izq_botones_background_color(a) {//color de fondo del botom
	$('.caja_atras button, .caja_pos button').css('background', a);
}

function der_izq_botones_color(a) {//color de letra del botom
	$('.caja_atras button, .caja_pos button').css('color', a);
}

function sub_botones_sombra(a) {//sombra de los botones izquierdo y derecho

	if(a == 'clara') {
		$('.caja_atras button, .caja_pos button').css('box-shadow', '0px 0px 4px white');
	} else if(a == 'oscura') {
		$('.caja_atras button, .caja_pos button').css('box-shadow', '0px 0px 4px black');
	}
}

function quitar_automatico_mute() {//si la variable universal aumatico==falso, quita todos los mute y auto play y no se inicia automaticamente la galeria
	
	var videos = $('.caja_banner').children('div');
	for (var i = 0; i <= videos.length; i++) {
		if ($('div:nth-child('+i+') video').length>0) {
			$('div:nth-child('+i+') video').removeAttr("autoplay");
			$('div:nth-child('+i+') video').removeAttr("muted");
		}
	}
}

function vidgal(a) {// metodo principal, es el que inicializa las galerias

	this.numero_slides = $('.caja_banner div');
	for (var i = 0; i <= numero_slides.length; i++) {//Numero de slides en la galería
		$('.caja_banner div:nth-child('+i+')').addClass('item');
		$('.caja_banner div:nth-child('+i+')').attr('id', i);
		if(i == 0) {
			$('.caja_banner div:nth-child(1)').addClass('visible');
		}
	}

	$('.caja_banner').after('<div class="caja_botones"><div class="caja_atras"><button class="button_izq">&#60;</button></div><div class="caja_pos"><button class="button_der">&#62;</button></div></div>');
	$('.caja_botones').after('<div class="caja_sub_botones"></div>');

	if(a.auto == true && a.auto != undefined) {
		inter();
		this.aumatico=true;
	}else{
		if (aumatico==false) {
			quitar_automatico_mute();
		}
	}
	
	if (a.sub_botones == true && a.sub_botones != undefined) {
		sub_botones();
	}

	if(a.video_reset = true && a.video_reset != undefined) {
		video_evento();
	}
	
	if(a.der_botones == true && a.der_botones != undefined) {
		botones_der();
	} else {
		$('.caja_pos').css('display', 'none');
	}

	if(a.izq_botones == true && a.izq_botones != undefined) {
		botones_izq();
	} else {
		$('.caja_atras').css('display', 'none');
	}

	if(a.sub_botones_size != undefined) {
		sub_botones_size(a.sub_botones_size);
	}

	if(a.sub_botones_border_width != undefined) {
		sub_botones_border_width(a.sub_botones_border_width);
	}

	if(a.sub_botones_border_color != undefined) {
		sub_botones_border_color(a.sub_botones_border_color);
	}

	if(a.sub_botones_background_color != undefined) {
		sub_botones_background_color(a.sub_botones_background_color);
	}

	if(a.der_izq_botones_size != undefined) {
		der_izq_botones_size(a.der_izq_botones_size);
	}

	if(a.der_izq_botones_background_color != undefined) {
		der_izq_botones_background_color(a.der_izq_botones_background_color);
	}

	if(a.der_izq_botones_color != undefined) {
		der_izq_botones_color(a.der_izq_botones_color);
	}

	if(a.sub_botones_sombra != undefined) {
		sub_botones_sombra(a.sub_botones_sombra);
	}

	if(a.efectos != undefined && a.efectos == true ) {
		this.efectos=true;
	}else if (a.efectos != undefined && isNaN(a.efectos) == false &&(a.efectos>=0&&a.efectos<=55)) {// 0 al 55
		this.efectos=parseInt(a.efectos);
	}else{
		//console.log("efecto vidgal predeterminado");
	}
}