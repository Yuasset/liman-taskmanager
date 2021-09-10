<script>
    function whoami() //index.blade.php dosyasında ilgili divin içindeki onclick() metodunun içindeki fonksiyon adı ile aynıdır.
    {
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{ API('PHPWhoami') }}", data, function(response){ //PHPWhoami ,routes.php dosyasında controller@fonksiyonu tanımlayan eşittirin solunda kalan etiken adıdır
            response = JSON.parse(response);
            $('#whoami-Main_').html(response.message); //#Main_ İşaretçisi main.blade.php dosyasına yönlendirir
            Swal.close();
        },
        function(response)
        {
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
</script>

