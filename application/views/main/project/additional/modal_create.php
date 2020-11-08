<!-- PROJECT -->

<!-- Modal -->
<div class="modal fade" id="projectModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Create a New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="projectName">Project Name</label>
                        <input type="text" class="form-control" id="projectName" placeholder="Make a Website" required>
                    </div>
                    <div class="form-group">
                        <label for="projectDescription">Project Description</label>
                        <textarea class="form-control" id="projectDescription" rows="3" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="companyName">Company Name</label>
                            <input type="text" class="form-control" id="companyName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="clientName">Client Name</label>
                            <input type="text" class="form-control" id="clientName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputType">Type</label>
                            <select id="inputType" class="form-control" required>
                                <option id="inputOption" selected disabled value>Choose...</option>
                                <option value="1">Private</option>
                                <option value="2">Public</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputDeadline">Deadline</label>
                            <input type="date" class="form-control" id="inputDeadline">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputRules">Rules</label>
                            <select id="inputRules" class="form-control">
                                <option selected disabled value>Choose...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="inviteParticipant">
                            <label class="form-check-label" for="inviteParticipant">
                                Invite Participant
                            </label>
                        </div>
                    </div>
                </form>
                <div id="additionalParticipant"></div>
                <div id="additionalRules"></div>
                <div id="dataRules"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="saveProject" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>



<!-- END PROJECT -->

<!--  -->