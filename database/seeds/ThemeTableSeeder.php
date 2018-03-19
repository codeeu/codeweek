<?php

use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert(

            [
                [
                    'id' => 1,
                    'name' => 'Basic programming concepts',
                    'order' => 5
                ],
                [
                    'id' => 2,
                    'name' => 'Web development',
                    'order' => 4
                ], [
                'id' => 3,
                'name' => 'Mobile app development',
                'order' => 3
            ],
                [
                    'id' => 4,
                    'name' => 'Software development',
                    'order' => 10
                ],
                [
                    'id' => 5,
                    'name' => 'Data manipulation and visualisation',
                    'order' => 2
                ],
                [
                    'id' => 6,
                    'name' => 'Robotics',
                    'order' => 1
                ], [
                'id' => 7,
                'name' => 'Hardware',
                'order' => 0
            ],
                [
                    'id' => 8,
                    'name' => 'Other',
                    'order' => 18
                ], [
                'id' => 9,
                'name' => 'Unplugged activities',
                'order' => 6
            ],
                [
                    'id' => 10,
                    'name' => 'Playful coding activities',
                    'order' => 7
                ], [
                'id' => 11,
                'name' => 'Art and creativity',
                'order' => 8
            ],
                [
                    'id' => 12,
                    'name' => 'Visual/Block programming',
                    'order' => 9
                ],
                [
                    'id' => 13,
                    'name' => 'Game design',
                    'order' => 11
                ],
                [
                    'id' => 14,
                    'name' => 'Internet of things and wearable computing',
                    'order' => 12
                ], [
                'id' => 16,
                'name' => 'Augmented reality',
                'order' => 14
            ],
                [
                    'id' => 15,
                    'name' => '3D printing',
                    'order' => 13
                ], [
                'id' => 17,
                'name' => 'Artificial intelligence',
                'order' => 15
            ], [
                'id' => 18,
                'name' => 'Motivation and awareness raising',
                'order' => 16
            ],
                [
                    'id' => 19,
                    'name' => 'Promoting diversity',
                    'order' => 17
                ]
            ]

        );
    }
}
