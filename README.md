## Description
Terkait program sederhana inventory, 
#modul master
dengan ketentuan ada dua master item dan master location bisa juga disebut master location gudang, dimaster ini ada ketentuan tidak dapat didelete bila sudah ada transactions
#modul transactions
dalam transactions ada 2 kondisi, income dan outcome
#modul reports
dalam modul reports ini mengkalkulasi qty berdasarkan kondisi transactions income dan outcome

## Member
1. NobNob
2. Jeremy
3. Bagus

## System Requirement
- php ^8.2
- laravel 11

## How To Install & Running Apps on local
- Jalankan [ cp .env.example .env ]
- Jalankan [ composer install ]
- Jalankan [ php artisan key:generate ]
- Jalankan [ php artisan config:clear ]
- Jalankan [ php artisan cache:clear ]
- Jalankan [ php artisan migrate ]
    *note : kalau mau drop semua table dan memuat table jalankan [ php artisan migrate:fresh ]
- Jalankan [ php artisan serve ]

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
