<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container">
        <h1><?php echo $data['title']; ?></h1>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
        culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
        culpa qui officia deserunt mollit anim id est laborum.</p>
        <br>
        <hr>
        <div class="a"><span>Team</span></div>
        <br>

        <div class="cards">

        <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://www.mcicon.com/wp-content/uploads/2021/01/People_User_1-copy-4.jpg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Lorem ipsum</p>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://www.mcicon.com/wp-content/uploads/2021/01/People_User_1-copy-4.jpg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Lorem ipsum</p>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://www.mcicon.com/wp-content/uploads/2021/01/People_User_1-copy-4.jpg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Lorem ipsum</p>
  </div>
</div>

</div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<style>
.cards {
    display: flex
}
div.a {
width: 150px;
height: 40px;
background-color: #FFEB8C;
-ms-transform: rotate(20deg); /* IE 9 */
transform: rotate(10deg);
margin-left: 40%;
margin-top: -3%;
}
span {
    font-size: 17px;
    margin-left: 35%;
}
.cards {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
</style>