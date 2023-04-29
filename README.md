<center><h1>Cara Pemakaian</h1></center>

<h2>Kebutuhan alat</h2>
<ol>
<li>PHP versi 8.1&gt;</li>
<li>Composer</li>
<li>Xampp</li>
</ol>

<h2>Instalasi</h2>
<ol>
    <li>Run git clone <code style="white-space: pre;">https://github.com/danuras/indorecipe.git</code></li>
<li>Pada xampp buat database bernama <code style="white-space: pre;">indorecipe</code> dengan perintah <code style="white-space: pre;">create database indorecepi</code></li>
<li>Run composer install di folder projek yang sudah diclone</li>
    <li>duplikat file <code style="white-space: pre;">.env.example</code> lalu rename hasil duplikatnya dengan <code style="white-space: pre;">.env</code></li>
    <li>konfigurasi file <code style="white-space: pre;">.env</code> seperti berikut:</li>
</ol>
<h3>Pengaturan Database</h3>
<pre>
DB_DATABASE=indorecipe
DB_USERNAME=root
DB_PASSWORD=
</pre>
