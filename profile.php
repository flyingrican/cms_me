<?php include "includes/admin_header.php"; ?>
<?php 

    if(isset($_SESSION['user_id'])){
        
        $user_id = $_SESSION['user_id'];
        
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $select_user_profile_query = mysqli_query($connection, $query);
        
        //confirm($select_user_profile_query);
        
        while($row = mysqli_fetch_array($select_user_profile_query)){
            
             $user_id = $row ['user_id'];
             $username = $row ['username'];
             $user_password = $row ['user_password'];
             $user_firstname = $row ['user_firstname'];
             $user_lastname = $row ['user_lastname'];
             $user_email = $row ['user_email'];
             $user_image = $row ['user_image'];
             $user_role = $row ['user_role'];
            
        }
        
    }


?>
    
<?php 

   if(isset($_POST['edit_profile'])){
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}'";

        $update_user_query = mysqli_query($connection, $query);

        confirm($update_user_query);
        
        
    } 



?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?> 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>
     
                                <form action="" method="post" enctype="multipart/form-data">    


                                <div class="form-group">
                                    <label for="title">First Name</label>
                                    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                                </div>

                               <div class="form-group">
                                    <label for="post_status">Last Name</label>
                                    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user_role">User Role</label>
                                        <select name="user_role" id=""  value="">
                                            <option value="Subscriber"><?php echo $user_role; ?></option>
                                                <?php 

                                                    if($user_role == 'Administrator'){

                                                       echo "<option value='Subscriber'>Subscriber</option>"; 

                                                    }else{
                                                        echo "<option value='Administrator'>Administrator</option>";
                                                    }
                                                ?>
                                        </select>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label for="post_image">Post Image</label>
                                    <input type="file" name="image">
                                </div>
                                -->

                                <div class="form-group">
                                    <label for="title">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                                </div>

                               <div class="form-group">
                                    <label for="post_status">Email</label>
                                    <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="post_tags">Password</label>
                                    <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
                                </div>

                                <div class="form-group">
                                      <input class="btn btn-primary" type="submit" name="edit_profile" value="Update Profile">
                                </div>

                                </form>
                
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
