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
            let data = JSON.parse(res)
            sAlert(data.title, data.subtitle, data.expression)
            start_participant(data.id)
        },
        error:function(err){
            alert(err.status + ' ' + err.statusText)
        }
    })
}

function editProject(id){
    $('#editProject').modal('show')
    $.ajax({
        url:baseurl + 'api/getproject',
        type:'POST',
        data:{
            id:id,
        },
        success:function(res){
            let data = JSON.parse(res)
            $('#projectName').val(data.title)
            $('#projectDescription').val(data.description)
            $('#companyName').val(data.client_company)
            $('#clientName').val(data.client_name)
            $('#inputType').val(data.type)
            $('#inputDeadline').val(data.deadline)
            $('#inputRules').val(data.rules)

            if(data.rules == 1){
                rules_function(data.id)
            }else{
                return 0;
            }
        },
        error:function(err){
            show_error(err)
        }
    })
}

function start_rules(id){
    let rules = ''
    let table = ''
    $.ajax({
        url : baseurl + 'api/getrule',
        type : 'GET',
        data:{
            idp:id,
        },
        success:function(res){
           let data = JSON.parse(res)
           if ($.isArray(data)) {
               data.forEach(rule =>{
                   rules += `
                   <div class="form-row">
                   <div class="form-group col-md-6">
                   <input disabled type="text" class="form-control"  value="${rule.param}">
                   </div>
                   <div class="form-group col-md-6">
                   <input disabled type="text" class="form-control" value="${rule.value}">
                   </div>
                   </div>
                   `
                   table += `
                    <tr>
                        <td>${rule.param}</td>
                        <td>${rule.value}</td>
                    </tr>
                   `
               })
               
           }else{
               rules = data;
           }
           $('#dataRules').html(rules)
           $('#TableRules').html('<tbody>' + table + '</tbody>')
        },
        error:function(err){
           show_error(err)
        }
    })
}


function start_participant(idp){
    let br = '<i class="ml-2"></i>'
    let pic = '' 
    let participant = '' 
    $.ajax({
        url:baseurl + 'useraccess/project',
        type:'POST',
        data:{
            project_id : idp
        },
        success:function(res){
            if(res == 0){
                image = `Project not found`
           }else{
               let data = JSON.parse(res)
                data.forEach(datas => {
                    if(datas.position == 'pic'){
                        pic += `
                           <img src="${baseurl}assets/private/img/users/${datas.image}" alt="user-img" class="rounded-circle" style="width: 30px; height:30px;"><sup><i class="fa fa fa-check text-success"></i></sup>
                        `
                   }else{
                       participant += `
                          <img src="${baseurl}assets/private/img/users/${datas.image}" alt="user-img" class="rounded-circle" style="width: 30px; height:30px;">
                       `
                    }
                })
            }
            $('#cardParticipant').html(pic + br + participant);
        },
        error:function(err){
           show_error(err)
        }
     })
 }

 

 function eventMod(parent, child, even){
    $(`#${parent}`).on(even, `#${child}`, function(){
        if($(this).attr('disabled')){
            alert('Save project and try again')
        }else{
            // console.log('ohh oke');
        }
    })
 }

 function participant_project(idp){
     let pic = ''
     let participant = ''
     let br = '<i class="ml-2"></i>'
     $.ajax({
         url:baseurl + 'useraccess/project',
         type:'POST',
         data:{
             project_id : idp
         },
         success:function(res){
             if(res == 0){
                 image = `Project not found`
            }else{
                let data = JSON.parse(res)
                 data.forEach(datas => {
                     if(datas.position == 'pic'){
                         pic += `
                            <img src="${baseurl}assets/private/img/users/${datas.image}" alt="user-img" class="rounded-circle" style="width: 30px; height:30px;"><sup><i class="fa fa-2x fa-check text-success"></i></sup>
                         `
                    }else{
                        participant += `
                           <img src="${baseurl}assets/private/img/users/${datas.image}" alt="user-img" class="rounded-circle" style="width: 30px; height:30px;">
                        `
                     }
                 })
             }
             $('#participantProject').html(pic + br + participant);
         },
         error:function(err){
             alert(`${err.status} ${err.statusText}`)
         }
    })
 }

