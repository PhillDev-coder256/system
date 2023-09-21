
<!-- drop -->
$nameget=$_GET["name"];
        echo '
        <div class="modal fade" id="deleteLoanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete Loan?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete loan details.</div>
                <div class="modal-footer">
                    <a href="delete-doctor.php?id='.$id.'" class="btn btn-warning" type="button" data-dismiss="modal">Cancel</a>
                    <a href="loans.php" class="btn btn-danger" type="button" data-dismiss="modal">Delete</a>
                </div>
            </div>
        </div>
    </div>
        ';

        <!-- view -->

        $sqlmain= "select * from loan where id='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $email=$row["useremail"];
        $amount=$row["amount"];
        $date=$row["date"];
        $comment = $row['comment'];
        
        // $spcil_res= $database->query("select sname from specialties where id='$spe'");
        // $spcil_array= $spcil_res->fetch_assoc();
        // $spcil_name=$spcil_array["sname"];
        // $nic=$row['docnic'];
        // $tele=$row['doctel'];
        echo '
        <div id="popup1" class="overlay">
                <div class="popup">
                <center>
                    <h2></h2>
                    <a class="close" href="doctors.php">&times;</a>
                    <div class="content">
                        IGC Web App<br>
                        
                    </div>
                    <div style="display: flex;justify-content: center;">
                    <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                    
                        <tr>
                            <td>
                                <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Loan Details.</p><br><br>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="Email" class="form-label">Email: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            '.$email.'<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="nic" class="form-label">Amount: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            '.$amount.'<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="Tele" class="form-label">Date: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            '.$date.'<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="spec" class="form-label">Comment: </label>
                                
                            </td>
                        </tr>
                        <tr>
                        <td class="label-td" colspan="2">
                        '$comment'<br><br>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="loans.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                            
                                
                            </td>
            
                        </tr>
                    

                    </table>
                    </div>
                </center>
                <br><br>
        </div>
        </div>
        ';
        
        
        <!-- edit -->

        $sqlmain= "select * from loan where id='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $email=$row["useremail"];
        $amount=$row["amount"];
        $date=$row["date"];
        $comment = $row['comment'];
        
                echo '
                <div id="popup1" class="overlay">
                        <div class="popup">
                        <center>
                        
                            <a class="close" href="doctors.php">&times;</a> 
                            <div style="display: flex;justify-content: center;">
                            <div class="abc">
                            <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit Doctor Details.</p>
                                    Loan ID : '.$id.' (Auto Generated)<br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit Doctor Details.</p>
                                    Email : '.$email.' (Auto Generated)<br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <form action="edit_loan.php" method="POST" class="add-new-form">
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
                                    
                                        <input type="submit" value="Save" class="login-btn btn-primary btn">
                                    </td>
                    
                                </tr>
                            
                                </form>
                                </tr>
                            </table>
                            </div>
                            </div>
                        </center>
                        <br><br>
                </div>
                </div>
                ';
    



