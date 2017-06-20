<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('/js/java.js') }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    
		$('div.alertas').not('.alert-important').delay(2000).fadeOut(350);
	
		datosLaborales = [];
		
		$(document).ready(function(){

   /*Buscar usuarios via ajax form Ingresos*/ 
			$('#busc-user-cuenta').click(function () {
        //Consultas Ajax
         $("#alert-not-found").hide();
          $("#result-user").hide();
				consultarDatos(1);
			});
      /*Buscar usuarios via ajax form Ingresos*/ 
      $('#busc-user-credito').click(function () {
        //Consultas Ajax
         $("#alert-not-found").hide();
          $("#result-user").hide();
         
        consultarDatos(2);
      });
  /*Buscar usuarios via ajax form Ingresos a cuenta*/ 
			function consultarDatos(num){
				cedula = $('#cedula-user').val();
        urli = "/admin/users/buscar";
       if (cedula !='') {
            $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'cedula':cedula},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(res) {
                  if (num==1) {

                   $("#cedula").html(res.num_doc);
                   $("#nombres").html(res.name+" "+res.last_name);
                    $("#direccion").html(res.dir_res);
                   $("#telefono").html(res.telefono);
                   $("#diligenciar").html("<a href='/admin/cuentas/create/"+res.id+"'><button class='btn btn-primary'><i class='fa fa-cog'></i></button></a>");
                   $("#result-user").slideDown();

                  }else{
                     $("#cedula").html(res.num_doc);
                   $("#nombres").html(res.name+" "+res.last_name);
                    $("#direccion").html(res.dir_res);
                   $("#telefono").html(res.telefono);
                   $("#diligenciar").html("<a href='/admin/creditos/create/"+res.id+"'><button class='btn btn-primary'><i class='fa fa-cog'></i></button></a>");
                   $("#result-user").slideDown();

                  }

                   
                  },
                error: function(xhr, textStatus, thrownError) {
                  if (num == 1) {
                    $("#alert-not-found").html("El usuario no existe.. Debera realizar el registro");
                    $("#alert-not-found").toggle().delay(3000).fadeOut("slow");;
                    $("#formulario").slideDown();
                    $("#num_doc").val(cedula);
                    $("#listado_cuentas").toggle();
                  }else{
                    $("#alert-not-found").html("El usuario no existe.. Debera realizar el registro y crear una cuenta de AHORROS <br>Si desea ir al modulo de cuentas, haga clic <a href='/admin/cuentas' class='btn btn-primary'>Aqui</a>");
                    $("#alert-not-found").toggle();
                    //$("#formulario").slideDown();
                    //$("#num_doc").val(cedula);
                    $("#listado_creditos").toggle();
                  }
                    
                   // $('.success').show()
                    
                }
             });

       }else{
         $("#alert-not-found").html("Ingrese un Número de documentto valido");
          $("#alert-not-found").toggle().delay(2000).fadeOut("slow");
       }
      			}//cierra la funcion
 /*Fin----Buscar usuarios via ajax form Ingresos a nueva cuenta*/

 /*Buscar info Laboral via ajax form Usuarios ver*/ 
      buscar = false;
      info = [];
      $('#buscarInfLabo').click(function () {
         consultarInfLab();
      });
 /*Buscar InfoLaboral via ajax form Usuarios Ver*/ 
      function consultarInfLab(){
        id = $('#user_id').val();
        urli = "/admin/users/buscar/inflabo";
        var mensaje = '"¿Está seguro de eliminar el registro?"';
        //alert(id)
        if (!buscar) {
          $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'id':id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(res) {                  
                    for (var i = res.length - 1; i >= 0; i--) {
row = "<div class='row' style='display:none' id='fila"+res[i].id+"'><form action='/admin/users/update/infLa' method='post'>";
row += "<input type='hidden' name='_token' value='{{ csrf_token() }}'>";
row += "<input type='hidden' name='id' value='"+res[i].id+"'>";
row += "<div class='col-md-2'> <input name='direccion' type='text' value='"+res[i].direccion+"' class='form-control'></div>";
row += "<div class='col-md-2'> <input name='cargo' type='text' value='"+res[i].cargo+"' class='form-control'></div>";
row += "<div class='col-md-2'> <input name='telefono' type='text' value='"+res[i].telefono+"' class='form-control'></div>";
row += "<div class='col-md-1'> <input name='sector' type='text' value='"+res[i].sector+"' class='form-control'></div>";
row += "<div class='col-md-1'> <input name='salario' type='text' value='"+res[i].salario+"' class='form-control'></div>";
row += "<div class='col-md-2'> <input name='observaciones' type='text' value='"+res[i].observaciones+"' class='form-control'></div>";
row += "<div class='col-md-2'><button class='btn btn-warning' type='submit'><i class='fa fa-edit'></i></button>"; 
row +="</form>";
row += "<a class='btn btn-danger' onclick='showF("+res[i].id+")' ><i class='fa fa-close'></i></a></div></div>";


row += "<div class='row' id='filaRe"+res[i].id+"'>";
row += "<div class='col-md-2'><label>"+res[i].direccion+"</label></div>";
row += "<div class='col-md-2'><label>"+res[i].cargo+"</label></div>";
row += "<div class='col-md-2'><label>"+res[i].telefono+"</label></div>";
row += "<div class='col-md-1'><label>"+res[i].sector+"</label></div>";
row += "<div class='col-md-1'><label>"+res[i].salario+"</label></div>";
row += "<div class='col-md-2'><label>"+res[i].observaciones+"</label></div>";
row += "<div class='col-md-2'><button class='btn btn-success' onclick='showF("+res[i].id+")' ><i class='fa fa-cog'></i></button>";
row += "<a onclick='return confirm("+mensaje+")' href='/admin/users/delete/infLa/"+res[i].id+"' class='btn btn-warning' ><i class='fa fa-trash'></i></a></div>";             
row +="</div>";

$("#resultadoDa").append(row);  
                    }                   
                     
                      console.log(res);
                
                   buscar = true;
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                    $("#alert-not-found").html("Lo sentimos el usuario con la cedula: "+id+" no fue encontrado...");
                    $("#alert-not-found").slideDown();
                    
                }
             });

        }
        
      }
 /*Fin----Buscar usuarios via ajax form Ingresos*/ 

 /*Buscar info Profesional via ajax form Usuarios ver*/ 
      buscar2 = false;
      info = [];
      $('#buscarInfProf').click(function () {
        //alert();
         consultarInfProf();
      });
 /*Buscar InfoLaboral via ajax form Usuarios Ver*/ 
      function consultarInfProf(){
        id = $('#user_id').val();
        urli = "/admin/users/buscar/infprof";
       var mensaje = '"¿Está seguro de eliminar el registro?"';
        if (!buscar2) {
          $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'id':id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(res) {   
                console.log(res);               
                    for (var i = res.length - 1; i >= 0; i--) {
row = "<div class='row' style='display:none' id='fila"+res[i].id+"'><form action='/admin/users/update/infprof' method='post'>";
row += "<input type='hidden' name='_token' value='{{ csrf_token() }}'>";
row += "<input type='hidden' name='id' value='"+res[i].id+"'>";
row += "<div class='col-md-2'> <input name='nivel' type='text' value='"+res[i].nivel+"' class='form-control'></div>";
row += "<div class='col-md-2'> <input name='titulo' type='text' value='"+res[i].titulo+"' class='form-control'></div>";
row += "<div class='col-md-3'> <input name='fecha' type='date' value='"+res[i].fecha+"' class='form-control'></div>";
row += "<div class='col-md-2'> <input name='observaciones' type='text' value='"+res[i].observaciones+"' class='form-control'></div>";
row += "<div class='col-md-2'> <button class='btn btn-warning' type='submit'> <i class='fa fa-edit'> </i> </button> "; 
row +="</form> ";
row += " <a class='btn btn-danger' onclick='showF("+res[i].id+")' > <i class='fa fa-close'> </i> </a></div> </div>";


row += "<div class='row' id='filaRe"+res[i].id+"'>";
row += "<div class='col-md-2'><label>"+res[i].nivel+"</label></div>";
row += "<div class='col-md-2'><label>"+res[i].titulo+"</label></div>";
row += "<div class='col-md-3'><label>"+res[i].fecha+"</label></div>";
row += "<div class='col-md-2'><label>"+res[i].observaciones+"</label></div>";
row += "<div class='col-md-2'><button class='btn btn-success' onclick='showF("+res[i].id+")' ><i class='fa fa-cog'></i></button>";
row += "<a onclick='return confirm("+mensaje+")' href='/admin/users/delete/infprof/"+res[i].id+"' class='btn btn-warning' ><i class='fa fa-trash'></i></a></div>";             
row +="</div>";

$("#resultadoInf").append(row);  
                    }                   
                     
                      console.log(res);
                
                   buscar2 = true;
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                    $("#alert-not-found").html("Lo sentimos el usuario con la cedula: "+id+" no fue encontrado...");
                    $("#alert-not-found").slideDown();
                    
                }
             });

        }
        
      }
 /*Fin----Buscar usuarios via ajax form Ingresos*/ 

  /*Buscar info bienes user via ajax form Usuarios show*/ 
      buscar3 = false;
      $('#buscarBienes').click(function () {
        consultarBienes();
      });
 /*Buscar InfoLaboral via ajax form Usuarios Ver*/ 
      function consultarBienes(){
        id = $('#user_id').val();
        urli = "/admin/users/search/bienes/";
        var mensaje = '"¿Está seguro de eliminar el registro?"';
        if (!buscar3) {
          $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'id':id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(res) { 
                opciones = ['inmueble','vehiculo','motocicleta','electrodomestico']  
                console.log(res);               
                    for (var i = res.length - 1; i >= 0; i--) {

row = "<div class='row' style='display:none' id='fila"+res[i].id+"'><form action='/admin/users/update/bienes' method='post'>";
row += "<input type='hidden' name='_token' value='{{ csrf_token() }}'>";
row += "<input type='hidden' name='id' value='"+res[i].id+"'>";
row += "<div class='col-md-5'> <input name='name' type='text' value='"+res[i].name+"' class='form-control'></div>";
row += "<div class='col-md-4'><select name='tipo' class='form-control'>";
for (var j = opciones.length - 1; j >= 0; j--) {
 (opciones[j] == res[i].tipo) ? cadena='selected' : cadena=''; 
  row += "<option value='"+opciones[j]+"' "+cadena+">"+opciones[j]+"</option>";
}
row +="</select></div>";
row += "<div class='col-md-3'> <button class='btn btn-warning' type='submit'> <i class='fa fa-edit'> </i> </button> "; 
row +="</form> ";
row += " <a class='btn btn-danger' onclick='showF("+res[i].id+")' > <i class='fa fa-close'> </i> </a></div> </div>";


row += "<div class='row' id='filaRe"+res[i].id+"'>";
row += "<div class='col-md-5'><label>"+res[i].name+"</label></div>";
row += "<div class='col-md-4'><label>"+res[i].tipo+"</label></div>";

row += "<div class='col-md-3'><button class='btn btn-success' onclick='showF("+res[i].id+")' ><i class='fa fa-cog'></i></button>";
row += "<a onclick='return confirm("+mensaje+")' href='/admin/users/delete/bien/"+res[i].id+"' class='btn btn-warning' ><i class='fa fa-trash'></i></a></div>";             
row +="</div>";

$("#resultadoBienes").append(row);  
                    }                   
                     
                      console.log(res);
                
                   buscar3 = true;
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                    $("#alert-not-found").html("Lo sentimos el usuario con la cedula: "+id+" no fue encontrado...");
                    $("#alert-not-found").slideDown();
                    
                }
             });

        }
        
      }
 /*Fin----Buscar info bienes via ajax form show user*/ 

