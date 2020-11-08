function start_projectList(type = 2, text = 'public', idt = null) {
    return new Promise ( Callback => { 
    let option = ''
     let status = ''
     let idp = []
     let loader = `
        <div class="row">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
     `
     $('#projectList').html(loader)
     $('#box-title').html(text)
     setTimeout(() => {
           $.ajax({
            url:baseurl+'api/getdata',
            tye:'GET',
            dataType:'JSON',
            data:{
                table:'project',
                type:type,
                param:'type',
            },
            success:function(res){
                res.forEach(data => {
                    if (data.status == 0) {
                        status = 'danger';
                    } else if (data.status == 1) {
                        status = 'success';
                    }else{
                        status = 'warning';
                    }
                    option += `
                        
                    <!-- START -->
                    <div class="col-lg-4 col-12">
                    <div class="card shadow card-width-rem">
                            <div class="card-header">
                            <div class="row">
                                    <h5 class="card-title">${data.client_company}</h5>
                                    <i class="fas fa-circle ml-auto text-${status}"></i>
                                </div>
                                </div>
                            <div class="card-body">
                            <h5 class="card-title">${data.title}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">${data.create_at}</h6>
                                <p class="card-text">${data.description}</p>
                                <div id="cardParticipant-${data.idp}">
                                    <small class="card-link">
                                        <img src="${baseurl}assets/private/img/image.gif" alt="user-img" class="rounded-circle" style="width: 25px;">
                                    </small>
                                </div>
                            </div>
                            <div class="card-footer">
                            <div class="row">
                                    <div class="col-6 text-left">
                                    <a href="#" class="card-link ">Take It</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="${baseurl}id/detail?title=${data.title}&idp=${data.idp}" class="card-link m-3">Detail</a>
                                        </div>
                                        </div>
                            </div>
                            </div>
                    </div>
                    <!-- END -->

                    
                    `
                    idp.push(data.idp)
                });
                
                $('#projectList').html(option)
                if (idt != null) {
                    Callback(idp)
                }else{
                    idp.forEach(id =>{
                        start_participant(id)
                    })
                }
            },
            error:function(err) {
                show_error(err);
            }
          })
        }, 500);
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
            $('#cardParticipant-'+idp).html(pic + br + participant);
        },
        error:function(err){
           show_error(err)
        }
     })
 }

 function show_error(err){
    return alert(`${err.status} ${err.statusText}`)
 }

 function start_rules(idp){
     let rules = ''
     $.ajax({
         url : baseurl + 'api/getrule',
         type : 'GET',
         data:{
             idp:idp,
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
                })
            }else{
                rules = data;
            }
            $('#dataRules').html(rules)
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

    // ============================================================================================

$(document).ready(async function () {
    let idp = await start_projectList(2,'public',1)
    idp.forEach(id => {
        start_participant(id)
    });

    $('#btnCreate').on('click', function(){
        $('#projectModal').modal('show')
        // swal()
    })

    $('#inputRules').on('change', function(){
        let val = $(this).val()
        let index = $(this).index(this)
        let idp = $(this).data('id')
        let disabled = ''
        if(idp == undefined){
            disabled = 'disabled'
        }
        
        if(val == 1){
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
            start_rules(idp)
            $('#additionalRules').html(option)
        }else{
            $('#additionalRules').html('')
            $('#dataRules').html('')
        }
    })

    $('#inviteParticipant').on('change', function(){
        let par = ''
        let idp = $(this).data('id')
        if($(this).prop('checked')){
            participant_project(idp)
            if(idp == undefined){
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
                idp : $('#inviteParticipant').data('id'),
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
                    start_projectList()
                    $('#inviteParticipant').attr('data-id', data.id)
                    $('#inputRules').attr('data-id', data.id)
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

    $('#additionalParticipant').on('click', '#insertParticipant', function(){
        let user_id = $('#addParticipant').val()
        let position = $('#position').val()
        let project_id = $('#inviteParticipant').data('id')

        if(project_id == null || user_id == "" || position == "" ){
            alert('Project not found or user not completed, Try Again!')
        }else{
            $.ajax({
                url:baseurl + 'participant/insert',
                type:'POST',
                data:{
                    project_id: project_id,
                    user_id: user_id,
                    position: position,
                },
                success:function(res){
                    let id = $('#inviteParticipant').data('id')
                    participant_project(id)
                },
                error:function(err){
                    show_error(err)
                }
            })
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

    $('#additionalRules').on('click', '#addRule', function(){
        let idp = $('#inviteParticipant').data('id')
        if(idp == undefined){
            alert('Save project and Try again')
        }else{
            $.ajax({
                url : baseurl + 'rule/insert',
                type : 'POST',
                data:{
                    project_id : idp,
                    param : $('#rule').val(),
                    value : $('#param').val(),
                    create_by : 'rizkan',
                },
                success:function(res){
                    start_rules(idp)
                },
                error:function(err){
                    show_error(err)
                }
            })
        }
    })

})

// FUNCTION External
 function start_modal(){
    $('#projectModal').modal('show')
 }
