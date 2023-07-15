-- ini untuk keperluan initialisasi kategori dan soal
INSERT INTO `categories` (`name`, `target`) VALUES
('Pedagogik', 'Penilai'),
('Kepribadian', 'Penilai'),
('Sosial', 'Penilai'),
('Profesional', 'Penilai'),
('Kedisiplinan', 'Penilai'),
('Loyalitas Dan Tanggung Jawab', 'Penilai');

INSERT INTO `categories` (`name`, `target`) VALUES
('Prilaku Guru sehari-hari', 'Teman Sejawat'),
('Hubungan Guru dengan Teman Sejawat', 'Teman Sejawat'),
('Prilaku Profesional Guru', 'Teman Sejawat');

INSERT INTO `categories` (`name`, `target`) VALUES
('Komunikasi', 'Orang Tua'),
('Kepercayaan dalam memberikan pendidikan kepada peserta didik', 'Orang Tua');

INSERT INTO `categories` (`name`, `target`) VALUES
('Penguasaan Materi', 'Siswa'),
('Kemahiran dalam Mengajar', 'Siswa'),
('Perilaku Profesional Guru ', 'Siswa'),
('Hubungan Sosial dengan Peserta Didik', 'Siswa');

INSERT INTO `categories` (`parent_id`,`name`,`target`) VALUES 
(1, 'Menguasai karakteristik peserta didik','Penilai'),
(1, 'Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik','Penilai'),
(1, 'Pengembangan kurikulum','Penilai'),
(1, 'Kegiatan pembelajaran yang mendidik','Penilai'),
(1, 'Pengembangan potensi peserta didik','Penilai'),
(1, 'Komunikasi dengan peserta didik','Penilai'),
(1, 'Penilaian dan evaluasi','Penilai'),
(2, 'Bertindak sesuai dengan norma agama, hukum, sosial dan kebudayaan Nasional','Penilai'),
(2, 'Menunjukkan pribadi yang dewasa dan teladan','Penilai'),
(2, 'Etos kerja, tanggung jawab yang tinggi, rasa bangga menjadi guru','Penilai'),
(3, 'Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif','Penilai'),
(3, 'Komunikasi dengan sesama guru, tenaga kependidikan, orang tua, peserta didik, dan masyarakat','Penilai'),
(4, 'Penguasaan materi, struktur, konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu','Penilai'),
(4, 'Mengembangkan keprofesionalan melalui tindakan yang reflektif','Penilai'),
(5, 'Taat Terhadap kebijakan yang Berlaku Di Sekolah','Penilai'),
(6, 'Bersikap Loyal terhadap lembaga dan memiliki integritas dalam bertugas','Penilai');

