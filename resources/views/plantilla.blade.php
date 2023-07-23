<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Mantenimiento Vehicular | Policia N</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstral wysihtml5 text editor -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Datatables-->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!--Full Calendar -->
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost/sismantenimientovehicular/public/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">


 


<!-- ./wrapper -->

@if(Auth::user())
<div class="wrapper">
  @include('modulos.cabecera')
  @if(auth()->user()->rol == "Encargado")
    @include('modulos.menuEncargado')

  @elseif (auth()->user()->rol == "Policia")
    @include('modulos.menuPolicia')
  @endif

  @yield('content')
</div>
@else
  @yield('contenido')
@endif
<!-- jQuery 3 -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/raphael/raphael.min.js"></script>
<script src="http://localhost/sismantenimientovehicular/public/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="http://localhost/sismantenimientovehicular/public/bower_components/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>  
<!-- daterangepicker -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/moment/min/moment.min.js"></script>
<script src="http://localhost/sismantenimientovehicular/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/sismantenimientovehicular/public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://localhost/sismantenimientovehicular/public/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/sismantenimientovehicular/public/dist/js/demo.js"></script>

<!-- Datatables -->
<script src="http://localhost/sismantenimientovehicular/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/sismantenimientovehicular/public/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://localhost/sismantenimientovehicular/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- FullCalendar -->

<script src="http://localhost/sismantenimientovehicular/public/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://localhost/sismantenimientovehicular/public/bower_components/fullcalendar/dist/locale/es.js"></script>
<script src="http://localhost/sismantenimientovehicular/public/bower_components/moment/moment.js"></script>


<script type="text/javascript">

  $(".table").DataTable({
   
   "language": {

    "sSearch": "Buscar",
    "sEmptyTable": "No hay datos en la tabla",
    "sZeroRecords": "No se encontraron resultados",
    "sInfo":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":"Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":"(filtrando de un total de _MAX_ registros)",
    "oPaginate":{

      "sFirst":"Primero",
      "sLast":'Último',
      "sNext":"Siguiente",
      "sPrevious":"Anterior"
    },
    "sLoadingRecords":"Cargando...",
    "sLengthMenu":"Mostrar _MENU_ registros"

   }
  });
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!--Invoca de sweet alert para notificaciones "suaves"-->

@if(session('registrado') == 'Si')

    <script type="text/javascript">

        Swal.fire(
          'El policia ha sido registrado','','success'
        )

    </script>
  @elseif(session('registradoG') == 'Si')
  <script type="text/javascript">
  Swal.fire({
    title: 'Registro creado correctamente',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500
  });
</script>
  @elseif(session('agregado') == 'Si')
  <script type="text/javascript">
    Swal.fire(
      'El vehiculo ha sido agregado','','success'
      )
  </script>

    @elseif(session('asignadoDep'))
  <script>
    setTimeout(function() {
        Swal.fire({
            icon: 'success',
            title: 'Subcircuito asignado a policia',
            showConfirmButton: false,
            timer: 2000
        });
    }, 500);   
  </script>  

@elseif(session('asignadoVeh'))
  <script>
    setTimeout(function() {
        Swal.fire({
            icon: 'success',
            title: 'Subcircuito asignado a vehiculo',
            showConfirmButton: false,
            timer: 2000
        });
    }, 500);   
  </script>  

 

  @elseif(session('actualizado'))
  <script>
      Swal.fire({
          icon: 'success',
          title: '¡Vehículo actualizado!',
          showConfirmButton: false,
          timer: 1500
      });
  </script>
  @elseif(session('actualizadoP'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Personal policial actualizado!',
          showConfirmButton: false,
          timer: 1500
      });
  </script>
    @elseif(session('actualizadoGen'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Registro actualizado!',
          showConfirmButton: false,
          timer: 1500
      });
  </script>
  
  @elseif(session('eliminadoV'))
  <script>
    setTimeout(function() {
        Swal.fire({
            icon: 'success',
            title: 'Vehículo eliminado',
            showConfirmButton: false,
            timer: 5500
        });
    }, 500);   
  </script>
  @elseif(session('eliminadoP'))
  <script>
    setTimeout(function() {
        Swal.fire({
            icon: 'success',
            title: 'Policia eliminado',
            showConfirmButton: false,
            timer: 2000
        });
    }, 500);   
  </script>     

  @elseif(session('eliminadoGen'))   
  <script>
    setTimeout(function() {
        Swal.fire({
            icon: 'success',
            title: 'Registro eliminado',
            showConfirmButton: false,
            timer: 1500
        });
    }, 500);   
  </script>
  @elseif(session('erroruser'))   
  <script>
    setTimeout(function() {
        var mensaje = '{{ session("erroruser") }}';
        Swal.fire({
            icon: 'warning',
            title: mensaje,
            showConfirmButton: true,
            
        });
    }, 500);   
  </script>
