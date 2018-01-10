<?php
	
	
	Class Waterice{
		private $file = "D:\Modem\Data\Receive\waterice\waterice"; 

		private $ext = ".csv";
		
		function connect(){
			$db = new database();
		}
		
		function ReadFile(){
			$file = fopen($this->file.$this->ext, "r");
			return $file;
		}
		
	
		
		function insertData($data){	
		
			$timestamp				= trim($data[0]);
			$messagedate			= trim($data[1]);
			$MT						= trim($data[2]);
			$sender					= trim($data[3]);
			$sendername				= trim($data[4]);
			$encoding				= trim($data[5]);
			$message				= trim($data[6]);
				
			
			$ds = array('datasend' => $formhubuid, 
					'datarecieve'=> $SubmissionDate,
					'sender'=> $StartDate,
					'sendername'=> $EndDate,
					'encoding'=> $DeviceId,
					'message'=> $Preamblelogo);
			$result = $this->SaveInfo("metadata", $ds);
			
			
		}
		
		function SaveInfo($tbl,$ds){
			$db = new database();
			$result = $db->SaveDate($tbl, $ds);
			return $result;
			
		}
		
	}

?>