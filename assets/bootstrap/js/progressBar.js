$(function(){
    var inputFile = $('input[name=user_file]');
    var uploadFile = $('#form-data').attr('action');
    var progressBar = $('#progressBar');

    $('#add').on('click', function(event){
        var fileToUpload = inputFile[0].files[0];
        if (fileToUpload !== 'undefined'){
            var formData = new FormData();
            formData.append("user_file", fileToUpload);

            $.ajax({
                url: uploadFile,
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(){
                },
                xhr: function(){
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(event){
                        if(event.lengthComputable){
                            var porcen = Math.round((event.loaded / event.total) * 100);
                            $('.progress').show();
                            progressBar.css({width: porcen + "%"});
                            progressBar.text(porcen + "%");
                        }
                    }, false);

                    return xhr;
                }
            });
        }        
    });
    //color para el form modal
    $(".modal-header").css("background-color", "#17a2b8"); 
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Registro");
    
    //codigo para que se quite la notificacion de registrado sola
    setTimeout(function() {
    $('#alert').hide('fade');
    },2000);
});
