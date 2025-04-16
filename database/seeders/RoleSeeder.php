<?php
namespace Database\Seeders;
use App\Models\User;
use App\Role;
use App\Perm;
use App\Guid;

use Database\Factories\FakerPerson;
use Faker\Generator as Faker;
use Faker\Provider as FakerProvider;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
/**
 * Command to generate seed data
 * -----------------------------
 *  composer dump-autoload
 *  php artisan db:seed --class=RoleSeeder
 */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /**
         * Generate system roles
         */
        $roles = $this->roles();

        foreach ($roles as $item) {
            Role::firstOrCreate(['roles' => $item['roles']], $item);
        }
        /**
         * Generate system admin
         */
        $users = $this->users($faker);

        foreach ($users as $item) {
            if (User::where('email', $item['email'])->first() == false) {
                User::create($item);
            }
        }
    }

    public function roles()
    {
        return [
            [
                'roles' => 'admin',
                'name' => 'Admin',
                'level' => '1',
                'description' => 'Admin has all permission',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'manager',
                'name' => 'Manager',
                'level' => '2',
                'description' => 'System management',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'publisher',
                'name' => 'Publisher',
                'level' => '3',
                'description' => 'Publisher',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'sponsor',
                'name' => 'Sponsor',
                'level' => '4',
                'description' => 'Sponsor who sponsor for Demen',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'accountant',
                'name' => 'Accountant',
                'level' => '5',
                'description' => 'Accountant',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'school',
                'name' => 'School',
                'level' => '6',
                'description' => 'School management',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'teacher',
                'name' => 'Teacher',
                'level' => '7',
                'description' => 'Teacher',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'bookcase',
                'name' => 'Bookcase',
                'level' => '8',
                'description' => 'Bookcase management',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roles' => 'parent',
                'name' => 'Parent',
                'level' => '9',
                'description' => 'Parent',
                'perms' => json_encode(Perm::all()),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
    }

    public function users($faker)
    {
        $faker->addProvider(new FakerPerson($faker));
        $faker->addProvider(new FakerProvider\vi_VN\Address($faker));
        $faker->addProvider(new FakerProvider\vi_VN\PhoneNumber($faker));

        return [
            [
                'name' => 'Demen Admin',
                'email' => 'admin@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'admin',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Demen Manager',
                'email' => 'manager@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'manager',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            // Publisher
            [
                'name' => 'Kim Dong Manager',
                'email' => 'kimdong@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Đông A Manager',
                'email' => 'donga@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Nhã Nam Manager',
                'email' => 'nhanam@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Phụ Nữ Manager',
                'email' => 'phunu@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Olmega Manager',
                'email' => 'olmega@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'NXB Trẻ Manager',
                'email' => 'nxbtre@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Long Minh Manager',
                'email' => 'longminh@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Đông Tây Manager',
                'email' => 'dongtay@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'publisher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            // Sponsor
            [
                'name' => 'Sponsor Demo',
                'email' => 'sponsor@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'sponsor',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'School Demo',
                'email' => 'school@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'school',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Teacher Demo',
                'email' => 'teacher@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'teacher',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Bookcase Demo',
                'email' => 'bookcase@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'bookcase',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Parent Demo',
                'email' => 'parent@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'parent',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Accountant Demo',
                'email' => 'accountant@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'accountant',
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'demo',
                'email' => 'user@gmail.com',
                'password' => 'password', // password
                'remember_token' => Str::random(10),
                'avatar' => null,
                'cover' => null,
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile' => $faker->e164PhoneNumber,
                'location' => null,
                'publisher' => null,
                'birthday' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'about' => $faker->text,
                'roles' => json_encode([
                    'user'
                ]),
                'status' => 1,
                'verified' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
        ];
    }
}
