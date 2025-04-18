<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workouts')->insert([
            ['name' => 'Workout 1', 'muscle_group' => 'Chest', 'level' => 'Beginner', 'description' => 'Push-Ups 3x10<br>Dumbbell Bench Press 3x10<br>Incline Dumbbell Fly 3x12<br>Chest Press Machine 3x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Chest', 'level' => 'Beginner', 'description' => 'Incline Push-Ups 3x10<br>Dumbbell Pullover 3x12<br>Cable Chest Fly 3x12<br>Dumbbell Bench Press (Neutral Grip) 3x10'],

            ['name' => 'Workout 1', 'muscle_group' => 'Chest', 'level' => 'Intermediate', 'description' => 'Barbell Bench Press 4x8<br>Incline Dumbbell Press 4x10<br>Chest Dips 3x10<br>Cable Crossover 3x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Chest', 'level' => 'Intermediate', 'description' => 'Decline Bench Press 4x8<br>Dumbbell Flys 3x12<br>Push-Ups with Feet Elevated 3x10<br>Machine Chest Press 3x12'],

            ['name' => 'Workout 1', 'muscle_group' => 'Chest', 'level' => 'Advanced', 'description' => 'Barbell Bench Press 5x5<br>Dumbbell Incline Press 4x8<br>Weighted Dips 4x6<br>Plyometric Push-Ups 3x8'],
            ['name' => 'Workout 2', 'muscle_group' => 'Chest', 'level' => 'Advanced', 'description' => 'Floor Press 4x6<br>Single-Arm Dumbbell Press 4x8<br>Cable Flys (Low to High) 3x12<br>Push-Up Variations (Clap, Archer) 3x6'],

            ['name' => 'Workout 1', 'muscle_group' => 'Back', 'level' => 'Beginner', 'description' => 'Lat Pulldown 3x10<br>Seated Cable Row 3x12<br>Face Pulls 3x15<br>Back Extensions 3x15'],
            ['name' => 'Workout 2', 'muscle_group' => 'Back', 'level' => 'Beginner', 'description' => 'Assisted Pull-Ups 3x10<br>Single-Arm Dumbbell Row 3x12<br>Reverse Flys 3x12<br>Hyperextensions 3x15'],

            ['name' => 'Workout 1', 'muscle_group' => 'Back', 'level' => 'Intermediate', 'description' => 'Barbell Bent-Over Rows 4x8<br>T-Bar Row 4x10<br>Lat Pulldown (Wide Grip) 4x10<br>Dumbbell Deadlifts 3x10'],
            ['name' => 'Workout 2', 'muscle_group' => 'Back', 'level' => 'Intermediate', 'description' => 'Pull-Ups 4x6<br>Seated Cable Row (Close Grip) 4x10<br>Chest Supported Dumbbell Row 3x10<br>Face Pulls (with Rope) 3x12'],

            ['name' => 'Workout 1', 'muscle_group' => 'Back', 'level' => 'Advanced', 'description' => 'Deadlifts 5x5<br>Barbell Rows 4x6<br>Weighted Pull-Ups 4x6<br>Single-Arm Dumbbell Row (Heavy) 4x8'],
            ['name' => 'Workout 2', 'muscle_group' => 'Back', 'level' => 'Advanced', 'description' => 'Pendlay Rows 4x6<br>Lat Pulldown (Reverse Grip) 4x8<br>Inverted Rows 4x10<br>Dumbbell Shrugs (Heavy) 4x10'],

            ['name' => 'Workout 1', 'muscle_group' => 'Legs', 'level' => 'Beginner', 'description' => 'Bodyweight Squats 3x10<br>Leg Press Machine 3x12<br>Lunges 3x10 (each leg)<br>Calf Raises 3x15'],
            ['name' => 'Workout 2', 'muscle_group' => 'Legs', 'level' => 'Beginner', 'description' => 'Goblet Squats 3x10<br>Leg Curl Machine 3x12<br>Step-Ups 3x10 (each leg)<br>Seated Calf Raises 3x15'],

            ['name' => 'Workout 1', 'muscle_group' => 'Legs', 'level' => 'Intermediate', 'description' => 'Barbell Squats 4x8<br>Romanian Deadlifts 4x10<br>Leg Extensions 3x12<br>Calf Raises (Standing) 4x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Legs', 'level' => 'Intermediate', 'description' => 'Deadlifts 4x8<br>Bulgarian Split Squats 3x10 (each leg)<br>Leg Press 4x10<br>Seated Calf Raises 4x12'],

            ['name' => 'Workout 1', 'muscle_group' => 'Legs', 'level' => 'Advanced', 'description' => 'Front Squats 5x5<br>Sumo Deadlifts 5x5<br>Walking Lunges with Dumbbells 4x8 (each leg)<br>Calf Raises (Weighted) 4x10'],
            ['name' => 'Workout 2', 'muscle_group' => 'Legs', 'level' => 'Advanced', 'description' => 'Barbell Hip Thrusts 4x8<br>Leg Press (Single Leg) 4x10<br>Pistol Squats 3x6 (each leg)<br>Farmer\'s Walk on Toes 3x30 seconds'],

            ['name' => 'Workout 1', 'muscle_group' => 'Arms', 'level' => 'Beginner', 'description' => 'Bicep Curls (Dumbbell) 3x10<br>Tricep Dips (Bench) 3x10<br>Hammer Curls 3x10<br>Overhead Tricep Extension 3x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Arms', 'level' => 'Beginner', 'description' => 'Concentration Curls 3x10<br>Skull Crushers 3x12<br>Cable Bicep Curls 3x12<br>Tricep Pushdowns 3x12'],

            ['name' => 'Workout 1', 'muscle_group' => 'Arms', 'level' => 'Intermediate', 'description' => 'Barbell Bicep Curls 4x8<br>Close-Grip Bench Press 4x8<br>Preacher Curls 3x10<br>Dumbbell Tricep Kickbacks 3x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Arms', 'level' => 'Intermediate', 'description' => 'Incline Dumbbell Curls 4x10<br>Dumbbell Skull Crushers 4x10<br>Cable Rope Hammer Curls 3x12<br>Overhead Dumbbell Tricep Extension 3x10'],

            ['name' => 'Workout 1', 'muscle_group' => 'Arms', 'level' => 'Advanced', 'description' => 'EZ Bar Bicep Curls 5x5<br>Weighted Dips 4x6<br>Chin-Ups 4x8<br>Dumbbell Tricep Overhead Extension (Single Arm) 4x8'],
            ['name' => 'Workout 2', 'muscle_group' => 'Arms', 'level' => 'Advanced', 'description' => 'Barbell Curls (21s) 4x7<br>Dumbbell Tricep Extensions (Lying) 4x8<br>Cable Bicep Curls (Single Arm) 3x10<br>Bench Dips with Weight 4x6'],

            ['name' => 'Workout 1', 'muscle_group' => 'Shoulders', 'level' => 'Beginner', 'description' => 'Dumbbell Shoulder Press 3x10<br>Lateral Raises 3x12<br>Front Raises 3x12<br>Reverse Flys 3x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Shoulders', 'level' => 'Beginner', 'description' => 'Arnold Press 3x10<br>Upright Rows 3x10<br>Dumbbell Shrugs 3x15<br>Face Pulls 3x12'],

            ['name' => 'Workout 1', 'muscle_group' => 'Shoulders', 'level' => 'Intermediate', 'description' => 'Barbell Overhead Press 4x8<br>Dumbbell Lateral Raises 4x10<br>Cable Front Raises 3x12<br>Dumbbell Rear Delt Flys 3x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Shoulders', 'level' => 'Intermediate', 'description' => 'Military Press 4x8<br>Dumbbell Shoulder Flys 3x10<br>Plate Raises 3x12<br>Face Pulls (with Rope) 3x12'],

            ['name' => 'Workout 1', 'muscle_group' => 'Shoulders', 'level' => 'Advanced', 'description' => 'Push Press 5x5<br>Dumbbell Shoulder Press (Heavy) 4x6<br>Barbell Shrugs 4x8<br>Dumbbell Lateral Raises (Drop Set) 3x10'],
            ['name' => 'Workout 2', 'muscle_group' => 'Shoulders', 'level' => 'Advanced', 'description' => 'Seated Dumbbell Press 4x6<br>Cable Lateral Raises 4x10<br>Landmine Press 4x8<br>Face Pulls (High Rep) 3x15'],

            ['name' => 'Workout 1', 'muscle_group' => 'Core', 'level' => 'Beginner', 'description' => 'Plank 3x30 seconds<br>Russian Twists 3x15 (each side)<br>Bicycle Crunches 3x15<br>Leg Raises 3x10'],
            ['name' => 'Workout 2', 'muscle_group' => 'Core', 'level' => 'Beginner', 'description' => 'Side Plank 3x20 seconds (each side)<br>Mountain Climbers 3x15 (each leg)<br>Flutter Kicks 3x15<br>Crunches 3x15'],

            ['name' => 'Workout 1', 'muscle_group' => 'Core', 'level' => 'Intermediate', 'description' => 'Plank with Shoulder Taps 4x10 (each side)<br>Hanging Leg Raises 4x10<br>Russian Twists with Weight 3x15 (each side)<br>V-Ups 3x12'],
            ['name' => 'Workout 2', 'muscle_group' => 'Core', 'level' => 'Intermediate', 'description' => 'Stability Ball Plank 4x30 seconds<br>Cable Woodchoppers 3x10 (each side)<br>Ab Rollouts 3x10<br>Bicycle Crunches with Hold 3x15'],
            
            ['name' => 'Workout 1', 'muscle_group' => 'Core', 'level' => 'Advanced', 'description' => 'Plank to Push-Up 4x10<br>Dragon Flags 4x6<br>Weighted Russian Twists 4x10 (each side)<br>Hanging Windshield Wipers 3x10 (each side)'],
            ['name' => 'Workout 2', 'muscle_group' => 'Core', 'level' => 'Advanced', 'description' => 'Stability Ball Rollouts 4x8<br>Cable Woodchoppers (Heavy) 4x8 (each side)<br>L-Sit Hold 3x20 seconds<br>Medicine Ball Slams 4x10'],
        ]);
    }
}
