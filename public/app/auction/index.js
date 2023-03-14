$(function () {
    initDatatable()

})

function initDatatable() {
    const dtAuctions = renderDatatable(
        '#dtAuctions',
        '/api/datatables/auctions',
        [
            {
                data: 'id', name: 'id', class: 'table-fit text-right', orderable: false, searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1
                }
            },
            {
                data: 'lot_name', name: 'lot_name', orderable: true, searchable: true
            },
            {
                data: 'initial_price', name: 'initial_price', orderable: true, searchable: true,
                render: function(data, type, row){
                    var rupiah = '';	
                    var jumlah = row.initial_price;	
                    var angkarev = jumlah.toString().split('').reverse().join('');
                    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
                    return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
                }
            },
            {
                data: 'location', name: 'location', orderable: true, searchable: true
            },
            {
                data: 'status', name: 'status', orderable: true, class:'table-fit text-center', searchable: true,
                render: function(data, type, row){
                    if(row.status == 0){
                        badge = '<span class="badge badge-danger">Ditutup</span>'; 
                    }else{
                        badge = '<span class="badge badge-primary">Dibuka</span>'; 
                    }
                    return badge;
                }

            },
        ],
        function (data, type, row) {
            // const role = role_id
            const path = 'auctions/' + row.id
            let updateBtn = '',
            detailBtn = '',
            deleteBtn = ''

                // if(role == 3){
                    // detailBtn = '<a href="'+ path +'/books" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                // }else{
                    detailBtn = '<a href="'+ path +'" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                    updateBtn = '<a href="'+ path +'/edit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-fw fa-edit"></i></a>'
                // }

            content = detailBtn +' '+ updateBtn + ' '+ deleteBtn

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

    setDatatableLengthField(dtAuctions, $('#dtAuctions').parents('.dt-container').find('.dt-length'))
    setDatatableFilterField(dtAuctions, $('#dtAuctions').parents('.dt-container').find('.dt-search'))
    setDatatablePrintButton(dtAuctions, $('#dtAuctions').parents('.dt-container').find('.dt-print'))
    setDatatableExcelButton(dtAuctions, $('#dtAuctions').parents('.dt-container').find('.dt-excel'))
    setDatatablePdfButton(dtAuctions, $('#dtAuctions').parents('.dt-container').find('.dt-pdf'))
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
        html: `<h4>Hapus Lot</h4>
        <p class="mb-0">Apakah anda yakin ingin menghapus lot ${name}?</p>`,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('body').append(`
                <form action="lots/${id}/delete" method="get" class="d-none" id="delete">
                </form>
            `)

            $('#delete').trigger('submit')
        }
    })

}