<?php
include('functions.php');
$page_title = " Starbucks";
include('header.php');


require('mysqli_connect.php'); //Connect to the db
$query= "SELECT teaID,teaName, servingSize,sizeName,teaPrice FROM chaiteas WHERE sizeName ='Grande'"; //Create a SELECT query to get info out of the db
$run = mysqli_query($dbc,$query);//Run the query and store the results in a variable

$count = mysqli_num_rows($run);//Count the number of rows returned by the query

echo" 
<nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light'>
      <a href='#'><img class='teaicon' id='icon' src='starbucks.png'/></a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo02' aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
        <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
          <li class='nav-item active navspace'>
            <a class='nav-link' href='#'><div class='navtab menu'>MENU</div><span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item active navspace'>
            <a class='nav-link' href='#'><div class='navtab reward'>REWARDS</div></a>
          </li>
          <li class='nav-item active navspace'>
            <a class='nav-link' href='#'><div class='navtab'>GIFT CARDS</div></a>
          </li>
        </ul>
        <div class='form-inline my-2 my-lg-0'>
          <a class='navspace signintext'>Find a store</a>
          <button class=' signinbutton my-2 my-sm-0 navspace' href='#'><div class='signintext'>Sign in<div></button>
          <button class=' joininbutton my-2 my-sm-0 navspace' href='#'><div class='joinintext'>Join now<div></button>
        </divs>
      </div>
    </nav>
    <div class='contentcontrol'></div>
    <div class='secondrow'>
      <a href='#' class='selected'>All products</a>
      <a href='#'>Featured</a>
      <a href='#'>Previous Orders</a>
      <a href='#'>Favorite Products</a>
    </div>

    <div class='menubody'> <!--menu body-->
    <div class='leftside'>
      <table>
        <tr valign='top'>
          <th rowspan='2' class='lefttab'>
        <h6>Drinks</h6>
        <a href='#'><p>Hot Coffees</p></a>
        <a href='#'><p>Hot Teas</p></a>
        <a href='#'><p>Hot Drinks</p></a>
        <a href='#'><p>Fappuccino®<br/>Blended Beverages</p></a>
        <a href='#'><p>Cold Coffees</p></a>
        <a href='#'><p>Iced Teas</p></a>
        <a href='#'><p>Cold Drinks</p></a>

        <h6>Food</h6>
        <a href='#'><p>Hot Breakfast</p></a>
        <a href='#'><p>Bakery</p></a>
        <a href='#'><p>Lunch</p></a>
        <a href='#'><p>Snacks & Sweets</p></a>
        <a href='#'><p>Yogurt & Custard</p></a>

        <h6>At Home Coffee</h6>
        <a href='#'><p>Whole Bean</p></a>
        <a href='#'><p>Verismo® Pods</p></a>
        <a href='#'><p>VIA® Instant</p></a>
        <a href='#'><p>Cold Brew</p></a>

        <h6>Shopping Bags</h6>
        <a href='#'><p>Shopping Bags</p></a>
      </th>

      <th rowspan='2' style='width: 100%'>
        <h6>Menu / Hot Teas</h6>
        <br/><h4>Hot Teas</h4><br/>
        <h4>Chai Teas</h4>
        <hr/>
        <table style='width: 100%'>
        <tr >";
        while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
          echo "<td><a href='order.php?id=".$row['teaID']."'><img class='teaicon' src='images/{$row['teaName']}.jpg'/><br/><span class='tealabel'>Chai Latte</span></a></td>";
        }
        echo"
        <td></td>
        <td></td>
        </tr>
        </table>
        <br/>
        <h4>Black Teas</h4>
        <hr/>
        <table style='width: 100%'>
          <tr >
            <td ><a href='#'><img class='teaicon' src='images/earlgreytea.jpg'/><br/><span class='tealabel'>Earl Grey Tea</span></a></td>
            <td><a href='#'><img class='teaicon' src='images/londonfogtealatte.jpg'/><br/><span class='tealabel'>London Fog Tea Latte</span></a></td>
            <td><a href='#'><img class='teaicon' src='images/royalenglishbreakfasttea.jpg'/><br/><span class='tealabel'>Royal English Breakfast Tea</span></a></td>
            <td><a href='#'><img class='teaicon' src='images/royalenglishbreakfasttealatte.jpg'/><br/><span class='tealabel'>Royal English Breakfast Tea Latte</span></a></td>
          </tr>
          <tr>
            <td><a href='#'><img class='teaicon' src='images/revupbrewedwellnesstea.jpg'/><br/><span class='tealabel'>Rev Up Brewed Wellness Tea</span></a></td>
          </tr>
        </table>
        <br/>
        <h4>Green Teas</h4>
        <hr/>

        <table style='width:100%'>
          <tr >
            <td ><a href='#'><img class='teaicon' src='images/emperor'scloud&mist.jpg'/><br/><span class='tealabel'>Emperor's Could & Mist</span></a></td>
            <td><a href='#'><img class='teaicon' src='images/matchagreentealatte.jpg'/><br/><span class='tealabel'>Matcha Green Tea Latte</span></a></td>
            <td><a href='#'><img class='teaicon' src='images/honeycitrusminttea.jpg'/><br/><span class='tealabel'>Honey Citrus Mint Tea</span></a></td>
            <td><a href='#'><img class='teaicon' src='images/jadecitrusmintbrewedtea.jpg'/><br/><span class='tealabel'>Jade Citrus Mint Brewed Tea</span></a></td>
          </tr>
        </table>
        <br/>
        <h4>Herbal Teas</h4>
        <hr/>
        <table style='width:100%'>
          <tr >
            <td ><a href='#'><img class='teaicon' src='images/mintmajesty.jpg'/><br/><span class='tealabel'>Mint Majesty</span></a></td>
            <td ><a href='#'><img class='teaicon' src='images/peachtranquility.jpg'/><br/><span class='tealabel'>Peach Tranquility</span></a></td>
            <td ><a href='#'><img class='teaicon' src='images/comfortbrewedwellnesstea.jpg'/><br/><span class='tealabel'>Comfort Brewed Wellness Tea</span></a></td>
            <td></td>
          </tr>
        </table>
        <br/>
        <h4>White Teas</h4>
        <hr/>
        <table style='width:100%'>
          <tr >
            <td ><a href='#'><img class='teaicon' src='images/denfensebrewedwellnesstea.jpg'/><br/><span class='tealabel'>Defense Brewed Wellness Tea</span></a></td>
          </tr>
        </table>
        <br/>
        <br/>
        <br/>
      </th>
      </tr>
    </div>
    <div>
    </div>
  </div>

  <table style='width:70%'>
    <tr>
      <th>About Us</th>
      <th>Career</th>
      <th>Social Impact</th>
      <th>For Business<br/>Partners</th>
      <th>Ways To Order</th>
    </tr>
    </table>

";
mysqli_close($dbc);

include('footer.php');
?>





