<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        //all menu permissions name
        $permissions = [
            'banner-list',
            'banner-create',
            'banner-edit',
            'banner-delete',
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'program-list',
            'program-create',
            'program-edit',
            'program-delete',
            'training-list',
            'training-create',
            'training-edit',
            'training-delete',
            'video-list',
            'video-create',
            'video-edit',
            'video-delete',
            'press-list',
            'press-create',
            'press-edit',
            'press-delete',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
            'notice-list',
            'notice-create',
            'notice-edit',
            'notice-delete',
            'gallery-list',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',
            'partner-list',
            'partner-create',
            'partner-edit',
            'partner-delete',
            'associate-project-list',
            'associate-project-create',
            'associate-project-edit',
            'associate-project-delete',
            'franchise-list',
            'franchise-create',
            'franchise-edit',
            'franchise-delete',
            'team-list',
            'team-create',
            'team-edit',
            'team-delete',
            'trainer-list',
            'trainer-create',
            'trainer-edit',
            'trainer-delete',
            'contact-messages-list',
            'contact-messages-create',
            'contact-messages-edit',
            'contact-messages-delete',
            'exam-list',
            'exam-create',
            'exam-edit',
            'exam-delete',
            'question-list',
            'question-create',
            'question-edit',
            'question-delete',
            'scholarship-list',
            'scholarship-create',
            'scholarship-edit',
            'scholarship-delete',
            'admission-list',
            'admission-create',
            'admission-edit',
            'admission-delete',
            'testimonial-list',
            'testimonial-create',
            'testimonial-edit',
            'testimonial-delete',
            'bod-list',
            'bod-create',
            'bod-edit',
            'bod-delete',
            'cms-list',
            'cms-create',
            'cms-edit',
            'cms-delete',
            'tags-list',
            'tags-create',
            'tags-edit',
            'tags-delete',
            'career-list',
            'career-create',
            'career-edit',
            'career-delete',
            'site-settings-list',
            'site-settings-create',
            'site-settings-edit',
            'site-settings-delete'
        ];

        //create permission in loop
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
