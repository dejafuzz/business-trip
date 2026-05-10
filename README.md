# Aplikasi Perjalanan Dinas (Perdin)

Aplikasi Perjalanan Dinas (Perdin) merupakan aplikasi berbasis web yang digunakan untuk melakukan pengelolaan perjalanan dinas pegawai dalam sebuah perusahaan. Aplikasi ini memungkinkan pegawai melakukan pengajuan perjalanan dinas serta membantu bagian SDM dalam melakukan approval dan perhitungan uang saku perjalanan dinas secara otomatis berdasarkan jarak dan lokasi tujuan perjalanan.

---

# Features

## Authentication & Authorization

* Login menggunakan username dan password
* Role management:

  * ADMIN
  * PEGAWAI
  * SDM

## Admin

* Kelola User

## Pegawai

* Mengajukan perjalanan dinas
* Melihat daftar pengajuan perjalanan dinas
* Perhitungan otomatis:

  * Durasi perjalanan
  * Jarak perjalanan
  * Total uang saku

## SDM

* Melihat seluruh pengajuan perjalanan dinas
* Approve / Reject pengajuan
* Melihat total uang saku yang harus dibayarkan

## Master Data Kota

* Nama kota
* Latitude & Longitude
* Provinsi
* Pulau
* Status luar negeri

---

# Tech Stack

| Name       | Version |
| --------   | ------- |
| Laravel    | ```v10```     |
| php        | ```v8.2.28``` |
| PostgreSQL | ```v15.13``` |
| Bootstrap  | ```v5.3```    |

---

# Database Design

## roles

| Column   | Type    |
| -------- | ------- |
| id_role  | bigint  |
| level    | varchar |

## users

| Column   | Type    |
| -------- | ------- |
| id       | bigint  |
| name     | varchar |
| username | varchar |
| password | varchar |
| role     | varchar |

---

## cities

| Column     | Type    |
| ---------- | ------- |
| id         | bigint  |
| name       | varchar |
| latitude   | decimal |
| longitude  | decimal |
| province   | varchar |
| island     | varchar |
| is_foreign | boolean |

---

## business_trips

| Column              | Type      |
| ------------------- | --------- |
| id                  | bigint    |
| employee_id         | bigint    |
| origin_city_id      | bigint    |
| destination_city_id | bigint    |
| purpose             | text      |
| departure_date      | date      |
| return_date         | date      |
| duration_days       | integer   |
| distance_km         | decimal   |
| daily_allowance     | decimal   |
| currency            | varchar   |
| total_allowance     | decimal   |
| status              | varchar   |
| approved_by         | bigint    |
| approved_at         | timestamp |

---

# Business Rules

## Uang Saku Perjalanan Dinas

| Kondisi                          | Nominal                  |
| -------------------------------- | ------------------------ |
| 0 - 60 KM                        | Tidak mendapat uang saku |
| > 60 KM dalam satu provinsi      | Rp 200.000 / hari        |
| > 60 KM beda provinsi satu pulau | Rp 250.000 / hari        |
| > 60 KM beda pulau               | Rp 300.000 / hari        |
| Luar Negeri                      | USD 50 / hari            |

---

# Perhitungan Jarak

Perhitungan jarak menggunakan koordinat latitude dan longitude antar kota dengan metode Haversine Formula.

---

# Installation

## Clone Repository

```bash
git clone https://github.com/dejafuzz/business-trip.git
```

## Masuk ke Folder Project

```bash
cd business-trip
```

## Install Dependency

```bash
composer install
```

## Copy Environment

```bash
cp .env.example .env
```

## Generate Key

```bash
php artisan key:generate
```

## Setup Database

Sesuaikan konfigurasi database pada file `.env`

```env
DB_DATABASE=perdin-example
DB_USERNAME=root-example
DB_PASSWORD=
```

## Run Migration

```bash
php artisan migrate
```

## Run Seeder

```bash
php artisan db:seed
```

## Jalankan Server

```bash
php artisan serve
```

---

# Status Pengajuan

* PENDING
* APPROVED
* REJECTED
