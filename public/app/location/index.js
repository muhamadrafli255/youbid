$(function () {
    initDatatable()

})

function initDatatable() {
    const dtLocation = renderDatatable(
        '#dtLocation',
        '/api/datatables/location',
        [
            {
                data: 'id', name: 'id', class: 'table-fit text-right', orderable: false, searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1
                }
            },
            {
                data: 'name', name: 'name', orderable: true, searchable: true
            },
            {
                data: 'full_address', name: 'full_address', orderable: true, searchable: true
            },
        ],
        function (data, type, row) {
            // const role = role_id
            const path = 'location/' + row.id
            let updateBtn = '',
            deleteBtn = ''

                // if(role == 3){
                    // detailBtn = '<a href="'+ path +'/books" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                // }else{
                    updateBtn = '<a href="'+ path +'/edit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-fw fa-edit"></i></a>'
                    deleteBtn = `<button onclick="deleteFunction(${row.id}, '${row.name}')" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>`
                // }

            content =  updateBtn + ' '+ deleteBtn

            return content
        },
        
        [[ 1, 'asc' ]],
        function(d) {
        return d
        },
        function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        },
    )

    setDatatableLengthField(dtLocation, $('#dtLocation').parents('.dt-container').find('.dt-length'))
    setDatatableFilterField(dtLocation, $('#dtLocation').parents('.dt-container').find('.dt-search'))
    setDatatablePrintButton(dtLocation, $('#dtLocation').parents('.dt-container').find('.dt-print'))
    setDatatableExcelButton(dtLocation, $('#dtLocation').parents('.dt-container').find('.dt-excel'))
    setDatatablePdfButton(dtLocation, $('#dtLocation').parents('.dt-container').find('.dt-pdf'))
}

function deleteFunction(id, name) {
    Swal.mixin({
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-danger waves-effect waves-light mr-2',
            cancelButton: 'btn btn-default waves-effect waves-light'
        },
        buttonsStyling: false
    }).fire({
        html: `<h4>Hapus Lokasi</h4>
        <p class="mb-0">Apakah anda yakin ingin menghapus lokasi ${name}?</p>`,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('body').append(`
                <form action="location/${id}/delete" method="get" class="d-none" id="delete">
                </form>
            `)

            $('#delete').trigger('submit')
        }
    })
}
