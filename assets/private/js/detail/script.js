function getDetailProject(id = null){
    $(`#detailPoint${id}`).attr('title', id);
}

function joinProject(id, post){
    $.ajax({
        url:baseurl + 'join/project',
        type:'POST',
        data:{
            id:id,
            post:post,
        },
        success:function(res){
            alert(res)
        },
        error:function(err){
            alert(err.status + ' ' + err.statusText)
        }
    })
}

function editProject(id){
    $.ajax({
        url:baseurl + 'api/getproject',
        type:'POST',
        data:{
            id:id,
        },
        success:function(res){
            let data = JSON.parse(res)
            console.log(data)
        },
        error:function(err){
            alert(err.status + ' ' + err.statusText)
        }
    })
}