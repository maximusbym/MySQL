<form method="post" action="/order">
    <div class="container">
        <table class="table table-bordered table-striped">
            <tr>
                <td>Product</td>
                <td>Price</td>
                <td>Count</td>
                <td>Delete</td>
            </tr>
        <?php
        $totalPrice = 0;
        if($data){
            foreach ($data as $key => $value) {
                echo "<tr>";
                echo "<td>".$value['title']."</td>";
                echo "<td>".$value['price']."</td>";
                echo "<td>".$_SESSION['cart'][$value['id']]."</td>";
                echo "<td><a href=/basket?delete=".$value['id'].">X</a>";
                $totalPrice += $value['price'];
                echo "<tr>";
            }
        }
            echo "</table>";
            echo "total price: ".$totalPrice;

        ?>

            <div class="container">
                <input type="submit" value="Order" class="btn btn-default">
            </div>
        </div>
    </form>

<?php
