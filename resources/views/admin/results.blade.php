@include('common-head')
@include('admin/admin-head')

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Team #</th>
                <th scope="col">Team Name</th>
                @foreach($rounds as $round)
                <th scope="col">R{{ $round->round_number }}</th>
                @endforeach
                <th scope="col">High</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams->values() as $rank=>$team)
            <tr>
                <th scope="row">{{ $rank+1 }}</th>
                <td>{{ $team->team_number }}</td>
                <td>{{ $team->team_name }}</td>
                @foreach($rounds as $round)
                <td>{{ $team->scores_for_round($round->id) }}</td>
                @endforeach
                <td><strong>{{ $team->highest_score() }}</strong></td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>

@include('admin/admin-footer')
@include('common-footer')