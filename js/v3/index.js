$(document).ready(function () {
    $('.dropdown-trigger').dropdown({
        constrainWidth: false
    });
    //$('input.autocomplete').autocomplete();
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.tooltipped').tooltip();
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });
    $('select').formSelect();
    $('.tooltipped').tooltip();
    $('.collapsible').collapsible();
    $('#quienes_somos').characterCounter();
    $('#mision').characterCounter();
    $('#vision').characterCounter();
    $('#valores').characterCounter();
    $('.materialize-textarea').characterCounter();
    $('.materialboxed').materialbox();
    $('.categorias-wrapper-normal .item-categorias-first').click();
});

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                $('#myInput').focus();
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
  }
  //var countries = ['Colombia', 'Perú',];
  $('#myInput').keyup(function() {
        var buscar = $(this).val();
        var datos = {
            accion: 'buscador',
            buscar: buscar,
        };
        //if (buscar != '' && buscar != ' ' && buscar.length >= 3) {
            $.ajax({
                url: "buscar_productos.php",
                async: true,
                type: 'POST',
                data: datos,
                success: function(result) {
                  if (result != 0) {
                    var countries = [];
                    var res = result.split(",");
                    for (var i = 0; i < res.length; i++) {
                        countries.push(res[i]);
                    }
                      autocomplete(document.getElementById("myInput"), countries);
                      $('#myInputautocomplete-list').css('max-height', '200px');
                      $('#myInputautocomplete-list').css('overflow-y', 'scroll');
                  } else {
                    countries = [];
                  }
                }
            });
        //}
    });
  $('#myInput').keyup(function(event) {
    var x = event.which || event.keyCode;
    if (x == 13 && $('#myInput').val() != '') {
        $('.buscar_mobile').submit();
    }
  });

    $('#buscar').keyup(function() {
        console.log('escribo');
        if ($(this).val() != '' && $(this).val() != ' ') {
        var datos = {
                accion: 'buscador_b',
                buscar: $(this).val(),
            };
            $.ajax({
                url: "buscar_productos.php",
                async: true,
                type: 'POST',
                data: datos,
                success: function(result) {
                    if (result != 0) {
                        $('.sugeridas').html(result);
                        $('.sugeridas').css('top', 'inherit');
                        $('.sugeridas').css('margin-top', '46px');
                    } else {
                        $('.sugeridas').html('');
                        $('.sugeridas').css('top', '-280px');
                        $('.sugeridas').css('margin-top', '0px');
                    }
                }
            });
        } else {
            $('.sugeridas').html('');
            $('.sugeridas').css('top', '-280px');
            $('.sugeridas').css('margin-top', '0px');
        }
    });

    $('#buscar_movil').keyup(function() {
        if ($(this).val() != '' && $(this).val() != ' ') {
        var datos = {
                accion: 'buscador_b',
                buscar: $(this).val(),
            };
            $.ajax({
                url: "buscar_productos.php",
                async: true,
                type: 'POST',
                data: datos,
                success: function(result) {
                    if (result != 0) {
                        $('.sugeridas').html(result);
                        $('.sugeridas').css('top', 'inherit');
                        $('.sugeridas').css('margin-top', '46px');
                    } else {
                        $('.sugeridas').html('');
                        $('.sugeridas').css('top', '-280px');
                        $('.sugeridas').css('margin-top', '0px');
                    }
                }
            });
        } else {
            $('.sugeridas').html('');
            $('.sugeridas').css('top', '-280px');
            $('.sugeridas').css('margin-top', '0px');
        }
    });

    $(document).click(function(event) {
        var elemento = $(event.target).attr('class');
        if (elemento != 'sugeridas' && elemento != 'buscar') {
            $('.sugeridas').css('top', '-280px');
            $('.sugeridas').css('margin-top', '0px');
        } else {
            if ($('#buscar').val() != '' && $('#buscar').val() != ' ') {
                $('.sugeridas').css('top', 'inherit');
                $('.sugeridas').css('margin-top', '46px');
            }
        }
    });


  //var countries = ['Colombia', 'Perú',];
  $('#myInputmovil').keyup(function() {
        var buscar = $(this).val();
        var datos = {
            accion: 'buscador',
            buscar: buscar,
        };
        //if (buscar != '' && buscar != ' ' && buscar.length >= 3) {
            $.ajax({
                url: "buscar_productos.php",
                async: true,
                type: 'POST',
                data: datos,
                success: function(result) {
                  if (result != 0) {
                    var countries = [];
                    var res = result.split(",");
                    for (var i = 0; i < res.length; i++) {
                        countries.push(res[i]);
                    }
                      autocomplete(document.getElementById("myInputmovil"), countries);
                      $('#myInputmovilautocomplete-list').css('max-height', '200px');
                      $('#myInputmovilautocomplete-list').css('overflow-y', 'scroll');
                  } else {
                    countries = [];
                  }
                }
            });
        //}
    });
  $('#myInputmovil').keyup(function(event) {
    var x = event.which || event.keyCode;
    if (x == 13 && $('#myInputmovil').val() != '') {
        $('.buscar_mobile_movil').submit();
    }
  });

