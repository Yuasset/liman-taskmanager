<?php
namespace App\Controllers;
use Liman\Toolkit\Shell\Command;

class ViewListsController
{
    public function listele()
	{
        $command = Command::run("cd /etc/systemd; ls -la");
        $command = explode("\n", $command);
		array_splice($command, 0, 1);
	   foreach ($command as $key => &$process)
	   {
		   $process = preg_replace('/\s+/', ' ', $process);
		   $process = explode(" ", $process);
		   $process = [
			   "permission" => $process[0],
			   "no" => $process[1],
			   "user" => $process[2],
			   "group" => $process[3],
			   "size" => $process[4],
			   "month" => $process[5],
			   "day" => $process[6],
			   "year" => $process[7],
			   "file" => $process[8]
		   ];
	   }
	   return view("table", [
		   "value" => $command,
		   "display" => ["user", "group", "permission", "size", "day", "month", "year", "file"],
		   "title" => ["Kullanıcı", "Grup", "İzinler", "Boyut", "Gün", "Ay", "Yıl/Saat", "Dosya"]
	   ]);
   }
}