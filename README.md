# Katering Yayuk

Katering Yayuk is a website that provides a decision support system for catering menu recommendations using the AHP (Analytical Hierarchy Process) method. With this feature, users can utilize the AHP method to evaluate and select the best catering menu based on various predefined criteria, simplifying the decision-making process in choosing a menu that fits their needs and preferences.

## Tech Stack

- **Laravel 9**
- **MySQL Database**
- **TailwindCSS**
- **daisyUI**

## Features

- Main features available in this application:
  - Login page
  - AHP method implementation
  - Catering menu recommendations for customers with selecting criteria

## Installation

Follow the steps below to clone and run the project in your local environment:

1. Clone repository:

    ```bash
    git clone https://github.com/Akbarwp/Katering-Yayuk.git
    ```

2. Navigate to the project directory:

    ```bash
    cd katering-yayuk
    ```

3. Install dependencies use Composer and NPM:

    ```bash
    composer install
    npm install
    ```

4. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate application key:

    ```bash
    php artisan key:generate
    ```

6. Setup database in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=katering_yayuk
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. Import `katering_yayuk.sql` file in the MySQL database.

8. Run website:

    ```bash
    npm run dev
    php artisan serve
    ```

## Screenshot

- ### **Menu page**

<img src="https://github.com/user-attachments/assets/88003a84-d517-41fd-a01b-8b84ac8b082a" alt="Halaman Daftar Menu Makanan" width="" />
<br><br>

- ### **Recommendation page**

<img src="https://github.com/user-attachments/assets/cd6e7496-7260-492c-90e9-e5071126bf3a" alt="Halaman Rekomendasi" width="" />
<br><br>

- ### **Kriteria, Sub Kriteria, and Alternative page**

<img src="https://github.com/user-attachments/assets/2bf5b3d1-0b5e-411d-a3a0-6595b1ade8ba" alt="Halaman Kriteria" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/d7b13927-04c3-45ea-a513-56c6e063bbfd" alt="Halaman Sub Kriteria" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/cb773c6d-9c89-44f3-80e3-4b2c84744e7e" alt="Halaman Alternatif" width="" />
<br><br>

- ### **Comparison & Matrix Kriteria page**

<img src="https://github.com/user-attachments/assets/eba46dc3-7e51-4191-8b33-cea20ed06c33" alt="Halaman Perbandingan Kriteria" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/3c1b6669-72f4-49af-896c-7c6eb85a309e" alt="Halaman Matiks Nilai Kriteria" width="" />
<br><br>

- ### **AHP Calculation Results page**

<img src="https://github.com/user-attachments/assets/ff49cce9-ecba-4a75-a33d-e165ade8d4bc" alt="Halaman Hasil Perhitungan" width="" />
<br><br>
