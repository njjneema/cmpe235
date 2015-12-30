
<!doctype html>
<html>
<head>
</head>
<body>
    <h1>Registration(SCREEN 2.3.1)</h1>
    <form name="form_registration" method="post"
	action="processregistration.php">
        <p>
          <img src="" alt="Student Photo" style="width:304px;height:228px">
        </p>
        <p>
          <label>
            <br>
            Username/ID
            <input type="text" name="txt_username" id="txt_username">
          </label>
        </p>
        <p>
          <label>First Name
            <input type="text" name="txt_firstname" id="txt_firstname">
          </label>
        </p>
        <p>
          <label>Last Name
            <input type="text" name="txt_lastname" id="txt_lastname">
          </label>
        </p>
        <p>
          <label>Gender
            <input type="radio" name="gender" value="male" checked>Male
            <input type="radio" name="gender" value="female">Female
          </label>
        </p>
        <p>
          <label>Email
            <input type="text" name="txt_email" id="txt_email" >
          </label>
        </p>
        <p>
          <label>Phone Number
            <input type="text" name="txt_phone" id="txt_phone" >
          </label>
        </p>
        <p>
          <label>Password
            <input type="text" name="txt_password" id="txt_password">
          </label>
        </p>
        <p>
          <label>Confirm Password
            <input type="text" name="txt_confirmPass" id="txt_confirmpass">
          </label>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
