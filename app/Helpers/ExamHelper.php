<?php

use App\models\ExamResult;

function checkExamSubmission($studentId, $examId)
{
    $examGiven = ExamResult::where('student_id', $studentId)->where('exam_id', $examId)->first();
    if ($examGiven) {
        return true;
    }
    return false;
}
