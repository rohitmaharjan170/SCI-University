<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(PressesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(NoticesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(BoardOfDirectorsTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(CMSSTableSeeder::class);
        $this->call(AboutUsesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(AdmissionsTableSeeder::class);
        $this->call(CareersTableSeeder::class);
        $this->call(CompanyAssociatesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CourseImagesTableSeeder::class);
        $this->call(CourseTagsTableSeeder::class);
        $this->call(CourseVideosTableSeeder::class);
        //$this->call(ExamsTableSeeder::class);
        $this->call(FranchisesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(ProgramImagesTableSeeder::class);
        $this->call(ProgramTagsTableSeeder::class);
        $this->call(ProgramTrainersTableSeeder::class);
        $this->call(ProgramVideosTableSeeder::class);
      //  $this->call(QuestionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ScholarshipsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TrainersTableSeeder::class);
        $this->call(TrainingsTableSeeder::class);
        $this->call(TrainingImagesTableSeeder::class);
        $this->call(TrainingTagsTableSeeder::class);
        $this->call(TrainingTrainersTableSeeder::class);
        $this->call(TrainingVideosTableSeeder::class);
        $this->call(AdvertisementsTableSeeder::class);
        $this->call(DeanMessagesTableSeeder::class);
        $this->call(GalleryImagesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AssignmentsTableSeeder::class);
        $this->call(AssignmentFilesTableSeeder::class);
        $this->call(CourseStudentTableSeeder::class);
        $this->call(DonationsTableSeeder::class);
        $this->call(AssignmentStudentTableSeeder::class);
        $this->call(AssignmentSubmissionsTableSeeder::class);
        $this->call(AssignmentSubmissionFilesTableSeeder::class);
        $this->call(AssignmentSubmissionStudentTableSeeder::class);
        $this->call(UserPasswordResetsTableSeeder::class);
        $this->call(TrainingStudentTableSeeder::class);
      //  $this->call(OptionsTableSeeder::class);
       // $this->call(ExamResultsTableSeeder::class);
        //$this->call(StudentAnswersTableSeeder::class);
       // $this->call(EmailResetsTableSeeder::class);
        $this->call(FeaturedStudentsTableSeeder::class);
    }
}
