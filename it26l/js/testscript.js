$(document).ready(function(){

    // $(document).on('click', '.quantity-adjust .material-symbols-outlined', )

    $(".quantity-adjust .material-symbols-outlined").click(function(){

        var order = $(this).parent().parent().data("order");

        var quantity = parseInt($(this).parent().find(".counter").text(), 10);
        
        if($(this).html() == "add")
            quantity++;
        else if (quantity > 1)
            quantity--;

        // console.log($(this).html() == "add");

        // if (quantity < 1)
        $(this).parent().find(".counter").text(quantity);
        // console.log();
        // console.log($(".selector-item[data-order="+order+"] .quantity-adjust").find(".counter").html());
        // console.log($(".selector-item[data-order="+order+"]").html());
        // var count = $(".selector-item[data-order="+order+"] .quantity-adjust .counter").val();
        // var count = $(".quantity-adjust .counter").text();
        // count++;
        // $(".quantity-adjust .counter").text(count);
    });

});