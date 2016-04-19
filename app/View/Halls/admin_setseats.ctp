<div class="Hall admin setseats">

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Bootstrap Admin Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .submit > input
            {
                margin-right: 11px;
                color: #fff;
                background-color: #337ab7;
                padding: 10px 16px;
                font-size: 18px;
                line-height: 1.3333333;
                border-radius: 6px;
                display: block;
                width: 100%;
            }
        </style>
    </head>

    <body>

    <div id="wrapper">
        <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edycja Kina
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php  echo $this->Html->url(array('controller'=>'../Pages','action'=>'display'), true);?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Edycja Kina
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row text-center">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">



                            <?php
                            $rzedy = $hall['Hall']['count_rows'];
                            $miejsca = $hall['Hall']['count_seats'];
                            ?>
                            <h1>Wybierz ułożenie miejsc:</h1>
                            <h2>Kino: <?php echo $cinema['Cinema']['name']?></h2>

                            <h2>Nazwa sali: <?php echo $hall['Hall']['name']?></h2>
                            <div class="space">
                                <?php for($i = 1 ; $i <= $rzedy; $i++): ?>
                                    <div class="rzad">
                                        <div class= "nr-rzad">
                                            <span><?php echo $i;?></span>
                                        </div>
                                        <?php for($j = 1 ; $j <= $miejsca ; $j++): ?>

                                            <?php foreach($seats as $seat)
                                            {
                                                if($seat['Seat']['num_rown'] == $i && $seat['Seat']['num_seat'] == $j)
                                                {
                                                    if($seat['Seat']['status'] == 1)
                                                    {
                                                        ?>
                                                        <div class="miejsce" data-id="<?php echo $seat['Seat']['id']?>">
                                                            <span class="wartosc"><?php echo $j;?></span>
                                                        </div>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <div class="miejsce_puste" data-id="<?php echo $seat['Seat']['id']?>">
                                                            <span class="wartosc"><?php echo $j;?></span>
                                                        </div>
                                                        <?php
                                                    }
                                                    break;
                                                }
                                            }
                                            ?>
                                        <?php endfor;?>
                                    </div>
                                <?php endfor;?>
                                <input class ="ref" type="submit" value="Zapisz">
                            </div>


                        </div>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>








<script>
        var tab =[];
        var idx = 0;
        var check = false;
        var s = <?php  echo json_encode($this->Html->url(array('controller'=>'Halls','action'=>'admin_setseats'), true))?>;
        var w =1;
        function  disableselect()
        {
            document.getElementsByClassName("rzad").disabled = true;
        }
        $('.can').click(function()
        {
            alert(tab[idx]);
            idx++;
        });

        $('.miejsce,.miejsce_puste').click(function()
        {
            check = false;
            if($(this).hasClass('miejsce'))
            {
                $(this).addClass('miejsce_puste').removeClass('miejsce');
                for(var i = 0; i < tab.length ; i++)
                {
                    if(tab[i].id == $(this).data("id"))
                    {
                        tab.splice(i,1);
                        check = true;
                    }
                }
                if(check == false)
                    tab.push({id: $(this).data("id"),status: 0});
            }
            else
            {
                $(this).addClass('miejsce').removeClass('miejsce_puste');
                //staus na 1
                for(var i = 0; i < tab.length ; i++)
                {
                    if(tab[i].id == $(this).data("id"))
                    {
                        tab.splice(i,1);
                        check = true;
                    }
                }
                if(check == false)
                    tab.push({id: $(this).data("id"),status: 1});
            }
        });
        $('.ref').click(function()
        {
                $.ajax({
                type:"POST",
                data:{"Seat":tab},
                url:s,
                success: function()
                {
                    window.location.href = "../";
                }
            });
        });
    </script>
           