@endif

  <script type="text/javascript">

    $('.table').on('click', '.EliminarPolicia', function(){
 
      var Pid = $(this).attr('Pid');
      var nombre = $(this).attr('nombre');

      Swal.fire({

        title: '¿Seguro que desea eliminar el Policia '+nombre+'?',
        icon: 'Warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor : '#d33',
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#3085d6'

      }).then((result)=> {

        if(result.isConfirmed){

          //window.location = "Inicio";
          window.location = "Eliminar-Policia/"+Pid;
        }
      })                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
    })

    $('.table').on('click', '.EliminarVehiculo', function(){
 
      var Vid = $(this).attr('Vid');
      var Placa = $(this).attr('Placa');

      Swal.fire({

        title: '¿Seguro que desea eliminar el vehiculo: '+Placa+'?',
        icon: 'Warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor : '#d33',
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#3085d6'

      }).then((result)=> {

      if(result.isConfirmed){

        //window.location = "Inicio";
        window.location = "EliminarVehiculo/"+Vid;
      }
    }) 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
  })

  $('.table').on('click', '.EliminarParroquia', function(){
 
    var Prrid = $(this).attr('Prrid');
    var nombre = $(this).attr('nombre');

    Swal.fire({

      title: '¿Seguro que desea eliminar el registro '+nombre+'?',
      icon: 'Warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      cancelButtonColor : '#d33',
      confirmButtonText: 'Eliminar',
      confirmButtonColor: '#3085d6'

    }).then((result)=> {

      if(result.isConfirmed){

        //window.location = "Inicio";
        window.location = "Eliminar-Parroquia/"+Prrid;
      }
    })                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
  })

  $('.table').on('click', '.EliminarSubcircuito', function(){
 
    var Subid = $(this).attr('Subid');
    var nombre = $(this).attr('nombre');

    Swal.fire({

      title: '¿Seguro que desea eliminar el registro '+nombre+'?',
      icon: 'Warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      cancelButtonColor : '#d33',
      confirmButtonText: 'Eliminar',
      confirmButtonColor: '#3085d6'

    }).then((result)=> {

      if(result.isConfirmed){

        //window.location = "Inicio";
        window.location = "Eliminar-Subcircuito/"+Subid;
      }
    })                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
  })

  </script>

  <script type="text/javascript">
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        a = date.getFullYear()
    
    $('#calendario').fullCalendar({
      defaultView: 'agendaWeek',
      hiddenDays : [0],
      scrollTime : "08:00:00",
      minTime    : "08:00:00",
      maxTime    : "18:00:00",

      dayClick : function(date, jsEvent, view){
        var fecha = date.format();
        var hora = ("01:00:00").split(":");
        Fechamantenimiento = fecha.split("T");
        
        
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth()+1;
        d = n.getDate();

        if (m < 10) {
          M="0"+m;
          if(d<10){
            D = "0"+d;
            diaActual = y + "-" + M + "-" + D;
          }else{
            diaActual = y + "-" +M+ "-"+ d;
           }
           }else{
            diaActual= y+"-" +m+ "-" +d;
            }

        if(diaActual<=Fechamantenimiento){
          $('#MantenimientoModal').modal();
          $("#fechamantenimiento").val(Fechamantenimiento[0]);
        }

        
        //$("#fechamantenimiento").val(Fechamantenimiento[0]);
        //$("#fechamantenimiento").val(diaActual);
        $("#horamantenimiento").val(Fechamantenimiento[1]);
      }
    });
   </script> 
   <script>
    // Escuchar los cambios en el campo de selección de tipo de vehículo
    document.getElementById('tipo_vehiculo').addEventListener('change', function() {
        // Obtener el valor seleccionado
        var tipoVehiculo = this.value;
        // Obtener el campo de capacidad de pasajeros
        var capacidadPasajeros = document.getElementById('capacidad_pasajeros');
        // Si el tipo de vehículo es "Moto", establecer la capacidad de pasajeros en 2
        if (tipoVehiculo === "3") {
            capacidadPasajeros.value = "2";
        }
        else{
            capacidadPasajeros.value = "4";
        }
    });
</script>

<script>
$(document).ready(function() {
  // Cuando se cambia la selección del usuario
  $("#user_id").on("change", function() {
    // Obtener el valor seleccionado del usuario
    var userId = $(this).val();

    // Si no se ha seleccionado ningún usuario, limpiar el campo "vehiculomantenimiento"
    if (userId === "") {
      $("#vehiculomantenimiento").val("");
      return;
    }

    // Realizar una solicitud AJAX para obtener la información del vehículo asignado al usuario
    $.ajax({
      url: "{{ url('obtenerVehiculoUsuario') }}/" + userId, // Reemplaza "obtenerVehiculoUsuario" con la ruta a tu controlador para obtener la información del vehículo asignado al usuario
      type: "GET",
      dataType: "json",
      success: function(response) {
        // Actualizar el campo "vehiculomantenimiento" con la placa del vehículo asignado al usuario
        if (response.vehiculo) {
          $("#vehiculomantenimiento").val(response.vehiculo.placa);
        } else {
          $("#vehiculomantenimiento").val("No asignado");
        }
      },
      error: function() {
        // En caso de error, mostrar un mensaje o realizar alguna acción
        $("#vehiculomantenimiento").val("Error al obtener la información del vehículo");
      }
    });
  });
});
</script>




</body>
</html>
