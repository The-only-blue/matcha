<!doctype html>
<html lang="en">
  <head>
    <title>Profiles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!--- W3 CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    


    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php

        require_once 'core/init.php';
        if (Session::exists('home'))
        {
            echo '<p>' .Session::flash('home').'</p>';
        }
        $user_id = $_GET['user_id'];

        $user = new User();
        $userid = $user->data()->user_id;

        $db = DB::getInstance();
	      $db->get("users",array('user_id', '=', $user_id));
        $images = $db->first();
        //echo($images-first()->last_name);
        
        

        $name = $images->first_name;
        //echo ($name);
        $surname = $images->last_name;
        $username = $images->username;
        $user_id = $images->user_id;
        $profile_data = json_decode($images->profile);
        

        function age_cal($dob)
        {
            $dateOfBirth = $dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            return $diff->format('%y');
        }
        //$detail_array = $user->data()->profile;
        
        
        //$detail_string = json_decode($profile);
       

		//echo ($user->data()->user_id);
////////////////////////////////////////////////////////////
//          IF USER LOGGED IN!
////////////////////////////////////////////////////////////
        if ($user->isLoggedIn())
        {
    ?>  

    <header class="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 site-logo" data-aos="fade"><a href="index.html"><em>Cupid</em></a></div>
          <div class="col-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto text-center">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Update Profile</a></li>
                        <li><a href="#">Log Out</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <!-------------------------------------------------------------->
    <!------------------------- Banner Div ------------------------->
    <!-------------------------------------------------------------->

    <section class="site-hero overlay" style="background-image: url(img/test1.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h2 class="heading" style = "font-size:30px">Find Love With</h2><br><h1 class="heading" style = "font-size:190px"><i>Matcha</i></h1>
            <div align = "center">
            <form action = "logout.php">
              <button id = "logout_button" class = "w3-btn  w3-border w3-border-orange w3-round-large" style = "width:100%"> Log Out </button>
            </form>
            </div>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>


    <!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
 <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="matches.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="update_profile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="chat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button id = "Notifications_icon" class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green" id = "notes_count"></span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px" id = "Notifications_icon">
        <p id = "Notifications"></p>
        <p class="w3-bar-item w3-button" style = "color:black;" id = "NotificationsBtn"> Clear </p>
    </div>
  </div>
  
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <!-- image-->
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>
    <!-- END section -->

    <!-------------------------------------------------------------->
    <!------------------------- Banner Div ------------------------->
    <!-------------------------------------------------------------->
      <?php

      ?>
    <!-------------------------------------------------------------->
    <!------------------------- Login Div -------------------------->
    <!-------------------------------------------------------------->

    <section class="section bg-light"  id="next">
      <!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><span class="dot"
         <?php
            if ($images->status === "1")
            {
                echo ('style="background-color:green;"');
            }
            else
            {
                echo ('style="background-color:red;"');
            }
            //var_dump($liker->count());
         ?>
         ></span><?php echo $name." ".$surname ?></h4>
         <p class="w3-center"><img src=
         <?php 
            if (count($profile_data->display_picture) > 0)
            {
              echo('"'.$profile_data->display_picture.'"');
            }
            else
            {
              echo ("Avatar_male.png");
            }
          ?> class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
          <?php
            if ($images->status !== "1")
            {
              echo "<p align = 'center'>Last Seen: $images->status</p>";
            }
            echo "<p align = 'center'><i class='fa fa-star fa-fw w3-margin-right w3-text-theme'></i>Fame Rate: $profile_data->fame_rating Points</p>";
            $sql = "SELECT * FROM likes WHERE likee_id = $user_id AND liker_id = $userid OR likee_id = $userid AND liker_id = $user_id";
            // echo "my id = $user_id";
            // echo "her_id id = $userid";
            $db->query($sql);
            if($db->results()){
            $liker = $db->first();
            $likee_stat = $liker->likee_stat;
            $liker_stat = $liker->liker_stat;
            $likee_id = $liker->likee_id;
            $liker_id = $liker->liker_id;
            if (($likee_stat == 1 && $likee_id == $userid) || ($liker_stat == 1 && $liker_id == $userid))
            {
              echo '<button  id = "like" class="w3-btn w3-red like_btn" data-status = "like" data-likee = '.$user_id.' data-liker = '.$userid.'  style="text-shadow:1px 1px 0 #444" id="like"><b>unlike</b></button>';
            }
            else if (($liker_stat == 1 && $likee_stat == 0 && $likee_id) || ($liker_stat == 0 && $likee_stat == 1 && $liker_id))
            {
              echo '<button id = "like" class="w3-btn w3-red like_btn" data-status = "like" data-likee = '.$user_id.' data-liker = '.$userid.' style="text-shadow:1px 1px 0 #444" id="like"><b>Like back</b></button>';
            }
            else 
            {
              echo '<button id = "like" class="w3-btn w3-red like_btn" data-status = "like" data-likee = '.$user_id.' data-liker = '.$userid.' style="text-shadow:1px 1px 0 #444" id="like"><b>Like</b></button>';
            }

            }else{
              echo '<button id = "like" class="w3-btn w3-red like_btn" data-status = "like" data-likee = '.$user_id.' data-liker = '.$userid.' style="text-shadow:1px 1px 0 #444" id="like"><b>Like</b></button>';
            }
  
          ?>
          <?php
                $profile = json_decode($user->data()->profile);
                function buttons($data, $id)
                {
                  $x = Count($data);
                  $i = 0;
                  while ($x > $i)
                  {
                    if ($data[$i] == $id)
                    {
                      return(1);
                      exit();
                    }
                    $i++;
                  }
                  return(0);
                }

                if (buttons($profile->blocked, $user_id) === 1)
                {
                    echo '<button id = "block" class="w3-btn w3-black block_btn" data-status = "like" data-likee = '.$user_id.' data-liker = '.$userid.'  style="text-shadow:1px 1px 0 #444" ><b>Unblock</b></button>';
                }
                else
                {
                    echo '<button id = "block" class="w3-btn w3-black block_btn" data-status = "like" data-likee = '.$user_id.' data-liker = '.$userid.'  style="text-shadow:1px 1px 0 #444" ><b>Block</b></button>';
                }

                

          ?>
         <form action="photo_upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name= "fileToUpload" id="fileToUpload" class="w3-button w3-block w3-red w3-section" style = "display:none">
           <input type="submit" value="Upload Image" name="submit" class="w3-button w3-block w3-green w3-section" id = "upload_image" style = "display:none">
        </form>
         <hr>
         <p><i class="fa fa-at fa-fw w3-margin-right w3-text-theme"></i><?php echo($username) ?></p>
         <p><i class="fa fa-<?php echo(strtolower($profile_data->gender)) ?> fa-fw w3-margin-right w3-text-theme"></i><?php echo($profile_data->gender) ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo($profile_data->location)?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo($profile_data->DOB) ?></p>
         <p><i class="fa fa-hourglass fa-fw w3-margin-right w3-text-theme"></i><?php echo(age_cal($profile_data->DOB))?> Years old</p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">

          <!------------------------------------------------------------------------------------>
          <!---------------------------------- UPLOAD 5 PHOTOS --------------------------------->
          <!------------------------------------------------------------------------------------>

         <div class="w3-row-padding">
         <br>
         <?php
            
            $sql = "SELECT * FROM gallery WHERE user_id = $user_id";
            $db->query($sql);
            $result = $db->results();
            $num_res = $db->count();
            $i = 0;
            while ($i < $num_res)
            {
              echo '<div class="w3-half">';
                echo "<img src= ".$result[$i]->img_name. " style='width:100%' class='w3-margin-bottom'>";
              echo "</div>";
              $i++;

            }
           ?>
           <div class="w3-half">
             <!-- image-->
           </div>
           <div class="w3-half">
             <!-- image-->
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
          <?php
              
              
              //var_dump($intrests);
               if($db->results())
              {
                $intrests = $profile_data->intrests;
                $N = count($intrests);
                for($i=0; $i < $N; $i++)
                {
                  echo"<span class='w3-tag w3-small w3-theme-l2'>";
                  echo($intrests[$i] . " ");
                  echo"</span><br>";
                }
              }
              else
                echo "No Intrests";

          ?>
            <div id = "intrests" style = 'display:none'>
            <form action = "intrests.php" method = "post">
              <p>
                <input type="checkbox" name = "test[]" value = "Art"><label>Art</label>
                <input type="checkbox" name = "test[]" value = "News"><label>News</label>
              </p>
              <p>
                <input type="checkbox" name = "test[]" value = "Games"><label>Games</label>
                <input type="checkbox" name = "test[]" value = "Design"><label>Design</label>
              </p>
              <p>
                <input type="checkbox" name = "test[]" value = "Fashion"><label>Fashion</label>
                <input type="checkbox" name = "test[]" value = "Photography"><label>Photography</label>
              </p>
              <p>
                <input type="checkbox" name = "test[]" value = "Movies"><label>Movies</label>
                <input type="checkbox" name = "test[]" value = "Sports"><label>Sports</label>
              </p>
              <button type = "submit" class="w3-button w3-block w3-green w3-section">OK</button>
            </form>
            </div>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">My Status Message</h6>
              <p contenteditable="true" class="w3-border w3-padding"><?php echo ($profile_data->Bio) ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
        $db = DB::getInstance();
        $db->get("gallery",array('user_id', '=', $user_id));
        $images = $db->results();
        $num_images = $db->count();
        $i = 0;
        while ($i < $num_images)
        {
          echo '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>';
          //echo '<img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">';
          echo '<span class="w3-right w3-opacity">Picture</span>';
          //echo '<h4>Angie Jane</h4><br>';
          echo '<hr class="w3-clear">';
          //echo '<p>Have you seen this?</p>';
          echo '<img src="'.$images[$i]->img_name.'" style="width:100%" class="w3-margin-bottom">';
          echo '<p>.</p>';
          //echo '<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> ';
          //echo '<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> ';
          echo '</div>';
          $i++;
        }
      ?> 
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
</section>
    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
    <script src="js/test.js"></script>
    <script src="js/notification.js"></script>

    <!--- W3 CSS SCRIPT -->
    <script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<!-------------------------------- Hidden intrests div ------------------------------------>
<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<script>
  function hidden_div() {
            var x = document.getElementById("intrests");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

</script>

<?php
  }
  else
  {
    Redirect::to("index.php");
  }
?>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Select Reason For Block</h2>
      </header>
      <div class="w3-container">
        <p>Select reson for block and close at the top.</p>
        <input type= "checkbox"> Fake Account.<br>
        <input type= "checkbox"> Other.<br>
      </div>
      <footer class="w3-container w3-red">
        <p></p>
      </footer>
    </div>
  </div>


  </body>
</html>