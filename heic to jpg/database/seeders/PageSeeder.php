<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
        	[
				'language_id' 	=> '1',
				'parent_id' 	=> NULL,
				'tool_id' 		=> '1',
				'template' 		=> 'Home',
				'category_type' => NULL,
				'title' 		=> 'Rewording Tool',
				'slug' 			=> 'rewording-tool',
				'image' 		=> NULL,
				'canonical' 	=> NULL,
				'metaTitle' 	=> NULL,
				'metaDescription' => NULL,
				'og_tags' 		=> 	NULL,
				'schemas' 		=> NULL,
				'description'	=> 'Image to text converter is the most demanding online tool that helps in converting the words of picture into an editable text. It is a multilingual converting tool that extract words of all languages from a picture.',
				'content' 		=> '<h2>Introduction to image to text converter?</h2>
				<p>The image to text converter is an advanced tool for converting words of images into text. It is based on Optical Character Recognition (OCR) which identifies all writing patterns, formats and turns the picture into a readable text. This converter is the best way to convert images to text online. When you upload an image on the converter, it recognizes all writing patterns, even from the blur or low resolution image, and turns it into an editable digital document. It also gives accurate results on entering the URL of the images.</p>
				<p>Image to text converter is the most demanding online tool that helps in converting the words of pictures into an editable text. It is a multilingual converting tool that extracts words of all languages from a picture. The image to text detector extracts the words from JPG, PNG, BMP, JPEG and TIFF into a readable text with a simple click.</p>',
				'status' 		=> 'UnPublish',
				'auther_id' 	=> '1',
				'published_by' 	=> NULL,
				'created_by' 	=> '1',
				'published_at' 	=> NULL,
				'created_at' 	=> '2023-04-04 15:38:11',
				'updated_at' 	=> '2023-04-04 15:38:11'
			],
			[
				'language_id' 	=> '1',
				'parent_id' 	=> NULL,
				'tool_id' 		=> NULL,
				'template' 		=> 'Category',
				'category_type' => 'Tool'
				,'title' 		=> 'Math Calculators',
				'slug' 			=> 'math-calculators',
				'image' 		=> NULL,
				'canonical' 	=> NULL,
				'metaTitle' 	=> NULL,
				'metaDescription'=> NULL,
				'og_tags' 		=> NULL,
				'schemas' 		=> NULL,
				'description'	=> '',
				'content' 		=> '<p><strong>
									Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy</p>',
				'status' 		=> 'UnPublish',
				'auther_id' 	=> NULL,
				'published_by' 	=> NULL,
				'created_by' 	=> '1',
				'published_at' 	=> NULL,
				'created_at' 	=> '2023-04-04 15:42:58',
				'updated_at' 	=> '2023-04-04 15:42:58'
			],
			[
				'language_id' 	=> '1',
				'parent_id' 	=> NULL,
				'tool_id' 		=> NULL,
				'template' 		=> 'Category',
				'category_type' => 'Blog',
				'title' 		=> 'Blogs',
				'slug' 			=> 'blogs',
				'image' 		=> NULL,
				'canonical' 	=> NULL,
				'metaTitle' 	=> NULL,
				'metaDescription'=> NULL,
				'og_tags' 		=> NULL,
				'schemas' 		=> NULL,
				'description'	=> '',
				'content' 		=> '<p><strong>
									Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy</p>',
				'status' 		=> 'UnPublish',
				'auther_id' 	=> NULL,
				'published_by' 	=> NULL,
				'created_by' 	=> '1',
				'published_at' 	=> NULL,
				'created_at' 	=> '2023-04-04 15:43:37',
				'updated_at' 	=> '2023-04-04 15:43:37'
			],
			[
				'language_id' 	=> '1',
				'parent_id' 	=> NULL,
				'tool_id' 		=> NULL,
				'template' 		=> 'Contact_us',
				'category_type' => NULL,
				'title' 		=> 'Contact Us',
				'slug' 			=> 'contact-us',
				'image' 		=> NULL,
				'canonical' 	=> NULL,
				'metaTitle' 	=> NULL,
				'metaDescription'=> NULL,
				'og_tags' 		=> NULL,
				'schemas' 		=> NULL,
				'description'	=> '',
				'content' 		=> '<p><strong>
									Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
				'status' 		=> 'UnPublish',
				'auther_id' 	=> NULL,
				'published_by' 	=> NULL,
				'created_by' 	=> '1',
				'published_at' 	=> NULL,
				'created_at' 	=> '2023-04-04 17:02:01',
				'updated_at' 	=> '2023-04-04 17:02:01'
			],
            [
				'language_id' 	=> '1',
				'parent_id' 	=> '3',
				'tool_id' 		=> NULL,
				'template' 		=> 'Blog',
				'category_type' => NULL,
				'title' 		=> 'Evaluate the Indefinite Integral as an Infinite Series. Cos x − 1x dx',
				'slug' 			=> 'evaluate-the-indefinite-integral-as-an-infinite-series.-cos-x-−-1x-dx',
				'image' 		=> 'upload/images/pages/1680859513.webp',
				'canonical' 	=> NULL,
				'metaTitle' 	=> NULL,
				'metaDescription'=> NULL,
				'og_tags' 		=> NULL,
				'schemas' 		=> NULL,
				'description'	=> 'To evaluate the indefinite integral of cos(x) - 1/x as an infinite series, we can use the technique of power series expansion.',
				'content' 		=> '<p>To evaluate the indefinite integral of cos(x) - 1/x as an infinite series, we can use the technique of power series expansion.To evaluate the indefinite integral of cos(x) - 1/x as an infinite series, we can use the technique of power series expansion.To evaluate the indefinite integral of cos(x) - 1/x as an infinite series, we can use the technique of power series expansion.To evaluate the indefinite integral of cos(x) - 1/x as an infinite series, we can use the technique of power series expansion.To evaluate the indefinite integral of cos(x) - 1/x as an infinite series, we can use the technique of power series expansion.To evaluate the indefinite integral of cos(x) - 1/x as an infinite series, we can use the technique of power series expansion.</p>',
				'status' 		=> 'UnPublish',
				'auther_id' 	=> '1',
				'published_by' 	=> NULL,
				'created_by' 	=> '1',
				'published_at' 	=> NULL,
				'created_at' 	=> '2023-04-05 15:57:35',
				'updated_at' 	=> '2023-04-05 15:57:35'
			],
        ]);
    }
}
