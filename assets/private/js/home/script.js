function start_timeline(){
    let html = '';
    html = `
    <div class="white-box">
        <div class="row">
            <h3 class="box-title mb-0">Recent Comments</h3>
            <h3 class="box-title ml-auto mr-2"><a href="#" class=" text-secondary" id="closeTimeline">X</a></h3>
        </div>
        <div class="comment-center">
            <div class="comment-body d-flex" id="cobaAppend">
                <div class="user-img"> <img src="${baseurl}assets/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle">
                </div>
                <div class="mail-contnet">
                    <h5>Pavan kumar</h5><span class="time">10:20 AM 20 may 2016</span>
                    <br>
                    <div class="mb-3 mt-3">
                        <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque
                            pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui
                            pellentesque molestie feugiat. Aenean commodo dui </span>
                    </div>
                    <a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline mb-2 mb-md-0 m-r-5"><i class="ti-check text-success m-r-5"></i>Approve</a>
                    <a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i>
                        Reject</a>
                    <a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline" id="clickAppend"><i class="ti-comment text-danger"></i>
                        Reply</a>
                </div>
            </div>
            <div class="comment-body d-flex">
                <div class="user-img"> <img src="${baseurl}assets/plugins/images/users/sonu.jpg" alt="user" class="img-circle">
                </div>
                <div class="mail-contnet">
                    <h5>Sonu Nigam</h5><span class="time">10:20 AM 20 may 2016</span>
                    <br>
                    <div class="mb-3 mt-3">
                        <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque
                            pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui
                            pellentesque molestie feugiat. Aenean commodo dui </span>
                    </div>
                </div>
            </div>
            <div class="comment-body d-flex border-0">
                <div class="user-img"> <img src="${baseurl}assets/plugins/images/users/arijit.jpg" alt="user" class="img-circle">
                </div>
                <div class="mail-contnet">
                    <h5>Arijit singh</h5><span class="time">10:20 AM 20 may 2016</span>
                    <br>
                    <div class="mb-3 mt-3">
                        <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque
                            pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui
                            pellentesque molestie feugiat. Aenean commodo dui </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `

    $('#recent-timeline').html(html);
}

$(document).ready(function () {

    $('#projectListing').on('click', '.klikForDetail', function () {
        let data = $(this).data('id')
		window.location.href = `${baseurl}id/detail?nampage=ajwdhwaudh&idp=${data}`
    })
    
    
	$('#projectListing').on('click', '.klikForTimeline', function () {
        start_timeline()
    })
    
	$('#recent-timeline').on('click', '#closeTimeline', function () {
        $('#recent-timeline').html('');
    })

	let option = ` 
    <div class=" row" id="cobaHapus" style="padding:15px;">
    <textarea name = "text"
    id = "text"
    cols = "1"
    rows = "5"
    class = "form-control"
    style = "margin:10px; width:95%;"> </textarea> <button type = "button"
    class = "btn btn-success btn-sm btn-rounded"
    style = "margin-left:10px;"> Submit </button> </div>
        `
	$('#recent-timeline').on('click','#clickAppend', function () {
		$('#cobaAppend').after(option);
		$(this).addClass('d-none')
	})

})
