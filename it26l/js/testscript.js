$(document).ready(function(){

    // if ($('.cart-interface').length)
    //     alert("cart interface exist");
    // else alert('cart interface does not exist');

    $(document).on("mousedown touchstart", ".quantity-adjust span.material-symbols-outlined", function(){

        var quantity = parseInt($(this).parent().find(".counter").text(), 10);
        
        if($(this).html() == "add")
            quantity++;
        else if (quantity > 1)
            quantity--;

        $(this).parent().find(".counter").text(quantity);
        
    });

    $(document).on('click', '.acntBtn', function(){
        
        // $('#acntPopup').toggle();
        // if ($('#acntPopup').css('display') == 'none')
        //     $('#acntPopup').css('display','flex');
            
        // else
        //     $('#acntPopup').css('display','none');
    });

    $(document).mouseup(function(e) 
    {
        var container = $(".acntBtn");

        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            $('#acntPopup').hide();
        }else
        $('#acntPopup').toggle();
    });

    $(document).on('click','.selection-item button', function(){
        
        alert("NOTE: create cart to add");
    });

    $('.categ-items h4.categ-btn').click(function(){

        $(".categ-items h4.active").removeClass("active");
        $(this).addClass('active');
        
        $.ajax({
            type: 'POST',
            url: 'php_functions/itemSelection.php',
            data:{
                item:$(this).data("item")
            },
            success:function(data){
                
                $(".categ-selection").empty()
                $(".categ-selection").append(data);
            },
            error: function(data){
                console.log("error");
            } 
        });
    });
});