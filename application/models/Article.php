<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Article extends CI_Model{
	public function getNextId(){
		$sql = "SHOW TABLE STATUS LIKE 'article'";
        $query = $this->db->query($sql);
        $row = $query -> result_array();
        return $row[0]['Auto_increment'];
	}
	public function insert($id, $titre,$descri,$image,$auteur){
		$titre = str_replace("'", "''", $titre);
		$descri = str_replace("'", "''", $descri);
		$auteur = str_replace("'", "''", $auteur);
		$query = "insert into article (id,titre,description,image,date,auteur) values (%d,'%s','%s','%s',NOW(),'%s')";
		$query = sprintf($query,$id,$titre,$descri,$image,$auteur);
		$this->db->query($query);
	}

	public function update($id,$titre,$descri,$imageName,$auteur,$date){
		$titre = str_replace("'", "''", $titre);
		$descri = str_replace("'", "''", $descri);
		$auteur = str_replace("'", "''", $auteur);

		$sql = "UPDATE article SET id=".$id;
		if (!empty($titre)) {
            $sql .= " , ";
            $sql .= "titre = '" . $titre . "'";
        }
        if (!empty($descri)) {
            $sql .= " , ";
            $sql .= " description = '".$descri."'";
        }
        if (!empty($imageName)) {
            $sql .= " , ";
            $sql .= "image = '" . $imageName . "'";
        }
        if (!empty($auteur)) {
            $sql .= " , ";
            $sql .= "auteur = '" . $auteur . "'";
        }
		if (!empty($date)) {
            $sql .= " , ";
            $sql .= "date = '" . $date . "'";
        }
		$sql .= " WHERE id=".$id; 
        $this->db->query($sql);
	}

	public function delete($id){
		$query = "DELETE FROM article WHERE id=%d ";
		$query = sprintf($query,$id);
		$this->db->query($query);
	}

	public function updateUrl($id)
	{
		$last = $this->Article->getArticle($id);
		$titre = str_replace("'", "''", $last['titre']);
		$url = 'rechauffement-climatique/'.str_replace(' ','-',$titre).'-'.$last['id'];
		$query = "update article set url='%s' where id=%d";

		$query = sprintf($query,$url,$last['id']);

		$this->db->query($query);
	}

    public function getAll(){
        $sql = "SELECT * FROM Article";
        $query = $this->db->query($sql);
        $row = $query -> result_array();
        return $row;
	}

	public function getArticle($id){
		$sql = "SELECT * FROM article where id=%d";
		$sql = sprintf($sql,$id);
        $query = $this->db->query($sql);
        $row = $query -> result_array();
        return $row[0];
	}

	public function uploadImage($img,$submit){
		$target_dir = "D:/xampp/htdocs/S6/rechauffementClimatique/assets/img/";
		$target_file = $target_dir . basename($_FILES[$img]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($submit)) {
		$check = getimagesize($_FILES[$img]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			return "File is not an image.";
			$uploadOk = 0;
		}
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		return "Sorry, file already exists.";
		$uploadOk = 0;
		}

		// Check file size
		// if ($_FILES[$img]["size"] > 500000) {
		// return "Sorry, your file is too large.";
		// $uploadOk = 0;
		// }

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		return "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		if (move_uploaded_file($_FILES[$img]["tmp_name"], $target_file)) {
			return "The file ". htmlspecialchars( basename( $_FILES[$img]["name"])). " has been uploaded.";
		} else {
			return "Sorry, there was an error uploading your file.";
		}
		}
	}
	function misyLeURL($uri){
        $req = "SELECT * FROM article where url='%s'";
        $req = sprintf($req,$uri);

		$query = $this->db->query($req);
        $row = $query -> result_array();
        if (count($row)>0){
            return true;
        }
        return false;
    }


     function explodeURI( $uri){

		$str2 = substr($_SERVER['PATH_INFO'], strpos($_SERVER['PATH_INFO'],'/ArticleCtrl/')+strlen('/ArticleCtrl/')   );
		return $str2;
		
    }

	

}