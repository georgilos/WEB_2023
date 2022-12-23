<!-- Ουσιαστικά το index.php αναφέρεται στην αρχική σελίδα του user ,αφού έχει κάνει το sign up  ή το login  -->

<?php 
// Με αυτήν την εντολή ουσιαστικά δίνουμε την δυνατότητα να καλούνται και τα υπόλοιπα αρχεία php
session_start();

// Κλήση του αρχείου connection.php & functions.php
include("connection.php");
include("functions.php");

 $user_data = check_login($con);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>E-KATANALOTIS</title>
</head>


<body>

<!-- Mesa sta tags style einai css opou montelopoioume tin arxiki selida -->
	<style type = "text/css">
		*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Kumbh Sans', sans-serif;

}

.navbar{
    background:rosybrown;
    height: 120px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
    position: sticky;
    top: 0;
    z-index: 999;
}

.navbar__container{
    display: flex;
    justify-content: space-between;
    height: 120px;
    width: 100%;
    z-index: 1;
    margin: 0 auto;
    padding: 0 50px;

}

.navbar__menu{
    display: flex;
    align-items: center;
    list-style: none;
    text-align: center;
}

.navbar__item{
    height: 80px;

}

.navbar__links{
    color: black;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    padding: 0 1rem;
    height: 100%;
    
}





/* Το media only screen το χρησιμοποιούμε ώστε να δώσουμε και την παράμετρο κινητού τηλεφώνου
Οτιδήποτε είναι μέσα σε αυτό όταν κάνουμε minimize την οθόνη μας παίρνει την μορφή σαν να το βλέπουμε μέσα από κινητό τηλέφωνο */


@media only screen and (max-width: 960px) {
    
    .navbar__container{
        display: flex;
        justify-content: space-between;
        height: 80px;
        z-index: 1;
        width: 100%;
        max-width: 500px;
        padding: 0;
 
    }

    .navbar__menu{
        display: grid;
        grid-template-columns: auto;
        margin: 0;
        width: 100%;
        position: absolute;
        /*top: -1000px;
        opacity: 0;
        */
        transition: all 0.5s ease;
        height: 80vh;
        z-index: -1;
        background: rosybrown;

    }

    .navbar__menu.active{

     background: black;
     top: 100%;
     opacity: 1;
     transition: all 0.5s ease;
     z-index: 99;
     height: 50vh;
     font-size: 1.6rem;

}

  

  
  .navbar__item{
    width: 100%;
  }

  .navbar__links{
    text-align: center;
    padding: 2rem;
    width: 100%;
    display: table;
  }

  #mobile-menu{
    position: absolute;
    top:20%;
    right: 5%;
    transform: translate(25%,80%);
    

  }

  
  .navbar__toggle .bar{
    display: block;
    cursor: pointer;
   
  }

  

}
    
</style>
  <body>
  <a href="logout.php">Log Out</a>
     <nav class="navbar"> 
      <div clas="navbar__container">
       
        <div class="navbar__toggle" id ="mobile-menu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
 
         </div>
		    
         <ul class="navbar__menu">
           
            <li class="navbar__item"><a href="home.php" class="navbar__links">Home</a></li>
             <li  class="navbar__item"><a href="map.php" class="navbar__links">Map</a></li>
             <li class="navbar__item"><a href="products.php" class="navbar__links">Products</a></li>
             <li class="navbar__item"><a href="profile_customize.php" class="navbar__links">Profile Customization</a></li>

			 

			 
			
            
            </ul>


      </div>




     </nav>

	 <p style = "font-size:30px" style = "color:black">
	Welcome to our page, <?php echo $user_data['username']; ?>

  <img src="ekatanalotis.png"  width="700" height="300" >

</body>
