<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <? $this->load->view('admin/script');  ?>
  </head>
  <body id="login">
    <div class="container">

      <? $arr = array(
                'class' =>'form-signin' 
                );
      echo form_open('admin/dologin',$arr); ?>
        <h2 class="form-signin-heading">Admin Login</h2>
    <? if($status=="error"){ ?>
        <div class="alert alert-danger" role="alert">Username or Password Wrong!</div>
        <? } else {  } ?>        
        <input name="username" type="text" class="input-block-level" placeholder="Username" required>
        <input name="password" type="password" class="input-block-level" placeholder="Password" required>
        <button class="btn btn-large btn-primary" type="submit">Login</button>
      <? echo form_close();  ?>

    </div>  
  </body>
</html>