<?php 
session_start(); 
$sms='';
  if (!empty($_POST['loggin'])) 
{ 
  $conn = new mysqli('localhost','root','','aservis') or die('error database connection'); 

    
    $loggin = $_POST['loggin'];
    $parol= $_POST['parol'];
    $rol = $_POST['rol'];
    $sql = "Select * FROM users where loggin='$loggin' and parol='$parol'"; 
    $result = $conn->query($sql); 
    if(!empty($result))
    {
      $row = mysqli_fetch_assoc($result); 
      $id_user = $row['id_user']; 
      $rol = $row['rol'];
      
      $_SESSION['id_user'] = $id_user; 
      $_SESSION['rol'] = $rol; 

      if ($rol == "админ" )
          { 
          header("Location: admin.php");
          }
        }
      else
          { 
          $sms = "Неверный логин или пароль"; 
          } 
          mysqli_free_result ($result); 
    
}
 include 'temp/headk.php';
 ?>
		<div class="fon1"><h1> </h1></div>
    <section>
           <main class="main">
               <div class="container" style="width: 400px; height: 200px">
                  <div class="row">
                      <div class="col" >
                    <div class="card-deck">
                  <div class="card">
                    <div class="card-footer" style="background-color:#f2f1f0">
                      <h2 style="color: #080808; font-size: 20px;">Авторизация</h2>
                    </div>
                    <div class="card-body" >
 <form method="post" >
 <?php echo '<div>' .$sms.'</div>' ?>
                        <div class="form-group">
                        <label> Введите логин </label>  
				        <input type="text" name="loggin" class="form-control"  placeholder="Логин" requered> 
                        </div>
                        <div class="form-group">  
                        <label> Введите пароль </label>
						<input type="password" name="parol" class="form-control" placeholder="Пароль" requered>
                        </div>
                        <div class="form-group">				
						</div>
                        <div class="form-group">
						<input name="submit" type="submit" class="btn btn-primary" value="Войти">
					</div>
                      </form>
                    </div>        
                  </div> 
                    </div>
                </div>
                </div></div>
                </div>       
                </main>
	</section>
<?php include 'temp/footer.php'; ?>