function start_role(){
    $.ajax({
        url:baseurl + 'api/postdata',
        type:'POST',
        data:{
            table:
            ['role', 'user'],
            param:null,
            type:null,
        },
        success:function(res){
            let option = ''
            // let data = JSON.parse(res)
            // console.log(res);
        },
        error:function(err){
            alert(`${err.status} ${err.statusText}`)
        }
    })
}


$(document).ready(function(){
    start_role()

    let dataload = new $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            url:baseurl + 'datatable/table/user',
            type: 'POST',
            dataType: 'JSON',
        },
        columns: [{
                data: 'username',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'email',
                orderable: true,
                className: 'text-left'
            },
            {
                data: 'image',
                orderable: true,
                className: 'text-left'
            },
            {
                data: 'status',
                orderable: true,
                className: 'text-left'
            },
            {
                data: 'role_id',
                orderable: true,
                className: 'text-center'
            },
            {
                data: 'create_at',
                orderable: false,
                className: 'text-right'
            },
            {
                data: 'updated',
                orderable: false,
                className: 'text-right'
            },
        ],
    })
})