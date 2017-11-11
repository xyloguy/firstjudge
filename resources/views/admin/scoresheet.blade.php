@include('common-head')
@include('admin/admin-head')

<div class="container" id="scoresheet">

    <form method="post">

        <?= csrf_field(); ?>

        <div class="row">
            <div class="col-xs-6 form-group">
                <label for="sel1">Team:</label>
                <select class="form-control" id="sel1" name="team_id">
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->team_number }} {{ $team->team_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-xs-6 form-group">
                <label for="sel2">Round:</label>
                <select class="form-control" id="sel2" name="round_id">
                    @foreach($rounds as $round)
                        <option value="{{ $round->id }}">Round {{ $round->round_number }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong> A scoresheet has been saved for this this team this round.
            Any changes will affect the team's current score.
        </div>

        @foreach($scoresheet->getMissions() as $mission)
            @include('admin/mission-partial')
        @endforeach

        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-success">
        </div>

    </form>
</div>

<script type="text/javascript">
    jQuery(function($){
        $('.mission-question').change(function(){
            var parent = $(this).parent().parent();
            parent.find('.mission-question').removeClass('btn-primary').addClass('btn-info');
            if ($(this).is(':checked')) {
                $(this).addClass('btn-primary').removeClass('btn-info');
            }
        });
    });
</script>

@include('admin/admin-footer')
@include('common-footer')
