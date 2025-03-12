<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Quota;
use App\Models\Smt;
use App\Models\Student;
use App\Models\Thesis;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('12345678'),
            'role' => 'admin',
            'nim' => null,
            'remember_token' => Str::random(10),

        ]);
        User::create([
            'name' => 'ANINDITA GIRINDRA WARDHANI',
            'email' => 'nin@mail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('12345678'),
            'role' => 'student',
            'nim' => '231003741011353',
            'remember_token' => Str::random(10),
        ]);


        Smt::create([
            'smt' => '20242',
            'year' => '2025',
            'abbr' => '2024/2025 Genap',
            'now' => true
        ]);

        Smt::first()->get('id');

        Quota::create([
            'smt' => '20242',
            'max' => 6,
            'nidn' => '0614096602',
            'quota_at_smt' => 0,
            'smt_id' => collect(Smt::first()->get('id'))->first()->id,
        ]);
        Lecture::create([
            'nidn' => '0614096602',
            'name' => 'Prof. Dr. Sri Mulyani, SH.,M.Hum',
            'email' => 'sri-mulyani@untagsmg.ac.id',
            'jafa' => 'Profesor',
            'gol' => 'IV/C',
            'nuptk' => '9246744645230083',
        ]);

        Lecture::create([
            'nidn' => '0608076201',
            'name' => 'DR. YULIES TIENA MASRIANI, S.H., M.HUM., M.KN',
            'email' => 'sri-mulyani@untagsmg.ac.id',
            'jafa' => 'Lektor Kepala',
            'gol' => 'IV/B',
            'nuptk' => '9246744645230084',
        ]);
        Lecture::create([
            'nidn' => '0609026301',
            'name' => 'DR. BAMBANG JOYO SUPENO SH MHUM',
            'email' => 'mulyani@untagsmg.ac.id',
            'jafa' => 'Lektor Kepala',
            'gol' => 'IV/B',
            'nuptk' => '9246744645230087',
        ]);

        Student::create([
            'nim'=> '231003741011353',
            'name'=> 'ANINDITA GIRINDRA WARDHANI',
            'email'=> 'nin@mail.com',
            'major'=> '11',
            'place_date'=> 'semarang',
            'birth_date'=> '2024-02-02',
        ]);

        Student::create([
            'nim'=> '241003741011439',
            'name'=> 'IMRON CHUMAIDI',
            'email'=> 'iron@mail.com',
            'major'=> '11',
            'place_date'=> 'semarang',
            'birth_date'=> '2024-02-02',
        ]);
        Student::create([
            'nim'=> '241003741011438',
            'name'=> 'ELANG SATMOKO',
            'email'=> 'el@mail.com',
            'major'=> '12',
            'place_date'=> 'semarang',
            'birth_date'=> '2024-02-02',
        ]);

        Student::create([
            'nim'=> '1',
            'name'=> 'Mahasiswa Test',
            'email'=> 'test@mail.com',
            'major'=> '13',
            'place_date'=> 'semarang',
            'birth_date'=> '2024-02-02',
        ]);

        Student::create([
            'nim'=> '2',
            'name'=> 'Mahasiswa Banget',
            'email'=> 'test2@mail.com',
            'major'=> '13',
            'place_date'=> 'semarang',
            'birth_date'=> '2024-02-02',
        ]);

        Thesis::create([
            'title_final'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'smt'=> '20242',
            'year'=> '2025',
            'das_sein'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'das_sollen'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'gaps'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'formulation'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'title_promise'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'title_proposal'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'title_shp'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'title_thesis'=> 'TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT',
            'status_promise'=> '1',
            'status_proposal'=> '1',
            'status_shp'=> '1',
            'status_thesis'=> '1',
            'disabled_promise'=> '1',
            'disabled_proposal'=> '1',
            'disabled_shp'=> '1',
            'disabled_thesis'=> '1',
            'student_id'=> '231003741011353',
            'leader'=> '0614096602',
            'promotor'=> '0614096602',
            'method'=> '0614096602',
            'moderator'=> '0614096602',
        ]);
    }

}
