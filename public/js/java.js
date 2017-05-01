$(document).ready(function(){
  
	 $('.clase').click(function(){
    valores = 0;
              $('.clase').each(function(){
              var checkbox = $(this);
              var input = $('input[type="text"]')
              if (checkbox.is(':checked')) {
                var nombre = checkbox.attr('name'); 
                mes =  $('#mes_'+nombre).attr('name');
                valor  = $('#val_'+nombre).attr('name'); 
                $("#"+mes).removeAttr("disabled");
                $("#"+valor).removeAttr("disabled");

                if (nombre=='otro') {
                	$('#des_otro').removeAttr("disabled");
                }
                valores ++;

                
              }else{

              	var nombre = checkbox.attr('name'); 
                mes =  $('#mes_'+nombre).attr('name');
                valor  = $('#val_'+nombre).attr('name'); 
                $("#"+mes).attr('disabled','disabled');
                $("#"+valor).attr('disabled','disabled');
                if (nombre=='otro') {
                	$('#des_otro').attr('disabled','disabled');
                }
               
                //$("#btnRegIng").fadeOut();
              }

            // console.log('El checkbox ' + checkbox.attr('name') + ' está checkeado? ' + checkbox.is(':checked')  );
          });
                console.log(valores);
           if (valores>0) {
                 $("#btnRegIng").removeAttr("disabled");
          }else{
                 $("#btnRegIng").attr('disabled','disabled');
          }          
    });
   ////////////////////////////////////////////////////////////////////////////
   
 
});
