$(function () {
    initDatatable()

})

function initDatatable() {
    const dtOfficers = renderDatatable(
        '#dtOfficers',
        '/api/datatables/officers',
        [
            {
                data: 'uuid', name: 'uuid', class: 'table-fit text-right', orderable: false, searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1
                }
            },
            {
                data: 'image', name:'image', class:'text-center', orderable: false, searchable: false,
                render: function(data, type, row){
                    image = '<img class="img-fluid rounded-circle border border-1 border-primary" src="/img/undraw_profile.svg" height="100" width="100" alt="">';
                    if(data != null){
                        image = '<img class="img-fluid rounded-circle border border-1 border-primary" src="/img/profile-images/'+ data +'" height="100" width="100" alt="">'; 
                    }

                    return image;
                }
            },
            {
                data: 'nik', name:'nik', orderable: true, searchable: true
            },
            {
                data: 'full_name', name:'full_name', orderable: true, searchable: true
            },
            {
                data: 'email', name:'email', orderable: true, searchable: true
            },
            {
                data: 'is_complete', name:'is_complete', class:'text-center', orderable: true, searchable: true,
                render: function(data, type, row){
                    statusBadge = '<span class="badge badge-primary">Terverifikasi</span>';
                    if(data == 0){
                        statusBadge = '<span class="badge badge-danger">Belum Lengkap</span>'; 
                    }else if(data == 1){
                        statusBadge = '<span class="badge badge-warning">Menunggu Verifikasi</span>';
                    }

                    return statusBadge;
                }
            },
            
        ],
        function (data, type, row) {
            const status = row.is_complete
            const path = 'officers/' + row.uuid
            let updateBtn = '',
            detailBtn = '',
            deleteBtn = ''

            // if (permission.update) {
                detailBtn = '<a href="'+ path +'" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                updateBtn = '<a href="'+ path +'/edit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-fw fa-edit"></i></a>'
                if(status === 1){
                    deleteBtn = `<button onclick="updateStatus(${row.id}, '${row.full_name}')" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Verifikasi"><i class="fas fa-fw fa-check"></i></button>`
                }else if(status === 2){
                    deleteBtn = `<button onclick="deleteFunction(${row.id}, '${row.full_name}')" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></button>`
                }else{
                    deleteBtn = `<button onclick="deleteFunction(${row.id}, '${row.full_name}')" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></button>`
                }
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

    setDatatableLengthField(dtOfficers, $('#dtOfficers').parents('.dt-container').find('.dt-length'))
    setDatatableFilterField(dtOfficers, $('#dtOfficers').parents('.dt-container').find('.dt-search'))
    setDatatablePrintButton(dtOfficers, $('#dtOfficers').parents('.dt-container').find('.dt-print'))
    setDatatableExcelButton(dtOfficers, $('#dtOfficers').parents('.dt-container').find('.dt-excel'))
    setDatatablePdfButton(dtOfficers, $('#dtOfficers').parents('.dt-container').find('.dt-pdf'))
}

function deleteFunction(uuid, full_name) {
    Swal.mixin({
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-danger waves-effect waves-light mr-2',
            cancelButton: 'btn btn-default waves-effect waves-light'
        },
        buttonsStyling: false
    }).fire({
        html: `<h4>Hapus Petugas</h4>
        <p class="mb-0">Apakah anda yakin ingin menghapus petugas ${full_name}?</p>`,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('body').append(`
                <form action="officers/${uuid}/delete" method="get" class="d-none" id="delete">
                </form>
            `)

            $('#delete').trigger('submit')
        }
    })
}

function updateStatus(uuid, full_name) {
    Swal.mixin({
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-danger waves-effect waves-light mr-2',
            cancelButton: 'btn btn-default waves-effect waves-light'
        },
        buttonsStyling: false
    }).fire({
        html: `<h4>Ubah Status</h4>
        <p class="mb-0">Apakah anda yakin ingin mengubah status ${full_name}?</p>`,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('body').append(`
                <form action="officers/${uuid}/verify" method="get" class="d-none" id="updateStatus">
                </form>
            `)

            $('#updateStatus').trigger('submit')
        }
    })
}