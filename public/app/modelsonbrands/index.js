$(function () {
    initDatatable()

})

function initDatatable() {
    const dtModelsOnBrands = renderDatatable(
        '#dtModelsOnBrands',
        '/api/datatables/models/brands',
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
                data: 'production_year', name: 'production_year', orderable: true, searchable: true
            },
            {
                data: 'quantity_item', name: 'quantity_item', orderable: true, searchable: true
            },
        ],
        function (data, type, row) {
            // const role = role_id
            const path = 'models/' + row.id
            let updateBtn = '',
            detailBtn = '',
            deleteBtn = ''

                // if(role == 3){
                    // detailBtn = '<a href="'+ path +'/books" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                // }else{
                    detailBtn = '<a href="'+ path +'/models" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                    updateBtn = '<a href="'+ path +'/edit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-fw fa-edit"></i></a>'
                    deleteBtn = `<button onclick="deleteFunction(${row.id}, '${row.name}')" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>`
                // }

            content = detailBtn +' '+ updateBtn + ' '+ deleteBtn

            return content
        },
        
        [[ 1, 'asc' ]],
        function(d) {
            if(brandId){
                d.brandId = brandId
            }
            return d
            },
        function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        },
    )

    setDatatableLengthField(dtModelsOnBrands, $('#dtModelsOnBrands').parents('.dt-container').find('.dt-length'))
    setDatatableFilterField(dtModelsOnBrands, $('#dtModelsOnBrands').parents('.dt-container').find('.dt-search'))
    setDatatablePrintButton(dtModelsOnBrands, $('#dtModelsOnBrands').parents('.dt-container').find('.dt-print'))
    setDatatableExcelButton(dtModelsOnBrands, $('#dtModelsOnBrands').parents('.dt-container').find('.dt-excel'))
    setDatatablePdfButton(dtModelsOnBrands, $('#dtModelsOnBrands').parents('.dt-container').find('.dt-pdf'))
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
        html: `<h4>Hapus Model</h4>
        <p class="mb-0">Apakah anda yakin ingin menghapus model ${name}?</p>`,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('body').append(`
                <form action="/models/${id}/delete" method="get" class="d-none" id="delete">
                </form>
            `)

            $('#delete').trigger('submit')
        }
    })
}