<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
$valid_formats = array('jpeg', 'jpg', 'png', 'gif', 'PNG'); // valid extensions
if(is_array($_FILES)) {
								
								$name = $_FILES['userImage']['name'];
							    $size = $_FILES['userImage']['size'];
						  list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats)){

						if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
						$sourcePath = $_FILES['userImage']['tmp_name'];
						$targetPath = "uploads/".$_FILES['userImage']['name'];
						if(move_uploaded_file($sourcePath,$targetPath)) {
						?>
						<img src="<?php echo $targetPath; ?>" width="170px" height="170px" />
						<?php
						           $usuFoto=new Usuario($_POST['id_usuario']);
                                 $usuFoto->asignarFoto($name,$_POST['id_usuario']);
					
						}
						}
						} 
						else
						{
							echo '<div style="color:#FFF;">Formato inválido de imagen</div>';
						}
}
?>
