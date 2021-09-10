<script>

    function taskManager()
    {
        showSwal("Yükleniyor...", "info");
        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error){
            console.log(error);
        });
    }

    function JSGetFileLocation(node)
    {
        showSwal("Aranıyor...", "info");
        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            console.log(error);
        });
    }
    function JSgetOperatingArguments(node)
    {
        showSwal("Çalıştırılıyor...", "info");
        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_operating_arguments') }}", data, function (response) {
            Swal.close();
            showSwal("Servis Başlatıldı","success", 2500);
        }, function (error) {
            console.log(error);
            showSwal("Servis başlatılamadı","error", 2500);
        });
    }
    function JSgetServiceStatus(node)
    {
        showSwal("Sorgulanıyor...", "info");
        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_service_status') }}", data, function (response) {
            response = JSON.parse(response);
            $("#serviceStatusModal").modal("show");
            $("#serviceStatus").html(response.message);
            Swal.close();
        }, function (error) {
            console.log(error);
        });
    }
    function JSgetProcessTree(node)
    {
        showSwal("Taranıyor...", "info");
        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_process_tree') }}", data, function (response) {
            response = JSON.parse(response);
            $("#processTreeModal").modal("show");
            $("#processTree").html(response.message);
            Swal.close();
        }, function (error) {
            console.log(error);
        });
    }
    function JSgetEndProcess(node)
    {
        showSwal("Sonlandırılıyor...", "info");
        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_end_process') }}", data, function (response) {
            Swal.close();
            showSwal("Sonlandırıldı.","error", 2500);
        }, function (error) {
            console.log(error);
        });
    }
    function JSgetTerminateAllProcess(node)
    {
        showSwal("Tanrım, ölüyorum...", "warring");
        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_terminate_all_process') }}", data, function (response) {
            Swal.close();
            showSwal("R.I.P. Services","success", 2500);
        }, function (error) {
            console.log(error);
            showSwal("Beni öldüremezsiniz","error", 2500);
        });
    }
</script>