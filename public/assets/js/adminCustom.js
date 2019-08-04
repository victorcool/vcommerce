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
});