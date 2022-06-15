
$('document').ready(function(){
    $("#btn-save-photo").click(function(e){
        e.preventDefault();
        var data = $("#form-photo").serialize();
        
        $.ajax({
            type : 'POST',
            url  : '/salvar-foto',
            dataType : 'JSON',
            data : data,
            beforeSend : function(){
                $("#btn-save-photo").html("...");
            }, 
            success: ((e)=>{
                if(e.success == 1){
                    window.location.href = "/galeria";     
                } else {
                    window.alert('erro');
                }
            })
        }).done((e)=>{
            $("#btn-save-photo").html("Salvar");
        }).fail((e)=>{
            window.alert('fail');
        })
    })
})