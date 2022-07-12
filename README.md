# Sistem Informasi Iuran Kas RT 
## _"Siforate FHika"_

[![Siforate FHika](public/assets/images/logogepeng.png)](https://siforate.portofolio.febroherdyanto.id/public/)

[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/febroherdyanto/si_iuranrt)


| Description | Hyperlink|
|---|---|
| Demo Website | https://siforate.portofolio.febroherdyanto.id/public/ |
| Github | https://github.com/febroherdyanto/si_iuranrt |
| User Guide | https://siforate.portofolio.febroherdyanto.id/public/User-Guide.pdf |


## Apa itu Siforate FHika?

**Siforate FHika** adalah sebuah Sistem Informasi Iuran Kas RT bebasis Website yang dibuat menggunakan Framework PHP CodeIgniter v.4.2.

Website ini dibuat untuk memenuhi Tugas Akhir / Ujian Akhir Semester 4 mata kuliah **Pemrograman Website**. Mata kuliah ini diampu oleh Dosen Bapak. Agung Nugroho,S.Kom.,M.Kom , Program Studi Teknik Informatika - Universitas Pelita Bangsa Cikarang.



## Fitur Website

- Data Warga (Pengelolaan : Tambah, Edit, dan Hapus Data Warga)
- Data Iuran Warga (Pengelolaan : Tambah, Edit dan Hapus Data Transaksi Iuran Warga)
- Laporan Warga yang belum membayar Iuran 
- Laporan Kas Warga (Bulan dan Tahun)
- Manajemen Profil _(Akan segera dikembangkan)_
- Majemen User/Akun _(Akan segera dikembangkan)_

## Penggunaan Teknologi

**Siforate FHika** dibuat dan didukung oleh beberapa perangkat lunak _Open Source_, diantaranya:

- [CodeIgniter](https://www.codeigniter.com/) - PHP Framework
- [Visual Studio Code](https://code.visualstudio.com/) - IDE Text Editor
- [Git](https://git-scm.com/) - Version Control System Software
- [Boostrap](https://getbootstrap.com/) - CSS Framework Responsive
- [Ampps](https://ampps.com/) - Local Web Server
- dll


## Instalasi Website

Untuk melakukan installasi **Siforate FHika**, pastikan Anda sudah melakukan instalasi Lokal Web Server (XAMPP / Ampps).

Lakukan perintah berikut pada terminal dan arahkan ke di _root directory_ :

```sh
$ php spark serve
```

## Perubahan File Konfigurasi

Lakukan beberapa parubahan yang ada pada konfigurasi Sistem Informasi Siforate FHika. 

- **.env**

```sh
CI_ENVIRONMENT = production # Diubah menjadi development
```




```sh
#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost # Disesuaikan dengan Server Anda
database.default.database = si_iuran # Disesuaikan dengan Database Anda
database.default.username = root  # Disesuaikan dengan Server Anda
database.default.password = mysql # Disesuaikan dengan Server Anda
database.default.DBDriver = MySQLi
database.default.DBPrefix =
```

<hr>

- **App\Config\App.php**

```sh
public $baseURL = 'http://localhost:8080/'; #Disesuaikan dengan URL Server
```

<hr>

- **App\Config\Database.php**

```sh
    public $default = [
        'DSN'      => '',
        'hostname' => 'localhost', # Disesuaikan dengan Server Anda
        'username' => 'root', # Disesuaikan dengan Server Anda
        'password' => 'mysql', # Disesuaikan dengan Server Anda
        'database' => 'si_iuran', # Disesuaikan dengan Database Anda
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];
```



## License

[GNU General Public License v3.0](LICENSE)

```sh
Copyright (C) 2007 Free Software Foundation, Inc. <https://fsf.org/> Everyone is permitted to copy and distribute verbatim copies  of this license document, but changing it is not allowed.
```

# THANK YOU !