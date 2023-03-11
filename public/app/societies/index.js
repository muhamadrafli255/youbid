$(function () {
    initDatatable()

})

function initDatatable() {
    const dtSociety = renderDatatable(
        '#dtSociety',
        '/api/datatables/societies',
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
            var uuid    =   row.id;
            var full_name = row.full_name;
            const status = row.is_complete
            const path = 'societies/' + row.uuid
            let updateBtn = '',
            detailBtn = '',
            deleteBtn = ''

            // if (permission.update) {
                detailBtn = '<a href="'+ path +'" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                updateBtn = '<a href="'+ path +'/edit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-fw fa-edit"></i></a>'
                if(status === 1){
                    deleteBtn = `<button onclick="updateStatus(${uuid}, '${row.full_name}')" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Verifikasi"><i class="fas fa-fw fa-check"></i></button>`
                }else if(status === 2){
                    deleteBtn = `<button onclick="deleteFunction(${uuid}, '${row.full_name}')" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></button>`
                }else{
                    deleteBtn = `<button onclick="deleteFunction(${uuid}, '${row.full_name}')" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></button>`
                }
            // } 

            content = detailBtn +' '+ updateBtn + ' '+ deleteBtn

            return content
            console.log(full_name)
        },
        
        [[ 1, 'asc' ]],
        function(d) {
        return d
        },
        function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        },
    )

    setDatatableLengthField(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-length'))
    setDatatableFilterField(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-search'))
    setDatatablePrintButton(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-print'))
    setDatatableExcelButton(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-excel'))
    setDatatablePdfButton(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-pdf'))
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
        html: `<h4>Hapus Masyarakat</h4>
        <p class="mb-0">Apakah anda yakin ingin menghapus masyarakat ${full_name}?</p>`,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('body').append(`
                <form action="societies/${uuid}/delete" method="get" class="d-none" id="delete">
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
                <form action="societies/${uuid}/verify" method="get" class="d-none" id="updateStatus">
                </form>
            `)

            $('#updateStatus').trigger('submit')
        }
    })
}