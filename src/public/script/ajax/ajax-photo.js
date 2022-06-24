
// Ajax para salvar imagem.
$('document').ready(function(){
    $("#btn-save-img").click(function(e){
        e.preventDefault();

        var form = $('#form-img')[0];
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            url: "/salvar-foto",
            enctype: 'multipart/form-data',
            dataType : 'JSON',
            data: data,
            processData: false,
            contentType: false,
            cache: false,

            beforeSend : function(){
                $("#btn-save-img").html("Carregando...");
            }, 

            success: ((e)=>{ 
                if(e.success == 1){
                    window.location.href = "/galeria";     
                } else if (e.success == 0){
                    $("#alert-img").css('display', 'block').fadeOut(5000);
                    $("#alert-img").addClass('alert alert-danger');
                    $("#alert-img span").html(e.msg);
                }
            })

        }).done((e)=>{
            $("#btn-save-img").html("Salvar Arquivo");

        }).fail((e)=>{
            window.location.href = "/erro";
        })
    })
})    