var menu = 0;
$('.menu-header').click(function() {
    if (menu == 0) {
        $(this).html('<i class="material-icons left">close</i><span>CATEGORÍAS</span>');
        menu = 1;
        $('.post-header-menu-wrapper').css('display', 'block');
    } else {
        $(this).html('<i class="material-icons left">menu</i><span>CATEGORÍAS</span>');
        menu = 0;
        $('.post-header-menu-wrapper').css('display', 'none');
    }
});

$('.item-categorias').click(function() {
    var categoria = $(this).html();
    $('.categoria-seleccionada').html(categoria);
    $('.btn-ver-categoria').attr('href', 'tienda.php?categoria=' + categoria);
    var datos = {
        accion: 'ultimos_productos_categoria',
        categoria: categoria,
    };
    $.ajax({
        url: "productos_categoria.php",
        async: true,
        type: 'POST',
        data: datos,
        success: function(result) {
          $('.productos-categorias').html(result);
        }
    });
});

$('#buscar').click(function() {
    if (menu != 0) {
        $('.menu-header').html('<i class="material-icons small">menu</i>');
        menu = 0;
        $('.post-header-menu-wrapper').css('display', 'none');
    }
});

$('#btn_llamenos').click(function () {
    var nombre = $('#nombre').val();
    var celular = $('#celular').val();
    var correo = $('#correo').val();
    var mensaje = $('#mensaje').val();
    var captcha = grecaptcha.getResponse();
    if (nombre == '' || nombre == ' ') {
        M.toast({
            html: 'Tienes que colocar tu nombre completo'
        });
        $('#nombre').focus();
    } else if (celular == '' || celular == ' ') {
        M.toast({
            html: 'Tienes que colocar tu número celular completo'
        });
        $('#celular').focus();
    } else if (correo == '' || correo == ' ' || $('#correo').hasClass('invalid')) {
        M.toast({
            html: 'Tienes que colocar un correo valido'
        });
        $('#correo').focus();
    } else if (mensaje == '' || mensaje == ' ') {
        M.toast({
            html: 'Tienes que escribir un mensaje'
        });
        $('#mensaje').focus();
    } else if (captcha.length == 0) {
        M.toast({
            html: 'Tienes que completar el Captcha'
        });
    } else {
        $('#nombre').val('');
        $('#celular').val('');
        $('#correo').val('');
        $('#mensaje').val('');
        grecaptcha.reset();
        var datos = {
            nombre: nombre,
            celular: celular,
            correo: correo,
            mensaje: mensaje,
            captcha: captcha
        };
        $.ajax({
            url: "btn_llamenos.php",
            async: true,
            type: 'POST',
            data: datos,
            success: function (result) {
                $('.btn_cerrar_modal').click();
                if (result == 1) {
                    M.toast({
                        html: 'Mensaje enviado correctamente'
                    });
                } else {
                    M.toast({
                        html: 'No se ha podido enviar el mensaje, intentelo de nuevo'
                    });
                }
            }
        });
    }
});

function confirmar() {
    if (!confirm('¿Desea Salir?')) {
        return false;
    } else {
        top.location.href = "salir.php";
    }
}

function acortar_nombre_producto() {
    var numero_destacados = $('.tarjeta-producto-destacados').length;
    for (var i = 0; i <= numero_destacados; i++) {

      var titulo = $('.titulo_producto_'+i).html();
      var caracteres = $('.titulo_producto_'+i).html().length;
      var nueva = $('.titulo_producto_'+i).text();
      var bol=0;

      if(caracteres > 23) {
          bol=1;
          nueva="";
          for (var j = 0; j < 24; j++) {
            if(j == 21 || j == 22 || j == 23) {
                nueva += ".";
            } else {
                nueva += titulo[j];
            }
          }
      } else if (caracteres <= 15) {
          $('.titulo_producto_'+i).append("<br><br>");
      }

      if (bol==1) {
          $('.titulo_producto_'+i).html(nueva);
      }
    }
}

