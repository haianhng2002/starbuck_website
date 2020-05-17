<?php
include('functions.php');
$page_title = "Order";
include('header.php');

if((isset($_GET['id']))&&(is_numeric($_GET['id']))){//Can come from the page that displays all users
	$id= $_GET['id'];
}elseif((isset($_POST['id']))&&(is_numeric($_POST['id']))){//Or from a form submission
	$id= $_POST['id'];
}else{//If there is no valid user_id, display a message and kill the script
	echo "<p>This page has been accessed in error.</p>";
	include('footer.php');
	exit();
}
require('mysqli_connect.php'); //Connect to the db
$query= "SELECT teaID,teaName,servingSize,sizeName,calories,caloriesFromFat, totalFat, saturatedFat, transFat, cholesterol, sodium, 
totalCarbohydrates, dietaryFiber, sugars, protein, caffeine, dvtotalFat, dvsaturatedFat, dvcholesterol, dvsodium, 
dvtotalCarbohydrates, dvprotein,teaPrice  FROM chaiteas WHERE teaID=$id";
$run = mysqli_query($dbc,$query);


echo "
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
          <a class='navspace signintext'><img class='teaicon' src=''/>Find a store</a>
          <button class=' signinbutton my-2 my-sm-0 navspace' href='#'><div class='signintext'>Sign in<div></button>
          <button class=' joininbutton my-2 my-sm-0 navspace' href='#'><div class='joinintext'>Join now<div></button>
        </divs>
      </div>
    </nav>";
    if(mysqli_num_rows($run)>0){
      $row = mysqli_fetch_array($run, MYSQLI_NUM);
    echo"
    <div class='menubody'> <!--menu body--></div>

    <div>
      <div class='contentcontrol'>
     
        <div class='firstcol'><!--Firstcol-->
          <a class='navicolor orderdes' href='#'>Menu / </a>
          <a class='navicolor orderdes' href='#'> Hot Teas</a>
          <a class='navicolor orderdes' href='#'> / {$row[1]} </a>
          <br/>
          <br/>
          <h3><b>{$row[1]}</b></h3>
          <br/>
          <p class='orderdes'>
            Black tea infused with cinnamon, clove and other warming spices is combined with steamed milk and topped with foam for the perfect balance of sweet and spicy. An iconic chai cup.
          </p>
          <br/>
          <p class='orderdes'>50<span id='star'>☆</span> item</p>
        </div>

        <div class='secondcol'> <!--Secondcol-->
          <td><img class='orderimage' src='images/{$row[1]}.jpg'/></td>
          <br/>
          <br/>
          <h4>Customizations</h4>
          <br/>
          <form action='register.php' method='POST'>
          <input name='teaName' value={$row[1]} type='hidden'/>
          <input name='Price' value={$row[22]} type='hidden'/>
              <div class='selectbox'>
                <label class='formfont' for='sizeName'>Size</label><br/>
                <div class='edge'>
                <select name='sizeName'>
                  <option value=​'Grande'>​Grande (16 fl oz)​</option>​
                  <option value=​'Venti'>​Venti (20 fl oz)​</option>​
                </select>
                <svg class='bi bi-chevron-compact-down' width='1.5em' height='2em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M1.553 6.776a.5.5 0 01.67-.223L8 9.44l5.776-2.888a.5.5 0 11.448.894l-6 3a.5.5 0 01-.448 0l-6-3a.5.5 0 01-.223-.67z' clip-rule='evenodd'/></svg>
                </div>

              </div>

              <br/>

              <div class='selectbox'>
              <label for='addIn'><label>
                <div class='edge'>
                <select name='addIn'>
                  <option selected>​Add-ins</option>​
                  <option value=​'​Creamer'>​Creamer</option>​
                  <option value=​'Splash of 1% Milk'>​Splash of 1% Milk</option>​
                  <option value=​'Splash of 2% Milk'>​Splash of 2% Milk</option>​
                  <option value=​'Splash of Almondmilk'>​Splash of Almondmilk</option>​
                </select>
                <b>Edit</b>
                </div>
              </div>

              <br/>

              <div class='selectbox'>
              <label for='Toppings'><label>
                <div class='edge'>
                <select name='Toppings'>
                  <option selected>​Toppings</option>​
                  <option value=​'Cascara Topping'>​​Cascara Topping</option>​
                  <option value=​'Cinnamon DoIce Sprinkles'>​Cinnamon DoIce Sprinkles</option>​
                  <option value=​'Smokey Butter Scotch Sugar Topping'>​Smokey Butter Scotch Sugar Topping</option>​
                  <option value=​'Caramel Drizzle'>​Caramel Drizzle</option>​
                </select>
                <b>Edit</b>
                </div>
              </div>

              <br/>

              <div class='selectbox'>
              <label for='Flavors'><label>
                <div class='edge'>
                <select name='Flavors'>
                  <option selected>​Flavors</option>​
                  <option value=​'Caramel Syrup'>​Caramel Syrup</option>​
                  <option value=​'Cinamon DoIce Syrup<'>​Cinamon DoIce Syrup</option>​
                  <option value=​'Suger Free Cinamon DoIce Syrup'>​Suger Free Cinamon DoIce Syrup</option>​
                  <option value=​'Classic Syrup'>​Classic Syrup</option>​
                </select>
                <b>Edit</b>
                </div>
              </div>

              <br/>

              <div class='selectbox'>
              <label for='CupOptions'><label>
                <div class='edge'>
                <select name='CupOptions'>
                  <option selected>​Cup Options</option>​
                  <option value=​'Grande Cup'>Grande Cup</option>​
                  <option value=​'Tall Cup'>​Tall Cup</option>​
                  <option value=​'Venti Cup​'>​Venti Cup​</option>​
                </select>
                <b>Edit</b>
                </div>
              </div>

              <br/>
              <br/>
              <div class='selectbox'>
                <label class='formfont' for='Teas'>Tea</label><br/>
                <div class='edge'>
                <select name='Teas'>
                  <option selected>​2 Tea Bag(s)</option>​
                </select>
                <b>Edit</b>
                </div>
              </div>
              <div class='buttonplacement'>
              <button type='submit' class='roundedbutton btn btn-success'>Add to Order</button>
            </div>
          </form>
        </div>


        <div class='thirdcol'><!--Thirdcol-->
          <h4>Nutrition Information</h4>
          <br/>
          <p class='formfont'>Nutrition information is calculated based on our standard recipes. Only changing drink size will update this information. Other customizations will not.</p>
        <br/>
        <p class='servingsize'>Serving Size {$row[2]} fl oz</p>
        <span class='edge calories'>
        <p>Calories {$row[4]}</p><p>Calories from Fat {$row[5]}</p>
      </span>
      <br/>
      <div class='underlined'>
      <p class='dailyvalue'>% Daily Value *</p>
      <p><b>Total Fat</b> {$row[6]} g</p>
      <p class='textdent'>Saturated Fat {$row[7]} g</p>
      <p class='textdent'>Trans Fat {$row[8]} g</p>
      <p><b>Cholesterol {$row[9]} mg</p>
      <p><b>Sodium</b> {$row[10]} mg</p>
      <p><b>Total Carbohydrates </b>{$row[11]}</p>
      <p class='textdent'>Dietary Fiber {$row[12]} g</p>
      <p class='textdent'>Sugars {$row[13]} g</p>
      <p><b>Protein</b> {$row[14]} g</p>
      <p><b>Caffeine</b> {$row[15]} mg</p>
    </div>

    <p class='formfont'>* 2,000 calories a day is used for general nutrition advice, but calorie needs vary.</p>

    <h4>Ingredients</h4>
    <p class='infusion'><b>An Infusion Of</b> [Water, Black Tea, Ginger, Cinnamon, Black Pepper, Cardamom, Star Anise, Cloves, Cardamom Essence]</p>
    <br/>
    <h4>Allergens</h4>
    <p>Not available for this item</p>
    <p class='formfont'>We cannot guarantee that any unpackaged products served in our stores are allergen-free because we use shared equipment to store, prepare, and serve them. Customers with allergies can find ingredient information for products on the labels of our packaged products or online at Starbucks.com/menu.</p>
        </div>
      </div>
    </div>
";

}else{
	echo "<p>Error! There's something wrong.</p>";
}






mysqli_close($dbc);

include('footer.php');
?>





