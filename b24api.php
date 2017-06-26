<?

class b24Api {
	
   function setHost($host){
   	$this->host=trim($host);
   }
   
   function setLogin($login){
   	$this->login=$login;
   }
	
   function setPassword($password){
   	$this->password=$password;
   }

	function leadsAdd($data){
   	$path='/crm/configs/import/lead.php';
      return $this->_request($path, $data);
   }

   function _request($path, $data){
      $data['LOGIN']=$this->login;
      $data['PASSWORD']=$this->password;
      
      $str="";
      foreach ($data as $k=>$item) $strs[]=$k.'='.urlencode($item);
      $str=implode('&',$strs);
   	
      return file_get_contents($this->host.$path.'?'.$str);
   }
}