INSERT INTO `questions` (`categorie_id`,`description`) VALUES
(16, 'Guru dapat mengidentifikasi karakteristik belajarsetiap peserta didik di kelasnya.'),
(16, 'Guru  memastikan  bahwa  semua  peserta  didik mendapatkan  kesempatan  yang  sama  untuk berpartisipasi  aktif  dalam  kegiatan  pembelajaran.'),
(16, 'Guru  dapat  mengatur  kelas  untuk  memberikan kesempatan  belajar  yang  sama  pada  semua peserta  didik  dengan  kelainan  fisik  dan kemampuan  belajar  yang  berbeda.'),
(16, 'Guru  mencoba  mengetahui  penyebab penyimpangan  perilaku  peserta  didik  untuk mencegah  agar  perilaku  tersebut  tidak  merugikan peserta  didik  lainnya.'),
(16, 'Guru  membantu  mengembangkan  potensi  dan mengatasi  kekurangan  peserta  didik.'),
(16, 'Guru  memperhatikan  peserta  didik  dengan kelemahan  fisik  tertentu  agar  dapat  mengikuti aktivitas  pembelajaran,  sehingga  peserta  didik tersebut  tidak  termarginalkan  (tersisihkan,  diolok‐olok,  minder,  dsb.).'),
(17, 'Guru  memberi  kesempatan  kepada  peserta  didik untuk  menguasai  materi  pembelajaran  sesuai  usia dan  kemampuan  belajarnya  melalui  pengaturan proses  pembelajaran  dan  aktivitas  yang  bervariasi.'),
(17, 'Guru  selalu  memastikan  tingkat  pemahaman  peserta didik  terhadap  materi  pembelajaran  tertentu  dan menyesuaikan  aktivitas  pembelajaran  berikutnya berdasarkan  tingkat  pemahaman  tersebut.'),
(17, 'Guru  dapat  menjelaskan  alasan  pelaksanaan kegiatan/aktivitas  yang  dilakukannya,  baik  yang sesuai  maupun  yang  berbeda  dengan  rencana, terkait  keberhasilan  pembelajaran.'),
(17, 'Guru  menggunakan  berbagai  teknik  untuk memotiviasi  kemauan  belajar  peserta  didik.'),
(17, 'Guru  merencanakan  kegiatan  pembelajaran  yang saling  terkait  satu  sama  lain,  dengan  memperhatikan tujuan  pembelajaran  maupun  proses  belajar  peserta didik.'),
(17, 'Guru  memperhatikan  respon  peserta  didik  yang belum/kurang  memahami  materi  pembelajaran  yang diajarkan  dan  menggunakannya  untuk  memperbaiki rancangan  pembelajaran  berikutnya.'),
(18, 'Guru  dapat  menyusun  silabus  yang  sesuai  dengan kurikulum.'),
(18, 'Guru  merancang  rencana  pembelajaran  yang  sesuai dengan  silabus  untuk  membahas  materi  ajar tertentu  agar  peserta  didik  dapat  mencapai kompetensi  dasar  yang  ditetapkan.'),
(18, 'Guru  mengikuti  urutan  materi  pembelajaran dengan  memperhatikan  tujuan  pembelajaran.'),
(18, 'Guru  memilih  materi  pembelajaran  yang:  a)  sesuai dengan  tujuan  pembelajaran,  b)  tepat  dan mutakhir,  c)  sesuai  dengan  usia  dan  tingkat kemampuan  belajar  peserta  didik,  dan  d)  dapat dilaksanakan  di  kelas  e)  sesuai  dengan  konteks kehidupan  sehari‐hari  peserta  didik.'),
(19, 'Guru  melaksanakan  aktivitas  pembelajaran  sesuai  dengan rancangan  yang  telah  disusun  secara  lengkap  dan pelaksanaan  aktivitas  tersebut  mengindikasikan  bahwa  guru mengerti  tentang  tujuannya.'),
(19, 'Guru  melaksanakan  aktivitas  pembelajaran  yang  bertujuan untuk  membantu  proses  belajar  peserta  didik,  bukan  untuk menguji  sehingga  membuat  peserta  didik  merasa  tertekan.'),
(19, 'Guru  mengkomunikasikan  informasi  baru  (misalnya  materi tambahan)  sesuai  dengan  usia  dan  tingkat  kemampuan belajar  peserta  didik.'),
(19, 'Guru  menyikapi  kesalahan  yang  dilakukan  peserta  didik sebagai  tahapan  proses  pembelajaran,  bukan  semata‐mata kesalahan  yang  harus  dikoreksi.  Misalnya:  dengan mengetahui  terlebih  dahulu  peserta  didik  lain  yang  setuju atau  tidak  setuju  dengan  jawaban  tersebut,  sebelum memberikan  penjelasan  tentang  jawaban  yang  benar.'),
(19, 'Guru  melaksanakan  kegiatan  pembelajaran  sesuai  isi kurikulum  dan  mengkaitkannya  dengan  konteks  kehidupan sehari‐hari  peserta  didik.'),
(19, 'Guru  melakukan  aktivitas  pembelajaran  secara  bervariasi dengan  waktu  yang  cukup  untuk  kegiatan  pembelajaran yang  sesuai  dengan  usia  dan  tingkat  kemampuan  belajar  dan mempertahankan  perhatian  peserta  didik.'),
(19, 'Guru  mengelola  kelas  dengan  efektif  tanpa  mendominasi atau  sibuk  dengan  kegiatannya  sendiri  agar  semua  waktu peserta  dapat  termanfaatkan  secara  produktif.'),
(19, 'Guru  mampu  menyesuaikan  aktivitas  pembelajaran  yang dirancang  dengan  kondisi  kelas.'),
(19, 'Guru  memberikan  banyak  kesempatan  kepada  peserta  didik untuk  bertanya,  mempraktekkan  dan  berinteraksi  dengan peserta  didik  lain.'),
(19, 'Guru  mengatur  pelaksanaan  aktivitas  pembelajaran  secara sistematis  untuk  membantu  proses  belajar  peserta  didik. Sebagai  contoh:  guru  menambah  informasi  baru  setelah mengevaluasi  pemahaman  peserta  didik  terhadap  materi sebelumnya.'),
(19, 'Guru  menggunakan  alat  bantu  mengajar,  dan/atau  audio‐visual  (termasuk  TIK)  untuk  meningkatkan  motivasi  belajar peserta  didik  dalam  mencapai  tujuan  pembelajaran.'),
(20, 'Guru  menganalisis  hasil  belajar  berdasarkan segala  bentuk  penilaian  terhadap  setiap  peserta didik  untuk  mengetahui  tingkat  kemajuan  masing‐masing.'),
(20, 'Guru  merancang  dan  melaksanakan  aktivitas pembelajaran  yang  mendorong  peserta  didik untuk  belajar  sesuai  dengan  kecakapan  dan  pola belajar  masing‐masing.'),
(20, 'Guru  merancang  dan  melaksanakan  aktivitas pembelajaran  untuk  memunculkan  daya kreativitas  dan  kemampuan  berfikir  kritis  peserta didik.'),
(20, 'Guru  secara  aktif  membantu  peserta  didik  dalam proses  pembelajaran  dengan  memberikan perhatian  kepada  setiap  individu.'),
(20, 'Guru  dapat  mengidentifikasi  dengan  benar tentang  bakat,  minat,  potensi,  dan  kesulitan belajar  masing-masing  peserta  didik. '),
(20, 'Guru  memberikan  kesempatan  belajar  kepada peserta  didik  sesuai  dengan  cara  belajarnya masing-masing. '),
(20, 'Guru  memdengan  peserta  didik  dan  mendorongnya  untuk memahami  dan  menggunakan  informasi  yang disampaikan. usatkan  perhatian  pada  interaksi '),
(21, 'Guru  menggunakan  pertanyaan  untuk  mengetahui pemahaman  dan  menjaga  partisipasi  peserta  didik, termasuk  memberikan  pertanyaan  terbuka  yang menuntut  peserta  didik  untuk  menjawab  dengan  ide dan  pengetahuan  mereka. '),
(21, 'Guru  memberikan  perhatian  dan  mendengarkan semua  pertanyaan  dan  tanggapan  peserta  didik, tanpa  menginterupsi,  kecuali  jika  diperlukan  untuk membantu  atau  mengklarifikasi pertanyaan/tanggapan  tersebut. '),
(21, 'Guru  menanggapinya  pertanyaan  peserta  didik secara  tepat,  benar,  dan  mutakhir,  sesuai  tujuan pembelajaran  dan  isi  kurikulum,  tanpa mempermalukannya. '),
(21, 'Guru  menyajikan  kegiatan  pembelajaran  yang  dapat menumbuhkan  kerja  sama  yang  baik  antar pesertadidik. '),
(21, 'Guru  mendengarkan  dan  memberikan  perhatian terhadap  semua  jawaban  peserta  didik  baik  yang benar  maupun  yang  dianggap  salah  untuk  mengukur tingkat  pemahaman  peserta  didik. '),
(21, 'Guru  memberikan  perhatian  terhadap  pertanyaan peserta  didik  dan  meresponnya  secara  lengkap  dan relevan  untuk  menghilangkan  kebingungan  pada peserta  didik.'),
(22, 'Guru  menyusun  alat  penilaian  yang  sesuai  dengan tujuan  pembelajaran  untuk  mencapai  kompetensi tertentu  seperti  yang  tertulis  dalam  RPP. '),
(22, 'Guru  melaksanakan  penilaian  dengan  berbagai teknik  dan  jenis  penilaian,  selain  penilaian  formal yang  dilaksanakan  sekolah,  dan  mengumumkan hasil  serta  implikasinya  kepada  peserta  didik, tentang  tingkat  pemahaman  terhadap  materi pembelajaran  yang  telah  dan  akan  dipelajari. '),
(22, 'Guru  menganalisis  hasil  penilaian  untuk mengidentifikasi  topik/kompetensi  dasar  yang  sulit sehingga  diketahui  kekuatan  dan  kelemahan masing‐masing  peserta  didik  untuk  keperluan remedial  dan  pengayaan. '),
(22, 'Guru  memanfaatkan  masukan  dari  peserta  didik dan  merefleksikannya  untuk  meningkatkan pembelajaran  selanjutnya,  dan  dapat membuktikannya  melalui  catatan,  jurnal pembelajaran,  rancangan  pembelajaran,  materi tambahan,  dan  sebagainya. '),
(22, 'Guru  memanfatkan  hasil  penilaian  sebagai  bahan penyusunan  rancangan  pembelajaran  yang  akan dilakukan  selanjutnya. ');