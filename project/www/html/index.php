<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hello,<?php echo $userRow['email']; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
</head>
<body>

<!-- Navigation Bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;Logged
                        in: <?php echo $userRow['email']; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Jumbotron-->
    <div style="text-align:center", class="jumbotron">
        <h1>Hello, <?php echo $userRow['username']; ?><h1> 
        <h3>Welcome to Movie Recommendation System!</h3>
        <br>
        <p><a class="btn btn-primary btn-lg" href="/home" role="button">Click on me Demo</a></p>
    </div>

    <div class="row">
        <div style="text-align:center" class="col-lg-12">
            <h2>Project Details:</h2>
            <br>
            <h4>
                This Recommendation Systems is designed using <strong>IMDB 5000</strong> Movie dataset available on <a href="https://www.kaggle.com/carolzhangdc/imdb-5000-movie-dataset" role="button">Kaggle</a>
            </h4>
            <br>
            <h4>
                The details of the movies (Title, Genre, Runtime, Rating, Poster) are fetched using an <a href="https://www.themoviedb.org/documentation/api">API by TMDB</a>
            </h4>
            <h4>
                I have also used the IMDB ID of the movie in the API. 
            </h4>
            <br>
            <h4>
                I did web scraping to get the information about the user in the IMDB site using <a href="https://www.crummy.com/software/BeautifulSoup/bs4/doc/">beautifulsoup4</a>
            </h4>
        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