$(document).ready(function(){
    const id = $('#idProjectGoal').data('id')
    start_participant(id);

    $('#inviteParticipant').on('change', function(){
        let par = ''
        if($(this).prop('checked')){
            participant_project(id)
            if(id == undefined){
                par = 'disabled'
            }else{
                par = '';
            }
            let option = `
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="addParticipant">Add Participant </label>
                    <input type="text" list="participant" class="form-control" id="addParticipant" ${par}>
                    <datalist id="participant">
                        <option value="member">Member</option>
                        <option value="rizkan">rizkan</option>
                        <option value="rafli">rafli</option>
                        <option value="riri">riri</option>
                    </datalist>
                </div>
                <div class="form-group col-md-6">
                    <label for="position">Position </label>
                    <select class="form-control" id="position" disabled>
                        
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="param">Participant</label>
                    <br>
                    <small class="card-link" id="participantProject">
                        
                    </small>
                </div>
            </div>
                <a class="badge badge-secondary" id="insertParticipant"><i class="fas fa-plus text-white"></i></a>
            `
            $('#additionalParticipant').html(option)
        }else{
            $('#additionalParticipant').html(' ')
        }
    })

    
    $('#additionalParticipant').on('change', '#addParticipant', function(){
        $.ajax({
            url : baseurl + 'useraccess/position',
            type: 'POST',
            data:{
                username : $(this).val()
            },
            success:function(res){
                let data = JSON.parse(res)
                let option = ''
                data.forEach(datas => {
                    option += `
                        <option value="${datas}">${datas}</option>
                    `
                })

                $('#position').removeAttr('disabled')
                $('#position').html(option)
            },
            error:function(err){
                alert(`${err.status} ${err.statusText}`)
            }
        })
    })

    $('#saveProject').on('click', function(){
        let name = $('#projectName').val()
        let desc = $('#projectDescription').val()
        let company = $('#companyName').val()
        let client = $('#clientName').val()
        let type = $('#inputType').val()
        let deadline = $('#inputDeadline').val()
        let rule = $('#inputRules').val()

        if(name == ""){
            $('#projectName').attr('placeholder', 'Kolom Tidak Boleh Kosong')
        }else if(desc == ""){
            $('#projectDescription').attr('placeholder', 'Kolom Tidak Boleh Kosong')
        }else if(company == ""){
            $('#companyName').attr('placeholder', 'Kolom Tidak Boleh Kosong')
        }else if(client == ""){
            $('#clientName').attr('placeholder', 'Kolom Tidak Boleh Kosong')
        }else if(type == null){
            $('#inputOption').text('Kolom Tidak Boleh Kosong')
        }else{
            $.ajax({
                url:baseurl + 'project/insert',
                type:'POST',
                data:{
                idp : id,
                title : name,
                description : desc,
                client_company : company,
                client_name : client,
                type : type,
                deadline : deadline,
                rules : rule,
                status : 2,
                create_by : 'rizkan',
                create_at : dateNow,
                },
                success:function(res){
                    let data = JSON.parse(res)
                    window.location.replace(currentURL);
                },
                error:function(err){
                    show_error(err)
                }
            })
        }
    })

    eventMod('additionalParticipant', 'addParticipant', 'dblclick')
    eventMod('additionalRules', 'rule', 'dblclick')
    eventMod('additionalRules', 'param', 'dblclick')

    
    $('#inputRules').on('change', function(){
        let val = $(this).val()
        
        if(val == 1){
            rules_function(id)
        }else{
            $('#additionalRules').html('')
            $('#dataRules').html('')
        }
    })

    
    $('#additionalRules').on('click', '#addRule', function(){
        if(id == undefined){
            alert('Save project and Try again')
        }else{
            $.ajax({
                url : baseurl + 'rule/insert',
                type : 'POST',
                data:{
                    project_id : id,
                    param : $('#rule').val(),
                    value : $('#param').val(),
                    create_by : 'rizkan',
                },
                success:function(res){
                    start_rules(id)
                },
                error:function(err){
                    show_error(err)
                }
            })
        }
    })
})

// 

function rules_function(id){

    let disabled = ''
        if(id == undefined){
            disabled = 'disabled'
        }
        
    let option = `
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-muted">Additional Rules</h5>
                </div>
                <div class="col-md-6 text-right">
                    <a class="badge badge-secondary" id="addRule"><i class="fas fa-plus text-white"></i></a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rule">Rule</label>
                    <input type="text" class="form-control" id="rule" ${disabled}>
                </div>
                <div class="form-group col-md-6">
                    <label for="param">Param</label>
                    <input type="text" class="form-control" id="param" ${disabled}>
                </div>
            </div>
            `
    start_rules(id)
    $('#additionalRules').html(option)
}

function deleteProject(id){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this project file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                button: false,
              });
            setTimeout(() => {
                $.ajax({
                    url:baseurl + 'project/delete',
                    type:'POST',
                    data:{
                        id:id
                    },
                    success:function(res){
                            window.location.replace(currentURL);
                    },
                    error:function(err){
                        show_error(err)
                    }
                })
            }, 1250);
        } else {
          swal("Your project file is safe!");
        }
      });
   
}