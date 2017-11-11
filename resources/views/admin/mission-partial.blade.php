<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $mission->getName() }}</h4>

        @foreach($mission->getQuestions() as $question)

            <h5 class="card-subtitle text-muted">{{ $question->getText() }}</h5>



            <div class="btn-group" data-toggle="buttons">
                @foreach($question->getAnswers() as $answer => $text)

                    <label class="btn btn-info">
                        <input checked="checked"
                               value="{{ $answer }}"
                               type="radio"
                               id="{{ $question->getId() . $answer }}"
                               class="mission-question"
                               name="{{ $question->getId() }}">
                        {{ $text }}
                    </label>
                @endforeach
            </div>

        @endforeach


    </div>
</div>