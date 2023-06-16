<script>
    function deleteItem(e){
        let id = e.getAttribute('data-id');

        swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        }).then((result) => {
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "barangs/" + id,
                    data: {"_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        swal({
                            title: "Data berhasil di hapus!",
                            type: "success",
                        });
                        location.reload();
                    }
                });
            }else{
                swal({
                    title: "Data gagal di hapus!",
                    type: "error",
                });
                location.reload();
            }
        });
    }
</script>