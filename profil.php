<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kelas XII TKJ 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <div class="header-wrapper">
            <div class="header">
                <div class="brand">
                    <img src="logo.png" alt="logo" class="logo">
                    <span>TEKNIK KOMPUTER DAN JARINGAN</span>
                </div>
                <nav class="navbar">
<<<<<<< HEAD:profil.php
                    <a href="index.php">HOME</a>
                    <a href="profil.php">Profil Kelas</a>
                    <a href="galery.php">Galeri</a>
                    <a href="hubungi.php">Hubungi kami</a>
=======
                    <a href="index.html">HOME</a>
                    <a href="profil.html">Profil Kelas</a>
                    <a href="galery.html">Galeri</a>
                    <a href="hubungi.html">Hubungi kami</a>
>>>>>>> b4c4b07 (apa saja):profil.html
                </nav>
            </div>
        </div>
        <div class="content">
            <h2 class="section-title">PROFIL KELAS</h2>
            <div class="description">Kelas XII TKJ 3 berada di SMKN 1 RANCAEKEK. Kami fokus pada pembelajaran jaringan, pemrograman, dan infrastruktur TIK.</div>
            <div class="description" style="margin-top:14px;">
                <strong>HERA FRANSISKA, M.T.I</strong> - Kepala Program Studi TKJ
            </div>
            <div class="clipboard-notice" style="flex-direction:column; align-items:flex-start; gap:8px; margin-top:18px;">
                <div class="clipboard-item"><strong>AHMAD KURNIAWAN</strong> - Ketua Kelas</div>
                <div class="clipboard-item"><strong>NURUL ASRIYATIN</strong> - Wakil Ketua</div>
                <div class="clipboard-item"><strong>REGITA NAZA MELANI</strong> - Bendahara</div>
                <div class="clipboard-item"><strong>ARSAL BAGUS ANUGRAH</strong> - Anggota</div>
                <div class="clipboard-item"><strong>DIMAS ANDARU KUSUMO</strong> - Anggota</div>
            </div>

            <h2 class="section-title" style="margin-top:24px;">PROFIL SISWA</h2>
            
            <!-- Filter Section -->
            <div style="display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap;">
                <input type="text" id="filterSearch" placeholder="Cari nama/cita-cita/sosmed..." style="flex: 2; min-width: 200px; padding: 10px; border: 1px solid #c9d9e9; border-radius: 8px;">
                <select id="filterRole" style="flex: 1; min-width: 150px; padding: 10px; border: 1px solid #c9d9e9; border-radius: 8px;">
                    <option value="">Semua Role</option>
                    <option value="KETUA KELAS">Ketua Kelas</option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Siswa">Siswa</option>
                </select>
                <button id="clearFilter" style="padding: 10px 20px; background: #0a2a44; color: white; border: none; border-radius: 8px; cursor: pointer;">Reset</button>
            </div>

            <div class="member-grid" id="memberGrid">
                <!-- Data akan diisi oleh JavaScript -->
            </div>

            <h2 class="section-title" style="margin-top:28px;">TAMBAH PROFIL SISWA</h2>
            <form id="addStudentForm" style="background:#f7fbff;padding:16px;border-radius:16px;border:1px solid #c9d9e9;">
                <div style="margin-bottom:10px;"><label>Nama<br><input type="text" id="studentName" required style="width:100%;padding:8px;border:1px solid #a0b8d0;border-radius:8px;"></label></div>
                <div style="margin-bottom:10px;"><label>URL Foto<br><input type="url" id="studentPhoto" required style="width:100%;padding:8px;border:1px solid #a0b8d0;border-radius:8px;"></label></div>
                <div style="margin-bottom:10px;"><label>Peran (ketua/bendahara/siswa)<br><input type="text" id="studentRole" required style="width:100%;padding:8px;border:1px solid #a0b8d0;border-radius:8px;"></label></div>
                <div style="margin-bottom:10px;"><label>Akun Sosmed<br><input type="text" id="studentSocial" placeholder="IG/Twitter/LinkedIn" style="width:100%;padding:8px;border:1px solid #a0b8d0;border-radius:8px;"></label></div>
                <div style="margin-bottom:10px;"><label>Cita-cita<br><input type="text" id="studentDream" style="width:100%;padding:8px;border:1px solid #a0b8d0;border-radius:8px;"></label></div>
                <button type="submit" style="padding:10px 16px;background:#0a2a44;color:white;border:none;border-radius:8px;cursor:pointer;">Tambah Profil</button>
                <span id="addStatus" style="margin-left:12px; color:#1e3a5f;"></span>
            </form>

            <div class="footer" style="margin-top:24px;">
                <span>© 2026 - XII TKJ 3 SMKN 1 RANCAEKEK</span>
                <span>🔔 Angkatan 2024</span>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('addStudentForm');
        const memberGrid = document.getElementById('memberGrid');
        const status = document.getElementById('addStatus');
        const filterSearch = document.getElementById('filterSearch');
        const filterRole = document.getElementById('filterRole');
        const clearFilter = document.getElementById('clearFilter');

        function addMember(student) {
            const card = document.createElement('div');
            card.className = 'member-card';
            card.innerHTML = `<img src="${student.photo}" alt="${student.name}"><h3>${student.name}</h3><p>Peran: ${student.role}</p><p>Akun: ${student.social}</p><p>Cita-cita: ${student.dream}</p>`;
            memberGrid.appendChild(card);
        }

        function renderStudents(students) {
            memberGrid.innerHTML = '';
            if (!students.length) {
                memberGrid.innerHTML = '<div style="grid-column:1/-1;color:#1e3a5f;">Tidak ada profil sesuai filter.</div>';
                return;
            }
            students.forEach(addMember);
        }

        async function loadStudents() {
            try {
                let url = 'api/students.php';
                const q = filterSearch.value.trim();
                const role = filterRole.value.trim();
                const params = new URLSearchParams();
                if (role) params.set('role', role);
                if (q) params.set('search', q);
                if ([...params].length > 0) {
                    url += '?' + params.toString();
                }

                const res = await fetch(url);
                if (!res.ok) throw new Error('Gagal memuat data');
                const students = await res.json();
                renderStudents(students);
            } catch (err) {
                console.error(err);
                status.textContent = 'Tidak dapat mengambil data siswa dari server.';
            }
        }

        filterSearch.addEventListener('input', loadStudents);
        filterRole.addEventListener('change', loadStudents);
        clearFilter.addEventListener('click', (e) => {
            e.preventDefault();
            filterSearch.value = '';
            filterRole.value = '';
            loadStudents();
        });

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const student = {
                name: document.getElementById('studentName').value.trim(),
                photo: document.getElementById('studentPhoto').value.trim(),
                role: document.getElementById('studentRole').value.trim(),
                social: document.getElementById('studentSocial').value.trim() || 'Tidak ada',
                dream: document.getElementById('studentDream').value.trim() || 'Belum diisi'
            };

            if (!student.name || !student.photo || !student.role) {
                status.textContent = 'Lengkapi nama, foto, dan peran!';
                return;
            }

            try {
                const res = await fetch('api/students.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(student)
                });

                if (!res.ok) {
                    const data = await res.json();
                    throw new Error(data.error || 'Gagal menambahkan');
                }

                const created = await res.json();
                addMember(created);
                status.textContent = 'Berhasil! Profil siswa tersimpan.';
                form.reset();
                setTimeout(() => status.textContent = '', 3000);
            } catch (err) {
                console.error(err);
                status.textContent = `Gagal menyimpan profil: ${err.message}`;
            }
        });

        loadStudents();
    </script>
</body>
</html>