/*Ingresar un nuevo tipo de Movimiento*/ 
      //buscar = false;
      $('#add-tipo-ing').click(function () {
        //Consultas Ajax
        // $("#alert-not-found").hide();
         // $("#result-user").hide();
         addTipoIngreso();
        //consultarInfLab();
      });
 
      function addTipoIngreso(){
       name = $('#name').val();
       categoria = $('#categoria').val();
       tipo_mov = $('#tipo_mov').val();
        urli = "/admin/tipos/ingresos/registrar";
       
        if ( name !='' && tipo_mov!='') {
        // alert(categoria)
          $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'name':name,'tipo':tipo_mov,'categoria':categoria},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                  console.log(respu);
                $('#tabla-tipos-ingresos').DataTable().draw(false)
                    //table.fnStandingRedraw();
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                   alert("error");
                    
                }
             });

        }else{
          alert("Los campos son obligatorios..");
        }
        
      }
 /*Fin----*/ 
/*Ingresar un nuevo tipo de ingreso*/ 
      //buscar = false;
      $('#add-new-cuenta').click(function () {
         addNewCuenta();
        
      });
 /**/ 
      function addNewCuenta(){
       num_cuenta = $('#num_cuenta').val();
       user_id = $("#user_id").val()
       cuenta_tipo_id = $("#tipo_cuenta").val()
        urli = "/admin/cuentas/store/ajax";
       
        if ( num_cuenta !='') {
        // alert(cuenta_tipo_id)
          $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {
                'cuenta_tipo_id':cuenta_tipo_id,
                'num_cuenta':num_cuenta,
                'user_id':user_id},  

                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                  //$("#container-new-cuenta").hide("slide", { direction: "left" });
                  $("#container-new-cuenta").hide("slide");
                  $("#container-ingresos").toggle();
                 $("#cuenta_id").val(respu.id);
                  console.log(respu);
                //$('#tabla-tipos-ingresos').DataTable().draw(false)
                    //table.fnStandingRedraw();
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                   alert("error");
                    
                }
             });

        }
        
      }
 /*Fin----*/ 

   var mi_tabla = $('#tabla-users').DataTable(
      {
      "processing": true,
        "serverSide": true,
        "pageLength":10,
        "language": {
            "url":"https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json",
        },
        "ajax": "/admin/listar/users",
        "columns":[
          {data:"id"},
          {data:"name"},
          {data:"email"},
          {data:"intro"},
        ],
        "columnDefs": [{ 
            "orderable": false,
             "targets": 3 
             
        }]
    }       
      );

   //tabla tipos-movimientos
		 var mi_tabla2 = $('#tabla-tipos-ingresos').DataTable(
      {
      "processing": true,
        "serverSide": true,
        "pageLength":10,
        "language": {
            "url":"https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json",
        },
        "ajax": "/admin/listar/tiposIn",
        "columns":[
          {data:"id"},
          {data:"name"},
          {data:"tipo"}, 
          {data:"categoria"}, 
          {data:"intro"},
         
        ],
        "columnDefs": [{ 
            "orderable": false,
             "targets":0 
             
        }]
    }       
      );

      //tabla tipos-cuentas
     var mi_tabla2 = $('#tabla-tipos-cuentas').DataTable(
      {
      "processing": true,
        "serverSide": true,
        "pageLength":10,
        "language": {
            "url":"https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json",
        },
        "ajax": "/admin/listar/tiposCuentas",
        "columns":[
          {data:"id"},
          {data:"name"},
          {data:"intro"},
         
        ],
        "columnDefs": [{ 
            "orderable": false,
             "targets":2 
             
        }]
    }       
      );
//Tabla Tpos creditos
 var mi_tabla2 = $('#tabla-tipos-creditos').DataTable(
      {
      "processing": true,
        "serverSide": true,
        "pageLength":10,
        "language": {
            "url":"https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json",
        },
        "ajax": "/admin/listar/tiposCreditos",
        "columns":[
          {data:"id"},
          {data:"name"},
          {data:"tasa_interes"},
          {data:"intro"},
         
        ],
        "columnDefs": [{ 
            "orderable": false,
             "targets":3 
             
        }]
    }       
      );

			var mi_tabla2 = $('#tabla-tipos-referencias').DataTable(
      {
      "processing": true,
        "serverSide": true,
        "pageLength":10,
        "language": {
            "url":"https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json",
        },
        "ajax": "/admin/listar/tiposReferencias",
        "columns":[
          {data:"id"},
          {data:"name"},
          {data:"intro"},
         
        ],
        "columnDefs": [{ 
            "orderable": false,
             "targets":2 
             
        }]
    }       
      );
			
});	




   

</script>
