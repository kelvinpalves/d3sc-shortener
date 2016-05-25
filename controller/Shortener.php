<?php 

class Shortener {

	private $smarty;
	private $connect;

	public function __construct ($smarty, $connect) {
		$this->smarty = $smarty;
		$this->connect = $connect;
	}

	public function page() {
		$this->smarty->assign('exec', false);
		$this->smarty->display('home.tpl');
	}

	public function save() {
		$descShort = new DescShort();
		$descShort->setShortUrlCode($this->generateUrlCode(6));
		$descShort->setShortOwnerIp($_SERVER['REMOTE_ADDR']);
		$descShort->setShortUrlBase($_POST['shorter_new']);
		$descShort->setShortBaseUrl(Config::URL);

		$descShortService = new descShortService($this->connect);
		$array = $descShortService->findData($descShort->getShortUrlCode());

		if (count($array) == 0) {
			if ($descShortService->insert($descShort)) {
				$this->smarty->assign('descShort', $descShort);
				$this->smarty->assign('exec', true);
				$this->smarty->display('home.tpl');
			} else {
				print "Error";
			}
		} else {
			$this->save();
		}
	}

	public function generateUrlCode($size){
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $return= "";
        for($count= 0; $size > $count; $count++){
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }
        return $return;
    }

    public function redirectWebCode($request) {
    	$descShortService = new descShortService($this->connect);
		$array = $descShortService->findData($request);

		if (count($array) == 0) {
			$this->smarty->display('deleted.tpl');
		} else {
			foreach ($array as $key => $value) {
				$descShortService->update($request);
				header('HTTP/1.1 302 Moved Temporarily');
    			header("Location:". $value['short_url_base']);
			}
		}
    }

}