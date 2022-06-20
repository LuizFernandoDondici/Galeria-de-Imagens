
$('document').ready(function(){
    $("#btn-loginto").click(function(e){
        e.preventDefault();

        var data = JSON.stringify(form = {
            email : document.querySelector('#email-loginto').value,
            pass : document.querySelector('#pass-loginto').value,
        })

        $.ajax({
            type : 'POST',
            url  : '/logar',
            contentType : 'application/json',
            dataType : 'JSON',
            data : data,

            beforeSend : function(){
                $("#btn-loginto").html("...");
            }, 

            success: ((e)=>{
                if(e.success == 1){
                    window.location.href = "/galeria";     
                } else if (e.success == 0){
                    window.alert(e.msg);
                }
            })

        }).done((e)=>{
          $("#btn-loginto").html("Logar");
          
        }).fail((e)=>{
            window.alert('erro ajax');
        })
    })
})


$('document').ready(function(){
    $("#btn-save-user").click(function(e){
        e.preventDefault();

        var data = JSON.stringify(form = {
            email : document.querySelector('#email-save-user').value,
            pass : document.querySelector('#pass-save-user').value,
        })
        
        $.ajax({
            type : 'POST',
            url  : '/salvar-acesso',
            contentType : 'application/json',
            dataType : 'JSON',
            data : data,

            beforeSend : function(){
                $("#btn-save-user").html("...");
            }, 

            success: ((e)=>{
                if(e.success == 1){
                    window.alert(e.msg);    
                } else if (e.success == 0){
                    window.alert(e.msg);
                }
            })

        }).done((e)=>{
          $("#btn-save-user").html("Cadastrar");

        }).fail((e)=>{
            window.alert('erro ajax');
        })
    })
})