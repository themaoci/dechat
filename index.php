<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>POSM25Uq8v4</title>
        <link rel="stylesheet" href="styl.css" type="text/css" />
    </head>
    <body>
	<DIV id="head_decript" style="position:relative;width:400px;height:25px;background:black;border:1px solid darkred;padding:8px;">
	<form action="<?php $self ?>" method="get">
		<input name="send" type="hidden">encryptPass: <input name="ecript" type="text" cols="20" value="<?php if(isset($_GET['ecript'])){echo $_GET['ecript'];} ?>"> <input type="submit" value=" Decrypt It! ">
	</form>
	</div>
        <div id="strona">
            <div id="boxtop">
			ZLKAckMH4SEzNCGQUsbKz7ck5w
            </div>
            <div id="content">
			
			 <?php
			 if(empty($_GET['ecript'])){$_GET['ecript']=0;}$self = $_SERVER['PHP_SELF'];include('db.php');include('decrypt.php');include('encrypt.php');
        $connect = mysqli_connect($host, $username, $password, $database) or die('<p class="blad">Error b1</p>');
		if(isset($_POST['send']))
    {
        if(empty($_POST['nam']) || empty($_POST['text']))
        {
            echo('<p class="blad">eh set everythink ok ?</p>');
        } 
        else
        {
			$nam = htmlspecialchars(mysqli_escape_string($connect, $_POST['nam'])); 
			$key = htmlspecialchars(mysqli_escape_string($connect, $_POST['key'])); 
            $text = htmlspecialchars(mysqli_escape_string($connect, $_POST['text']));
			$namCODE = $nam;
			$textCODE = $text;
			if($_POST['auth'] == "c2hpbm92"){
            $sql = "INSERT INTO main_table SET nam='".ckcrypt($namCODE,$key)."', text='".ckcrypt($textCODE,$key)."';";
            if (@mysqli_query($connect, $sql))
            {
                echo('<p class="brawo">Added!</p>');
            } 
            else
            {
                echo('<p class="blad">Error i1</p>');
            }
			}else{echo ('<p class="blad">Niemasz uprawnień buraku ;P</p>');}
        }
    }
	if(empty($_GET['d'])){$_GET['d']=0;}
	if($_GET['d']==1){
		if(isset($_GET['id'])){
	$delrecords = "DELETE FROM main_table WHERE `id` =".$_GET['id'];
    if(@mysqli_query($connect, $delrecords)){echo('<p class="brawo">Hidden Access delete_id->'.$_GET['id'].'</p>');}else{echo('<p class="blad">Error d1</p>');}
	$alert_table1="SET @num := 0";
	$alert_table2="UPDATE main_table SET id = @num := (@num+1)";
	$alert_table3="ALTER TABLE main_table AUTO_INCREMENT = 1";
	if(@mysqli_query($connect, $alert_table1)){echo('<p class="brawo">Hidden Access alert_1</p>');}else{echo('<p class="blad">Error a1</p>');}
	if(@mysqli_query($connect, $alert_table2)){echo('<p class="brawo">Hidden Access alert_2</p>');}else{echo('<p class="blad">Error a2</p>');}
	if(@mysqli_query($connect, $alert_table3)){echo('<p class="brawo">Hidden Access alert_3</p>');}else{echo('<p class="blad">Error a3</p>');}
		}
	}
	$query = "SELECT * FROM main_table ORDER BY id ASC LIMIT 20;";
 
    $result = mysqli_query($connect, $query) or die('<p class="blad">Error s1</p>'.print_r($result)); 
	?>
    <ul>
    <?php
    	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $debug_id = stripslashes($row['id']);
        $enam = stripslashes($row['nam']);
        $etext = stripslashes($row['text']);
		$Dkey = $_GET['ecript'];
 $debugid ='';
 if($_GET['d'] == 2){
 $debugid = $debug_id.' -> ';
 }
        echo ('
        <li>
        	<div class="meta">
		<p>'.$debugid.''.ckdecrypt($enam,$Dkey).'</p>
            </div>
			<br>
            <div class="wpis">
            	<p style="word-wrap:break-word;">'.ckdecrypt($etext,$Dkey).'</p>
           	</div>
        </li><br><hr/><br>');
    }
    ?></ul>
	
	<form action="<?php $self ?>?ecript=<?php echo $_GET['ecript'];?>" method="post">
	<div style="position:relative;text-align:center;width:80%;margin:0 auto;">
        <table align=center style="width:100%;"><tr><td>
			<p>Chat Name:</p> <input name="nam" type="text" cols="20" > </td><td>
            <p>Crypt Key:</p> <input name="key" type="text" cols="20" ></td><td>
			<p>Auth Code:</p> <input name="auth" type="text" cols="20" ></td></tr><tr><td colspan=3>
        <textarea style="width:100%;" name="text" rows="5" cols="65"></textarea>
		</td></tr><tr><td colspan=3>
        <input name="send" type="hidden" />
		</td></tr>
		</table>
        <p><input type="submit" value="ENCRYPT EVEN MORE!!" /></p>
		<br/><br/>
		
		</div>
	</form>
	</div>
    </div>
</body>
</html>
