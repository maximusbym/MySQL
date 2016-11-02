<div class="container">
    <form action="/registration" method="POST" id="contactform" role="form">
        <div class="form-group">
            <p><label for="name">Name</label></p>
            <input id="name" class="form-control" type="text" name="name" value="" required="">
        </div>

        <div class="form-group">
            <p><label for="email">Email</label></p>
            <input id="email" name="email" class="form-control" placeholder="example@domain.com" required="" tabindex="2" type="text" value="">
        </div>

        <div class="form-group">
            <p><label for="login">Login name</label></p>
            <input id="login" class="form-control" type="text" name="login" value="" required="">
        </div>

        <div class="form-group">
            <p><label for="password">Password</label></p>
            <input id="password" class="form-control" type="password" name="password" value="" required="">
        </div>

        <input type="submit" value="Register" id="submit" class="btn btn-default"/>
    </form>
</div>