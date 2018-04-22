<div class="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <?php
                    $allover = 0;
                    $qry = "SELECT * FROM question";
                    $res = mysqli_query($dbcon, $qry);
                    $allover = mysqli_num_rows($res);
                ?>
                <a class="navbar-brand title" href="#"><span class="glyphicon glyphicon-time"></span> Time &nbsp;<span class="label label-primary" id="timer" style="font-size: 20px;"></span> </a>
            </div>
        </div>
    </nav>
</div>
