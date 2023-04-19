<div>
    @if (count(App\Models\Question::where('exam_id', $this->exam_id)->get()) > 0 and $data != null)
        <h5 class="card-title">{{ $data[$counter]->title }}</h5>
        <hr>
        @foreach (preg_split('/(,)/', $data[$counter]->answers) as $key => $answer)
            <div class="form-group mr-4">
                <input type="radio" name="answer" id="answer{{ $key }}">
                <label for="answer{{ $key }}"
                    wire:click="nextQuestion({{ $data[$counter]->id }}, {{ $data[$counter]->score }}, '{{ $answer }}', '{{ $data[$counter]->right_answer }}')">{{ $answer }}</label>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning" role="alert">@lang('exam.no_question')</div>
    @endif
</div>
