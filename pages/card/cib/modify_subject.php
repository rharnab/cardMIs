<?php 
    include('../db/dbconnect.php');
    //session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Card | modify subject</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Coustom StyleSheet -->
        <link rel="stylesheet" href="../../../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../../css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="../../../css/select2.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <?php
            include("../database.php");
        ?>
        <!-- header logo: style can be found in header.less -->
        <?php include("../../../header.php");?>        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
             <?php include("../../../menu.php");?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Modify Subject Info</h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">CIB </a></li>
                        <li class="active">Subject Info</li>
                    </ol>
                </section>

<!-- style -->
<style type="text/css">
  .page_loader{
    position: absolute;
    z-index: 1;
    left: 27%;
    width: 37%;
  }
</style>
                <!-- style -->

                <!-- Main content -->
                <section class="content">
                  <img src="../img/loader.gif" class="page_loader" alt="Page loader">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="box">
                               <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                  <!-- from -->
                                   <div class="tile-body">
                                    <form id="defaultForm" class="form-horizontal" name="info" action="download_cib_data.php" method="post" enctype="multipart/form-data">


                                    <div class="form-group row">
                                      <!-- <label class="control-label col-md-3">Select file </label> -->
                                      <div class="col-md-10">
                                        <select name="cib_date" class="form-control" id="cib_date">
                                        <option value="">-- select  date --</option>
                                          <?php

                                        $sql_query = mysql_query("SELECT
                                             *
                                          from
                                             (
                                                SELECT
                                                   year(reporting_date) as s_year,
                                                   month(reporting_date) as s_month,
                                                   reporting_date 
                                                from
                                                   subject_info si 
                                                /*where
                                                   (
                                                      status = 0 
                                                      or status = '0' 
                                                   )*/
                                                   group by year(reporting_date),month(reporting_date)
                                             )
                                             s
                                          INNER JOIN (


                                          select
                                             * 
                                          from
                                             (
                                                SELECT
                                                   year(reporting_date) as d_year,
                                                   month(reporting_date) as d_month,
                                                   reporting_date 
                                                from
                                                   contracts_info ci 
                                                /*where
                                                   (
                                                      status = 0 
                                                      or status = '0' 
                                                   )*/
                                                   
                                                  group by year(reporting_date),month(reporting_date)
                                                 
                                             )
                                             d 
                                          ) t on s.s_year=t.d_year and s.s_month=t.d_month");

                                        while($result = mysql_fetch_array($sql_query))
                                        {
                                           $date = $result['s_year']."-".$result['s_month'];
                                           $nex_month = date('Y-m', strtotime('+1 month', strtotime($date)))
                                          ?>
                                          <option value="<?php echo $nex_month ?>"> <?php echo date('Y-M', strtotime($nex_month)) ?> </option>

                                          <?php
                                        }

                                           ?>
                                          
                                        </select>
                                      </div>
                                    </div>
                                  </form>
                                  </div>

                                  <!-- from -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                     <div class="box-body table-responsive" id="subject_data_table" style="overflow-x: auto">

                      </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../../js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="../../../js/sweetalert.min.js"></script>
        <script src="../../../js/jquery-ui.js"></script>
        <script src="../../../js/select2.min.js"></script>


      <script>
     $(document).ready(function() {
        $('#cib_date').select2();
        $('.page_loader').hide();
       });


    $('#cib_date').on('change', function(){

      var cib_date = $('#cib_date').val();
      if(cib_date !='')
      {
       
         $('.page_loader').show(); 
        $.ajax({
          type:'post',
          url:'fetch_subject_data.php',
          data:{'cib_date': cib_date},
          processing: true,
          serverSide: true,
          success: function(data)
          {
             $('#subject_data_table').html(data);
              $('.page_loader').hide();
          }
        })
      }else{
        $('#subject_data_table').html('');
      }


    }); 


    </script>
    </body>
</html>