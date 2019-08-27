$(document).ready(function(){
    $('#Categ').change(function(d){
        d.preventDefault();
        var categoryId = $(this).val();
             Pace.restart(); 
             $.ajax({               
                url:'/categsSubcategs',
                type:'GET',
                data:{categoryId:categoryId},
                success:function(result)
                {
                    $('#Subcategory').html(result);
                },
                error:function(){
                    alert('okkkk');
                }   
                }); 
    });

    $('#assignRole').change(function(d){
        d.preventDefault();
        var role = $(this).val();
        switch (role) {
            case 'Member':
                $('#adminDetailForm').fadeOut('slow');
                break;            
                    
            default:
                $('#adminDetailForm').fadeIn('slow');
            break;
        }
             Pace.restart(); 
              
    });
// For deleting tags 
    $('.rmTagBtn').on('click',function(d){
        d.preventDefault();
    if(confirm('You want to delete?')){
        var tagId = $(this).data('id');
        var btn = this;
            Pace.restart(); 
        $.ajax({               
            url:'/removeTag',
            type:'GET',
            data:{tagId:tagId},
            success:function(result)
            {
                $(btn).closest('tr').fadeOut("slow");
            },
            error:function(){
                alert('Error:process could not be completed');
            }   
        }); 
    }
    });
// For deleting services 
$('.rmServiceBtn').on('click',function(c){
    c.preventDefault();
if(confirm('You want to delete service?')){
    var serviceId = $(this).data('id');
    var btn = this;
        Pace.restart(); 
    $.ajax({               
        url:'/removeService',
        type:'GET',
        data:{serviceId:serviceId},
        success:function(result)
        {
            $(btn).closest('tr').fadeOut("slow");
        },
        error:function(){
            alert('Error:process could not be completed');
        }   
    }); 
}
});

// For deleting roles 
$('.rmRoleBtn').on('click',function(c){
    c.preventDefault();
if(confirm('You want to delete role?')){
    var roleId = $(this).data('id');
    var btn = this;
        Pace.restart(); 
    $.ajax({               
        url:'/removeRole',
        type:'GET',
        data:{roleId:roleId},
        success:function(result)
        {
            $(btn).closest('tr').fadeOut("slow");
        },
        error:function(){
            alert('Error:process could not be completed');
        }   
    }); 
}
});

// For deleting utility
$('.rmUtilityBtn').on('click',function(c){
    c.preventDefault();
if(confirm('You want to delete utility?')){
    var utilityId = $(this).data('id');
    var btn = this;
        Pace.restart(); 
    $.ajax({               
        url:'/removeUtility',
        type:'GET',
        data:{utilityId:utilityId},
        success:function(result)
        {
            alert(result);
            $(btn).closest('tr').fadeOut("slow");
        },
        error:function(){
            alert('Error:process could not be completed');
        }   
    }); 
}
});

});