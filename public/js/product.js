 


    function up(max) {
        document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
        var price = parseFloat(document.getElementById("pamount").value);
        
        if (document.getElementById("myNumber").value >= parseInt(max)) {
            document.getElementById("myNumber").value = max;
            var count=parseInt(max);
            price = price * count;
           
             
            $('div#TPrice').html("Total Amount :"+price);
            document.getElementById("totalAmount").value =price;
        }else{
            var count=parseInt(document.getElementById("myNumber").value);
            price = price * count;
             
            $('div#TPrice').html("Total Amount :"+price);
            document.getElementById("totalAmount").value =price;
            
        }
    }
    function down(min) {
        var price = parseFloat(document.getElementById("pamount").value);

        document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
        if (document.getElementById("myNumber").value <= parseInt(min)) {
            min=parseInt(min);
            document.getElementById("myNumber").value = min;
            price = price * min;
            $('div#TPrice').html("Total Amount :"+price);
            document.getElementById("totalAmount").value =price;
        }else{
            var count=parseInt(document.getElementById("myNumber").value);
            price = price * count;
            $('div#TPrice').html("Total Amount :"+price);
            document.getElementById("totalAmount").value =price;
        }
    }