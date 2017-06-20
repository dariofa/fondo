$(document).ready(function(){
  
	 $('.clase').click(function(){
    var checkbox = $(this);
    id = checkbox.attr('id');
    valores = 0;
              $('.clase').each(function(){
              
              if (checkbox.is(':checked')) {
              // var nombre = checkbox.attr('name'); 
                $('#mes'+id).removeAttr("disabled");
                $('#valor'+id).removeAttr("disabled");
                        
              }else{
              	$('#mes'+id).attr('disabled','disabled');
                $('#valor'+id).attr('disabled','disabled');
               
                //$("#btnRegIng").fadeOut();
              }
valores ++;  
            // console.log('El checkbox ' + checkbox.attr('name') + ' está checkeado? ' + checkbox.is(':checked')  );
          })

           console.log(valores);
           if (valores>0) {
                 $("#btnRegIng").removeAttr("disabled");
          }else{
                 $("#btnRegIng").attr('disabled','disabled');
          }          
    });
   ////////////////////////////////////////////////////////////////////////////
   $('.radio').click(function(){
    var radio = $(this);
    id = radio.attr('id');
    //(id == 'administracion') ? $("#ingreso_tipo").val(1) : $("#ingreso_tipo").val(0); 
    if (id =='cuenta') {$("#ingreso_tipo").val(0); };
    if (id =='administracion') $("#ingreso_tipo").val(1);
    if (id =='retiro') $("#ingreso_tipo").val(2);
    //alert(id)
    urli =  "/admin/tipos/movimientos/cuenta/buscar";
    $("#resultado-tipo").html('');
     $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'num_cuenta':id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                   for (var i = respu.length - 1; i >= 0; i--) {
                    row = "<div class='row'><div class='col-md-4'><input onclick='camChe("+respu[i].id+")' type='checkbox' name='ingresos_tipo_id[]' id='"+respu[i].id+"' class='clase' value='"+respu[i].id+"'>"+respu[i].name+"</div>";
                    
                    row += "<div class='col-md-4'> <input type='date' name='mes[]' disabled id='mes"+respu[i].id+"' class='form-control' required> </div>";

                    row += "<div class='col-md-4'> <input type='text' name='valor[]' disabled id='valor"+respu[i].id+"' class='form-control' required > </div></div>";
                                 
                    $("#resultado-tipo").append(row);
                      
                    }
                   
                    console.log(respu);
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                   alert("error");
                    
                }
             });
    });
total = 0;
$(".check-add-payment").click(function(){
     checkbox = $(this);
     id = checkbox.attr('id');
      
      if (checkbox.is(':checked')) {
        
        $("#valor"+id).removeAttr("disabled");
          $("#fecha"+id).removeAttr("disabled");
           $("#movimiento_tipo_id"+id).removeAttr("disabled");
           $("#id"+id).removeAttr("disabled");
           $("#btnPagCou").removeAttr("disabled");
           $("#fila"+id).addClass("activa");
           total += parseInt($("#valor"+id).val());
         
      }
      if (!checkbox.is(':checked')) {
         $("#valor"+id).attr("disabled",'disabled');
          $("#fecha"+id).attr("disabled",'disabled');
           $("#movimiento_tipo_id"+id).attr("disabled",'disabled');
           $("#id"+id).attr("disabled",'disabled');
           $("#btnPagCou").attr("disabled",'disabled');
           $("#fila"+id).removeClass("activa");
           total -= parseInt($("#valor"+id).val());
           
      }
$("#totalPag").html(total);

   });
//Asignar rol y password
   $("#formNewUer").submit(function(){
    $("#username").val($("#num_doc").val());
     $("#password").val($("#num_doc").val());
    return true;
   });

   $("#num_doc").blur(function(){
valor = $(this).val();
//console.log(valor);
 urli =  "/admin/referencias/buscar";
     $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'num_doc':valor},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {                     
                 res =  isEmptyJSON(respu);
                console.log(respu);
                 console.log(valor);
                 if (!res) {
                  $("#lug_exp_doc").val(respu[0].lug_exp_doc);
                  $("#name").val(respu[0].name);
                  $("#last_name").val(respu[0].last_name);
                  $("#direccion").val(respu[0].direccion);
                  $("#telefono").val(respu[0].telefono);
                  $("#email").val(respu[0].email);
                  $("#ing_mensuales").val(respu[0].ing_mensuales);
                  $("#referencia_id").val(respu[0].id);

                  $("#referencia_id").removeAttr("disabled");
                  $("#lug_exp_doc").attr("readonly",'readonly');
                  $("#name").attr("readonly",'readonly');
                  $("#last_name").attr("readonly",'readonly');
                  $("#direccion").attr("readonly",'readonly');
                  $("#telefono").attr("readonly",'readonly');
                  $("#email").attr("readonly",'readonly');
                  $("#ing_mensuales").attr("readonly",'readonly');
                  $("#type_doc").attr("readonly",'readonly');
                }else{
                   $("#referencia_id").attr("disabled",'disabled');
                   $("#lug_exp_doc").removeAttr("readonly");
                  $("#name").removeAttr("readonly");
                  $("#last_name").removeAttr("readonly");
                  $("#direccion").removeAttr("readonly");
                  $("#telefono").removeAttr("readonly");
                  $("#email").removeAttr("readonly");
                  $("#ing_mensuales").removeAttr("readonly");
                  $("#type_doc").removeAttr("readonly");

                  $("#lug_exp_doc").val('');
                  $("#name").val('');
                  $("#last_name").val('');
                  $("#direccion").val('');
                  $("#telefono").val('');
                  $("#email").val('');
                  $("#ing_mensuales").val('');
                  $("#referencia_id").val('');
                }                    //console.log(v);
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                   alert("error");
                    
                }
             });

   });
   ////////////////////////////////////////////////////////////////////////////
