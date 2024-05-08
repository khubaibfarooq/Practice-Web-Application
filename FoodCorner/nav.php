

                     <ul class="nav nav-pills navbar-right">
                         <li > <form method="get" action="Search.php"> <input class='form-control' width="100" size="100"type="search" name="search" value="Search food" class="btn" > </form></li >
                       <?php
                                                
                                                     if(@$_SESSION['type']=='user'){
                                                             echo" <li><a href='#' class='btn'>{$_SESSION['username']}</a></li>";
                                                     }else{ echo" <li><a href='login.php' class='btn'>Login</a></li>"
                                                                  . " <li><a href='register.php' class='btn'>Register</a></li>";}
                                                              ?> 
                         <br>
                                                      <li><a href="index.php" >Home</a></li>
                                                  
                                                    <?php
                                                   
                                                     if(@$_SESSION['type']=='user'){
                                                             echo" <li><a href='UserOrders.php' class='btn'>Orders</a></li>"
                                                                  . " <li><a href='Logout.php' class='btn'>Logout</a></li>";
                                                     }
                                                              ?> 
                                                    <?php
$items=0;
if(isset($_SESSION['items'])){
$items=$_SESSION['items'];}


?>


<li><a href="cart.php">SelectedFoods <sup style="color:red;font-weight:bold;text-decoration: underline;font-size:1.5em !important"><?php echo $items ?></sup></a></li>

          
                           
                            </ul>
        </div>
