$(document).ready(function(){

$("#signup_validate").parsley();

    $("#signup_validate").on('submit',function(event){
           event.preventDefault();
        //    $("#submitBtn").attr('disabled','disabled');
        //    $("#submitBtn").val('submitting...');

           if($("#signup_validate").parsley().isValid()){
// alert($(this).serialize());
              $.ajax({
                  url: "signUP" ,
                  method:"POST",
                  data:$(this).serialize(),
                  beforeSend:function(){
                      
                        $("#submitBtn").attr('disabled','disabled');
                        $("#submitBtn").text('Submitting...');
                  },
                  success:function(data){
                    
                    if(data=='success'){
                        toastr.success("You have successfully signed up.");
                    }
                    $("#signup_validate")[0].reset();
                    $("#signup_validate").parsley().reset();
                    $("#submitBtn").attr('disabled',false);
                    $("#submitBtn").text('Submit');
                  }

              });
           }

    });
});