<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Question;
use Livewire\Component;

class ShowQuestion extends Component
{

    public
        $student_id,
        $exam_id,
        $data,
        $counter = 0,
        $questioncount;

    public function render()
    {
        if (count(Question::where('exam_id', $this->exam_id)->get()) > 0) {
            $this->data = Question::where('exam_id', $this->exam_id)->get();
            $this->questioncount = $this->data->count();
        }
        return view('livewire.show-question');
    }

    public function nextQuestion($question_id, $score, $answer, $right_answer)
    {
        $Degree = Degree::where('student_id', $this->student_id)->where('exam_id', $this->exam_id)->first();

        if ($Degree == null) {
            $degree = new Degree();
            $degree->score = $score;
            $degree->date = date('y-m-d');
            $degree->student_id = $this->student_id;
            $degree->exam_id = $this->exam_id;
            $degree->question_id = $question_id;
            if (trim($answer) == trim($right_answer)) {
                $degree->score = $score;
            } else {
                $degree->score = 0;
            }
            $degree->save();
        } else {
            if ($Degree->question_id >= $this->data[$this->counter]->id) {
                $Degree->score = 0;
                $Degree->abuse = '1';
                $Degree->save();
                toastr()->error(__('exam.true_abuse'));
                return redirect('student/dashboard/exams');
            } else {
                if (trim($answer) == trim($right_answer)) {
                    $Degree->score += $score;
                } else {
                    $Degree->score += 0;
                }
                $Degree->question_id = $question_id;
                $Degree->save();
            }
        }
        if ($this->counter < $this->questioncount - 1) {
            $this->counter++;
        } else {
            toastr()->success(__('exam.done'));
            return redirect('student/dashboard/exams');
        }
    }
}