/*   $("#btnGuaLab").click(function(){
    //form = $("#formGuaLab");
   // var data = formToObject(form);

   user_id = $("#user_id").val();
   direccion = $("#direccion").val();
   cargo = $("#cargo").val();
   sector = $("#sector").val();
   telefono = $("#telefono").val();
   observaciones = $("#observaciones").val();
  

   // console.log((data));
    urli = "/admin/users/agregarinflabo";
     $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'user_id':user_id,'direccion':direccion,'cargo':cargo,'sector':sector,'telefono':telefono,'observaciones':observaciones},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {

                  console.log(respu);
               // $('#tabla-tipos-ingresos').DataTable().draw(false)
                    //table.fnStandingRedraw();
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                   alert("error");
                    
                }
             });//fin de ajax

   });//Fin del boton*/

    $('.tipo_pago').click(function(){
      radio = $(this);
      valor = radio.attr('id');
      if (valor == "ahorro") $("#ingreso_tipo").val(2);
    });

//Calculo de saldo credito
  $('#valor_credito').blur(function(){
      valor = $(this).val();
      interes = $("#tasa_interes").val();

      if (valor>500000 && valor !="" ) {
        interes = valor * (20/100);
        nuevo_saldo = parseInt(interes) + parseInt(valor);
        $("#num_cuotas").val('');
        $("#saldo_credito").val(nuevo_saldo);
      }else{
        $("#saldo_credito").val('');
        $("#num_cuotas").val('');
        $("#valor_cuota_mensual").val('');
     }
  });
  //Calculo de valor cuotas
  $('#num_cuotas').blur(function(){
      num_cuota = $(this).val();
      saldo_total = $("#saldo_credito").val();

      if (saldo_total > 0 && saldo_total !="" && num_cuota!="" ) {
        valor_cuota = parseInt(saldo_total / (num_cuota));

        $("#valor_cuota_mensual").val(valor_cuota);
      }else{
        $("#valor_cuota_mensual").val();
     }
  });

  $("#form-new-credito").submit(function(){
      valor = $("#valor_cuota_mensual").val();
      saldo = $("#saldo_credito").val();
    //alert(valor +" "+saldo);
    if (valor!='' && saldo!='') {
      return true
    }else{
      alert("Faltan datos...")
      return false;

    }
    
  })

  //Buscar tasa de interes
  $("#searchTasa").change(function(){      
      id = $(this).val();
      urli = "/admin/tipos/interes/buscar/tasa/";
       $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'id':id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                    $("#tasa_interes").val(respu.tasa_interes);
                   
                    console.log(respu);
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                   alert("error");
                    
                }
             });
      
  });
 
});//Fin de document.ready

function camChe(id){
    bandera = false;
   $('.clase').each(function(){      
      checkbox = $("#"+id);
      if (checkbox.is(':checked')) {
              // var nombre = checkbox.attr('name'); 
                $('#mes'+id).removeAttr("disabled");
                $('#valor'+id).removeAttr("disabled");
                bandera = true;
                 console.log(checkbox.is(':checked')) ;
              }else{
                $('#mes'+id).attr('disabled','disabled');
                $('#valor'+id).attr('disabled','disabled');
               bandera = false;
              }  
                  // console.log('El checkbox ' + checkbox.attr('name') + ' está checkeado? ' + checkbox.is(':checked')  );
          });
  if (bandera) {
    $("#btnNewMov").removeAttr("disabled");
  }else{
    $("#btnNewMov").attr('disabled','disabled');
  } 
}
function showF(id){
  $("#fila"+id).toggle();
  $("#filaRe"+id).toggle();
  //alert(id);
}

function isEmptyJSON(obj) {
  for(var i in obj) { return false; }
  return true;
}
function confirmar(){

  var confirm = confirm("Hola");
  if (confirm) {
    return true;
  }else{
    return false;
  }

}
function searchRef(id){
       urli = "/admin/referencias/buscar/";
       $.ajax({
                url: urli,
                type: 'POST',
                cache: false,
                data: {'id':id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                     console.log(respu);
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                   alert("error");
                    
                }
             });
}