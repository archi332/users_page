<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Users Detailed List</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <script src="/js/jquery.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Users List</a></li>
                <li><a href="/add_user">Add user</a></li>
            </ul>
        </div>
    </div>
</nav>

<div>
    <div class="container">
        <div>
            <?php include 'application/views/' . $content_view; ?>
        </div>
    </div>
</body>
</html>