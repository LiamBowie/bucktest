<header>
   <a href="http://bucktest-rgu.azurewebsites.net/index.php" class="nohover">
      <div class="banner">      
         <h1 class="middle centre">Bucksburn Amateur Swimming Club</h1>      
      </div>
   </a>

<?php 
   if (isset($_SESSION["username"])) {
      echo '<div class="contain-to-grid header-section">
      <nav role="navigation" class="top-bar important-class" data-topbar>
         <div class="top-bar-section">
            <ul>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/galas.php" role="link">Galas</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/upcoming-galas.php" role="link">Upcoming Galas</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/gala-results.php" role="link">Gala Results</a></li>                
                     <li><a href="http://bucktest-rgu.azurewebsites.net/galas.php" role="link">View All</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/galas/create.php" role="link">Create</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/galas/edit.php" role="link">Edit</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/members.php" role="link">Members</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/members.php" role="link">View All</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/members/create.php" role="link">Create</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/members/edit.php" role="link">Edit</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/squads.php" role="link">Squads</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/squads.php" role="link">View All</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/squads/create.php" role="link">Create</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/squads/edit.php" role="link">Edit</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/venues.php" role="link">Venues</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/venues.php" role="link">View All</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/venues/create.php" role="link">Create</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/venues/edit.php" role="link">Edit</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/news.php" role="link">News</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/news.php" role="link">View All</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/news/create.php" role="link">Create</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/news/edit.php" role="link">Edit</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li class="lightgradient"><a href="http://bucktest-rgu.azurewebsites.net/gallery.php" role="link">Gallery</a></li>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/shop.php" role="link">Shop</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/shop.php" role="link">View All</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/shop/create.php" role="link">Create</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/shop/edit.php" role="link">Edit</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/about.php" role="link">About</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about.php" role="link">About BASC</a></li>
                     <li><a href="/about/committee.php" role="link">Committee</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about/timetable.php" role="link">Timetable</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about/club-records.php" role="link">Club Records</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about/join.php" role="link">Join Us</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li><a href="http://bucktest-rgu.azurewebsites.net/contact.php" role="link">Contact</a></li>
               <li class="divider"></li>
               <li><a href="http://bucktest-rgu.azurewebsites.net/member-area.php">Member Area</a></li> 
               <li class="divider"></li>
               <li class="has-form"> <a href="http://bucktest-rgu.azurewebsites.net/logout.php" class="small button">Logout</a> </li> 
               <li class="divider"></li>
            </ul>
         </div>
      </nav>
   </div>
   <div class="header-fill"></div>';
   } else {
      echo '<div class="contain-to-grid header-section">
      <nav role="navigation" class="top-bar important-class" data-topbar>
         <div class="top-bar-section">
            <ul class="middle">
               <li class="divider"></li>
               <li class="lightgradient"><a href="http://bucktest-rgu.azurewebsites.net/upcoming-galas.php" role="link">Upcoming Galas</a></li>
               <li class="divider"></li>
               <li class="lightgradient"><a href="http://bucktest-rgu.azurewebsites.net/gala-results.php" role="link">Gala Results</a></li>                
               <li class="divider"></li>
               <li class="lightgradient"><a href="http://bucktest-rgu.azurewebsites.net/news.php" role="link">News</a></li>
               <li class="divider"></li>
               <li class="lightgradient"><a href="http://bucktest-rgu.azurewebsites.net/gallery.php" role="link">Gallery</a></li>
               <li class="divider"></li>
               <li class="lightgradient"><a href="http://bucktest-rgu.azurewebsites.net/shop.php" role="link">Shop</a></li>
               <li class="divider"></li>
               <li class="has-dropdown not-click">
                  <a href="http://bucktest-rgu.azurewebsites.net/about.php" role="link">About</a> 
                  <ul class="dropdown">
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about.php" role="link">About BASC</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about/committee.php" role="link">Committee</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about/timetable.php" role="link">Timetable</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about/club-records.php" role="link">Club Records</a></li>
                     <li><a href="http://bucktest-rgu.azurewebsites.net/about/join.php" role="link">Join Us</a></li>
                  </ul>
               </li>
               <li class="divider"></li>
               <li><a href="http://bucktest-rgu.azurewebsites.net/contact.php" role="link">Contact</a></li>
               <li class="divider"></li>
               <li class="has-form"> <a href="http://bucktest-rgu.azurewebsites.net/login.php" class="small button">Login</a> </li> 
               <li class="divider"></li>
            </ul>
         </div>
      </nav>
   </div>';
   }
?>
</header>