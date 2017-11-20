@include('common-head')
@include('admin/admin-head')

<div class="container">
    <div class="row">
        <h2>New Team</h2>
        <p><strong>Manually Add</strong></p>
        <div class="col-xs-3 form-group">
            <label for="team-number">Team #:</label>
            <input class="form-control" type="text" id="team-number" placeholder="Default input">
        </div>

        <div class="col-xs-8 form-group">
            <label for="team-name">Team Name:</label>
            <input class="form-control" type="text" id="team-name" placeholder="Default input">
        </div>
    </div>
    <button class="btn btn-primary" type="button">Save</button>
    <hr>
    <div class="row">
        <h2>Import Team Roster</h2>
        <form>
            <div class="form-group">
                <label for="download-example-roster">Download Roster Template:</label><br>
                <a href="/teams-template.csv" class="btn btn-primary" id="download-example-roster" type="button">Download Roster Template</a>
            </div>
            <div class="form-group">
                <label for="upload-roster">Upload Completed Template:</label>
                <input type="file" id="upload-roster" class="btn btn-primary">
            </div>
            <div class="form-group" id="teams-to-import-container" style="display:none;">
                <label for=""><h3>Teams to Import</h3></label>
                <table class="table table-sm table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col" style="width:150px;">Will Import</th>
                        <th scope="col">Team #</th>
                        <th scope="col">Team Name</th>
                    </tr>
                    </thead>
                    <tbody id="teams-to-import">
                        <tr><td>Yes</td><th scope="row">1</th><td>Super Fancypants</td></tr>
                    </tbody>
                </table>
            </div>
        </form>

    </div>
    <button class="btn btn-primary" type="button">Import</button>
    <hr>
    <div class="row">
        <h3>Current Teams</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Team #</th>
                <th scope="col">Team Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
            <tr>
                <th scope="row">{{ $team->team_number }}</th>
                <td>{{ $team->team_name }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>

<script type="text/javascript">
    // This can probably be moved somewhere else like in a JS file or complied into app.js
    $(document).ready(function(){
        
        $('#upload-roster').on('change',function(){
            $teams_to_import = [];
            $('#teams-to-import-container').hide();
            var file = document.getElementById('upload-roster').files[0];
            if(file.type!=='text/csv'){
//                $('#error-content').html('<h3>Something went wrong</h3><br>The file you selected was not a CSV. Please double-check your selection.');
//                $('#errorModal').modal('show');
                return false;
            }
            var loader = csvFileToJSON(file);
            loader.then(function(teams){
                var table = '';
                console.log('teams:',teams);
                $teams_to_import = teams;
                for(d=0;d<teams.length;d++){
                    var team = teams[d];
                    if(!team.team_number&&!team.team_name){
                        continue;
                    }
                    if(!team.team_number || !team.team_name){
                        $('#download-import-errors').show();
                    }

                    console.log('team:',team);
                    table+='<tr><td><i class="fa '+(team.team_number && team.team_name ? 'fa-check-circle" aria-hidden="true"></i> Yes' : 'fa-exclamation-triangle" aria-hidden="true"></i> No')+'</td><th scope="row" class="'+(team.team_number ? team.team_number : 'alert alert-danger')+'">'+(team.team_number ? team.team_number : 'MISSING - REQUIRED')+'</th><td class="'+(team.team_name ? team.team_name : 'alert alert-danger')+'">'+(team.team_name ? team.team_name : 'MISSING - REQUIRED')+'</td></tr>';
                }
                if(table==''){
//                    $('#error-content').html('<h3>Something went wrong</h3><br>The file you selected does not have team_number and team_name columns or the file is empty. Please double check your file.');
//                    $('#errorModal').modal('show');
                    return;
                }
                $('#teams-to-import').html(table);
                $('#teams-to-import-container').show();
            });
        });
    });
</script>

@include('admin/admin-footer')
@include('common-footer')