<?php


include "add_modal.php";


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XML OUR PERSONAL PORTFOLIO </title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

</head>
<body>
<div class="container">
    <h1 class="page-header text-center"> PERSONAL INFORMATION</h1>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New Blog</a>

        <a href="Portfolio-master"class="btn btn-light" target="_blank"> View OUR PERSONAL PORTFOLIO WEBSITE</a>   


             <?php
             session_start();
             if(isset($_SESSION['message'])){

                ?>

                <div class="alert alert-info text-center" style="margin-top:20px; width:100%;">
                    <?php echo $_SESSION['message'] ?>
                </div>

                <?php 
                unset($_SESSION['message']);


             }
             ?>


            <table class="table table-sm table-striped table-condensed" style="margin-top:20px;">
                <thead class="table-dark">
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                </thead>

                <tbody>

                    <?php
                    //load the xml file to the table
                    $file = simplexml_load_file('files/personal.xml');
                    
                    //loop through all the data abd display each rows
                    foreach($file->personal as $rows){ 


                    ?>


                        <tr>
                            <td> <?php echo $rows-> name; ?> </td>
                            
                            <td> <?php echo $rows-> address; ?> </td>
                            
                            <td> <?php echo $rows-> email; ?> </td>
                            
                            <td> <?php echo $rows-> birthdate; ?> </td>
                            
                            <td> <?php echo $rows-> content; ?> </td>

                            <td> <?php echo $rows-> action; ?> </td>

                           
                            <td>
                                <a href="#edit_<?php echo $rows->id;?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>



                                <a href="#delete_<?php echo $rows->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <?php include "edit_delete_modal.php"; ?>

                        </tr>
                        <?php

                    }

                    ?>

                </tbody>
                <tfoot>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
 
                </tfoot>
            </table>
        

    </div>
    </div>
</div>


<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>