function hapus(action, pesan = 'Item akan dihapus') {
    console.log('has');
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
                $.ajax({
                    url: action,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {},
                    success: function (response) {
                        console.log(response);
                        if (response.kode = '00') {
                            var myVar = setInterval(myTimer, 1200);
                            swal({
                                title: "Berhasil",
                                text: "Berhasil Menghapus Produk",
                                icon: "success",
                                buttons: false
                            });

                            function myTimer() {
                              location.reload();
                            }
                        } else {
                            swal("Kesalahan Jaringan, Coba beberapa saat lagi", {
                                icon: "error",
                            });
                            console.log(response.message);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });

            } else {
                swal("Batal untuk menghapus item");
            }
        });
}
