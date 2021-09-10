<?php

use App\Controllers\TaskManagerController;

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    // Task Manager Routes
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_operating_arguments" => "TaskManagerController@getOperatingArguments",
    "get_service_status" => "TaskManagerController@getServiceStatus",
    "get_process_tree" => "TaskManagerController@getProcessTree",
    "get_end_process" => "TaskManagerController@getEndProcess",
    "get_terminate_all_process" => "TaskManagerController@getTerminateAllProcess",

    //ViewLists Routes
    "PHPViewLists" => "ViewListsController@listele",

    //Whoami Routes
    "PHPWhoami" => "WhoamiController@bul"
];
