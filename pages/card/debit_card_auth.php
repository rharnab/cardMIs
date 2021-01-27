<?php 
    include('db/dbconnect.php');
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Card | MIS Branch Card Authentication</title>
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
                    <h1>Branch Authentication Debit Card</h1>
                    <div id="success"></div>
                    <div id="loading-image" style="text-align: center; display: none;">
                        <img src="load.gif" alt="img">
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Requisition</a></li>
                        <li class="active">Branch Authentication Debit Card</li>
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
                                                <th>Account No</th>
                                                <th>Acc Name</th>
                                                <th>Phone</th>
                                                <th>Acc Type</th>
                                                <th>Status</th>
                                                <th>Open Date</th>
                                                <th>Balance</th>
                                                <th>Request By</th>
                                                <th>Request Date</th>
                                                <th>Request</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $debit_card_api = $conn->prepare("SELECT * FROM debit_card_api WHERE card_status=''");
                                            $debit_card_api->execute();
                                            while($rowData = $debit_card_api->fetch(PDO::FETCH_ASSOC)){
                                                $req = $conn->prepare("SELECT user_fname,user_lname FROM users WHERE uid=?");
                                                $req->bindParam(1,$rowData['entry_by_id']);
                                                $req->execute();
                                                $rs = $req->fetch(PDO::FETCH_ASSOC); 
                                        ?>  
                                            <tr>
                                                <td class="aaa"><?php echo $rowData['accountno'];?></td>
                                                <td><?php echo $rowData['accountname'];?></td>
                                                <td>
                                                    <?php echo '0'.$rowData['accphone'];?>
                                                    <br>
                                                    <?php 
                                                        echo $rowData['accotherphone']<=0? "": $rowData['accotherphone'];
                                                    ?>    
                                                </td>
                                                <td><?php echo $rowData['accounttype']?></td>
                                                <td><?php echo $rowData['accstatus'];?></td>
                                                <td>
                                                    <?php
                                                     $date = $rowData['accdateofbirth'];
                                                     echo date('d-m-Y',strtotime($date));
                                                     ?>
                                                </td>
                                                <td><?php echo $rowData['bal_tk'];?></td>
                                                <td><?php echo $rs['user_fname'].' '.$rs['user_lname'];?></td>
                                                <td>
                                                    <?php
                                                     $date = $rowData['requestDate'];
                                                     echo date('d-m-Y',strtotime($date));
                                                     ?>    
                                                </td>
                                                <td>
                                                    <select class="status_action">
                                                        <option value="">Wait for approve</option>
                                                        <option value="approve">Approve</option>
                                                        <option value="dishonour">Dishonour</option>
                                                    </select>    
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

                // card approval action //
               $(document).on("change",".status_action",function(e){
                    e.preventDefault();
                    var status = $(this).val(); // get status //
                    var accno  = $(this).closest('td').prev().prev().prev().prev().prev().prev().prev().prev().prev().text();
                    var data   = accno.trim();
                    var res = confirm("Are you sure "+status+" this card request ?");

                    if(res==true && status=='approve' || res==true && status=='dishonour'){
                        if(res==true && status=='approve'){
                            // Approve ajax call debit_card_approve.php//
                            $.ajax({
                                url:'allaction/debit_card_approve.php',
                                type:'post',
                                data:{accno:accno,status:status},
                                beforeSend: function() {
                                    $("#loading-image").css('display','block');
                                },
                                success:function(resp){
                                    $("#loading-image").css('display','none');
                                    document.getElementById('success').innerHTMl = resp;
                                    $("#success").fadeIn('fast').fadeOut('slow');
                                    window.location.reload();
                                }
                            });
                        }else{
                            // Dishonour ajax call //
                            console.log("DISHONOUR");
                        }
                    }else{
                        console.log('go to hell');
                    }
                    
                    
               });

            });
        
        </script>
    </body>
</html>