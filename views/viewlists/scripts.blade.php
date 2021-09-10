<script>
    function viewLists()
    {
        showSwal("{{__('Listeleniyor...')}}", 'info');
        let data = new FormData();
        request("{{ API('PHPViewLists') }}", data, function(response)
        {
            $("#viewlists-Main_").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) { console.log(error); });
    }
</script>