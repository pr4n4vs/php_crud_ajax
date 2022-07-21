$(document).ready(function () {

    //Insert
    $('#btn-submit').on('click',function () { 
        // $('#btn-submit').attr("disabled","disabled");
        var name=$('#name').val();
        var age=$('#age').val();
        if(name!='' && age!=''){
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    type:1,
                    name:name,
                    age:age
                },
                caches:false,
                success: function (response) {
                    var result=JSON.parse(response);
                    if(result.status==200){
                        $('#form')[0].reset();//form reset 
                        //$('#btn-submit').removeAttr("disabled");
                        alertify.success("Data Inserted");
                        view();
                    }
                    else{
                        alertify.error('not inserted');
                    }
                }
            });
        }
        else{
            alertify.error('All fileds are required.....!!');
            
        }
       // $('#btn-submit').removeAttr("disabled");
    });



    //view
    function view() {
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                type:2
            },
            
            success: function (response) {
               $('#data').html(response);
            }
        });
      }


      //fetch model
      $('#edit_model').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); /*Button that triggered the modal*/
        var id = button.data('id');
        var name = button.data('name');
        var age = button.data('age');
        var modal = $(this);
        modal.find('#name_modal').val(name);
        modal.find('#age_modal').val(age);
        modal.find('#id_modal').val(id);
    });

      //edit
      $(document).on('click','#edit_submit',function () { 
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                type:3,
                id: $('#id_modal').val(),
				name: $('#name_modal').val(),
				age: $('#age_modal').val(),
            },
            
            success: function (response) {
                var result=JSON.parse(response);
                if(result.status==200){
                    alertify.success("Data Updated Successfully");
                    view();
                    $('#edit_model').modal('hide')
                }
                else{
                    alertify.error("Not Updated !!");
                       
                }
            }
        });
        
        
      });

      //delete
      $(document).on('click','#delete',function () { 
       var id=$(this).data('id');
       
       $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
            type:4,
            id:id
        },
        
        success: function (response) {
            var result=JSON.parse(response);
            if(result.status==200){
                alertify.success("Data Deleted Successfully");
                view();
                
            }
            else{
                alertify.error("Not Deleted !!");
            }
        }
       });
      });
      
});


//update


//jquery doc.ready function => jqdoc -> auto call function like constructor
// we have alery an form then we defined id for alll the elements in the form including submit and form tag
// disable the sbmit button on click 
//ajax ->jqajax 
//

// $.ajax({
//     type: "method",
//     url: "url",
//     data: "data",
    
//     success: function (response) {
        
//     }
// });

//variable store response->if loop to check status 200 -> form reset -> msg

//in framework terminilogy logic named as models
//ajax.php named as controller 
//mvc --> M->model, V->view, c->controller

//jqdoc, var temp->jqvalget, jqajax{ success -> $('atr')[0].reset(), msg (alerity.success())}

