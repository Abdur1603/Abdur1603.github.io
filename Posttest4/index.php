<?php
    $membership1 = [
      "durasi" => 1,
      "harga" => 50000,
      "gambar" => "Media/lvl1giga.png",
    ];
    $membership2 = [
      "durasi" => 3,
      "harga" => 100000,
      "gambar" => "Media/lvl2giga.png",
    ];
    $membership3 = [
      "durasi" => 6,
      "harga" => 150000,
      "gambar" => "Media/lvl3giga.png",
    ];
  include 'template/navbar.php';
  include 'template/header.php';
?>
    <section class="main">
      <section id="classes">
        <div class="border-text">CLASSES</div>
        <div class="classes-items">
          <div class="classes-item">
            <img src="Media/giga-bodybuilding.png" alt="Project 1" />
            <h1>BODY BUILDING</h1>
            <p>
              You’ll look at graphs and charts in Task One, how to approach the
              task
            </p>
          </div>
          <div class="classes-item">
            <img src="Media/giga-musclegain.png" alt="Project 1" />
            <h1>MUSCLE GAIN</h1>
            <p>
              You’ll look at graphs and charts in Task One, how to approach the
              task
            </p>
          </div>
          <div class="classes-item">
            <img src="Media/giga-weightloss.png" alt="Project 1" />
            <h1>WEIGHT LOSS</h1>
            <p>
              You’ll look at graphs and charts in Task One, how to approach the
              task
            </p>
          </div>
        </div>
      </section>
      <section id="membership">
        <div class="border-text">MEMBERSHIP</div>
        <div class="membership-items">
          <div class="membership-item">
            <img src="<?=$membership1['gambar']?>" alt="Membership 1" />
            <h3><?=$membership1['durasi']?> Bulan</h3>
            <h4>Rp<?=$membership1['harga']?>,00</h4>
            <ul>
              <li class="centang">Free Gym Access</li>
              <li class="centang">Weight losing classes</li>
              <li class="silang">Free Diet Plan</li>
              <li class="silang">Free Supplement</li>
              <li class="silang">Personal Trainer</li>
            </ul>
            <button class="btn">
              <a href="form.php?durasi=<?=$membership1['durasi']?>&harga=<?=$membership1['harga']?>&gambar=<?=$membership1['gambar']?>" class="order">Pesan Sekarang</a>
            </button>
          </div>
          <div class="membership-item">
            <img src="<?=$membership2['gambar']?>" alt="Membership 2" />
            <h3><?=$membership2['durasi']?> Bulan</h3>
            <h4>Rp<?=$membership2['harga']?>,00</h4>
            <ul>
              <li class="centang">Free Gym Access</li>
              <li class="centang">Weight losing classes</li>
              <li class="centang">Free Diet Plan</li>
              <li class="centang">Free Supplement</li>
              <li class="silang">Personal Trainer</li>
            </ul>
            <button class="btn">
              <a href="form.php?durasi=<?=$membership2['durasi']?>&harga=<?=$membership2['harga']?>&gambar=<?=$membership2['gambar']?>" class="order">Pesan Sekarang</a>
            </button>
          </div>
          <div class="membership-item">
            <img src="<?=$membership3['gambar']?>" alt="Membership 3" />
            <h3><?=$membership3['durasi']?> Bulan</h3>
            <h4>Rp<?=$membership3['harga']?>,00</h4>
            <ul>
              <li class="centang">Free Gym Access</li>
              <li class="centang">Weight losing classes</li>
              <li class="centang">Free Diet Plan</li>
              <li class="centang">Free Supplement</li>
              <li class="centang">Personal Trainer</li>
            </ul>
            <button class="btn">
              <a href="form.php?durasi=<?=$membership3['durasi']?>&harga=<?=$membership3['harga']?>&gambar=<?=$membership3['gambar']?>" class="order">Pesan Sekarang</a>
            </button>
          </div>
        </div>
      </section>
    </section>
    <div id="about" class="about-container">
      <div class="about-image">
        <img src="Media/profilePicture.jpg" alt="Foto pembuat WEB" />
      </div>
      <div class="about-text">
        <h1>About me</h1>
        <h4>Perkenalkan Nama Saya Abdurahman Shidiq | 2309106068</h4>

        <p>
          Saya adalah seorang mahasiswa di Universitas Mulawarman yang sedang
          menempuh pendidikan di jurusan Teknik Informatika. Website ini adalah
          website yang berhubungan dengan gym. Website ini berisi tentang
          kelas-kelas gym yang bisa diikuti, membership yang bisa dipilih, dan
          tentang saya.
        </p>
      </div>
    </div>
<?php
  include 'template/footer.php';
?>
