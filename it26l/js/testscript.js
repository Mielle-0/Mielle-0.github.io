$(document).ready(function(){

    $(document).on("mousedown touchstart", ".quantity-adjust span.material-symbols-outlined", function(){

        var quantity = parseInt($(this).parent().find(".counter").text(), 10);
        
        if($(this).html() == "add")
            quantity++;
        else if (quantity > 1)
            quantity--;

        $(this).parent().find(".counter").text(quantity);
        
    });

    $(document).mouseup(function(e) 
    {
        var container = $("#acntPopup");

        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container.hide();
        }
    });

    $(document).on('click', '.acntBtn', function(){

        if ($('#acntPopup').css('display') == 'none')
            $('#acntPopup').css('display','flex');
        else
            $('#acntPopup').css('display','none');
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