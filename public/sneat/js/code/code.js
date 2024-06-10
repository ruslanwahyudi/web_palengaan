$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang terhapus tidak bisa dikembalikan lagi!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = link;
                Swal.fire(
                    'Deleted!',
                    'Data anda sudah terhapus.',
                    'success'
                )
            }
        });
    });

    function berhasilDisimpan(message) {
        Swal.fire({
            title: "Berhasil",
            text: "Data anda berhasil disimpan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "OK",
            cancelButtonText: "Tutup",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = link;
                Swal.fire(
                    'Deleted!',
                    'Data anda sudah terhapus.',
                    'success'
                )
            }
        });
    }
});
