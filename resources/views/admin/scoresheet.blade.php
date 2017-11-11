@include('common-head')
@include('admin/admin-head')

<div class="container">

    <div class="row">
        <div class="col-xs-6 form-group">
            <label for="sel1">Team:</label>
            <select class="form-control" id="sel1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>

        <div class="col-xs-6 form-group">
            <label for="sel2">Round:</label>
            <select class="form-control" id="sel2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>
    </div>

    <div class="alert alert-warning alert-dismissable">
        {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
        <strong>Warning!</strong> A scoresheet has been saved for this this team this round.
        Any changes will affect the team's current score.
    </div>

    <?php dump($scoresheet); ?>

    @foreach($scoresheet->getMissions() as $mission)
        @include('admin/mission-partial')
    @endforeach





</div>

@include('admin/admin-footer')
@include('common-footer')