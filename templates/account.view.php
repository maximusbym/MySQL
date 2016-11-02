<form method="post" action="/account">
    <div class="container">
        <p><label for="descr">description new account</label></p>
        <input id="descr" class="form-control" name="new_account" type="text">

    <input type="submit" value="Create account" class="btn btn-default">
    </div>
</form>
<hr>
<div class="container">
    <table class="table table-bordered table-striped">
        <p>Accounts</p>
        <tr>
            <td>Guid</td>
            <td>Description</td>

        </tr>
            <?php

            if($data){
                foreach ($data['account'] as $key => $value) {
                    echo "<tr>";
                    echo "<td>".$value['guid']."</td>";
                    echo "<td>".$value['description']."</td>";
                    echo "<tr>";
                }
            }
            ?>
    </table>
</div>
<hr>

<form method="post" action="/account">
    <div class="container">
        <p><label for="category">name of new category</label></p>
        <input id="category" class="form-control" name="new_category" type="text">

        <input type="submit" value="Create category" class="btn btn-default">
    </div>
</form>
<hr>

<form method="post" action="/account">
    <div class="container">
        <h3>New Transaction</h3>
        <label for="category">name of transaction</label>
        <input id="category" class="form-control" name="transaction[name]" type="text" required>

        <label for="formAcc">Account</label>
        <select id="formAcc" name="transaction[account]" class="form-control">
            <?php
            foreach ($data['account'] as $value){
                echo "<option value=$value[id]>".$value['description']."</option>";
            }
            ?>
        </select>

        <label for="formCateg">Category</label>
        <select id="formCateg" name="transaction[category]" class="form-control">
            <?php

            foreach ($data['categories'] as $value){
                echo "<option value=$value[id]>".$value['name']."</option>";
            }
            ?>
        </select>
        <label for="postAmount">Transfer amount</label>
        <input id="postAmount" class="form-control" name="transaction[amount]" type="text" required>

        <input type="submit" value="Transaction" class="btn btn-default">
    </div>
</form>
<hr>
<div class="container">
    <table class="table table-bordered table-striped">
        <h3>Transactions</h3>
        <tr>
            <td>Operation name</td>
            <td>Description</td>
            <td>Guid</td>
            <td>Category</td>
            <td>Price</td>
            <td>Created at</td>

        </tr>
        <?php

        if($data){
            $balance = 0;
            foreach ($data['transaction'] as $key => $value) {
                echo "<tr>";
                echo "<td>".$value['name']."</td>";
                echo "<td>".$value['description']."</td>";
                echo "<td>".$value['guid']."</td>";
                echo "<td>".$value['category']."</td>";
                echo "<td>".$value['price']."</td>";
                echo "<td>".$value['created_at']."</td>";
                $balance += $value['price'];
                echo "<tr>";
            }
        }
        echo "</table>";
        echo "<h4>Your balance = $balance</h4>";
        ?>


</div>