function acortar_nombre_producto_recientes() {
    var numero_recientes = $('.tarjeta-producto-recientes').length;
    for (var i = 0; i <= numero_recientes; i++) {

      var titulo = $('.titulo_producto_reciente_'+i).html();
      var caracteres = $('.titulo_producto_reciente_'+i).html().length;
      var nueva = $('.titulo_producto_reciente_'+i).text();
      var bol=0;

      if(caracteres > 23) {
          bol=1;
          nueva="";
          for (var j = 0; j < 24; j++) {
            if(j == 21 || j == 22 || j == 23) {
                nueva += ".";
            } else {
                nueva += titulo[j];
            }
          }
      } else if (caracteres <= 15) {
          $('.titulo_producto_reciente_'+i).append("<br><br>");
      }

      if (bol==1) {
          $('.titulo_producto_reciente_'+i).html(nueva);
      }
    }
}

function validar_nivel_contrasena() {
  var letra = 0;
  var mayuscula = 0;
  var numero = 0;
  var caracter = 0;
  var longitud = 0;
  var porcentaje = 0;
  $('#contrasena').keyup(function() {
    if ($('#contrasena').val() != '') {
      if ($(this).val().match(/[a-z]/)) {
        letra = 1;
      } else {
        letra = 0;
      }
      if ($(this).val().match(/[A-Z]/)) {
        mayuscula = 1;
      } else {
        mayuscula = 0;
      }
      if($(this).val().match(/[0-9]/g)) {
        numero = 1;
      } else {
        numero = 0;
      }
      if($(this).val().match(/[|!"#$%&/()=?¡¿°@´*-+¨-]/g)) {
        caracter = 1;
      } else {
        caracter = 0;
      }
      if(letra == 1 && numero == 1 && caracter == 1 && mayuscula == 1 || porcentaje >= 50) {
        if (letra == 1 && numero == 1 && caracter == 1 && mayuscula == 1) {
          $('.determinate').css('width', '90%');
          porcentaje = 90;
        }
        if ($(this).val().length >= 8) {
          $('.determinate').css('width', '100%');
          porcentaje = 100;
          longitud = 1;
        }
        $('.btn-registrarse').removeClass('disabled');
      } else if(
        //Cuando hay una
        letra == 1 && numero == 0 && caracter == 0 && mayuscula == 0 ||
        letra == 0 && numero == 1 && caracter == 0 && mayuscula == 0 ||
        letra == 0 && numero == 0 && caracter == 1 && mayuscula == 0 ||
        letra == 0 && numero == 0 && caracter == 0 && mayuscula == 1
        ) {
        $('.btn-registrarse').addClass('disabled');
        $('.determinate').css('width', '25%');
        porcentaje = 25;
      } else if(
        //Cuando hay dos
        letra == 1 && numero == 1 && caracter == 0 && mayuscula == 0 ||
        letra == 1 && numero == 0 && caracter == 1 && mayuscula == 0 ||
        letra == 1 && numero == 0 && caracter == 0 && mayuscula == 1 ||

        letra == 0 && numero == 1 && caracter == 1 && mayuscula == 0 ||
        letra == 0 && numero == 1 && caracter == 0 && mayuscula == 1 ||

        letra == 0 && numero == 0 && caracter == 1 && mayuscula == 1
        ) {
        $('.btn-registrarse').addClass('disabled');
        $('.determinate').css('width', '50%');
        porcentaje = 50;
      } else if(
        //Cuando hay tres
        letra == 0 && numero == 1 && caracter == 1 && mayuscula == 1 ||
        letra == 1 && numero == 0 && caracter == 1 && mayuscula == 1 ||
        letra == 1 && numero == 1 && caracter == 0 && mayuscula == 1 ||
        letra == 1 && numero == 1 && caracter == 1 && mayuscula == 0
        ) {
        $('.btn-registrarse').addClass('disabled');
        $('.determinate').css('width', '75%');
        porcentaje = 75;
      } else if(letra == 0 && numero == 0 && caracter == 0) {
        $('.btn-registrarse').addClass('disabled');
        $('.determinate').css('width', '0%');
        porcentaje = 0;
      }
    } else {
      $('.btn-registrarse').addClass('disabled');
      $('.determinate').css('width', '0%');
      porcentaje = 0;
    }
    console.log(porcentaje);
  });
}

$('.tarjeta-producto-destacados .carousel').click(function() {
    window.location.href = $(this).parent().parent().find('.btn-ver-destacado').attr('href');
});