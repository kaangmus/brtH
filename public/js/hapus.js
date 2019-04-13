$("#hapus").click(function () {
  console.log('as');
    var url = $(this).data("url");
    var redirect = $(this).data("redirect");
    var pesan = $(this).data("pesan");
    swal({
      title: "Apakah Kamu Yakin?",
      text: pesan,
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax(
            {
                url: url,
                type: 'DELETE',
                dataType: "JSON",
                data: {},
                success: function (response)
                {
                    if (response.kode='00') {
                        var myVar = setInterval(myTimer, 1200);
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menghapus Item",
                            icon: "success",
                            buttons: false
                        });
                        function myTimer() {
                            window.location.replace(redirect);
                        }
                    } else {
                        swal("Kesalahan Jaringan, Coba beberapa saat lagi", {
                            icon: "error",
                          });
                      console.log(response.message);
                    }
                },
                error: function(xhr) {
                 console.log(xhr.responseText);
               }
            });

      } else {
        swal("Batal untuk menghapus item");
      }
    });
});
