<?php
	class MyClass {
		public $point = 0;
		public $words = array('buku', 'roti', 'meja');
		//public $words = array('buku');
		public $words2 = array('kelapa', 'pulpen' ,'televisi');
		public function setPoin($newval) {
			$this->point = $this->point + $newval;
		}
		public function setAcak($word) {
			return str_shuffle($word);
		}
		public function loop_ask($word) {
			foreach ($word AS $val){
			
				//set new word 
				$acak = $val;
				while($acak == $val) {
					$acak = $this->setAcak($val); // Set a new
				} 
				
				echo "Tebak Kata : $acak \n";
				
				$handle = fopen ("php://stdin","r");
				$line = fgets($handle);
				$line = preg_replace('/\s+/', '', $line);
				
				echo "jawab : " . $line . "\n";
				if($line == $val){
					$this->setPoin(1); 
					echo "BENAR \n";
				}else{
					echo "SALAH Silakan coba lagi\n";
					echo "Jawaban Benar : $val \n";
				}
				echo "point anda : $this->point! \n\n";
			}
		}
	}
	 
	$obj = new MyClass;
	$obj->loop_ask($obj->words);
	if ($obj->point == 3){
		
		echo "Next Level ? (yes/no) : \n";
		$handles = fopen ("php://stdin","r");
		$lines = fgets($handles);
		$lines = preg_replace('/\s+/', '', $lines);
		if($lines == 'yes'){
			$obj->loop_ask($obj->words2);
			if ($obj->point == 6){
				echo 'Good Job ';
			}
		}else{
			echo 'See you later !!';
		}
	}
?>