<?php

namespace App\Repository;

interface StudentRepositoryInterface
{
    public function getAllStudents();
    public function getAllGrades();
    public function getAllGenders();
    public function getAllGuardians();
    public function getAllNationalitie();
    public function getAllBlood();
    public function getClassroom($id);
    public function getSection($id);
    public function showStudent($id);
    public function storeStudent($request);
    public function updateStudents($request);
    public function uploadAtachmentStudents($request);
    public function downloadAtachmentStudents($student_name, $file_name);
    public function deleteAtachmentStudents($request);
    public function deleteStudents($teacher);
}
