<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DynamicStringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dynamic_strings')->insert([
            [
                'language_id' => '1',
                'key'         => 'drag_heading',
                'value'       => 'Drag and Drop Image Here',
            ],
            [
                'language_id' => '1',
                'key'         => 'or_heading',
                'value'       => 'OR',
            ],
            [
                'language_id' => '1',
                'key'         => 'choose_heading',
                'value'       => 'Choose Image',
            ],
            [
                'language_id' => '1',
                'key'         => 'convert_text',
                'value'       => 'Convert',
            ],
            [
                'language_id' => '1',
                'key'         => 'clear',
                'value'       => 'Clear',
            ],
            [
                'language_id' => '1',
                'key'         => 'input_heading',
                'value'       => 'Input Text',
            ],
            [
                'language_id' => '1',
                'key'         => 'output_heading',
                'value'       => 'Output Text',
            ],
            [
                'language_id' => '1',
                'key'         => 'reword_heading',
                'value'       => 'Reword',
            ],
            [
                'language_id' => '1',
                'key'         => 'output_heading',
                'value'       => 'Output Text',
            ],

            [
                'language_id' => '1',
                'key'         => 'uses_heading',
                'value'       => 'How to Use Rewording Tool',
            ],
            [
                'language_id' => '1',
                'key'         => 'method1_heading',
                'value'       => 'Enter Input Text',
            ],
            [
                'language_id' => '1',
                'key'         => 'method1_description',
                'value'       => 'The image to text converter is an advanced tool for converting words of images into text. 
                It is based on Optical Character Recognition (OCR) which identifies all writing patterns,
                formats and turns the picture into a readable text.',
            ],
            [
                'language_id' => '1',
                'key'         => 'method2_heading',
                'value'       => 'Click on button',
            ],
            [
                'language_id' => '1',
                'key'         => 'method2_description',
                'value'       => 'The image to text converter is an advanced tool for converting words of images into text. 
                It is based on Optical Character Recognition (OCR) which identifies all writing patterns,
                formats and turns the picture into a readable text.',
            ],
            [
                'language_id' => '1',
                'key'         => 'method3_heading',
                'value'       => 'Result and change Synonyms',
            ],
            [
                'language_id' => '1',
                'key'         => 'method3_description',
                'value'       => 'The image to text converter is an advanced tool for converting words of images into text. 
                It is based on Optical Character Recognition (OCR) which identifies all writing patterns,
                formats and turns the picture into a readable text.',
            ],
            [
                'language_id' => '1',
                'key'         => 'widget_heading',
                'value'       => 'Get the Widget!',
            ],
            [
                'language_id' => '1',
                'key'         => 'widget_description',
                'value'       => 'Introduction to Integral CalculatorAdd this calculator to your site and lets users to perform easy calculations.',
            ],
            [
                'language_id' => '1',
                'key'         => 'feedback_heading',
                'value'       => 'Feedback',
            ],
            [
                'language_id' => '1',
                'key'         => 'feedback_description',
                'value'       => 'How easy was it to use our calculator? Did you face any problem, tell us!',
            ],
            [
                'language_id' => '1',
                'key'         => 'App_link_heading',
                'value'       => 'Available on App',
            ],
            [
                'language_id' => '1',
                'key'         => 'App_link_description',
                'value'       => 'Download Weight loss Calculator App for Your Mobile.',
            ],
            [
                'language_id' => '1',
                'key'         => 'footer_heading',
                'value'       => 'Heic to Jpg Converter',
            ],
            [
                'language_id' => '1',
                'key'         => 'footer_description',
                'value'       => 'We provide you an online tool that converts images into text with simple
                submission of photos. It is a free of cost tool that extracts your photo 
                with OCR and gives an editable document.',
            ],
            [
                'language_id' => '1',
                'key'         => 'footer_heading_1',
                'value'       => 'More',
            ],    
            [
                'language_id' => '1',
                'key'         => 'footer_heading_2',
                'value'       => 'About',
            ],
            [
                'language_id' => '1',
                'key'         => 'footer_heading_3',
                'value'       => 'Contact',
            ],
            [
                'language_id' => '1',
                'key'         => 'connect_heading',
                'value'       => 'Connect With Us',
            ],
            [
                'language_id' => '1',
                'key'         => 'footer_button',
                'value'       => 'Bazzigate',
            ],
            [
                'language_id' => '1',
                'key'         => 'copyright_heading',
                'value'       => 'Copyright © 2022 2023',
            ],
            
            [
                'language_id' => '1',
                'key'         => 'required_email',
                'value'       => 'Your email adress will not be published. Required fields are marked *',
            ],
            [
                'language_id' => '1',
                'key'         => 'table_of_contents',
                'value'       => 'Table of Contents',
            ],
            [
                'language_id' => '1',
                'key'         => 'submit_feedback',
                'value'       => 'Submit Feedback',
            ],
            [
                'language_id' => '1',
                'key'         => 'play_store',
                'value'       => 'Google Play',
            ],
            [
                'language_id' => '1',
                'key'         => 'app_store',
                'value'       => 'App Store',
            ],
            [
                'language_id' => '1',
                'key'         => 'get_code',
                'value'       => 'Get Code',
            ],
            [
                'language_id' => '1',
                'key'         => 'related_articles',
                'value'       => 'Related Articles',
            ],
            [
                'language_id' => '1',
                'key'         => 'related_problems',
                'value'       => 'Related Problems',
            ],
            [
                'language_id' => '1',
                'key'         => 'related_blogs',
                'value'       => 'Related Blogs',
            ],
            [
                'language_id' => '1',
                'key'         => 'submit_comment',
                'value'       => 'Submit Comment',
            ],
            [
                'language_id' => '1',
                'key'         => 'integral_problems',
                'value'       => 'Integral Problems',
            ],
            [
                'language_id' => '1',
                'key'         => 'blogs',
                'value'       => 'Blogs',
            ],
            [
                'language_id' => '1',
                'key'         => 'comment_heading',
                'value'       => 'Leave a Comment',
            ],
            [
                'language_id' => '1',
                'key'         => '404',
                'value'       => '404',
            ],
            [
                'language_id' => '1',
                'key'         => 'not_found_heading',
                'value'       => 'Oops! Page not Found',
            ],
            [
                'language_id' => '1',
                'key'         => 'sorry_heading',
                'value'       => 'Sorry, the page you are looking for doesnt exist',
            ],
            [
                'language_id' => '1',
                'key'         => 'newslatter_heading',
                'value'       => 'NewsLetter',
            ],
            [
                'language_id' => '1',
                'key'         => 'join_heading',
                'value'       => 'Join Our Newslatter',
            ],
            [
                'language_id' => '1',
                'key'         => 'news_latter_description',
                'value'       => 'Stay up to date with the latest integration calculators, books, integral problems, and other study resources.',
            ],
            [
                'language_id' => '1',
                'key'         => 'list_main_heading',
                'value'       => 'We will Notify you:',
            ],
            [
                'language_id' => '1',
                'key'         => 'newslist_one',
                'value'       => 'When we Add New Calculators',
            ],
            [
                'language_id' => '1',
                'key'         => 'newslist_three',
                'value'       => 'Best Books and Students Resources',
            ],
            [
                'language_id' => '1',
                'key'         => 'newslist_two',
                'value'       => 'When we Update Our Calculators',
            ],
            [
                'language_id' => '1',
                'key'         => 'newsform_button',
                'value'       => 'Keep me Update',
            ],
            [
                'language_id' => '1',
                'key'         => 'result',
                'value'       => 'Result',
            ],
           
        ]);
    }
}
