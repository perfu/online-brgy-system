<div class="active_account">
    <form class="account" action="./model/add_user.php" method="POST">
        <div>
            <label for="account_name">Name</label>
            <input type="text" name='username' id="account_name">
        </div>
        <div>
            <label for="account_password">Password</label>
            <input type="password" name='password' id="account_password">
        </div>
        <input type="hidden" id="res_firstname" name="res_firstname">
        <input type="hidden" id="res_middlename" name="res_middlename">
        <input type="hidden" id="res_lastname" name="res_lastname">
        <input type="hidden" id="res_age" name="res_age">
        <input type="hidden" id="res_gender" name="res_gender">
        <input type="hidden" id="res_cstatus" name="res_cstatus">
        <input type="hidden" id="res_street" name="res_street">
        <input type="hidden" id="res_dbirth" name="res_dbirth">
        <input type="hidden" id="res_email" name="res_email">

        <input type="hidden" name="usertype-user" value="user">
        <button type="submit" class="res_submit" id="res_submit">Submit</button>
    </form>
</div>