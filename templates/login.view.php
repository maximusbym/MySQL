<div class="container">
    <form action="/login" method="POST" id="contactform" role="form">
        <div class="form-group">
            <p><label for="login">Name</label></p>
            <input id="login" class="form-control" type="text" name="login" value="">
        </div>
        <div class="form-group">
            <p><label for="password">Password</label></p>
            <input id="password" name="password" class="form-control" required="" tabindex="2" type="password" value="">
        </div>
        <div class="container">        <input type="checkbox" name="rememberMe"> remember me</div>
        <br>
        <input type="submit" value="Log in" id="submit" class="btn btn-default"/>


    </form>
</div>
