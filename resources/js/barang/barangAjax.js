$(function () {
    var table = $('.barang-table').DataTable({
        lengthMenu: [[5], [5]],
        processing: true,
        serverSide: true,
        ajax: barangIndex,
        columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
        },
        {
            data: 'kode',
            name: 'kode',
        },
        {
            data: 'kategori',
            name: 'kategori',
        },
        {
            data: 'nama',
            name: 'nama',
        },
        {
            data: 'jumlah',
            name: 'jumlah',
        },
        {
            data: 'satuan',
            name: 'satuan',
        },
        {
            data: 'action',
            name: 'action',
            sortable: false,
            searchable: false,
        },
    ]
    });

    $('#addBarang').click(function () {
        $('#exampleModalLabel').html("Tambah Barang");
        $('.error-message').remove();
        $('#saveBarang').show();
        $('#updateBarang').hide();
        $('#saveBarang').val("create-barang");
        $('#barang_id').val('');
        $('#barangForm').trigger('reset');
        $('#barangModal').modal('show');
    })

    $('#saveBarang').click(function (e) {
        e.preventDefault();

        var formData = new FormData($("#barangForm")[0]);

        var url = barangStore;
        var method = "POST";

        $.ajax({
            data: formData,
            processData: false,
            contentType: false,
            url: url,
            type: method,
            dataType: 'json',
            success: function (data) {
                $('#barangForm').trigger("reset");
                $('#barangModal').modal('hide');
                table.draw();
                Swal.fire({
                    title: "Success!",
                    text: "Barang Berhasil Ditambahkan",
                    icon: "success",
                    timer: 3000
                });
            },
            error: function(response) {
                $('.error-message').remove();

                if (response.responseJSON && response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function(field, messages) {
                        $.each(messages, function(index, message) {
                            $('#' + field).after('<span class="text-danger error-message">' + message + '</span>');
                        });
                    });
                } else {
                    console.log('Error:', response);
                }
            }
        });
    });

    $('body').on('click', '.editBarang', function () {
        var barang_id = $(this).data('id');
        $.get(barangShow.replace('barang_id', barang_id), function (data) {
            $('#exampleModalLabel').html("Edit Barang");
            $('#saveBarang').hide();
            $('#updateBarang').show();
            $('#updateBarang').val("edit-barang");
            $('#barangModal').modal('show');
            $('#barang_id').val(data.id);
            $('#nama').val(data.nama);
            $('#kd_kategori').val(data.kd_kategori);
            $('#kd_satuan').val(data.kd_satuan);
            $('#jumlah').val(data.jumlah);
        });
    });

    $('#updateBarang').click(function(e) {
        e.preventDefault();

        var barang_id = $('#barang_id').val();
        var url = barangUpdate.replace('barang_id', barang_id);
        var method = 'PUT';

        var formData = new FormData($('#barangForm')[0]);
        formData.append('_method', method);

        $.ajax({
            data: formData,
            url: url,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {
                $('#barangForm').trigger("reset");
                $('#barangModal').modal('hide');
                table.draw();
                Swal.fire({
                    title: "Success!",
                    text: "Barang Berhasil di perbaharui",
                    icon: "success",
                    timer: 3000
                });
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });

})
