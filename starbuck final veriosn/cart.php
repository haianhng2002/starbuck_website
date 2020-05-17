<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="cart.css" rel="stylesheet" type = "text/css"/>
        <title>Starbucks Coffee Company</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <?php
            require('mysqli_connect.php'); //Connect to the db
            $query= "SELECT teaPrice FROM chaiteas"; 
            $run = mysqli_query($dbc,$query);//Run the query 
            
            $row = mysqli_fetch_array($run, MYSQLI_ASSOC);

            /*
            $count = mysqli_num_rows($run);
            if($count > 0){	
                echo "<table>";
                while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){ 
                    echo "<ul>";
                    echo "<li><span>Subtotal $</span>";
                    echo "<span>{$row['teaPrice']}</span>";
                    echo "<li><span>Tax 8.875% $</span>";
                    echo "<span>{$row['tax']}</span>";
                    echo "<li><span>Total $</span>";
                    echo "<span>{$row['total']}</span>";
                    echo "</ul>";
                }
                echo "</table>";
            }else{
                echo "<p>There are no available price!</p>";
            }
            */
        ?>
        
        <script>
            $(document).ready(function(){  
                var item_price = <?php echo "{$row['teaPrice']}" ?>; //teaPrice from PHP
                var item_amount = 1;
                calculate();
                $(".delete_button").click(function(){
                    $(this).closest('.item').remove();
                    item_amount --;   
                    calculate();
                });
                $(".add_button").click(function(){
                    $("div.balance").before($("div.item:first").clone(true));
                    item_amount ++;   
                    calculate();
                });

                function calculate() {
                    var item_subtotal = item_price * item_amount;
                    var tax_amount = item_subtotal * 0.08875;
                    var item_total = item_subtotal + tax_amount;
                    $("#amount").text(item_amount);
                    $("#price").text('$' + item_price);
                    $("#subtotal").text('$' + item_subtotal);
                    $("#tax").text('$' + Math.round(tax_amount * 100) / 100);
                    $(".total").text('$' + Math.round(item_total * 100) / 100);
                }
            });
            <?php
                mysqli_close($dbc); //close database
            ?>         
        </script>
 
    </head>

    <body>


        <div class="row">
            <div class="col-md-4 fixed-top">
                <img id="logo" src="starbucks.png">
                <a href="index.html">
                    <p class="back-to-menu">
                        &lt;    Back to menu
                    </p>
                </a>
                <div class="review">
                    <p><strong>Review Order (<span id="amount">1</span>)</strong></p>
                    <p class="pickup">
                        <span>Pickup at:</span><br>
                        <span id="bold">254-21 Horace Harding Expressway</span><br>
                        <span>Prep time 3 to 6 minutes</span>
                    </p>
                </div>
            </div>

            <div class="col-md-8 offset-md-4">
                <div id='content'>
                    <div class="item">
                        <img class="orderimage" src="images/chailatte.jpg">
                        <div class="description">
                            <p class="itemname">Chai Latte</p>
                            <p>
                                Grande<br>
                                150&#9734 item
                            </p>
                            <button type="button" class="button"><img class="icons" src="icons/heart.jpg"></button>
                            <button type="button" class="delete_button"><img class="icons" src="icons/minus.jpg"></button>
                            <button type="button" class="add_button"><img class="icons" src="icons/plus.jpg"></button>
                        </div>
                        <div id="price"></div>
                    </div>

                    <div class="balance">
                        <ul>
                            <li>Subtotal.......................................................................<strong  id="subtotal"></strong></li>
                            <li>Tax 8.875%..................................................................<strong id="tax"></strong></li>
                            <li><strong>Total</strong>............................................................................<strong class="total"></strong></li>
                        </ul>  
                    </div>
                </div>
                <div class="buttonplacement">
                    <button type="submit" class="roundedbutton btn btn-success">Checkout: <span class="total"></span></button>
                </div>
            </div>
        </div>
    </body>
</html>
