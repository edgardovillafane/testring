$( document ).ready(function() {

//assign the change event to metal select    
    $("#selMetal").change(function(){
        $("#nMetal").html("Metal: "+($("#selMetal").val()))

        //verifing if size is selected to show or not the price
        if($("#selSize").val()!=0){
            //show the price
            showPrice()
        }
    })
//assign the change event to Size select
    $("#selSize").change(function(){
        $("#nSize").html("Size: "+($("#selSize").val()))

        //verifing if metal is selected
        if($("#selMetal").val()!=0){
            //show the price
            showPrice()
        }
    })
});

function showPrice(){


        // Fire off the request to php/calculate.php
        $.ajax({
            url: "php/calculate.php",
            type: "post",
            data:{ 
                'metal': $("#selMetal").val(), 
                'size': $("#selSize").val() 
            },
            success: function (response) {
                var ring = JSON.parse(response)
                //Show the price in page
                $("#nPrice").html("&pound;" + ring.price)
            }
        });

   

}