<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="outer">
    <header id="heading">ConNoir</header>
    <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img class="spin" src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>
  </div>
  <div class="profil">
    <header>
      <img class="spin" src="php/images/<?php echo $row['img']; ?>" alt="">
      <div class="name"><?php echo $row['fname']. " " . $row['lname'] ?></div>
    </header>
    <div class="details">
      <span id="about"><?php echo $row['about'] ?></span>
      <span id="bday"><span>Birthday : </span> <?php echo $row['date'] ?></span>
      <span id="email"><span>Email : </span> <?php echo $row['email'] ?></span>
    </div>
  </div>


  <script src="javascript/users.js?v=<?php echo time(); ?>"></script>

</body>
</html>
