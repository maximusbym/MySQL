<script>
    $(document).ready(function () {
        jQuery('.buy-product').click( function() {
            var productId = $(this).attr('data-id');

            $.ajax({
                url: '/add-product-to-cart',
                data: { id: productId },
                method: "POST",
                dataType: "JSON",
                success: function( data ) {
                    alert('yes');
                    if( data.amount > 0 ) {
                        $('.cart').html('In basket '+data.amount+' product');
                    }
                }
            });
        });
    })

</script>

<div class="container">
<?php
foreach ($data as $value){
    echo "Product: ".$value['title']."<br>";
    echo "Price: ".$value['price']."<br>";
    echo "Description: ".$value['description']."<br>";
    echo "Product ID: ".$value['id']."<br>";

}
?>
    <button class="buy-product btn" data-id="<?=$data[0]['id']?>">BUY</button>

</div>