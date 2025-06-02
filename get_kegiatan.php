<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mohamad Bahrudin | Portfolio</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css"
  </head>
  <body>
    <header>
      <div class="container">
        <nav>
          <a href="#" class="logo">
            <img src="logo1.png" alt="Mohamad Bahrudin" class="logo-img" />
          </a>
          <ul class="nav-links">
            <li><a href="#home" class="active">Beranda</a></li>
            <li><a href="#about">Tentang Saya</a></li>
            <li><a href="#kegiatan">Daftar Kegiatan</a></li>
            <li><a href="#contact">Kontak</a></li>
          </ul>
          <div class="hamburger">
            <i class="fas fa-bars"></i>
          </div>
        </nav>
      </div>
    </header>

    <section id="home" class="section">
      <div class="container">
        <div class="hero-content">
          <div class="hero-text">
            <h1>Halo, Saya Mohamad Bahrudin</h1>
            <p>
              Seorang mahasiswa IT dengan passion dalam pengembangan web. Saya
              memiliki pengalaman dalam membangun website dan aplikasi web
              menggunakan teknologi modern.
            </p>
            <a href="#about" class="btn btn-primary">Tentang Saya</a>
            <a href="#kegiatan" class="btn btn-outline">Lihat Kegiatan</a>
          </div>
          <div class="hero-img">
            <img src="u2.jpg" alt="Mohamad Bahrudin" />
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="section">
      <div class="container">
        <h2 class="section-title">Tentang Saya</h2>
        <div class="about-content">
          <div class="about-img">
            <img src="u2.jpg" alt="Mohamad Bahrudin" />
          </div>
          <div class="about-text">
            <h3>Siapa Saya?</h3>
            <p>
              Saya seorang mahasiswa IT yang tinggal di Indonesia dengan
              pengalaman lebih dari 2 bulan dalam membangun situs web dan
              aplikasi web. Saya mengkhususkan diri dalam pengembangan front-end
              tetapi juga memiliki pengalaman dengan teknologi back-end.
            </p>
            <p>
              Perjalanan saya dalam pengembangan web dimulai saat saya kuliah,
              dan sejak saat itu saya terus mempelajari teknologi baru dan
              meningkatkan keterampilan saya.
            </p>
            <p>
              Saat saya tidak sedang membuat kode, Anda dapat menemukan saya
              sedang hiking, membaca buku, atau rebahan dirumah.
            </p>

          <!--  <div class="skills">
              <h4>Keterampilan Saya</h4>
              <div class="skill-item">
                <div class="skill-name">
                  <span>HTML/CSS</span>
                  <span>85%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress" style="width: 85%"></div>
                </div>
              </div>
              <div class="skill-item">
                <div class="skill-name">
                  <span>JavaScript</span>
                  <span>75%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress" style="width: 75%"></div>
                </div>
              </div>
              <div class="skill-item">
                <div class="skill-name">
                  <span>PHP</span>
                  <span>65%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress" style="width: 65%"></div>
                </div>
              </div>
              <div class="skill-item">
                <div class="skill-name">
                  <span>MySQL</span>
                  <span>70%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress" style="width: 70%"></div>
                </div>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </section>

    <!---->
    <section id="kegiatan" class="section">
      <div class="container">
        <h2 class="section-title">Portofolio</h2>
        <div class="kegiatan-container">
          <div class="kegiatan-header">
            <button class="btn btn-primary add-btn" id="addKegiatanBtn">
              <i class="fas fa-plus"></i> Tambah Kegiatan
            </button>
            <div class="kegiatan-search">
              <input type="text" placeholder="Cari kegiatan..." />
              <select class="kegiatan-filter">
                <option value="all">Semua Status</option>
                <option value="selesai">Selesai</option>
                <option value="berlangsung">Berlangsung</option>
                <option value="rencana">Rencana</option>
              </select>
            </div>
          </div>

          <table class="kegiatan-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include 'koneksi.php'; // Sertakan file koneksi database Anda

                // Ambil data dari database
                $query = "SELECT * FROM tb_portofolio ORDER BY waktu_kegiatan DESC";
                $result = mysqli_query($koneksi, $query);

                $no = 1;
                while ($row = mysqli_fetch_assoc($result)):
                // Tentukan status berdasarkan tanggal
                $currentDate = date('Y-m-d');
                $kegiatanDate = $row['waktu_kegiatan'];
                $status = '';
                
                if ($kegiatanDate < $currentDate) {
                  $status = 'selesai';
                  $statusText = 'Selesai';
                  $statusClass = 'status-selesai';
                } elseif ($kegiatanDate == $currentDate) {
                  $status = 'berlangsung';
                  $statusText = 'Berlangsung';
                  $statusClass = 'status-berlangsung';
                } else {
                  $status = 'rencana';
                  $statusText = 'Rencana';
                  $statusClass = 'status-rencana';
                }
              ?>
              <tr data-status="<?php echo $status; ?>">
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['nama_kegiatan']); ?></td>
                <td>
                  <?php echo date('d M Y', strtotime($row['waktu_kegiatan'])); ?>
                </td>
                <td>
                  <span class="kegiatan-status <?php echo $statusClass; ?>"
                    ><?php echo $statusText; ?></span
                  >
                </td>
                <td>
                  <button
                    class="action-btn edit-btn"
                    data-nama-kegiatan="<?php echo urlencode($row['nama_kegiatan']); ?>"
                  >
                    <i class="fas fa-edit"></i> Edit
                  </button>
                  <button
                    class="action-btn delete-btn"
                    data-nama-kegiatan="<?php echo urlencode($row['nama_kegiatan']); ?>"
                  >
                    <i class="fas fa-trash"></i> Hapus
                  </button>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <div class="modal" id="kegiatanModal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalTitle">Tambah Kegiatan Baru</h3>
          <span class="close-btn">×</span>
        </div>
        <form id="kegiatanForm" action="tambah.php" method="POST">
          <input type="hidden" id="kegiatanId" name="id" />
          <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input
              type="text"
              id="nama_kegiatan"
              name="nama_kegiatan"
              class="form-control"
              required
            />
          </div>
          <div class="form-group">
            <label for="waktu_kegiatan">Tanggal Kegiatan</label>
            <input
              type="date"
              id="waktu_kegiatan"
              name="waktu_kegiatan"
              class="form-control"
              required
            />
          </div>
          <div class="form-group">
            <label for="deskripsi_kegiatan">Deskripsi (Opsional)</label>
            <textarea
              id="deskripsi_kegiatan"
              name="deskripsi_kegiatan"
              class="form-control"
              rows="3"
            ></textarea>
          </div>
          <div class="form-actions">
            <button type="button" class="btn btn-outline" id="cancelBtn">
              Batal
            </button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>

    <section id="contact" class="section">
      <div class="container">
        <h2 class="section-title">Hubungi Saya</h2>
        <div class="contact-container">
          <div class="contact-form">
            <form>
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group">
                <label for="subject">Subjek</label>
                <input
                  type="text"
                  id="subject"
                  name="subject"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group">
                <label for="message">Pesan</label>
                <textarea
                  id="message"
                  name="message"
                  class="form-control"
                  required
                ></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
          </div>
          <div class="contact-info">
            <div class="contact-map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126689.01670977833!2d111.8803967!3d-6.8977356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77a1e678000001%3A0x403d278b1d38812!2sTuban%2C%20Tuban%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1717750000000!5m2!1sen!2sid"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
            <div class="info-item">
              <i class="fas fa-map-marker-alt"></i>
              <p>Tuban, Jawa Timur, Indonesia</p>
            </div>
            <div class="info-item">
              <i class="fas fa-envelope"></i>
              <p>bahrudinmohamad85@gmail.com</p>
            </div>
            <div class="info-item">
              <i class="fas fa-phone"></i>
              <p>+62 831-1076-0688</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="social-links">
          <a href="https://github.com/yato-gami1/" target="_blank"
            ><i class="fab fa-github"></i
          ></a>
          <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
          <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
          <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="copyright">© 2025 Mohamad Bahrudin. All rights reserved.</p>
      </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <script>
      // Mobile Navigation
      const hamburger = document.querySelector(".hamburger");
      const navLinks = document.querySelector(".nav-links");

      hamburger.addEventListener("click", () => {
        navLinks.classList.toggle("active");
        hamburger.classList.toggle("active");
      });

      // Close mobile menu when clicking on a link
      document.querySelectorAll(".nav-links a").forEach((link) => {
        link.addEventListener("click", () => {
          navLinks.classList.remove("active");
          hamburger.classList.remove("active");
        });
      });

      // Sticky header on scroll
      window.addEventListener("scroll", () => {
        const header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
      });

      // Back to top button
      const backToTopBtn = document.querySelector(".back-to-top");

      window.addEventListener("scroll", () => {
        if (window.pageYOffset > 300) {
          backToTopBtn.classList.add("active");
        } else {
          backToTopBtn.classList.remove("active");
        }
      });

      // Smooth scrolling for anchor links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();

          const targetId = this.getAttribute("href");
          const targetElement = document.querySelector(targetId);

          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: "smooth",
          });
        });
      });

      // Kegiatan Modal
      const modal = document.getElementById("kegiatanModal");
      const addBtn = document.getElementById("addKegiatanBtn");
      const closeBtn = document.querySelector(".close-btn");
      const cancelBtn = document.getElementById("cancelBtn");
      const modalTitle = document.getElementById("modalTitle");
      const kegiatanForm = document.getElementById("kegiatanForm");
      // const kegiatanId = document.getElementById("kegiatanId"); // Not directly used in the PHP logic for name-based operations

      // Open modal for adding new kegiatan
      addBtn.addEventListener("click", () => {
        modalTitle.textContent = "Tambah Kegiatan Baru";
        kegiatanForm.reset();
        // kegiatanId.value = ""; // Not relevant for name-based operations
        kegiatanForm.action = "tambah.php"; // Set action for adding
        document.getElementById("nama_kegiatan").readOnly = false; // Enable editing nama_kegiatan for new entry
        document.getElementById("deskripsi_kegiatan").value = ""; // Clear description
        modal.style.display = "flex";
      });

      // Close modal
      function closeModal() {
        modal.style.display = "none";
      }

      closeBtn.addEventListener("click", closeModal);
      cancelBtn.addEventListener("click", closeModal);

      // Close modal when clicking outside
      window.addEventListener("click", (e) => {
        if (e.target === modal) {
          closeModal();
        }
      });

      // Edit kegiatan
      document.querySelectorAll(".edit-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
          const row = this.closest("tr");
          const namaKegiatanLama = this.getAttribute("data-nama-kegiatan"); // Get the old name for reference
          const nama = row.cells[1].textContent;
          const tanggal = row.cells[2].textContent;

          // Convert date format from "d M Y" to "Y-m-d"
          const dateParts = tanggal.split(" ");
          const months = {
            Jan: "01",
            Feb: "02",
            Mar: "03",
            Apr: "04",
            Mei: "05", // Corrected for "Mei" in Indonesian context
            Jun: "06",
            Jul: "07",
            Agu: "08", // Corrected for "Agu" in Indonesian context
            Sep: "09",
            Okt: "10", // Corrected for "Okt" in Indonesian context
            Nov: "11",
            Des: "12", // Corrected for "Des" in Indonesian context
          };
          const formattedDate = `${dateParts[2]}-${
            months[dateParts[1]]
          }-${dateParts[0].padStart(2, "0")}`;

          modalTitle.textContent = "Edit Kegiatan";
          // We need to set the hidden input for the old name for proses_edit.php
          let hiddenInputOldName = document.createElement("input");
          hiddenInputOldName.type = "hidden";
          hiddenInputOldName.name = "kegiatan_lama";
          hiddenInputOldName.value = decodeURIComponent(namaKegiatanLama); // Decode URL-encoded name
          kegiatanForm.appendChild(hiddenInputOldName);

          document.getElementById("nama_kegiatan").value = nama;
          document.getElementById("nama_kegiatan").readOnly = true; // Make nama_kegiatan read-only during edit
          document.getElementById("waktu_kegiatan").value = formattedDate;
          document.getElementById("deskripsi_kegiatan").value = ""; // Clear description as it's not in your table
          kegiatanForm.action = "proses_edit.php"; // Set action for editing
          modal.style.display = "flex";
        });
      });

      // Delete kegiatan
      document.querySelectorAll(".delete-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
          if (confirm("Apakah Anda yakin ingin menghapus kegiatan ini?")) {
            const namaKegiatan = this.getAttribute("data-nama-kegiatan");
            window.location.href = `hapus.php?nama_kegiatan=${namaKegiatan}`;
          }
        });
      });

      // Kegiatan filter
      const filterSelect = document.querySelector(".kegiatan-filter");
      filterSelect.addEventListener("change", function () {
        const status = this.value;
        const rows = document.querySelectorAll(".kegiatan-table tbody tr");

        rows.forEach((row) => {
          if (status === "all" || row.getAttribute("data-status") === status) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      });

      // Kegiatan search
      const searchInput = document.querySelector(".kegiatan-search input");
      searchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll(".kegiatan-table tbody tr");

        rows.forEach((row) => {
          const nama = row.cells[1].textContent.toLowerCase();
          if (nama.includes(searchTerm)) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      });

      // Form submission
      const contactForm = document.querySelector("#contact form");

      contactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Get form values
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const subject = document.getElementById("subject").value;
        const message = document.getElementById("message").value;

        // Here you would typically send the form data to a server
        // For this example, we'll just show an alert
        alert(
          `Terima kasih, ${name}! Pesan Anda telah terkirim. Saya akan segera menghubungi Anda.`
        );

        // Reset the form
        contactForm.reset();
      });
    </script>
  </body>
</html>
