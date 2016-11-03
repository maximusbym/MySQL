<h1>Admin</h1>
<h3>You admin, it`s so cool, yeah?</h3>
<!--    <p>Product count:--><?//= count($_SESSION['cart']);?><!--</p>-->
<p>Product count</p>
<?= ( count( $_SESSION['cart'] ) > 0 )  ? count($_SESSION['cart'])  :  ''    ?>