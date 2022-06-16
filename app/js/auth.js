/* Validación AJAX Log in */
$(document).on("submit", "#frmlogin", function(event){
    event.preventDefault();
    /* Formulario */
    var $form = $(this);
   /* Datos */
    var data_form = {
        email: $("input[type='text']",$form).val(),
        password: $("input[type='password']", $form).val() 
    }
    /* Validación de campos */
    if(data_form.email.length < 1 ){
        $("#msg_error").text("Necesitamos un usuario valido.").show();
        return false;        
    }else if(data_form.password.length < 1){
        $("#msg_error").text("Password vacio.").show();
        return false;   
    }
    /* Div Error */
    $("#msg_error").hide();
    /* URL para controlador y su método */
    var url_php = '?c=auth&a=Validation';
    /* Envío de datos */
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(res){
       console.log(res); 
       if(res.error !== undefined){
            $("#msg_error").html(res.error).show();
            return false;
       } 
       if(res.redirect !== undefined){
           window.location = res.redirect;
       }
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
        console.log('Final de la llamada ajax.');
    })
    return false;
});