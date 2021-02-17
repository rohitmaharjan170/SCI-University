<?php

namespace App\Policies;

use App\models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentDashboardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the student.
     *
     * @param \App\User $user
     * @param \App\Student $student
     * @return mixed
     */

    public function view(Student $student)
    {

    }

    /**
     * Determine whether the user can create students.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the student.
     *
     * @param \App\User $user
     * @param \App\Student $student
     * @return mixed
     */
    public function update(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can delete the student.
     *
     * @param \App\User $user
     * @param \App\Student $student
     * @return mixed
     */
    public function delete(User $user, Student $student)
    {
        //
    }
}
