<script>
    $(document).ready(function() {

        var table = $('#example').DataTable( {
            "ajax": "/getMessages"
        } );

            $('form').submit(function(e) {
                var $form = $(this);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/postMessages",
                    data: $form.serialize()
                    //
                }).done(function(data) {

                    console.log(data);
                    table.ajax.reload();
                    alert('all done, sent');
                    console.log('success');
                }).fail(function() {
                    alert('fail');
                    console.log('fail');
                });
                //отмена действия по умолчанию для кнопки submit
                e.preventDefault();
            });
        });
</script>

<table id="example" class="display" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Messages</th>
    </tr>
    </thead>
</table>

<div class="container">
<form action="/guest" method="POST" id="contactform" role="form">
    <div class="form-group">
        <p><label for="name">Name</label></p>
        <input id="name" class="form-control" type="text" name="name" value="<?=$_COOKIE['name']?>">
    </div>
    <div class="form-group">
        <p><label for="email">Email</label></p>
        <input id="email" name="email" class="form-control" placeholder="example@domain.com" required="" tabindex="2" type="text" value="<?=$_COOKIE['email']?>">
    </div>
    <div class="form-group">
        <label for="messages">Subject</label>
        <textarea name="messages" id="comment"  class="form-control" tabindex="4"></textarea>
    </div>
        <input type="submit" value="Push me" id="submit" class="btn btn-default"/>
</form>
</div>
<hr>

<?php
//var_dump($data);
//foreach($data as $val ) {
//    echo "<div class='container'>";
//        echo "<strong>Name:</strong> ".$val[0].'<br/>';
//        echo "<strong>Email:</strong>".$val[1].'<br/>';
//        echo "<strong>Message:</strong><em>".$val[2].'</em><br/>';
//        echo '</div> <hr/>';
//}
////
//$.ajax({
//                    type: "POST",
//                    dataType: $form.attr('method'),
//                    url: "/guest",
//                    data: $form.serialize()
//                    //