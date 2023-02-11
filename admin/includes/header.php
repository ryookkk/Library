<style>
.log {
    margin-top: -20px;
    width: 1400px;
    margin-left: 385px;
}

.navbar>.container .navbar-brand,
.navbar>.container-fluid .navbar-brand {
    margin-left: -500px;
}

.navbar-brand {
    float: left;
    height: 75px;
    padding: 15px 15px;
    font-size: 18px;
    line-height: 20px;
}

.right-div {
    top: -95px;
    position: relative;

}

.right-div .btn {
    border-style: solid;
    border-width: 2px;
    border-color: white;
    font-size: 10px;
}
</style>
<div class="navbar navbar-inverse set-radius-zero">

    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">

                <img class="log" src="assets/img/logo.png" />
            </a>
            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        </div>


    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="dashboard.php">DASHBOARD</a></li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-book.php">Add
                                        Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-books.php">Manage
                                        Books</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Borrow Books <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="issue-book.php">Borrow
                                        New Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="Return_book.php">Return
                                        Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="manage-issued-books.php">Manage Borrowed Books</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Register <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li><a href="signup.php">Student Register</a> </li>
                                <li><a href="facultysign.php">Faculty Register</a></li>
                            </ul>
                        </li>  

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Client <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                            <li><a href="check.php">Check Profile</a></li>
                            <li><a href="reg-students.php" >Registered Client</a></li>
                            </ul>
                        </li>  
                        

                        <li><a href="change-password.php">Change Password</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>