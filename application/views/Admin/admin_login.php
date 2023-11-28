<?php include "header.php" ?>
<div class="login-container">
<div class="login-form">
<?php echo form_open('Dashboard/dashboardlogin'); ?> 

    <img src="/Ecommerce_ci/Assets/images/user/form-user.png" alt="logo" id="adminlogo">
    
    <div class="input-container">
        <label for="email">Email <span>*</span></label>
        <input type="email" id="email" name="Adminemail" placeholder="Enter your Email" >
        <span class="text-danger"><?php echo form_error('Adminemail') ?></span>
    </div>

    <div class="input-container">
        <label for="password">Password <span>*</span></label>
        <input type="password" id="password" name="Adminpassword" placeholder="Enter your Password">
        <span class="text-danger"><?php echo form_error('Adminpassword') ?></span>
    </div>

    <?php
    if ($this->session->flashdata('error')) {
        echo '<div class="error text-danger">' . $this->session->flashdata('error') . '</div>';
    }
    ?>

    <button id="submitbtn" type="submit" name="AdminLogin">Login</button>

<?php echo form_close(); ?> 
</div>
</div>

<?php include "footer.php" ?>




