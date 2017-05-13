<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">PosterHouse</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="winkelmandje.php"><span class="glyphicon glyphicon-shopping-cart"></span> Winkelwagen</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        profiel
                        <span class="caret"></span></a>
                    <!-- Het dropdown menu van een gebruiker/gast -->
                    <ul class="dropdown-menu">
                        <li><a href="/">coming soon</a></li>
                    </ul>
                </li>
            </ul>
            <div class="nav navbar-nav form-inline navbar-right" style="padding: 10px;">
                <div class="input-group">
                    <!-- Zoekbalk -->
                    <form action="producten.php" method="get">
                        <input type="text" name="searchbar" class="form-control"></input>
                        <div class="input-group-btn">
                            <button class="btn btn-default" name="btnsearch"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/.nav-collapse -->
    </div>
</nav>