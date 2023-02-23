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
                    image = '<img class="img-fluid rounded-circle border border-1 border-danger" src="/img/undraw_profile.svg" height="100" width="100" alt="">';
                    if(data != null){
                        image = '<img class="img-fluid rounded-circle border border-1 border-danger" src="'+ data +'" height="100" width="100" alt="">'; 
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
                    statusBadge = '<span class="badge badge-success">Terverifikasi</span>';
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
            const path = 'societies/' + row.uuid
            let updateBtn = '',
            detailBtn = '',
            deleteBtn = ''

            // if (permission.update) {
                detailBtn = '<a href="'+ path +'" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-fw fa-eye"></i></a>'
                updateBtn = '<a href="'+ path +'/edit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-fw fa-edit"></i></a>'
                if(status === 1){
                    deleteBtn = '<a href="'+ path +'/delete" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Verifikasi"><i class="fas fa-fw fa-check"></i></a>'
                }else if(status === 2){
                    deleteBtn = '<a href="'+ path +'/delete" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>'
                }else{
                    deleteBtn = '<a href="'+ path +'/delete" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>'
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

    setDatatableLengthField(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-length'))
    setDatatableFilterField(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-search'))
    setDatatablePrintButton(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-print'))
    setDatatableExcelButton(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-excel'))
    setDatatablePdfButton(dtSociety, $('#dtSociety').parents('.dt-container').find('.dt-pdf'))
}

function updateStatus(id, name) {
    Swal.mixin({
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-primary waves-effect waves-light mr-2',
            cancelButton: 'btn btn-default waves-effect waves-light'
        },
        buttonsStyling: false
    }).fire({
        html: `<h4>Status Jenis Akun</h4>
        <p class="mb-0">Apakah anda yakin ingin mengubah status ${name}?</p>`,
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('body').append(`
                <form action="roles/${id}/edit-status" method="POST" class="d-none" id="updateStatus">
                    <input type="hidden" name="_token" value="${$('meta[name=csrf-token]').attr('content')}">
                    <input type="hidden" name="_method" value="PUT">
                </form>
            `)

            $('#updateStatus').trigger('submit')
        }
    })
}