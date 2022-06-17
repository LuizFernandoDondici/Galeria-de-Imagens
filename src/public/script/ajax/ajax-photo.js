
$('document').ready(function(){
    $("#btn-save-photo").click(function(e){
        e.preventDefault();

        var form = $('#form-photo')[0];
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
                $("#btn-save-photo").html("...");
            }, 

            success: ((e)=>{ 
                if(e.success == 1){
                    window.location.href = "/galeria";     
                } else if (e.success == 0){
                    window.alert(e.msg);
                }
            })

        }).done((e)=>{
            $("#btn-loginto").html("Salvar");

        }).fail((e)=>{
            window.alert('erro ajax');
        })
    })
})    