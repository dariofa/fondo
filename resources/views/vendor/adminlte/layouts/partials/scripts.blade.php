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
			$('#busc-user').click(function () {
        //Consultas Ajax
         $("#alert-not-found").hide();
          $("#result-user").hide();
				consultarDatos();
			});
  /*Buscar usuarios via ajax form Ingresos*/ 
			function consultarDatos(){
				cedula = $('#cedula-user').val();
        urli = "/admin/users/buscar";
        $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'cedula':cedula},                
                beforeSend: function(xhr){
                	xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(res) {

                   $("#cedula").html(res.num_doc);
                   $("#nombres").html(res.name+" "+res.last_name);
                    $("#direccion").html(res.dir_res);
                   $("#telefono").html(res.telefono);
                   $("#diligenciar").html("<a href='/admin/ingresos/create/"+res.id+"'><button class='btn btn-primary'><i class='fa fa-cog'></i></button></a>");
                   $("#result-user").slideDown();
                   
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                    $("#alert-not-found").html("Lo sentimos el usuario con la cedula: "+cedula+" no fue encontrado...");
                    $("#alert-not-found").slideDown();
                    
                }
             });
			}
 /*Fin----Buscar usuarios via ajax form Ingresos*/

 /*Buscar info Laboral via ajax form Usuarios ver*/ 
      buscar = false;
      $('#buscarInfLabo').click(function () {
        //Consultas Ajax
        // $("#alert-not-found").hide();
         // $("#result-user").hide();
         
        consultarInfLab();
      });
 /*Buscar InfoLaboral via ajax form Usuarios Ver*/ 
      function consultarInfLab(){
        id = $('#user_id').val();
        urli = "/admin/users/buscar/inflabo";
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
                  //console.log(res);
                   for (var i = res.length - 1; i >= 0; i--) {
                    row = "<div class='row'><div class='col-md-2'> <input type='text' value='"+res[i].direccion+"' > </div>";
                    row += "<div class='col-md-2'> <input type='text' value='"+res[i].cargo+"' > </div>";
                    row += "<div class='col-md-2'> <input type='text' value='"+res[i].telefono+"' > </div>";
                    row += "<div class='col-md-2'> <input type='text' value='"+res[i].sector+"' > </div>";
                    row += "<div class='col-md-2'> <input type='text' value='"+res[i].observaciones+"' > </div>";
                    row += "<div class='col-md-2'> <a href='#' class='btn btn-success btnInflab'> <i class='fa fa-cog'> </i> </a>";
                    row += "<a href='/admin/users/update/infLa/"+res[i]+"' class='btn btn-primary btnInflab'> <i class='fa fa-cog'> </i> </a></div></div>";                
                    $("#resultadoDa").append(row);
                      console.log(res[i]);
                    } 
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
		
			function listarCampos(data){
				campo="";
				for (var i = data.length - 1; i >= 0; i--) {
					campo = '<input id="{{ $user->id }}" type="text" size="20" class="form-control" name="direccion" value="'+data[i].cargo+'" />';
						$("#direccion").append(campo);
						console.log(datosLaborales);
				
				}

			}

			
function llenarDatos(){
				form = $('#form');
				newData = formToObject(form);
				datosLaborales.push(newData)
				productosJSON = JSON.stringify(datosLaborales); 
				//datosLaborales = JSON.stringify(datosLaborales);
				data = form.serialize();
				console.log(productosJSON);
				//urli = "";
			   $.ajax({
                url: urli,
               // type: 'GET',
                cache: false,
                data: productosJSON,                
                beforeSend: function(xhr){
                	xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(res) {
                	console.log(res);
                	res = JSON.parse(res);
                  	console.log(res);
                	//listarCampos(datosLaborales);
                 },
                error: function(xhr, textStatus, thrownError) {
                    alert(' Error');
                }
             });
			}

			function formToObject(form) {
      objectForm = {};  
      arrayForm = $(form).serializeArray();
          arrayForm.forEach(function (obj, index) {
          objectForm[obj.name] = obj.value;
        });
        //datosLaborales.push(objectForm);
        return objectForm;
      }


      $("#agregarPe").click(function(){
       llenarDatos();
      });


   var mi_tabla = $('#tabla-users').DataTable(
      {
      "processing": true,
        "serverSide": true,
        "pageLength":10,
        "language": {
            "url":"https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json",
        },
        "ajax": "/admin/listar",

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
		


			
			
});	


   

</script>
