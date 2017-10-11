<?php

//表格
class Excel {
	
	//上传表格
	public function import(){
		//echo "这里是导入";die;
			try {
			//submit 要设置变量 ,name
			if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == 'POST') {
				$path = './uploads/excel/';
				$file = $_FILES['file'];
				//var_dump($file);die;
				if($file['type'] == 'application/octet-stream' || $file['type'] == 'application/vnd.ms-excel'){
					@$fileInfo = move_uploaded_file($file['tmp_name'],$path.$_FILES['file']['name']);
					var_dump($fileInfo);die;
					if($fileInfo){
						echo "文件：",$fileInfo,"<br/>";
					}else{
						echo "不存在";
					}

				}else{
					echo "只能表格";
				}


			} else {
				echo 'get';
			};
		} catch (Exception $frank) {
			$frank->getMessage();
			exit;
		}	
	}
	
	//导出表格
	public function derive(){
		try{
			echo "这里是导出表格";
		}catch(Exception $e){
			$e->getMessage();
			exit;
		}
		
	}
	
}

$excel = new Excel;

$value = $_POST['type'];

switch($value){
	case 'import':
	$excel->import();
	break;
	case 'derive':
	$excel->derive();
	break;
	default;
}

