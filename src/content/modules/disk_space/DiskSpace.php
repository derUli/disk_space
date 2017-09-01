<?php
class DiskSpace extends Controller {
	private $moduleName = "disk_space";
	public function accordionLayout() {
		echo Template::executeModuleTemplate ( $this->moduleName, "dashboard" );
	}
}