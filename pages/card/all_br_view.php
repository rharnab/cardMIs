<?php 
    include('db/dbconnect.php');
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Card | All Branches View</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Coustom StyleSheet -->
        <link rel="stylesheet" href="../../css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <?php
            include("database.php");
        ?>
        <!-- header logo: style can be found in header.less -->
        <?php include("../../header.php");?>        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
             <?php include("../../menu.php");?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>All Branches View</h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Utility</a></li>
                        <li class="active">All Branches View</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Branch Code</th>
                                                <th>Branch Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>District</th>
                                                <th>Branch Address</th>
                                                <th>Created at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $branches_view = $conn->prepare("SELECT * FROM branches");
                                            $branches_view->execute();
                                            while($rowData = $branches_view->fetch(PDO::FETCH_ASSOC)){
                                        ?>  
                                            <tr>
                                                <td><?php echo $rowData['br_code'];?></td>
                                                <td><?php echo $rowData['br_title'];?></td>
                                                <td><?php echo $rowData['br_phone'];?></td>
                                                <td><?php echo $rowData['br_email'];?></td>
                                                <td><?php echo $rowData['br_city'];?></td>
                                                <td><?php echo $rowData['br_address'];?></td>
                                                <td>
                                                    <?php
                                                     $date = $rowData['created_at'];
                                                     echo date('d-m-Y',strtotime($date));
                                                     ?>    
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>  
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });

                // create xml file //
                $(document).on('click','#xmlBtn',function(){
                    $.ajax({
                        url:'allaction/xml_file_create.php',
                        success:function(res){
                            document.getElementById('xmlMsg').innerHTML = res;
                            $("#xmlMsg").fadeIn('fast').fadeOut(1000);
                            var url = window.location;
                            url.reload();
                        }
                    });
                });
            });
        </script>
    </body>
</html>