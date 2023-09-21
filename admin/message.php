<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Messages</title>
    <style>
    .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    .overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    opacity: 1;
    z-index: 3;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
    
  }
  
  .popup {
    margin: 10px auto;
    padding: 10px;
    background: #fff;
    border-radius: 5px;
    width: 70%;
    position: relative;
    transition: all 5s ease-in-out;
    z-index: 3;
  }
  
  .popup h2 {
    margin-top: 0;
    color: #333;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: var(--primarycolorhover);
  }
  .popup .content {
    /* max-height: 30%; */
    overflow: auto;
  }
  
  @media screen and (max-width: 700px){
    .box{
      width: 70%;
    }
    .popup{
      width: 70%;
    }
  }





    </style>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    
        session_start();
        $useremail = $_SESSION['user'];

        date_default_timezone_set('Africa/Kampala');
        $date = date('d-m-Y');

        include('/opt/lampp/htdocs/system/connection.php');
        include('check_authentication.php');

        $messagesql= "select * from message ";
        

    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="btn btn-warning text-lowercase sidebar-brand-text mx-3"><?php echo $_SESSION['user']?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="income.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Income</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="expenditure.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Expenditure</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="saving.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Saving</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="loans.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Loans</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="wishlist.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="paid_loan.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Paid Loans</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="deleted_income.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Deleted Income</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="deleted_expenditure.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Deleted Expenditure</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="deleted_saving.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Deleted Savings</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="deleted_loan.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Deleted Loans</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="deleted_wishlist.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Deleted Wishlist</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                    
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div>
                        <button class="btn btn-warning"><?php echo $date; ?></button>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="fontweight:bold" class=" btn btn-sm btn-danger text-uppercase mr-2 d-none d-lg-inline text-gray-900 large"><?php echo $_SESSION['username'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile_2.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800">Messages &nbsp &nbsp</h1>
                        <a href="dashboard.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-arrow-left fa-sm text-white-50"></i> Return to Home</a>
                    </div>

                    <div class="income">
                        <!-- <form class="user" action="" method="POST">
                            <div class="form-group">
                                <input type="number" name="amount" class="form-control" placeholder="Enter Amount....">
                            </div>
                            <div class="form-group">
                                <input type="text" name="comment" class="form-control" placeholder="Enter Comment....">
                            </div>
                            <div>
                                <input type="submit" name="save" value="Save" class="btn btn-primary btn-user btn-block" />
                                <button type="clear" class="btn btn-primary btn-user btn-block">
                                    Clear
                                </button>
                            </div>
                            <hr>
                            
                        </form> -->
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>FULLNAME</th>
                                    <th>EMAIL</th>
                                    <th>CONTACT</th>
                                    <th>MESSAGE</th>
                                    <th>DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    $result = mysqli_query($database, $messagesql);
                                    while($row = mysqli_fetch_array($result)){
                                        $id = $row['msg_id'];
                                        $email = $row['email'];
                                ?>
                                <tr>
                                    
                                    <td><?php echo $row['msg_id'] ?></td>
                                    <td><?php echo $row['fullname'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['tel'] ?></td>
                                    <td><?php echo $row['messagebody'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td>
                                        <?php
                                            echo '
                                            <div style="display:flex;justify-content: space-around;">
                                            <a href="?action=view&id='.$id.'&error=0" class="non-style-link"><button  class="btn-primary-soft btn btn-info button-icon btn-edit"  ><i class="fa fa-info"></i>&nbsp &nbsp<font  class="tn-in-text">View</font></button></a>
                                            &nbsp;&nbsp;&nbsp;
                                            </div>
                                            ';
                                        ?>
                                    </td>
                                </tr>
                                    <?php } ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                
                

            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; phildevcoder 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <?php

if($_GET){
            
    $id=$_GET["id"];
    $action=$_GET["action"];
    if($action=='drop'){
        $emailget=$_GET["useremail"];
        
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="message.php">&times;</a>
                        <div class="content">
                            You want to delete a message record with ID ('.substr($id,0,40).')?  <br>('.substr($emailget,0,40).')
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete_message.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="message.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
    }elseif($action=='view'){
        $sqlmain= "select * from message where msg_id='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $fullname = $row['fullname'];
        $email=$row["email"];
        $contact=$row["tel"];
        $msg=$row["messagebody"];
        $date = $row['date'];

        $_SESSION['amount'] = $amount;
        $_SESSION['date'] = $date;
        $_SESSION['comment'] = $comment;
        
        echo '
        <div id="popup1" class="overlay">
                <div class="popup">
                <center>
                    <h2></h2>
                    <a class="close" href="message.php">&times;</a>
                    <div class="content">
                        <b>----------message Details----------</b><br>
                        
                    </div>
                    <div style="display: flex;justify-content: center;">
                    <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                    
                       
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="id" style="font-weight:bold ;font-size:20px" class="form-label">ID: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary label-td" colspan="2">
                            '.$id.'<br><br>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class=" label-td" colspan="2">
                                <label for="Email" style="font-weight:bold; font-size:20px" class="form-label">Full Name: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary label-td" colspan="2">
                            '.$fullname.'<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="nic" style="font-weight:bold ;font-size:20px" class="form-label">Email: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary label-td" colspan="2">
                            '.$email.'<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="Tele" style="font-weight:bold ;font-size:20px" class="form-label">Contact: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary label-td" colspan="2">
                            '.$contact.'<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="spec" style="font-weight:bold ;font-size:20px" class="form-label">Message Body: </label>
                                
                            </td>
                        </tr>
                        <tr>
                        <td class="text-primary label-td" style="font-weight:bold ;font-size:20px" colspan="2">
                        '.$msg.'<br><br>
                        </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="spec" style="font-weight:bold ;font-size:20px" class="form-label">Date: </label>
                                
                            </td>
                        </tr>
                        <tr>
                        <td class="text-primary label-td" style="font-weight:bold ;font-size:20px" colspan="2">
                        '.$date.'<br><br>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="message.php"><input type="button" value="Close" class="btn-warning login-btn btn-primary-soft btn" ></a>
                            
                                
                            </td>
            
                        </tr>
                    

                    </table>
                    </div>
                </center>
                <br><br>
        </div>
        </div>
        ';
        
    }elseif($action=='edit'){
        $sqlmain= "select * from message where id='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $email=$row["useremail"];
        $amount=$row["amount"];
        $date=$row["date"];
        $comment = $row['comment'];
        
                echo '
                <div id="popup1" class="overlay">
                        <div class="popup">
                        
                            <a class="close" href="message.php">&times;</a> 
                            <div style="display: flex;justify-content: center;">
                            <div>
                            <table width="100%" border="0">
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit Doctor Details.</p>
                                    message ID : '.$id.' (Auto Generated)<br><br> 
                                    Email : '.$email.' (Auto Generated)<br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <form action="edit_message.php" method="POST">
                                        <input type="hidden" value="'.$id.'" name="id00">
                                        <input type="hidden" name="oldemail" value="'.$email.'" >
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td class="label-td" colspan="2">
                                        <label for="amount" class="form-label">Amount: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="number" name="amount" class="input-text" placeholder="Amount" value="'.$amount.'" required><br>
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="comment" class="form-label">Comment: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="text" name="comment" class="input-text" placeholder="Comment" value="'.$comment.'" required><br>
                                    </td>
                                </tr>
                    
                                <tr>
                                    <td colspan="2">
                                        <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                        <input type="submit" name="edit-btn" value="Save" class="login-btn btn-primary btn">
                                    </td>
                    
                                </tr>
                            
                                </form>
                                </tr>
                            </table>
                            </div>
                            </div>
                        <br><br>
                </div>
                </div>
                ';
    }else{
        echo "No action performeed";
    }
}else{
    // echo "Not get method";
};

    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>