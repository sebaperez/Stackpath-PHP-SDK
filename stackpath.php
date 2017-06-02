<?php

require_once("netdna/NetDNA.php");

class stackpath {

	private $CONSUMER_KEY = "";
	private $ALIAS = "";
	private $CONSUMER_SECRET = "";
	private $URL = "https://api.stackpath.com/v1";
	public $api;

	public function stackpath($site_id) {
		$this->site_id = $site_id;
		$this->api = new NetDNA($this->ALIAS, $this->CONSUMER_KEY, $this->CONSUMER_SECRET);
		$this->api->netdnarws_url = $this->URL;
	}
	public function deleteFile($file) {
		if ($this->api) {
			$params = array("files" => array($file));
			$result = $this->api->delete("/sites/" . $this->site_id . "/cache", $params);
			return $this->readResult($result, $file);
		}
	}
	public function readResult($result = false, $file = false) {
		if ($result && $file) {
			$json = json_decode($result, true);
			if (isset($json["error"])) {
				if ($json["code"] == "404") {
					var_dump("You tried to remove from cache an non-existent file");
				} else {
					var_dump("An unknown error happened");
				}
				return false;
			} else {
				var_dump("File was removed from cache");
				return true;
			}
		}
	}
}

?>
