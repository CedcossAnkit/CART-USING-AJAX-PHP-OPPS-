$(document).ready(function () {
    console.log("working..");

    $("#products").on('click', '.add-to-cart', function (e) {
        e.preventDefault();
        console.log("Add to cart clicked");
        var a = $(this).val();
        console.log(a);

        $.ajax({
            method: "post",
            url: "classes/cart.php",
            data: {
                id: a,
                action: "addtocart"
            },

            success: function (response) {

                console.log(response);
                displayCart(response);
            }
        });
    });

    // $('.manual').on('click','' function () {
        
    // });
    // $('.manual').click(function (e) { 
    //     e.preventDefault();
    //     var txt=$('.num').val();
    //     console.log(txt);
    // });

    $('#tb').on('click','.manual', function (e) {
        e.preventDefault();
        var btval=$(this).val();
        // var btval=$('num'+'.manual).val();
        var newID='ss'+btval;
        // console.log(newID);
        var txt=$('.'+newID).val();
        // console.log(txt);


        $.ajax({
            method: "post",
            url: "classes/cart.php",
            data: {
                action:'updateQuantity',
                txt:txt,
                id:btval
            },
            success: function (response) {
                console.log("helooooooo");
                displayCart(response);
            }
        });
    });


    $('#tb').on('click','.del', function (e) {
        e.preventDefault();
        var id=$(this).val();
        console.log(id);

        $.ajax({
            method: "post",
            url: "classes/cart.php",
            data: {
                action:"delete",
                id:id
            },
            success: function (response) {
                console.log("helooooooo");
                
                displayCart(response);
            }
        });
        
    });

    $('#clrcrt').click(function (e) { 
        e.preventDefault();
        $.ajax({
            method: "post",
            url: "classes/cart.php",
            data: {
                action:"clrcrt"
            },
            success: function (response) {
                displayCart(response);

            }
        });
    });
});

function displayCart(dt) {
    var data = $.parseJSON(dt);
    console.log(data)
    var htm = "";

    for (var i = 0; i < data.length; i++) {
        htm += "<tr>\
                    \<td>"+ data[i].id + "</td>\
                    \<td>"+ data[i].name + "</td>\
                    \<td><img src='images/"+ data[i].image + "'</td>\
                    \<td>"+ data[i].price + "</td>\
                    \<td>"+ data[i].quantity + "\
                     \<input type='text' class='ss"+data[i].id+"'><button class='manual' value='"+data[i].id+"'>add</button>\
                    </td>\
                    \<td>\
                    <button class='del' value='"+data[i].id+"'>Remove</button></td>\
                    \
                    </tr>";
    }
    $("#tbdy").html(htm);

}