
				   <ul class="nav nav-pills navbar-right">
          
 
                                                      <li><a href="index.php">Home</a></li>
                                                    <li><a href="all_foods.php"class="btn">All_Foods</a></li>
                                                        <li><a href="add_food.php"class="btn">Add_Food</a></li>
                                                        <li><a href="Add_Chefs.php"class="btn">Add_Chefs</a></li>
                                                        <li><a href="Add_DeliveryTeam.php"class="btn">Add_DeliveryTeam</a></li>
                                                        
                                                        <li><a href="ViewOrders.php"class="btn">ViewOrders</a></li>
                                                       <?php
$items=0;
if(isset($_SESSION['items'])){
$items=$_SESSION['items'];}


?>


<li><a href="cart.php">SelectedFoods <sup style="color:red;font-weight:bold;text-decoration: underline;font-size:1.5em !important"><?php echo $items ?></sup></a></li>

                                                        <li><a href="Logout.php"class="btn">Logout</a></li>
          </ul>
 <form method="get" action="Search.php"> <input class='form-control' width="50%" size="100"type="search" name="search" placeholder=" Enter FoodName to search "  > </form>
        </div>

