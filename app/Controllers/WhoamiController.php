<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class WhoamiController
{
	public function bul()
	{
		$username = Command::run("whoami");
		return respond($username, 200);
	}
}
