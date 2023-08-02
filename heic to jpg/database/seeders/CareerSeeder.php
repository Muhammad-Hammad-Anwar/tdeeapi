<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('careers')->insert([
        	[
        		'title' 	 => 'Mathematician',
        		'type'       => 'Remote',
        		'order'    	 => '1',
        		'description'=> 'We are hiring for a Lead Generation Manager position to join our team. 
                                We work with SMB and enterprise-level projects, and you’ll have the 
                                opportunity to unpack your potential and hone your skills.',
        		'detail'=> '<p>We are looking for a talented Lead generation specialist who knows how to boost interest and generate buyer intent
        						in outbound actions. In this role, you’ll be responsible for:
	                                <ul>
	                                    <li>Driving new account acquisition at the initial phases of the sales funnel.</li>
	                                    <li>Researching potential clients and connecting with them.</li>
	                                    <li>Setting up calls with the leads for Sales Executives.</li>
	                                </ul>
	                               	<p>Requirements:</p>
                               		<ul>
	                                    <li>1+ year of experience in a similar position.</li>
	                                    <li>Experience in outbound (previous company - outsource).</li>
	                                    <li>Сreating email campaigns.</li> 
	                                    <li>English level: at least Upper-intermediate (written).</li>
	                                    <li>approach, self-motivation, energy, and desire to achieve success in driving new sales.</li>
	                                    <li>Used tools - Sales navigator, Snov.io, Email campaigns tools.</li>
	                                </ul>
                               		<p>Responsibility:</p>
                               		<ul>
                                    	<li>Active generation of qualified meetings and opportunities for the company’s ICP by email and LinkedIn.</li>
                                    	<li>Enriching, expanding, and monitoring your database for potential opportunities through internet research, scoops, events, news, etc.</li>
                                    	<li>Scheduling sequences, working with your account base.</li>
                                    	<li>Management of ongoing outbound, account-based strategy to drive new business.</li>
                                    	<li>Use of sales automation systems for efficient work.</li>
                                	</ul>
                                	<p>Will be a plus:</p>
                               		<ul>
                                    	<li>Can do some calls with leads.</li>
                               		</ul>
                                	<p>Why work with us:</p>
                                	<ul>
                                    	<li>Flexible schedule with the ability to work remotely.</li>
                                    	<li>Up-to-date equipment (we will take into account your wishes and comments).</li>
                                    	<li>Optimal social package.</li>
                                    	<li>Full and highly-proficient financial and legal support.</li>
                                    	<li>Paid vacation, holidays, and sick leaves — not just obligatory, but the convincing basis of our cooperation.</li>
                                	</ul>
                                	<p>Opportunities for professional and personal growth:</p>
                                	<ul>
                                    	<li>Сompensation of training and courses.</li>
                                    	<li>A team of professionals and the latest technologies to work with.</li>
                                    	<li>The individual development plan, expert guidance of like-minded colleagues.</li>
                                	</ul>
                            	</p>',
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        	[
        		'title' 	 => 'Python Developer',
        		'type'       => 'Remote',
        		'order'    	 => '2',
        		'description'=> 'We are hiring for a Lead Generation Manager position to join our team. 
                                We work with SMB and enterprise-level projects, and you’ll have the 
                                opportunity to unpack your potential and hone your skills.',
                'detail'=> '<p>We are looking for a talented Lead generation specialist who knows how to boost interest and generate buyer intent
                                in outbound actions. In this role, you’ll be responsible for:
                                    <ul>
                                        <li>Driving new account acquisition at the initial phases of the sales funnel.</li>
                                        <li>Researching potential clients and connecting with them.</li>
                                        <li>Setting up calls with the leads for Sales Executives.</li>
                                    </ul>
                                    <p>Requirements:</p>
                                    <ul>
                                        <li>1+ year of experience in a similar position.</li>
                                        <li>Experience in outbound (previous company - outsource).</li>
                                        <li>Сreating email campaigns.</li> 
                                        <li>English level: at least Upper-intermediate (written).</li>
                                        <li>approach, self-motivation, energy, and desire to achieve success in driving new sales.</li>
                                        <li>Used tools - Sales navigator, Snov.io, Email campaigns tools.</li>
                                    </ul>
                                    <p>Responsibility:</p>
                                    <ul>
                                        <li>Active generation of qualified meetings and opportunities for the company’s ICP by email and LinkedIn.</li>
                                        <li>Enriching, expanding, and monitoring your database for potential opportunities through internet research, scoops, events, news, etc.</li>
                                        <li>Scheduling sequences, working with your account base.</li>
                                        <li>Management of ongoing outbound, account-based strategy to drive new business.</li>
                                        <li>Use of sales automation systems for efficient work.</li>
                                    </ul>
                                    <p>Will be a plus:</p>
                                    <ul>
                                        <li>Can do some calls with leads.</li>
                                    </ul>
                                    <p>Why work with us:</p>
                                    <ul>
                                        <li>Flexible schedule with the ability to work remotely.</li>
                                        <li>Up-to-date equipment (we will take into account your wishes and comments).</li>
                                        <li>Optimal social package.</li>
                                        <li>Full and highly-proficient financial and legal support.</li>
                                        <li>Paid vacation, holidays, and sick leaves — not just obligatory, but the convincing basis of our cooperation.</li>
                                    </ul>
                                    <p>Opportunities for professional and personal growth:</p>
                                    <ul>
                                        <li>Сompensation of training and courses.</li>
                                        <li>A team of professionals and the latest technologies to work with.</li>
                                        <li>The individual development plan, expert guidance of like-minded colleagues.</li>
                                    </ul>
                                </p>',
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        	[
        		'title' 	 => 'Laravel Developer',
        		'type'       => 'Remote',
        		'order'    	 => '3',
        		'description'=> 'We are hiring for a Lead Generation Manager position to join our team. 
                                We work with SMB and enterprise-level projects, and you’ll have the 
                                opportunity to unpack your potential and hone your skills.',
                'detail'=> '<p>We are looking for a talented Lead generation specialist who knows how to boost interest and generate buyer intent
                                in outbound actions. In this role, you’ll be responsible for:
                                    <ul>
                                        <li>Driving new account acquisition at the initial phases of the sales funnel.</li>
                                        <li>Researching potential clients and connecting with them.</li>
                                        <li>Setting up calls with the leads for Sales Executives.</li>
                                    </ul>
                                    <p>Requirements:</p>
                                    <ul>
                                        <li>1+ year of experience in a similar position.</li>
                                        <li>Experience in outbound (previous company - outsource).</li>
                                        <li>Сreating email campaigns.</li> 
                                        <li>English level: at least Upper-intermediate (written).</li>
                                        <li>approach, self-motivation, energy, and desire to achieve success in driving new sales.</li>
                                        <li>Used tools - Sales navigator, Snov.io, Email campaigns tools.</li>
                                    </ul>
                                    <p>Responsibility:</p>
                                    <ul>
                                        <li>Active generation of qualified meetings and opportunities for the company’s ICP by email and LinkedIn.</li>
                                        <li>Enriching, expanding, and monitoring your database for potential opportunities through internet research, scoops, events, news, etc.</li>
                                        <li>Scheduling sequences, working with your account base.</li>
                                        <li>Management of ongoing outbound, account-based strategy to drive new business.</li>
                                        <li>Use of sales automation systems for efficient work.</li>
                                    </ul>
                                    <p>Will be a plus:</p>
                                    <ul>
                                        <li>Can do some calls with leads.</li>
                                    </ul>
                                    <p>Why work with us:</p>
                                    <ul>
                                        <li>Flexible schedule with the ability to work remotely.</li>
                                        <li>Up-to-date equipment (we will take into account your wishes and comments).</li>
                                        <li>Optimal social package.</li>
                                        <li>Full and highly-proficient financial and legal support.</li>
                                        <li>Paid vacation, holidays, and sick leaves — not just obligatory, but the convincing basis of our cooperation.</li>
                                    </ul>
                                    <p>Opportunities for professional and personal growth:</p>
                                    <ul>
                                        <li>Сompensation of training and courses.</li>
                                        <li>A team of professionals and the latest technologies to work with.</li>
                                        <li>The individual development plan, expert guidance of like-minded colleagues.</li>
                                    </ul>
                                </p>',
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        ]);
    }
}
