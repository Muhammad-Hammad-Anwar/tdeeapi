<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            $permissions = [
                  'roles-list', 
                  'roles-view', 
                  'roles-create', 
                  'roles-edit', 
                  'roles-delete',

                  'users-list', 
                  'users-view', 
                  'users-create', 
                  'users-edit', 
                  'users-delete',

                  'language-list', 
                  'language-view', 
                  'language-create', 
                  'language-edit', 
                  'language-delete',

                  'auther-list', 
                  'auther-view', 
                  'auther-create', 
                  'auther-edit', 
                  'auther-delete',

                  'media-list', 
                  'media-view', 
                  'media-create', 
                  'media-edit', 
                  'media-delete',

                  'menu-list', 
                  'menu-view', 
                  'menu-create', 
                  'menu-edit', 
                  'menu-delete',

                  'career-list', 
                  'career-view', 
                  'career-create', 
                  'career-edit', 
                  'career-delete',

                  'application-list', 
                  'application-view', 
                  'application-create', 
                  'application-edit', 
                  'application-delete',

                  'strings-list', 
                  'strings-view', 
                  'strings-create', 
                  'strings-edit', 
                  'strings-delete',

                  'tool-list', 
                  'tool-view', 
                  'tool-create', 
                  'tool-edit', 
                  'tool-delete',

                  'apiToken-list', 
                  'apiToken-view', 
                  'apiToken-create', 
                  'apiToken-edit', 
                  'apiToken-delete',

                  'homePage-list', 
                  'homePage-view', 
                  'homePage-create', 
                  'homePage-edit', 
                  'homePage-delete',
                  'homePage-publish',
                  'homePage-unPublish',

                  'toolPage-list', 
                  'toolPage-view', 
                  'toolPage-create', 
                  'toolPage-edit', 
                  'toolPage-delete',
                  'toolPage-publish',
                  'toolPage-unPublish',

                  'blogPage-list', 
                  'blogPage-view', 
                  'blogPage-create', 
                  'blogPage-edit', 
                  'blogPage-delete',
                  'blogPage-publish',
                  'blogPage-unPublish',

                  'problemPage-list', 
                  'problemPage-view', 
                  'problemPage-create', 
                  'problemPage-edit', 
                  'problemPage-delete',
                  'problemPage-publish',
                  'problemPage-unPublish',

                  'categoryPage-list', 
                  'categoryPage-view', 
                  'categoryPage-create', 
                  'categoryPage-edit', 
                  'categoryPage-delete',
                  'categoryPage-publish',
                  'categoryPage-unPublish',

                  'careerPage-list', 
                  'careerPage-view', 
                  'careerPage-create', 
                  'careerPage-edit', 
                  'careerPage-delete',
                  'careerPage-publish',
                  'careerPage-unPublish',

                  'contactUsPage-list', 
                  'contactUsPage-view', 
                  'contactUsPage-create', 
                  'contactUsPage-edit', 
                  'contactUsPage-delete',
                  'contactUsPage-publish',
                  'contactUsPage-unPublish',

                  'simplePage-list', 
                  'simplePage-view', 
                  'simplePage-create', 
                  'simplePage-edit', 
                  'simplePage-delete',
                  'simplePage-publish',
                  'simplePage-unPublish',

                  'comments-list', 
                  'comments-view', 
                  'comments-create', 
                  'comments-edit', 
                  'comments-delete',
                  'comments-publish',
                  'comments-unPublish',

                  'topic-list', 
                  'topic-view', 
                  'topic-create', 
                  'topic-edit', 
                  'topic-delete',

                  'quiz-list', 
                  'quiz-view', 
                  'quiz-create', 
                  'quiz-edit', 
                  'quiz-delete',

                  'question-list', 
                  'question-view', 
                  'question-create', 
                  'question-edit', 
                  'question-delete',

                  'feedback-list', 
                  'feedback-view', 
                  'feedback-create', 
                  'feedback-edit', 
                  'feedback-delete',
                  
                  'newsletter-list', 
                  'newsletter-view', 
                  'newsletter-create', 
                  'newsletter-edit', 
                  'newsletter-delete',

                  'audit-list', 
                  'audit-view', 
                  'audit-create', 
                  'audit-edit', 
                  'audit-delete',

                  'log-list', 
                  'log-view', 
                  'log-create', 
                  'log-edit', 
                  'log-delete',

                  'settings-list',
                  'settings-create',
            ];
        
            foreach ($permissions as $permission) {
                  Permission::create(['name' => $permission]);
            }
      }
}