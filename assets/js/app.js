$(document).ready(function() {

});

function error(text){
    $("#validation-error" ).append( '<div class="alert alert-danger alert-dismissible" id="error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '+text+'</div>' );
    $("#validation-error").fadeTo(3000, 500).slideUp(500, function(){
     document.getElementById("validation-error").innerHTML = '';
    });
}

function success(text){
    $("#validation-success" ).append( '<div class="alert alert-success alert-dismissible" id="success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> '+text+'</div>' );
    $("#validation-success").fadeTo(10000, 500).slideUp(500, function(){
     document.getElementById("validation-success").innerHTML = '';
    });
}

function error2(text){
    $("#validation-error2" ).append( '<div class="alert alert-danger alert-dismissible" id="error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '+text+'</div>' );
    $("#validation-error2").fadeTo(3000, 500).slideUp(500, function(){
     document.getElementById("validation-error2").innerHTML = '';
    });
}

function success2(text){
    $("#validation-success2" ).append( '<div class="alert alert-success alert-dismissible" id="success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> '+text+'</div>' );
    $("#validation-success2").fadeTo(10000, 500).slideUp(500, function(){
     document.getElementById("validation-success2").innerHTML = '';
    });
}
