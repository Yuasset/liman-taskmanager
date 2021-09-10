<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "user" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["user", "pid", "cpu", "status", "service", "ram", "command"],
            "title" => ["Kullanıcı", "PID", "% İşlemci", "Durum", "Servis", "% Bellek", "İşlem"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "JSGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Çalıştırma Argümanları" => [
                    "target" => "JSgetOperatingArguments",
                    "icon" => "fa-location-arrow"
                ],
                "İşlem Ağacı" => [
                    "target" => "JSgetProcessTree",
                    "icon" => "fa-location-arrow"
                ],
                "Servis Detayları" => [
                    "target" => "JSgetServiceStatus",
                    "icon" => "fa-location-arrow"
                ],
                "İşlemi Sonlandır" => [
                    "target" => "JSgetEndProcess",
                    "icon" => "fa-location-arrow"
                ],
                "Tüm İşlemleri Sonlandır" => [
                    "target" => "JSgetTerminateAllProcess",
                    "icon" => "fa-location-arrow"
                ]
            ]
        ]);
    }
    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);
        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);
        return respond($location);
    }
    function getOperatingArguments()
    {
        validate([
            "service" => "required|string"
        ]);
        $reStart = Command::runSudo("systemctl restart @{:service}", [
            "service" => request("service")
        ]);
        return respond($reStart);
    }
    function getServiceStatus()
    {
        validate([
            "service" => "required|string"
        ]);
        $serviceStatus = Command::runSudo("systemctl status @{:service}", [
            "service" => request("service")
        ]);
        return respond($serviceStatus);
    }
    function getProcessTree()
    {
        validate([
            "pid" => "required|string"
        ]);
        $processtree = Command::runSudo("ps @{:pid}", [
            "pid" => request("pid")
        ]);
        return respond($processtree);        
    }
    function getEndProcess()
    {
        validate([
            "pid" => "required|numeric"
        ]);
        $kill_me_bro = Command::runSudo("kill @{:pid}", [
            "pid" => request("pid")
        ]);
        return respond($kill_me_bro);
    }
    function getTerminateAllProcess()
    {
        validate([
            "service" => "required|string"
        ]);
        $OMG_Headshot = Command::runSudo("killall -s @{:service}", [
            "service" => request("service")
        ]);
        return respond($OMG_Headshot);
    }
}
