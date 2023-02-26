-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2023 pada 02.22
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `client_id` int(2) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(2, 'Islam'),
(3, 'Kristen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `id_kelas`, `id_agama`, `jenis_kelamin`, `hp`, `alamat`, `ket`) VALUES
('6148', 'SUGENG RUDIANSYAH', 18, 2, 'L', '-', 'Ngangkrik  RT 06 bRW 15  Triharjo  Sleman  Sleman', '-'),
('6290', 'ADHELIA HASNA FAUZIYYAH', 18, 2, 'P', '-', 'Dukuh RT 06 RW 19  Tridadi  Sleman  Sleman', '-'),
('6291', 'AHMAD DANURI', 18, 2, 'L', '-', 'Jongke Lor RT 02 RW 26  Sendangadi  Mlati  Sleman', '-'),
('6292', 'ALFINA PRASTIKA', 18, 2, 'P', '-', 'Nambongan  RT 07 RW 35  Tlogoadi  Mlati  Sleman', '-'),
('6293', 'ANKINNISA PRAMUDITA N', 18, 2, 'P', '-', 'Brengosan  RT 02 RW 28  Sumberadi  Mlati  Sleman', '-'),
('6294', 'ANNIKA ZURIARTI', 18, 2, 'P', '-', 'Nambongan   RT 03 RW 25  Tridadi  Sleman  Sleman', '-'),
('6295', 'DEA ARMALORENZA NARADYA', 18, 2, 'P', '-', 'Senden RT 05 RW 23  Sumberadi  Mlati  Sleman', '-'),
('6296', 'DEA SYAHWA DAMAYANTI', 18, 2, 'P', '-', 'Dukuh 04 RT 2 RW 8  Sidomoyo  Godean  Sleman', '-'),
('6297', 'DEDI FITRIANTO', 18, 2, 'L', '-', 'Cebongan Kidul   Tlogoadi  Mlati  Sleman', '-'),
('6298', 'DENI RIFANTO', 18, 2, 'L', '-', 'Sayidan   Sumberadi  Mlati  Sleman', '-'),
('6299', 'DIMAS MAULANA HULU', 18, 2, 'L', '-', 'Konteng   Sumberadi  Mlati  Sleman', '-'),
('6301', 'ERLITA HERAWATI', 18, 2, 'P', '-', 'Karanglo   Tlogoadi  Mlati  Sleman', '-'),
('6302', 'FEGGAR NOR MUCHSIN', 18, 2, 'L', '-', 'Mraen RT 04 RW 10  Sendangadi  Mlati  Sleman', '-'),
('6303', 'GILANG TAMA ARUNA JAYA  P', 18, 2, 'L', '-', 'Getas Toragan   Tlogoadi  Mlati  Sleman', '-'),
('6304', 'IBRAHIM HAMDAN AKBAR', 18, 2, 'L', '-', 'Karangmloko  RT 04 RW 18  Sariharjo  Ngaglik  Sleman', '-'),
('6305', 'ISNAINI NUR ADIBAH', 18, 2, 'P', '-', 'Druju XII RT 02 RW 23   Margodadi  Seyegan  Sleman', '-'),
('6306', 'LINA MAKARIM', 18, 2, 'P', '-', 'Beran Lor   Tridadi  Sleman  Sleman', '-'),
('6307', 'MELINDA EKA NUR SAFITRI', 18, 2, 'P', '-', 'Jaten RT 08 RW 31   Sendangadi  Mlati  Sleman', '-'),
('6308', 'MUHAMMAD RAHMAT MUFTIY', 18, 2, 'L', '-', 'Salakan rt 07 rw  27  Trihanggo  Gamping  Sleman', '-'),
('6309', 'NAILIZ ZAKIYA', 18, 2, 'P', '-', 'Mangunan RT 02 rW 29  Caturharjo  Sleman  Sleman', '-'),
('6310', 'NINI WULANDARI', 18, 2, 'P', '-', 'Brengosan RT 01 RW 28  Sumberadi  Mlati  Sleman', '-'),
('6311', 'NUR AGUNG RIZKI YANTO', 18, 2, 'L', '-', 'Pangukan   Tridadi  Sleman  Sleman', '-'),
('6312', 'NUR IFANUDIN', 18, 2, 'L', '-', 'Jumeneng Kidul  RT 02 RW 09   Sumberadi  Mlati  Sleman', '-'),
('6313', 'RIO PANDU NANDITYA', 18, 2, 'L', '-', 'Bandung Kulon   Tambakrejo  Tempel  Sleman', '-'),
('6315', 'SINDY AULIA KUSUMA DEWI', 18, 2, 'P', '-', 'Nambangan RT 08 RW 35  Tlogoadi  Mlati  Sleman', '-'),
('6316', 'SRI HARYANTI', 18, 2, 'P', '-', 'Getas Kalongan RT 09 RW 14  Tlogoadi  Mlati  Sleman', '-'),
('6317', 'SYAIFUL IBNU SETYAWAN', 18, 2, 'L', '-', 'Ngangkrik RT 09 RW 16  Triharjo  Sleman  Sleman', '-'),
('6318', 'ULLY FIFI ISRO DATUN', 18, 2, 'P', '-', 'Jumeneng Lor  RT 01 RW 17  Sumberadi  Mlati  Sleman', '-'),
('6319', 'UMMY A\'IDAH KHOIRIYAH', 18, 2, 'P', '-', 'Jetakan   Pandowoharjo  Sleman  Sleman', '-'),
('6320', 'VENDHA AFRISAL FAUZI', 18, 2, 'L', '-', 'Bedog  RT 02 RW 24  Trihanggo  Gamping  Sleman', '-'),
('6321', 'YURIKA FERDIANA', 18, 2, 'P', '-', 'Jonggrangan  RT 04 RW 18   Sumberadi  Mlati  Sleman', '-'),
('6322', 'YUSUF PRASETYO AJI', 15, 2, 'L', '-', '-', '-'),
('6323', 'AFIFAH NUR AMALIA', 18, 2, 'P', '-', 'Tegalmindi RT 15 RW 30  Sinduadi  Mlati  Sleman', '-'),
('6324', 'ANANTAMA FARIS ENDARTO', 19, 2, 'L', '-', 'Karang  RT 04 RW 20  Trimulyo  Sleman  Sleman', '-'),
('6325', 'ANDIKA DWI ADIYANTA', 19, 2, 'L', '-', 'Karanglo   Sidomoyo  Godean  Sleman', '-'),
('6326', 'ANDRI HERMAWAN', 19, 2, 'L', '-', 'Kantongan Wetan  Triharjo  Sleman  Sleman', '-'),
('6327', 'ANISA', 19, 2, 'P', '-', 'PAPP Ar Rohmah Kalakijo   Triharjo  Sleman  Sleman', '-'),
('6328', 'ARYANTI DESTY RAMADHANI', 19, 2, 'P', '-', 'Sanggrahan   Sendangadi  Mlati  Sleman', '-'),
('6329', 'ASLINDA NURFATIKHA  S.', 19, 2, 'P', '-', 'Mlati Glondong   Sendangadi  Mlati  Sleman', '-'),
('6330', 'AUDRY YAYANG WAHYU ASTUTI', 19, 2, 'P', '-', 'Kronggahan II   Trihanggo  Gamping  Sleman', '-'),
('6331', 'DEFINA SINDI RAHMAWATI', 19, 2, 'P', '-', 'Mlati Beningan   Sendangadi  Mlati  Sleman', '-'),
('6332', 'DESTRIA AYUNINGTYAS', 19, 2, 'P', '-', 'Jatirejo   Sendangadi  Mlati  Sleman', '-'),
('6333', 'EKO FAJAR KURNIAWAN', 19, 2, 'L', '-', 'Ngentak   Bangunkerto  Turi  Sleman', '-'),
('6334', 'FADLY HAFIZH FIRMANSYAH', 19, 2, 'L', '-', 'Perum Mutiara Palagan No. A-8 RT 003 RW 070  Sarharjo  Ngaglik  Sleman', '-'),
('6335', 'FEBRIANA DEGA PUTRY', 19, 2, 'P', '-', 'Jatirejo   Sendangadi  Mlati  Sleman', '-'),
('6336', 'FIKA DWI ASTUTI', 19, 2, 'P', '-', 'Sanggrahan   Tlogoadi  Mlati  Sleman', '-'),
('6337', 'FREDI ERYANTO', 19, 2, 'L', '-', 'Kules   Sumberadi  Mlati  Sleman', '-'),
('6338', 'HANA NUR NAFISAH', 19, 2, 'P', '-', 'Konteng   Sumberadi  Mlati  Sleman', '-'),
('6339', 'HANIIF ROHMIANTO', 19, 2, 'L', '-', 'Sawahan   Margomulyo  Seyegan  Sleman', '-'),
('6340', 'HARDIKA BARA CAHYOKO', 19, 2, 'L', '-', 'Jumeneng Kidul RT 5 RW 21  Sumberadi  Mlati  Sleman', '-'),
('6341', 'ILMA UMI AULIA HARJANTO', 19, 2, 'P', '-', 'Jongkang   Sariharjo  Ngaglik  Sleman', '-'),
('6342', 'ISNAN HIDAYAT', 19, 2, 'L', '-', 'Pundong III   Tirtoadi  Mlati  Sleman', '-'),
('6343', 'LUTHFI IMAM  MUNANDAR', 19, 2, 'L', '-', 'Ngentak RT 05 RW 02  Sumberadi  Mlati  Sleman', '-'),
('6344', 'MUHAMAD MUKHLIS FR', 19, 2, 'L', '-', 'Kendangan   Caturharjo  Sleman  Sleman', '-'),
('6345', 'MUHAMAD ARYA PUTRA', 19, 2, 'L', '-', 'Jl.Magelang Cungkuk     Tempel  Sleman', '-'),
('6346', 'NANDA NUR RAMADHANI', 19, 2, 'P', '-', 'Paten   Tridadi  Sleman  Sleman', '-'),
('6347', 'NESSA DWI FAUZIAH', 19, 2, 'P', '-', 'Kutu Patran   Sinduadi  Mlati  Sleman', '-'),
('6348', 'NINDYA SITI NUR AINI', 19, 2, 'P', '-', 'Duwet   Sendangadi  Mlati  Sleman', '-'),
('6349', 'NOVA RIA MITA', 19, 2, 'P', '-', 'Warak Lor   Sumberadi  Mlati  Sleman', '-'),
('6350', 'R.CIPTA ABYUDAYA IHSANADHA', 19, 2, 'L', '-', 'Jl.Jambu Perum Sidokarto A2 Godean    Godean  Sleman', '-'),
('6351', 'TOMY SETIANTO', 19, 2, 'L', '-', 'Rajek Kidul  Tirtoadi  Mlati  Sleman', '-'),
('6352', 'ULFA NUR AZIZAH', 19, 2, 'P', '-', 'Karang Keboan   Sumberadi  Mlati  Sleman', '-'),
('6353', 'VEGA BAHARI NURSASONO', 19, 2, 'L', '-', 'Sayidan   Sumberadi  Mlati  Sleman', '-'),
('6354', 'WAFA HAZZA ANABELA', 19, 2, 'P', '-', 'Perum Jamblangan     Seyegan  Sleman', '-'),
('6355', 'YASYFA ILHAM PRAMUDI', 19, 2, 'L', '-', 'Karanglo   Sidomoyo  Godean  Sleman', '-'),
('6356', 'YUYUN SUSANTI', 20, 2, 'P', '-', 'Beran Kidul   Tridadi  Sleman  Sleman', '-'),
('6357', 'AHMAD RUSDIYANTO', 20, 2, 'L', '-', 'Mrincingan   Margomulyo  Seyegan  Sleman', '-'),
('6358', 'AKHMAD PASHA MADANI', 20, 2, 'L', '-', 'Pundong III   Tirtoadi  Mlati  Sleman', '-'),
('6359', 'ARIF RACHMAN PAMUNGKAS', 20, 2, 'L', '-', 'Rajek Kidul   Tirtoadi  Mlati  Sleman', '-'),
('6360', 'ARSY FAH RIZAL', 20, 2, 'L', '-', 'Konteng   Sumberadi  Mlati  Sleman', '-'),
('6361', 'ATIKA FAUZIANA', 20, 2, 'P', '-', 'Mrincingan   Margomulyo  Seyegan  Sleman', '-'),
('6362', 'BAGAS WAHYU RAMADHAN', 20, 2, 'L', '-', 'Kantongan  Kulon   Triharjo  Sleman  Sleman', '-'),
('6363', 'CAHAYA ADELISA', 20, 2, 'P', '-', 'Kutu Asem 04/17   Sinduadi  Mlati  Sleman', '-'),
('6364', 'DESTY SIAM PRAMESTI', 20, 2, 'P', '-', 'Tegal Mraen 01/09   Sendangadi  Mlati  Sleman', '-'),
('6365', 'DEVI YASINTA', 20, 2, 'P', '-', 'Ngancar   Tridadi  Sleman  Sleman', '-'),
('6366', 'DINA SAVIRA', 20, 2, 'P', '-', 'Blendangan   Nogotirto  Gamping  Sleman', '-'),
('6367', 'DYAH FITRI ANGGRAENI', 20, 2, 'P', '-', 'Bangunrejo   Tridadi  Sleman  Sleman', '-'),
('6369', 'EKSA HAFIZ FAWZAN', 20, 2, 'L', '-', 'Mangunan   Caturharjo  Sleman  Sleman', '-'),
('6370', 'ESA MUHAMMAD IKHSAN  I', 20, 2, 'L', '-', 'Trini RT.01/16   Trihanggo  Gamping  Sleman', '-'),
('6371', 'HENDRIK SAMUEL BURATEHI', 20, 2, 'L', '-', 'Jamblangan   Margomulyo  Seyegan  Sleman', '-'),
('6372', 'ILHAM NUR WIDIATMOKO', 20, 2, 'L', '-', 'Kebonagung  Tridadi  Sleman  Sleman', '-'),
('6373', 'NABILA HASNA', 20, 2, 'P', '-', 'Sanggrahan   Caturharjo  Sleman  Sleman', '-'),
('6374', 'NADYA PUSPITA RENI', 20, 2, 'P', '-', 'Ngangkrik   Triharjo  Sleman  Sleman', '-'),
('6375', 'NAWANG UTAMI', 20, 2, 'P', '-', 'Bedingin   Sumberadi  Mlati  Sleman', '-'),
('6376', 'NURUL QOIRIAH', 20, 2, 'P', '-', 'Cebongan Kidul   Tlogoadi  Mlati  Sleman', '-'),
('6377', 'QOIRUNISA', 20, 2, 'P', '-', 'Gabahan V   Sumberadi  Mlati  Sleman', '-'),
('6378', 'RAFA ERFINANINGRUM', 20, 2, 'P', '-', 'Kragilan   Sidomoyo  Godean  Sleman', '-'),
('6379', 'RAYHAN AMMAR MURHANDITO', 20, 2, 'L', '-', 'Kadiluwih 08/12   Margorejo  Tempel  Sleman', '-'),
('6380', 'RIANI FAJAR KURNIA HASTUTI', 20, 2, 'P', '-', 'Mlati Dukuh 11/05   Sendangadi  Mlati  Sleman', '-'),
('6381', 'RINA ISTIANA', 20, 2, 'P', '-', 'Krapyak   Triharjo  Sleman  Sleman', '-'),
('6382', 'RYAN ADE SAPUTRA', 20, 2, 'L', '-', 'Rogoyudan RT.12/RW.4   Sinduadi  Mlati  Sleman', '-'),
('6383', 'SEKAR KINASIH', 20, 2, 'P', '-', 'Sucen   Triharjo  Sleman  Sleman', '-'),
('6384', 'ULFA ZAKYA HASANAH', 20, 2, 'P', '-', 'Kebondalem Paten   Tridadi  Sleman  Sleman', '-'),
('6385', 'VILDA AMARTYA DWI YUNANTO', 20, 2, 'P', '-', 'Mriyan   Margomulyo  Seyegan  Sleman', '-'),
('6386', 'WILDAN SALMAWAN', 20, 2, 'L', '-', 'Nambongan   Tlogoadi  Mlati  Sleman', '-'),
('6387', 'YOQI PUTRAKABUBAN', 20, 2, 'L', '-', 'Bangunrejo   Tridadi  Sleman  Sleman', '-'),
('6388', 'YUNITA ENDAH PAWARTI', 20, 2, 'P', '-', 'Keboan   Sumberadi  Mlati  Sleman', '-'),
('6390', 'ZUMROTUL BISROCAH', 21, 2, 'P', '-', 'Plaosan   Tlogoadi  Mlati  Sleman', '-'),
('6391', 'ADIB AHMAD ALWI', 21, 2, 'L', '-', 'Nambongan   Tlogoadi  Mlati  Sleman', '-'),
('6392', 'ADITYA PAMUNGKAS', 21, 2, 'L', '-', 'Kronggahan I   Trihanggo  Gamping  Sleman', '-'),
('6393', 'ALINDRA NUR FENDIANTO', 21, 2, 'L', '-', 'Kules   Sumberadi  Mlati  Sleman', '-'),
('6394', 'APRILIA HERLIN ISDIANTO', 21, 2, 'P', '-', 'Rajek Kidul   Tirtoadi  Mlati  Sleman', '-'),
('6395', 'ARIF NUR FITRIYANTO', 21, 2, 'L', '-', 'Jingin    Margomulyo  Seyegan  Sleman', '-'),
('6396', 'ARIKA EKA ANAYATNA', 21, 2, 'P', '-', 'Karanglo  Sidomoyo  Godean  Sleman', '-'),
('6397', 'ATIKA RACHMA PUTRI', 21, 2, 'P', '-', 'Jaban   Tridadi  Sleman  Sleman', '-'),
('6398', 'BAGUS AJI FAUZAN', 21, 2, 'L', '-', 'Pundong III   Tirtoadi  Mlati  Sleman', '-'),
('6399', 'CHARIN NADYA SHINTA', 21, 2, 'P', '-', 'Baturan   Trihanggo  Gamping  Sleman', '-'),
('6400', 'CHIKA NIDI ASTI', 21, 2, 'P', '-', 'Pundong I   Tirtoadi  Mlati  Sleman', '-'),
('6401', 'DESTRI KURNIA PUTRI', 21, 2, 'P', '-', '-', '-'),
('6402', 'DESTYN WAHYU PRAMESTI', 21, 2, 'P', '-', 'Tegal Mraen   Sendangadi  Mlati  Sleman', '-'),
('6403', 'DWI NURYANTO', 21, 2, 'L', '-', 'Kragilan   Sidomoyo  Godean  Sleman', '-'),
('6404', 'FENTY FEBIKAWATI', 21, 2, 'P', '-', 'Ngangkrik   Triharjo  Sleman  Sleman', '-'),
('6405', 'HUSNI FAHRI DARMAWAN', 21, 2, 'L', '-', 'Pundong   Tirtoadi  Mlati  Sleman', '-'),
('6406', 'IBNU RUSH ALFIAN', 21, 2, 'L', '-', 'Nusupan 2/28   Trihanggo  Gamping  Sleman', '-'),
('6407', 'ILHAM DWI KURNIAWAN', 21, 2, 'L', '-', 'Pundong I   Tirtoadi  Mlati  Sleman', '-'),
('6408', 'ISMAIL DANIS PAMBUDI', 21, 2, 'L', '-', 'Ngangkrik  Triharjo  Sleman  Sleman', '-'),
('6409', 'LISTINA PUJIATI', 21, 2, 'P', '-', 'Bagusan  Sumberadi  Mlati  Sleman', '-'),
('6410', 'LIVIA AFRISA RIANA PUTRI', 21, 2, 'P', '-', 'Jl. Magelang Km.5,5 Kutu Tgal     Mlati  Sleman', '-'),
('6411', 'MUHAMMAD AFIF BAHY', 21, 2, 'L', '-', 'Mlangi   Nogotirto  Gamping  Sleman', '-'),
('6412', 'MUHAMMAD FAISAL  M', 21, 2, 'L', '-', 'Gombang   Tirtoadi  Mlati  Sleman', '-'),
('6413', 'NAFILA FANANIA', 21, 2, 'P', '-', 'Jongke Kidul  Sendangadi  Mlati  Sleman', '-'),
('6414', 'OCKTANI MARSHANDA  S', 21, 2, 'P', '-', 'Plaosan   Tlogoadi  Mlati  Sleman', '-'),
('6415', 'RAHMAD YUSUF SETYAWAN', 21, 2, 'L', '-', 'Jongke Lor   Sendangadi  Mlati  Sleman', '-'),
('6416', 'RAYNALDI AKBAR YUDHA  P', 21, 2, 'L', '-', 'Temon   Pandowoharjo  Sleman  Sleman', '-'),
('6417', 'RUFINA DAMAYANTI', 21, 2, 'P', '-', 'Nambongan   Caturharjo  Sleman  Sleman', '-'),
('6418', 'SATRYA YUDA PRATAMA', 21, 2, 'L', '-', 'Jl.Melati Kalakijo   Triharjo  Sleman  Sleman', '-'),
('6419', 'SEFIN NUR CANTIKA', 21, 2, 'P', '-', 'Cokrokusuman       Yogyakarta', '-'),
('6420', 'SILVIA IDA PUSPITA', 21, 2, 'P', '-', 'Danen   Sumberadi  Mlati  Sleman', '-'),
('6421', 'TIA NUR BUDI ASTUTI', 21, 2, 'P', '-', 'Ngentak   Sumberadi  Mlati  Sleman', '-'),
('6422', 'VIA ARYA JATI', 22, 2, 'P', '-', 'Pundong III   Tirtoadi  Mlati  Sleman', '-'),
('6423', 'WAHYU TISA FEBRIANTI', 22, 2, 'P', '-', 'Keditan   Trihanggo  Gamping  Sleman', '-'),
('6424', 'YUSHITA PRANANTI', 22, 2, 'P', '-', 'Kronggahan I   Trihanggo  Gamping  Sleman', '-'),
('6425', 'ADIK DIMAS NURCAHYO', 22, 2, 'L', '-', 'Cebongan   Tlogoadi  Mlati  Sleman', '-'),
('6426', 'AMBAR ARUM', 22, 2, 'P', '-', 'Kamal Wetan   Margomulyo  Seyegan  Sleman', '-'),
('6428', 'APRILIA PUTRI HANDAYANI', 22, 2, 'P', '-', 'Mlati Beningan   Sendangadi  Mlati  Sleman', '-'),
('6429', 'ATHA ZUHDITAMA ALLATIF', 22, 2, 'L', '-', 'Temon 1/22  Pandowoharjo  Sleman  Sleman', '-'),
('6430', 'AURA RAHMAWATI', 22, 2, 'P', '-', 'Duwet   Sendangadi  Mlati  Sleman', '-'),
('6431', 'AZNI ANINDITYA KHUSNIASARI', 22, 2, 'P', '-', 'Mangunan   Caturharjo  Sleman  Sleman', '-'),
('6432', 'CAHYA PRATAMA JATI', 22, 2, 'P', '-', 'Bedog   Trihanggo  Gamping  Sleman', '-'),
('6433', 'CHYNTHA DIVA GUMILAR', 22, 2, 'P', '-', 'Mantaran   Trimulyo  Sleman  Sleman', '-'),
('6434', 'DELIS PRIMA DAYANI', 22, 2, 'P', '-', 'Jodag   Sumberadi  Mlati  Sleman', '-'),
('6435', 'DENI NUR AGUNG FEBRIANTO', 22, 2, 'L', '-', 'Salakan  Trihanggo  Gamping  Sleman', '-'),
('6436', 'DESY SASKIA PUTRI', 22, 2, 'P', '-', 'Candi   Tirtoadi  Mlati  Sleman', '-'),
('6437', 'DIVA WISTI KHATIMAH', 22, 2, 'P', '-', 'Dukuh   Tridadi  Sleman  Sleman', '-'),
('6438', 'FEBTIAN TEGAR SANTOSA', 22, 2, 'L', '-', 'Jodag   Sumberadi  Mlati  Sleman', '-'),
('6439', 'IQBAL MUHAMMAD ZAKI  H', 22, 2, 'L', '-', 'Ketingan   Tirtoadi  Mlati  Sleman', '-'),
('6440', 'KINANTHI WAHYU MAHANANI', 22, 2, 'P', '-', 'Jingin 3/24   Margomulyo  Seyegan  Sleman', '-'),
('6441', 'LINTHANG CAHYA WIJAYA', 22, 2, 'P', '-', 'Trini RT.18/18   Trihanggo  Gamping  Sleman', '-'),
('6442', 'LUTIANA VIKRI', 22, 2, 'P', '-', 'Keboan   Sumberadi  Mlati  Sleman', '-'),
('6443', 'MUHAMMAD EKO SAPUTRO', 22, 2, 'L', '-', 'Karanglo   Sidomoyo  Godean  Sleman', '-'),
('6444', 'MUHAMMAD SIFAUDIN', 22, 2, 'L', '-', 'Murangan VII   Triharjo  Sleman  Sleman', '-'),
('6447', 'NUR HIKMAH', 22, 2, 'P', '-', 'KamalKulon   Margomulyo  Seyegan  Sleman', '-'),
('6448', 'NUR YUDHA SETYABUDI', 22, 2, 'L', '-', 'Konteng   Sumberadi  Mlati  Sleman', '-'),
('6450', 'PEGI SUKMA WATI', 22, 2, 'P', '-', 'Gabahan V   Sumberadi  Mlati  Sleman', '-'),
('6451', 'RIFA HUSNIYA', 22, 2, 'P', '-', 'Kronggahan   Trihanggo  Gamping  Sleman', '-'),
('6453', 'SEPTI LESTARI', 22, 2, 'P', '-', 'Jongke Lor   Sendangadi  Mlati  Sleman', '-'),
('6454', 'VIOLITA DEWI CAHYANI', 22, 2, 'P', '-', 'Watukarung   Margoagung  Seyegan  Sleman', '-'),
('6455', 'VITOSYA MURFID PERDANA', 22, 2, 'L', '-', 'Kronggahan I   Trihanggo  Gamping  Sleman', '-'),
('6456', 'WIDIYATMOKO', 22, 2, 'L', '-', 'Mulungan Kulon   Sendangadi  Mlati  Sleman', '-'),
('6457', 'YOGA NUR CAHYO', 22, 2, 'L', '-', 'Ngentak   Sumberadi  Mlati  Sleman', '-'),
('6458', 'ZANUBA GALEH ANGGI', 22, 2, 'L', '-', 'Sawahan   Nogotirto  Gamping  Sleman', '-'),
('6459', 'ABDUL ROHMAN', 23, 2, 'L', '-', 'Keboan   Sumberadi  Mlati  Sleman', '-'),
('6460', 'AISYAH NUR FAUZIA', 23, 2, 'P', '-', 'Majegan   Pandowoharjo  Sleman  Sleman', '-'),
('6461', 'AIDA NURJANAH', 23, 2, 'P', '-', 'Toino   Pandowoharjo  Sleman  Sleman', '-'),
('6462', 'ANA LAILY SALSABILA', 23, 2, 'P', '-', 'Cibukan   Sumberadi  Mlati  Sleman', '-'),
('6463', 'APRIAN ARIE WICAKSONO', 23, 2, 'L', '-', 'Tegal Cabakan   Sumberadi  Mlati  Sleman', '-'),
('6464', 'ARNIA NUR AZIZAH', 23, 2, 'P', '-', 'Kadilangu   Sumberadi  Mlati  Sleman', '-'),
('6465', 'ARYATAMA KISMAULANA', 23, 2, 'L', '-', 'Bendosari   Sariharjo  Ngaglik  Sleman', '-'),
('6467', 'CICI YULISNA SARI', 23, 2, 'P', '-', 'Mranggen Kidul   Sinduadi  Mlati  Sleman', '-'),
('6468', 'DANAR FAJAR DWINANTO', 23, 2, 'L', '-', 'Karanglo   Tlogoadi  Mlati  Sleman', '-'),
('6469', 'DELLA TRIAS FARANISA', 23, 2, 'P', '-', 'Rogoyudan 1/11  Sinduadi  Mlati  Sleman', '-'),
('6470', 'DIDIK ROCHIM HADI W', 23, 2, 'L', '-', 'Sleman III  Triharjo  Sleman  Sleman', '-'),
('6471', 'ELSAFITRI FENDERONIKA', 23, 2, 'P', '-', 'Ketingan  Tirtoadi  Mlati  Sleman', '-'),
('6472', 'GILANG JALU ASMORO', 23, 2, 'L', '-', 'Brayut   Pandowoharjo  Sleman  Sleman', '-'),
('6473', 'INDRI ASTUTI', 23, 2, 'P', '-', 'Ngancar   Tridadi  Sleman  Sleman', '-'),
('6474', 'KHOIRUN MANTABA', 23, 2, 'P', '-', 'Mangunan   Caturharjo  Sleman  Sleman', '-'),
('6475', 'MIRA PERMATA SARI', 23, 2, 'P', '-', 'Karetan Magunan   Caturharjo  Sleman  Sleman', '-'),
('6477', 'MUHAMMAD SEPTIANTO', 23, 2, 'L', '-', 'Paten  Tridadi  Sleman  Sleman', '-'),
('6478', 'NADA AMALIA NUR AZIZA', 23, 2, 'P', '-', 'Kuturaden 07/15  Sinduadi  Mlati  Sleman', '-'),
('6479', 'NOVIA ANJARWATI', 23, 2, 'P', '-', 'Keceme   Caturharjo  Sleman  Sleman', '-'),
('6480', 'OKI AJENG SETIANI', 23, 2, 'P', '-', 'Kamal Wetan   Margomulyo  Seyegan  Sleman', '-'),
('6481', 'PUTRI SETYA RAHAYU', 23, 2, 'P', '-', 'Cebongan Kidul  Tlogoadi  Mlati  Sleman', '-'),
('6482', 'RAFI HANAFI AL IRSYAD', 23, 2, 'L', '-', 'Paten   Tridadi  Sleman  Sleman', '-'),
('6484', 'RISTI KURNIA PUTRI', 23, 2, 'P', '-', 'Kebonagung   Tridadi  Sleman  Sleman', '-'),
('6485', 'RUDY', 23, 2, 'L', '-', 'Bedingin   Sumberadi  Mlati  Sleman', '-'),
('6486', 'SITA FAUZIA RAHMA', 23, 2, 'P', '-', 'Karanggeneng   Sendangadi  Mlati  Sleman', '-'),
('6487', 'SITI MUYASSAROH', 23, 2, 'P', '-', 'Cibuk Kidul   Margoluwih  Seyegan  Sleman', '-'),
('6488', 'SURYANI SEPTIAWATI', 23, 2, 'P', '-', 'Jumeneng Kidul   Sumberadi  Mlati  Sleman', '-'),
('6489', 'TANTI ANGGRAINI', 23, 2, 'P', '-', 'Ngangkrik   Triharjo  Sleman  Sleman', '-'),
('6490', 'TRI MARTINI', 23, 2, 'P', '-', 'Sanggrahan   Tlogoadi  Mlati  Sleman', '-'),
('6491', 'YUNA RAHMAWATI', 23, 2, 'P', '-', 'Keboan   Sumberadi  Mlati  Sleman', '-'),
('6494', 'MUHAMMAD ISA ASA SALASA', 23, 2, 'L', '-', 'Sucen   Triharjo  Sleman  Sleman', '-'),
('6496', 'ADELIA DESI KURNIAWATI', 12, 2, 'P', '-', '-', '-'),
('6497', 'AKBAR RAMADANI', 12, 2, 'L', '-', '-', '-'),
('6498', 'ALVIN PRAYOGO SEPTU', 13, 2, 'L', '-', '-', '-'),
('6499', 'ANNISA SYAFIRA LUFIATU SYIFAQ', 13, 2, 'P', '-', '-', '-'),
('6500', 'ARIFIN NUR FAUZAN', 14, 2, 'L', '-', '-', '-'),
('6501', 'AULIA RAHAJENG PRASTIWI', 14, 2, 'P', '-', '-', '-'),
('6502', 'AURANNISA SYAHRANI PUTRI S.', 15, 2, 'P', '-', '-', '-'),
('6503', 'BERLIANA INDAH KHAIRUNNISAA', 15, 2, 'P', '-', '-', '-'),
('6504', 'DIAN NUR RAMADHAN', 16, 2, 'L', '-', '-', '-'),
('6505', 'DILLA ARTAMEVIA REGITA PUTRI', 17, 2, 'P', '-', '-', '-'),
('6506', 'DIMAS PAMUNGKAS', 17, 2, 'L', '-', '-', '-'),
('6507', 'ERLITA DIAN PRATIWI', 12, 2, 'P', '-', '-', '-'),
('6508', 'EVI ANA NOR SAPUTRI', 13, 2, 'P', '-', '-', '-'),
('6509', 'FAHMI RAMADAN CHANDRA', 12, 2, 'L', '-', '-', '-'),
('6510', 'FANDY ARIF JULDIAN HARJUNA', 13, 2, 'L', '-', '-', '-'),
('6511', 'FITRIA ISTIQOMAH', 15, 2, 'P', '-', '-', '-'),
('6512', 'GANAN HUDA PAMUNGKAS', 14, 2, 'L', '-', '-', '-'),
('6513', 'HAFIDZ ADI PRASETYO', 15, 2, 'L', '-', '-', '-'),
('6514', 'HALIMATUL MARDLIYAH PUTRI', 15, 2, 'P', '-', '-', '-'),
('6515', 'HANIFA RAHMA AZDHARO', 16, 2, 'P', '-', '-', '-'),
('6516', 'INTAN ARGITA', 17, 2, 'P', '-', '-', '-'),
('6517', 'INTAN WAHYU PERMATAHATI', 12, 2, 'P', '-', '-', '-'),
('6518', 'KASMIATUN SUNARYADI', 13, 2, 'P', '-', '-', '-'),
('6519', 'LINTANG NUR AZIZAH', 14, 2, 'P', '-', '-', '-'),
('6520', 'MIFTAKHUL RAHMADANI', 16, 2, 'L', '-', '-', '-'),
('6521', 'MUHAMMAD NAILURRIKZA', 17, 2, 'L', '-', '-', '-'),
('6522', 'RAIHAN AUDI AKBAR', 15, 2, 'L', '-', '-', '-'),
('6523', 'SATRIO BUDI NUGROHO', 13, 2, 'L', '-', '-', '-'),
('6524', 'SEPTIAN CAHYA UTOMO', 14, 2, 'L', '-', '-', '-'),
('6525', 'UBAIDILLAH AZHAR NUR ROYYAN', 15, 2, 'L', '-', '-', '-'),
('6526', 'WIDIANTO WIBOWO', 16, 2, 'L', '-', '-', '-'),
('6527', 'WIDIANTORO', 17, 2, 'L', '-', '-', '-'),
('6529', 'AHMAD HUSAIN', 12, 2, 'L', '-', '-', '-'),
('6530', 'AISHA NAFI\'AH', 15, 2, 'P', '-', '-', '-'),
('6531', 'ALVINA QURINISA', 16, 2, 'P', '-', '-', '-'),
('6532', 'ANITA HAYU SOLIKHAH', 17, 2, 'P', '-', '-', '-'),
('6533', 'BEKTI AJI SANTOSA', 13, 2, 'L', '-', '-', '-'),
('6534', 'DAVINA RISANG AYU MAHARDANI', 12, 2, 'P', '-', '-', '-'),
('6535', 'DHANI TEGAR RAMADHAN', 14, 2, 'L', '-', '-', '-'),
('6536', 'DIANDARI MUKTI', 13, 2, 'P', '-', '-', '-'),
('6537', 'DIVA FITRIA NIZAM UWAMA', 14, 2, 'P', '-', '-', '-'),
('6538', 'ERMI RIYANTIC', 15, 2, 'P', '-', '-', '-'),
('6539', 'FADHITYA DWI NUGROHO', 15, 2, 'L', '-', '-', '-'),
('6540', 'FAJAR DWI DARMAWAN', 16, 2, 'L', '-', '-', '-'),
('6541', 'FAJAR NOOR DIANTO', 17, 2, 'L', '-', '-', '-'),
('6542', 'FIKRI AMMAR ROZIN', 12, 2, 'L', '-', '-', '-'),
('6543', 'ISNA WAHYU SETYA NINGRUM', 16, 2, 'P', '-', '-', '-'),
('6544', 'KUSMAWATI', 17, 2, 'P', '-', '-', '-'),
('6545', 'MILA MARETTA PUTRI', 12, 2, 'P', '-', '-', '-'),
('6546', 'MUHAMMAD DA\'I AHSANISHOBIRIN', 15, 2, 'L', '-', '-', '-'),
('6547', 'NUR WAHYUNINGSIH', 13, 2, 'P', '-', '-', '-'),
('6548', 'NURI SAMSIYAH', 14, 2, 'P', '-', '-', '-'),
('6549', 'ORISA RULANDARI', 15, 2, 'P', '-', '-', '-'),
('6550', 'PRIYO PRABOWO', 14, 2, 'L', '-', '-', '-'),
('6551', 'RADITYA FAJAR PRATAMA', 12, 2, 'L', '-', '-', '-'),
('6552', 'RAHMA SAFITRI', 16, 2, 'P', '-', '-', '-'),
('6553', 'RAHMAD NUR HIDAYAT', 16, 2, 'L', '-', '-', '-'),
('6554', 'RIYAN ADI SAPUTRA', 17, 2, 'L', '-', '-', '-'),
('6555', 'RIZAL FATKHURROHMAN', 12, 2, 'L', '-', '-', '-'),
('6556', 'RIZKI RAHMAN', 13, 2, 'L', '-', '-', '-'),
('6557', 'SIDIQ PAMUNGKAS', 14, 2, 'L', '-', '-', '-'),
('6558', 'SITI FATIMAH', 17, 2, 'P', '-', '-', '-'),
('6559', 'VERI HARAWATI', 12, 2, 'P', '-', '-', '-'),
('6560', 'WANDA SHELA PUTRI AZIZANI', 13, 2, 'P', '-', '-', '-'),
('6561', 'WILDAN PERMANA ARSAYUDA', 15, 2, 'L', '-', '-', '-'),
('6562', 'AGHIST HADI MUHAMMAD', 16, 2, 'L', '-', '-', '-'),
('6563', 'AHMAD DEVIANTO', 17, 2, 'L', '-', '-', '-'),
('6564', 'AHMAD FAUZI', 12, 2, 'L', '-', '-', '-'),
('6565', 'AISYAH NUR SALSABILA', 14, 2, 'P', '-', '-', '-'),
('6566', 'ANJANI FATMADILA KUSUMAWASTUTI', 15, 2, 'P', '-', '-', '-'),
('6567', 'ARIF YULIANSAH', 13, 2, 'L', '-', '-', '-'),
('6568', 'ARLLEN GANENDRA PRIMAPUTRA', 16, 2, 'P', '-', '-', '-'),
('6569', 'BERLIANINGTYAS ALVICKA SARI', 17, 2, 'P', '-', '-', '-'),
('6570', 'DAFFA TAFAQQURRAHMAN', 14, 2, 'L', '-', '-', '-'),
('6571', 'DIMAS AJI PANGESTU', 15, 2, 'L', '-', '-', '-'),
('6572', 'DWI PUTRI CAHYO PRAMU SINTA', 12, 2, 'P', '-', '-', '-'),
('6573', 'FAJAR IBNU MUHAMMAD', 16, 2, 'L', '-', '-', '-'),
('6574', 'FAJAR MUKTI AJI PANGESTU', 17, 2, 'L', '-', '-', '-'),
('6575', 'FIDAI HAMAS HAFUZA', 12, 2, 'L', '-', '-', '-'),
('6576', 'GUSNUARDHI HERNU CATUR SUSETYO', 13, 2, 'L', '-', '-', '-'),
('6577', 'KHANSA SHAFFIYAH', 13, 2, 'P', '-', '-', '-'),
('6578', 'KURNIA FATIMAH', 16, 2, 'P', '-', '-', '-'),
('6579', 'LIA ANISA', 15, 2, 'P', '-', '-', '-'),
('6580', 'NIA DWI SETIAWATI', 14, 2, 'P', '-', '-', '-'),
('6581', 'NITA AMELIA', 17, 2, 'P', '-', '-', '-'),
('6582', 'NOVIA RAHMA SAFITRI', 12, 2, 'P', '-', '-', '-'),
('6583', 'PUTRI NOOR HALIMAH', 13, 2, 'P', '-', '-', '-'),
('6584', 'RISKE PUTRI DIAN SYAHRANI', 14, 2, 'P', '-', '-', '-'),
('6585', 'SAHRUL MUHAIMIN', 14, 2, 'L', '-', '-', '-'),
('6586', 'SALSA NOVA RAMADHANI', 15, 2, 'P', '-', '-', '-'),
('6587', 'SALSABILLA', 16, 2, 'P', '-', '-', '-'),
('6588', 'SIDIQ PRASETYO', 15, 2, 'L', '-', '-', '-'),
('6589', 'SIGIT ARDIYANTO', 16, 2, 'L', '-', '-', '-'),
('6590', 'TSAABITA FAUZIYA BA\'IT', 17, 2, 'P', '-', '-', '-'),
('6591', 'VADELLA YANSA AURELLYA', 12, 2, 'P', '-', '-', '-'),
('6592', 'YUSUF KUNTOWIJOYO', 17, 2, 'L', '-', '-', '-'),
('6593', 'ZIDANE PUTRA IZZULHAQ', 16, 2, 'L', '-', '-', '-'),
('6594', 'ADE RIA SULANJARI', 13, 2, 'P', '-', '-', '-'),
('6595', 'ADITYA ANANTA', 13, 2, 'L', '-', '-', '-'),
('6596', 'ANGGI WIJAYANTI', 14, 2, 'P', '-', '-', '-'),
('6597', 'ASSVINA KHOLUN NADA', 15, 2, 'P', '-', '-', '-'),
('6598', 'BAGUS GALIH PRADANA', 14, 2, 'L', '-', '-', '-'),
('6599', 'BAGUS SETIA WARDANI', 15, 2, 'L', '-', '-', '-'),
('6600', 'DESTRIANA CHAIRUNNISA', 16, 2, 'P', '-', '-', '-'),
('6601', 'DIMAS ARYA PERMADI', 16, 2, 'L', '-', '-', '-'),
('6602', 'DIMAS TRINANDA', 17, 2, 'L', '-', '-', '-'),
('6603', 'DIPA WIJAYA HALILINTAR', 12, 2, 'L', '-', '-', '-'),
('6604', 'DWI ADI FEBRIYANTO', 13, 2, 'L', '-', '-', '-'),
('6605', 'GALANTANG SETRA', 14, 2, 'L', '-', '-', '-'),
('6608', 'MEGIAN TRIBUANA PUTRI', 17, 2, 'P', '-', '-', '-'),
('6609', 'MUHAMMAD BURHAN MUZAKKY', 16, 2, 'L', '-', '-', '-'),
('6610', 'MUHAMMAD ILHAN MAULANA', 17, 2, 'L', '-', '-', '-'),
('6611', 'NAUFAL AHMAD GHIFARI', 12, 2, 'L', '-', '-', '-'),
('6612', 'NUR LUTHFI M IRAWAN ABUKASIM', 13, 2, 'L', '-', '-', '-'),
('6613', 'NURUL NUR AINI', 12, 2, 'P', '-', '-', '-'),
('6614', 'PUTRI EKAWATI', 13, 2, 'P', '-', '-', '-'),
('6615', 'PUTRI PURWANTI', 14, 2, 'P', '-', '-', '-'),
('6616', 'RAFIF ARDIKA WARDHANA', 14, 2, 'L', '-', '-', '-'),
('6617', 'RAMA SAKTI PUTRA', 15, 2, 'L', '-', '-', '-'),
('6618', 'RIDWAN ABDUL RASYID', 16, 2, 'L', '-', '-', '-'),
('6619', 'RISKA NUR AINI', 15, 2, 'P', '-', '-', '-'),
('6620', 'RISTA PUTRI ZANURI', 16, 2, 'P', '-', '-', '-'),
('6621', 'SRI AMALINA WIJAYANTI', 17, 2, 'P', '-', '-', '-'),
('6622', 'SURJIANTI', 12, 2, 'P', '-', '-', '-'),
('6623', 'TAUFIK ADNAN NUR HUDA', 17, 2, 'L', '-', '-', '-'),
('6624', 'TSALTSA JUNIANTI TRI ANGGRAENI', 13, 2, 'P', '-', '-', '-'),
('6625', 'ZAHRA BELVA ANINDYA', 14, 2, 'P', '-', '-', '-'),
('6626', 'ZANUAR IQBAL AINUL BAHRI', 15, 2, 'L', '-', '-', '-'),
('6627', 'ZASKIYAH VIONA SARI', 15, 2, 'P', '-', '-', '-'),
('6628', 'ADELIA DEVA MAHARANI', 17, 2, 'P', '-', '-', '-'),
('6629', 'AFIFATUZAHRA INAYATI', 16, 2, 'P', '-', '-', '-'),
('6630', 'AL DANI RAZAQQI PURNOMO', 13, 2, 'L', '-', '-', '-'),
('6632', 'ALFIANI PUTRI', 12, 2, 'P', '-', '-', '-'),
('6633', 'ANGGA ZULFIKAR', 14, 2, 'L', '-', '-', '-'),
('6634', 'ANTIN NUR HIDAYATI', 13, 2, 'P', '-', '-', '-'),
('6635', 'APRISTA KUSNANDARI', 14, 2, 'P', '-', '-', '-'),
('6636', 'BINTARI ALVI SYAADAH', 15, 2, 'P', '-', '-', '-'),
('6637', 'DAFINIYAH', 16, 2, 'P', '-', '-', '-'),
('6638', 'DHIMAS RIZKY NUR FIRMANSYACH', 15, 2, 'L', '-', '-', '-'),
('6639', 'DIMAS BIMANTORO', 16, 2, 'L', '-', '-', '-'),
('6640', 'FIFIANA ANJARWATI', 17, 2, 'P', '-', '-', '-'),
('6641', 'FILAR YUDISTIRA BONDAN PURNAMA', 17, 2, 'L', '-', '-', '-'),
('6642', 'JANNASSE LIEN NATALYE GABRYELLE NEWIN', 12, 2, 'P', '-', '-', '-'),
('6643', 'JENNY KUSNIKA SARI', 13, 2, 'P', '-', '-', '-'),
('6644', 'KURNIA WIJAYA', 12, 2, 'L', '-', '-', '-'),
('6645', 'MEILITA SETYA PUTRI', 14, 2, 'P', '-', '-', '-'),
('6646', 'MUH ROIHAN ABDUL HAQ', 13, 2, 'L', '-', '-', '-'),
('6648', 'MUHAMMAD ZULFAN SYARIEF', 14, 2, 'L', '-', '-', '-'),
('6649', 'NOVI NUR AINI', 15, 2, 'P', '-', '-', '-'),
('6650', 'NOVIA DWI NORMALITASARI', 16, 2, 'P', '-', '-', '-'),
('6651', 'OKTAVIA HERAWATI', 17, 2, 'P', '-', '-', '-'),
('6652', 'PANDU WIBOWO', 13, 2, 'L', '-', '-', '-'),
('6653', 'PUJI AMAL SHALEH', 16, 2, 'L', '-', '-', '-'),
('6654', 'RAFFLI SURA ADITYA', 17, 2, 'L', '-', '-', '-'),
('6655', 'RICOVALDO DZAKI SUSILO', 12, 2, 'L', '-', '-', '-'),
('6656', 'RIDWAN NUR HIDAYAT', 15, 2, 'L', '-', '-', '-'),
('6657', 'RITA WAHYUNI', 12, 2, 'P', '-', '-', '-'),
('6658', 'RIZKI FAUZAN', 14, 2, 'L', '-', '-', '-'),
('6659', 'SHIVA AMEILYA BELINDA PUTRI', 13, 2, 'P', '-', '-', '-'),
('6660', 'AGHNA JADAROH AULAY', 14, 2, 'P', '-', '-', '-'),
('6661', 'ANDIKA FERDIAN PUTRA SARWANA', 13, 2, 'L', '-', '-', '-'),
('6662', 'BAGUS SAMUDRO WICAKSONO', 16, 2, 'L', '-', '-', '-'),
('6663', 'DEZHA RISANG PINANDHITO', 17, 2, 'L', '-', '-', '-'),
('6664', 'DZAKIA RANA YUMNA', 15, 2, 'P', '-', '-', '-'),
('6665', 'EKA NUR KHASANAH', 16, 2, 'P', '-', '-', '-'),
('6667', 'FARHAN DANAR WIJAYANTO', 12, 2, 'L', '-', '-', '-'),
('6668', 'GANES CANTIKA ORY WERDANA', 17, 2, 'P', '-', '-', '-'),
('6669', 'GARDA NORIESCA ANTASENA ARRA\'D', 14, 2, 'L', '-', '-', '-'),
('6670', 'HERLINA BUDI NOVIASARI', 12, 2, 'P', '-', '-', '-'),
('6671', 'IKA DYAH AYU PUSPITA WATI', 13, 2, 'P', '-', '-', '-'),
('6672', 'KURNIA DWI ISWANTI', 14, 2, 'P', '-', '-', '-'),
('6673', 'MELVIN JODIE', 15, 2, 'L', '-', '-', '-'),
('6674', 'MUHAMMAD DIKA NURSETIAWAN', 13, 2, 'L', '-', '-', '-'),
('6676', 'NAUFAL HAMMAN MINARSO', 16, 2, 'L', '-', '-', '-'),
('6677', 'NOVA DWI ROMADHONA', 17, 2, 'L', '-', '-', '-'),
('6678', 'NUR IKHSAN GHAZALAH', 12, 2, 'L', '-', '-', '-'),
('6679', 'R. A RAYHAN GARRY PURWANTO', 13, 2, 'L', '-', '-', '-'),
('6680', 'RAMA NUR FITRAH', 14, 2, 'L', '-', '-', '-'),
('6681', 'REHAN RACHMANSYAH', 12, 2, 'L', '-', '-', '-'),
('6682', 'RIAN ALFAUZI SETIAWAN', 16, 2, 'L', '-', '-', '-'),
('6683', 'RICO CANDRA FAESAL HADI', 17, 2, 'L', '-', '-', '-'),
('6684', 'RIFQI YUDHA ARDIANSYAH', 12, 2, 'L', '-', '-', '-'),
('6685', 'ROSAINDICA NAWANG WULAN', 15, 2, 'P', '-', '-', '-'),
('6686', 'SYARLA ANDJANI MAJELINE', 16, 2, 'P', '-', '-', '-'),
('6687', 'SYIFAA UN ASLAM AMINIM', 17, 2, 'L', '-', '-', '-'),
('6688', 'TESAR RAYHAN OKTA LIBRA', 14, 2, 'L', '-', '-', '-'),
('6689', 'WAHYU HERSA PRATAMA PUTRI', 17, 2, 'P', '-', '-', '-'),
('66892', 'Muhammad Faza Dziaul Bakrie', 8, 2, 'L', '-', '-', '-'),
('6690', 'WAHYU LESTARI', 12, 2, 'P', '-', '-', '-'),
('6691', 'YENI SULANDARI', 13, 2, 'P', '-', '-', '-'),
('6692', 'YUNI MUSRIYAH', 14, 2, 'P', '-', '-', '-'),
('6693', 'AZZAHRA NUR FADHILA', 15, 2, 'P', '-', '-', '-'),
('6694', 'Adam Malik', 6, 2, 'L', '-', '-', '-'),
('6695', 'Adinda Khoirunnisa', 6, 2, 'P', '-', '-', '-'),
('6696', 'Akbar Nur Gilbrant', 6, 2, 'L', '-', '-', '-'),
('6697', 'A\'la Surya Bangsa', 6, 2, 'L', '-', '-', '-'),
('6698', 'Ananda Putra Syahroni', 6, 2, 'L', '-', '-', '-'),
('6699', 'Bogy Dimas Pramudia', 6, 2, 'L', '-', '-', '-'),
('6700', 'Danang Setyawan', 6, 2, 'L', '-', '-', '-'),
('6701', 'Devi Candra Putri', 6, 2, 'P', '-', '-', '-'),
('6702', 'Diaz Andrean', 6, 2, 'L', '-', '-', '-'),
('6703', 'Farhat Fatah', 6, 2, 'L', '-', '-', '-'),
('6704', 'Febrian Rangga Saputra', 6, 2, 'L', '-', '-', '-'),
('6705', 'Firman Bahtiar', 6, 2, 'L', '-', '-', '-'),
('6706', 'Gilang Eka Prasetiya', 6, 2, 'L', '-', '-', '-'),
('6707', 'Julian Hammam Javier', 6, 2, 'L', '-', '-', '-'),
('6708', 'Jumadi', 6, 2, 'L', '-', '-', '-'),
('6709', 'Lutfan Hidayat Subrata', 6, 2, 'L', '-', '-', '-'),
('6710', 'Mokhamad Musta\'im Hidayat', 6, 2, 'L', '-', '-', '-'),
('6711', 'Malfin Fahrul Fanani', 6, 2, 'L', '-', '-', '-'),
('6712', 'Manggala Kusuma Yudha', 6, 2, 'L', '-', '-', '-'),
('6713', 'Mardila Sri Widiastuti', 6, 2, 'P', '-', '-', '-'),
('6714', 'Mardina Tri Wulandari', 6, 2, 'P', '-', '-', '-'),
('6715', 'Merissye Aura Rivalda', 6, 2, 'P', '-', '-', '-'),
('6716', 'Okti Wulandari', 6, 2, 'P', '-', '-', '-'),
('6717', 'Pandu Restu Perwira', 6, 2, 'L', '-', '-', '-'),
('6718', 'Prisma Yuliani', 6, 2, 'P', '-', '-', '-'),
('6719', 'Raden Adjeng Faneza Agna Putri C', 6, 2, 'P', '-', '-', '-'),
('6720', 'Raden Haryo Suryo Adhi Condro', 6, 2, 'L', '-', '-', '-'),
('6721', 'Salsabila Laapriva Ananditya', 6, 2, 'P', '-', '-', '-'),
('6722', 'Savadilla Enggarany', 6, 2, 'P', '-', '-', '-'),
('6723', 'Sinta Dwi Rahmah', 6, 2, 'P', '-', '-', '-'),
('6725', 'Syifa Meitha Zahra', 6, 2, 'P', '-', '-', '-'),
('6726', 'Yanuar Eko Putranto', 6, 2, 'L', '-', '-', '-'),
('6727', 'Zaskia Mareta', 6, 2, 'P', '-', '-', '-'),
('6728', 'Ahmad Fachrizal Abdurrahman', 7, 2, 'L', '-', '-', '-'),
('6729', 'Ahmad Fatah Ansori', 7, 2, 'L', '-', '-', '-'),
('6730', 'Ahmad Nurdiyanto', 7, 2, 'L', '-', '-', '-'),
('6731', 'Alvi Riska Fadholi', 7, 2, 'L', '-', '-', '-'),
('6732', 'Ananda Khoirunnisa', 7, 2, 'P', '-', '-', '-'),
('6733', 'Andin Aprilliyani', 7, 2, 'P', '-', '-', '-'),
('6734', 'Anggita Reza Septiana', 7, 2, 'P', '-', '-', '-'),
('6735', 'Ardharena Maghovie Gumelardjati', 7, 2, 'P', '-', '-', '-'),
('6736', 'Arif Nursanta', 7, 2, 'L', '-', '-', '-'),
('6737', 'Dian Ramadhan Agus Tiana', 7, 2, 'L', '-', '-', '-'),
('6738', 'Fadli Akbar Romadlon', 7, 2, 'L', '-', '-', '-'),
('6739', 'Farah Belva Shada', 7, 2, 'P', '-', '-', '-'),
('6740', 'Faridho Maulana Firizky', 7, 2, 'L', '-', '-', '-'),
('6741', 'Fiqry Handi Alamsyah', 7, 2, 'L', '-', '-', '-'),
('6742', 'Heru Perdana', 7, 2, 'L', '-', '-', '-'),
('6743', 'Hesti Pratiwi', 7, 2, 'P', '-', '-', '-'),
('6744', 'Irfan Andriyatno', 7, 2, 'L', '-', '-', '-'),
('6745', 'Istiana Sari Rahayu', 7, 2, 'P', '-', '-', '-'),
('6746', 'Iva Ayu Saputri', 7, 2, 'P', '-', '-', '-'),
('6747', 'Kholil Ghibran Herwin Syah Putra', 7, 2, 'L', '-', '-', '-'),
('6748', 'Lefran Rifaldi', 7, 2, 'L', '-', '-', '-'),
('6749', 'Maheswari Arzenita Arista Widya', 7, 2, 'P', '-', '-', '-'),
('6750', 'Muhammad Idris', 7, 2, 'L', '-', '-', '-'),
('6751', 'Muhammad Ikhsanudin', 7, 2, 'L', '-', '-', '-'),
('6752', 'Muhammad Khoirul Rosid', 7, 2, 'L', '-', '-', '-'),
('6753', 'Nasywa Nora Shada', 7, 2, 'P', '-', '-', '-'),
('6754', 'Pinky Diva Alfiqri', 7, 2, 'L', '-', '-', '-'),
('6755', 'Puput Restu Kinanti', 7, 2, 'P', '-', '-', '-'),
('6756', 'Retno Setyawati', 7, 2, 'P', '-', '-', '-'),
('6757', 'Shofi Maulia Zahroh', 7, 2, 'P', '-', '-', '-'),
('6758', 'Valentino Aji Wardana', 7, 2, 'L', '-', '-', '-'),
('6759', 'Wildan Ma\'ruf', 7, 2, 'L', '-', '-', '-'),
('6760', 'Yovan Avedo Sanjaya', 7, 2, 'L', '-', '-', '-'),
('6761', 'Zahra Ramadhani', 7, 2, 'P', '-', '-', '-'),
('6762', 'Abira Zahra Junita', 8, 2, 'L', '-', '-', '-'),
('6763', 'Adam Bayu Prakoso', 8, 2, 'L', '-', '-', '-'),
('6764', 'Arif Gusdiantoro', 8, 2, 'L', '-', '-', '-'),
('6765', 'Aris Fitanto', 8, 2, 'L', '-', '-', '-'),
('6766', 'Artha Krisna Murti Dewanta', 8, 2, 'L', '-', '-', '-'),
('6767', 'Azka Mutiara Afifah', 8, 2, 'P', '-', '-', '-'),
('6768', 'Bagus Khairil Anwar', 8, 2, 'L', '-', '-', '-'),
('6769', 'Balestiya Wulan Sari', 8, 2, 'L', '-', '-', '-'),
('6770', 'Dodi Mulyanto', 8, 2, 'L', '-', '-', '-'),
('6771', 'Enggar Prihardoyo', 8, 2, 'L', '-', '-', '-'),
('6772', 'Ferri Setiawan', 8, 2, 'L', '-', '-', '-'),
('6773', 'Gilang Pratama Putra', 8, 2, 'L', '-', '-', '-'),
('6774', 'Hanif Huda Afrizal', 8, 2, 'L', '-', '-', '-'),
('6775', 'Irfan Jalaludin', 8, 2, 'L', '-', '-', '-'),
('6776', 'Isna Rahmayanti', 8, 2, 'P', '-', '-', '-'),
('6777', 'Isna Wulan Destia', 8, 2, 'P', '-', '-', '-'),
('6778', 'Khalda Salma Hamidah', 8, 2, 'P', '-', '-', '-'),
('6779', 'Khoirudin Nur', 8, 2, 'L', '-', '-', '-'),
('6780', 'Kurnia Putri Sayekti', 8, 2, 'P', '-', '-', '-'),
('6781', 'Kusumaning Ayu Wulandari', 8, 2, 'P', '-', '-', '-'),
('6782', 'Maya Yuliana', 8, 2, 'P', '-', '-', '-'),
('6783', 'Muhammad Choirul Anam', 8, 2, 'P', '-', '-', '-'),
('6784', 'Muhammad Taufik Ariyanto', 8, 2, 'P', '-', '-', '-'),
('6785', 'Muhammad Wijdan Akbar', 8, 2, 'P', '-', '-', '-'),
('6786', 'Natasya Hanandika Fidelta', 8, 2, 'P', '-', '-', '-'),
('6787', 'Nur Amri Musadi', 8, 2, 'L', '-', '-', '-'),
('6788', 'Prihananto Haryono', 8, 2, 'L', '-', '-', '-'),
('6789', 'Rifnu Setiawan', 8, 2, 'L', '-', '-', '-'),
('6790', 'Rizky Achmad Fahrizi', 8, 2, 'L', '-', '-', '-'),
('6791', 'Safira  Aulia Rahma Diani', 8, 2, 'P', '-', '-', '-'),
('6792', 'Satifa Sintya Fadilah', 8, 2, 'P', '-', '-', '-'),
('6793', 'Siti Nurhalisah', 8, 2, 'P', '-', '-', '-'),
('6794', 'Alif Putra Kurniadi Setiawan', 9, 2, 'L', '-', '-', '-'),
('6795', 'Alya Agy Pradipta', 9, 2, 'P', '-', '-', '-'),
('6796', 'Annisa Fitri Palupi', 9, 2, 'P', '-', '-', '-'),
('6797', 'Aziz Faridho', 9, 2, 'L', '-', '-', '-'),
('6798', 'Berliana Dwi Lestari', 9, 2, 'P', '-', '-', '-'),
('6799', 'Della Putri Kumala Sari', 9, 2, 'P', '-', '-', '-'),
('6800', 'Dennis Wahyu Saputra', 9, 2, 'L', '-', '-', '-'),
('6801', 'Erika Yunita', 9, 2, 'P', '-', '-', '-'),
('6802', 'Fachriansyah Panji Gustafarin', 9, 2, 'L', '-', '-', '-'),
('6803', 'Fadila Happy Widya Nugrahandita', 9, 2, 'P', '-', '-', '-'),
('6804', 'Fahrizal Fajar Setiawan', 9, 2, 'L', '-', '-', '-'),
('6805', 'Faisal Nabil Baihaki', 9, 2, 'L', '-', '-', '-'),
('6806', 'Fajar Rifqi Saputra', 9, 2, 'L', '-', '-', '-'),
('6807', 'Febdiana Agnesia Surya', 9, 2, 'P', '-', '-', '-'),
('6808', 'Fitria Dwi Listyowati', 9, 2, 'P', '-', '-', '-'),
('6809', 'Herlina Handastari', 9, 2, 'P', '-', '-', '-'),
('6810', 'Heru Septiawan', 9, 2, 'L', '-', '-', '-'),
('6811', 'Joko Prasetiyo', 9, 2, 'L', '-', '-', '-'),
('6812', 'Muhammad Dzamar Ramadhan', 9, 2, 'L', '-', '-', '-'),
('6813', 'Mahardika Novian Ardiansyah', 9, 2, 'L', '-', '-', '-'),
('6814', 'Mentari Agung Heralfi', 9, 2, 'P', '-', '-', '-'),
('6815', 'Muhammad Muhibbuddin Muhibbullah', 9, 2, 'L', '-', '-', '-'),
('6816', 'Rendi Purnomo', 9, 2, 'L', '-', '-', '-'),
('6817', 'Risko Isfantara', 9, 2, 'L', '-', '-', '-'),
('6818', 'Salsabila Jihan Nur Amalia', 9, 2, 'P', '-', '-', '-'),
('6819', 'Saniasa Rosary', 9, 2, 'P', '-', '-', '-'),
('6820', 'Tegar Putra Purnama', 9, 2, 'L', '-', '-', '-'),
('6821', 'Trinita Kumalasari', 9, 2, 'P', '-', '-', '-'),
('6822', 'Vera Rossyana Salsabila', 9, 2, 'P', '-', '-', '-'),
('6823', 'Very Aulia Rahmat', 9, 2, 'L', '-', '-', '-'),
('6824', 'Wahyu Adi Asa Pratama', 9, 2, 'L', '-', '-', '-'),
('6825', 'Yanu Dwi Afianto', 9, 2, 'L', '-', '-', '-'),
('6826', 'Ardian Wahyu Saputra', 10, 2, 'L', '-', '-', '-'),
('6827', 'Ardin Nur Salam', 10, 2, 'L', '-', '-', '-'),
('6828', 'Arinda Novellia Putri Hastuti', 10, 2, 'P', '-', '-', '-'),
('6829', 'Azofie Nasya Raihannah', 10, 2, 'P', '-', '-', '-'),
('6830', 'Bagas Mintartono', 10, 2, 'L', '-', '-', '-'),
('6831', 'Binuri Hidayatika Triyana Putri', 10, 2, 'P', '-', '-', '-'),
('6832', 'Damar Wiranata Putra', 10, 2, 'L', '-', '-', '-'),
('6833', 'Diah Nurma Hidayati', 10, 2, 'P', '-', '-', '-'),
('6834', 'Dimas Hendriyan', 10, 2, 'L', '-', '-', '-'),
('6835', 'Dwika Agas Saputra', 10, 2, 'L', '-', '-', '-'),
('6836', 'Errangga Catur Nugroho', 10, 2, 'L', '-', '-', '-'),
('6837', 'Errika Kurbiyanti', 10, 2, 'P', '-', '-', '-'),
('6838', 'Farchan Lutfi Darunadjati', 10, 2, 'L', '-', '-', '-'),
('6839', 'Gheffira Devi Maharani', 10, 2, 'P', '-', '-', '-'),
('6840', 'Indri Riska Astuti', 10, 2, 'P', '-', '-', '-'),
('6841', 'Irsyad Syarif Al Madani', 10, 2, 'L', '-', '-', '-'),
('6842', 'Mia Nur Aini', 10, 2, 'P', '-', '-', '-'),
('6843', 'Muhkamad Nur Chamid', 10, 2, 'L', '-', '-', '-'),
('6844', 'Muhammad Amirul Rizky Santoso', 10, 2, 'L', '-', '-', '-'),
('6845', 'Muhammad Fabian Jagaddhita ', 10, 2, 'L', '-', '-', '-'),
('6846', 'Muhammad Hikari Adha', 10, 2, 'L', '-', '-', '-'),
('6847', 'Nindya Wikaning Astari', 10, 2, 'P', '-', '-', '-'),
('6848', 'Punto Aji Pratama', 10, 2, 'L', '-', '-', '-'),
('6849', 'Putra Anindra Pramudika', 10, 2, 'L', '-', '-', '-'),
('6850', 'Rahmawati Fatimah', 10, 2, 'P', '-', '-', '-'),
('6851', 'Reinhard Abdi Wicaksono', 10, 2, 'L', '-', '-', '-'),
('6852', 'Resti Safa Septiana', 10, 2, 'P', '-', '-', '-'),
('6853', 'Rizki Puspita Ardiyani', 10, 2, 'P', '-', '-', '-'),
('6854', 'Rizqy Zainal Arivin', 10, 2, 'L', '-', '-', '-'),
('6855', 'Sakti Eka Nugraha', 10, 2, 'L', '-', '-', '-'),
('6856', 'Sekar Arum Nurvita Jati', 10, 2, 'P', '-', '-', '-'),
('6857', 'Sri Utami', 10, 2, 'P', '-', '-', '-'),
('6858', 'Ahmad Dwi Kuncoro', 11, 2, 'L', '-', '-', '-'),
('6859', 'Alfonda Putra Tama', 11, 2, 'L', '-', '-', '-'),
('6860', 'Ana Gus Nawaningsih', 11, 2, 'P', '-', '-', '-'),
('6861', 'Anngita Dwi Aryani', 11, 2, 'P', '-', '-', '-'),
('6862', 'Ardana Nurrisqi Prabawa', 11, 2, 'L', '-', '-', '-'),
('6863', 'Ayu Norma Dwi Syahrani', 11, 2, 'P', '-', '-', '-'),
('6864', 'Bagus Pamungkas', 11, 2, 'L', '-', '-', '-'),
('6865', 'Dea Amanda Oktaviani', 11, 2, 'P', '-', '-', '-'),
('6866', 'Dwi Yulinar', 11, 2, 'P', '-', '-', '-'),
('6867', 'Eva Yuan Febriani', 11, 2, 'P', '-', '-', '-'),
('6868', 'Febiana Dwi Wahyuni', 11, 2, 'P', '-', '-', '-'),
('6869', 'Ibrahim Agung Leksono', 11, 2, 'L', '-', '-', '-'),
('6870', 'Indah Ayu Rakhmadhani', 11, 2, 'P', '-', '-', '-'),
('6871', 'Khaidar Naufal Pasingsingan', 11, 2, 'L', '-', '-', '-'),
('6872', 'Kiki Andriyani', 11, 2, 'P', '-', '-', '-'),
('6873', 'Marchella Novita Sari', 11, 2, 'P', '-', '-', '-'),
('6874', 'Muhammad Hanan Raharja', 11, 2, 'L', '-', '-', '-'),
('6875', 'Muhammad Bagas Kandiaz', 11, 2, 'L', '-', '-', '-'),
('6876', 'Muhammad Febrian Adkha', 11, 2, 'L', '-', '-', '-'),
('6877', 'Nabila Prawita Putri', 11, 2, 'P', '-', '-', '-'),
('6878', 'Noval Dian Riansyah', 11, 2, 'L', '-', '-', '-'),
('6879', 'Noviana Ramadhani', 11, 2, 'P', '-', '-', '-'),
('6880', 'Oki Nur Sahbani', 11, 2, 'L', '-', '-', '-'),
('6881', 'Pradita Reisya Ardana', 11, 2, 'P', '-', '-', '-'),
('6882', 'Raditya Pratama', 11, 2, 'L', '-', '-', '-'),
('6883', 'Rovika Anggriani', 11, 2, 'P', '-', '-', '-'),
('6884', 'Rio Firmansyah', 11, 2, 'L', '-', '-', '-'),
('6885', 'Rizky Amelia', 11, 2, 'P', '-', '-', '-'),
('6886', 'Sanita Handayani', 11, 2, 'P', '-', '-', '-'),
('6887', 'Shafa Attaassy Wijaya', 11, 2, 'L', '-', '-', '-'),
('6888', 'Vicky Aji Saputra', 11, 2, 'L', '-', '-', '-'),
('6889', 'Yoga Fauzan Ardiansah', 11, 2, 'L', '-', '-', '-'),
('6890', 'Yohandarueka Yuniarta', 11, 2, 'L', '-', '-', '-'),
('6891', 'Ainun Hakimah', 6, 2, 'P', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` char(15) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` varchar(8) NOT NULL,
  `id_penerbit` int(3) NOT NULL,
  `id_pengarang` int(3) NOT NULL,
  `no_rak` int(2) NOT NULL,
  `thn_terbit` year(4) NOT NULL,
  `stok` int(3) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `ISBN`, `judul`, `id_kategori`, `id_penerbit`, `id_pengarang`, `no_rak`, `thn_terbit`, `stok`, `ket`) VALUES
('1116', '-', 'Kisah Haji', '813', 8, 6, 6, 2010, 5, '-'),
('1117', '-', 'Karunia Akal yang Disia-siakan', '000', 9, 7, 7, 2010, 3, '-\r\n'),
('1118', '-', 'Sosok Ayah yang Sangat Mencintai Anaknya Nabi Yakub A.S', '958.8', 8, 8, 7, 2010, 50, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(6) NOT NULL,
  `denda` int(6) NOT NULL,
  `status` enum('A','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `denda`, `status`) VALUES
(1, 2500, 'N'),
(3, 3000, 'N'),
(5, 500, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_buku`
--

CREATE TABLE `tb_detail_buku` (
  `id_detail_buku` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_buku`
--

INSERT INTO `tb_detail_buku` (`id_detail_buku`, `id_buku`, `no_buku`, `status`) VALUES
(1, '1116', 1, '1'),
(2, '1116', 2, '1'),
(3, '1116', 3, '0'),
(4, '1116', 4, '1'),
(5, '1116', 5, '1'),
(6, '1117', 1, '1'),
(7, '1117', 2, '1'),
(8, '1117', 3, '0'),
(9, '1118', 1, '0'),
(10, '1118', 2, '0'),
(11, '1118', 3, '1'),
(12, '1118', 4, '1'),
(13, '1118', 5, '1'),
(14, '1118', 6, '1'),
(15, '1118', 7, '1'),
(16, '1118', 8, '1'),
(17, '1118', 9, '1'),
(18, '1118', 10, '1'),
(19, '1118', 11, '1'),
(20, '1118', 12, '1'),
(21, '1118', 13, '1'),
(22, '1118', 14, '1'),
(23, '1118', 15, '1'),
(24, '1118', 16, '1'),
(25, '1118', 17, '1'),
(26, '1118', 18, '1'),
(27, '1118', 19, '1'),
(28, '1118', 20, '1'),
(29, '1118', 21, '1'),
(30, '1118', 22, '1'),
(31, '1118', 23, '1'),
(32, '1118', 24, '1'),
(33, '1118', 25, '1'),
(34, '1118', 26, '1'),
(35, '1118', 27, '1'),
(36, '1118', 28, '1'),
(37, '1118', 29, '1'),
(38, '1118', 30, '1'),
(39, '1118', 31, '1'),
(40, '1118', 32, '1'),
(41, '1118', 33, '1'),
(42, '1118', 34, '1'),
(43, '1118', 35, '1'),
(44, '1118', 36, '1'),
(45, '1118', 37, '1'),
(46, '1118', 38, '1'),
(47, '1118', 39, '1'),
(48, '1118', 40, '1'),
(49, '1118', 41, '1'),
(50, '1118', 42, '1'),
(51, '1118', 43, '1'),
(52, '1118', 44, '1'),
(53, '1118', 45, '1'),
(54, '1118', 46, '1'),
(55, '1118', 47, '1'),
(56, '1118', 48, '1'),
(57, '1118', 49, '1'),
(58, '1118', 50, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `flag` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_pinjam`, `id_buku`, `no_buku`, `flag`) VALUES
(1, 3, '1116', 1, 1),
(2, 3, '1116', 2, 1),
(3, 4, '1116', 3, 1),
(4, 5, '1118', 1, 0),
(5, 5, '1118', 2, 0),
(6, 6, '1117', 3, 0),
(12, 5, '1116', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(8) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `singkatan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `singkatan`) VALUES
('-', '-', '-'),
('000', 'Pengetahuan Umum', 'PU'),
('2X1', 'Qur\'an Hadits', 'QH'),
('2X3.51', 'Akidah Akhlak', 'AA'),
('2X4', 'Fiqih', 'FIQ'),
('2X9.6', 'SKI', 'SKI'),
('323.6', 'PPKN', 'PKN'),
('330', 'Ekonomi', 'EKO'),
('370', 'Olahraga', 'OR'),
('410', 'Bahasa Indonesia', 'BI'),
('420', 'Bahasa Inggris', 'BENG'),
('492.7', 'Bahasa Arab', 'BA'),
('510', 'Matematika', 'MTK'),
('530', 'Fisika', 'FIS'),
('574', 'Biologi', 'BIO'),
('700', 'Seni Budaya', 'SB'),
('813', 'Fiksi', 'FIK'),
('910', 'Geografi', 'GEO'),
('958.8', 'Sejarah', 'SEJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(6, 'VII A'),
(7, 'VII B'),
(8, 'VII C'),
(9, 'VII D'),
(10, 'VII E'),
(11, 'VII F'),
(12, 'VIII A'),
(13, 'VIII B'),
(14, 'VIII C'),
(15, 'VIII D'),
(16, 'VIII E'),
(17, 'VIII F'),
(18, 'IX A'),
(19, 'IX B'),
(20, 'IX C'),
(21, 'IX D'),
(22, 'IX E'),
(23, 'IX F');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(2) NOT NULL,
  `id_denda` int(6) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_dikembalikan`, `terlambat`, `id_denda`, `denda`) VALUES
(1, 3, '2017-05-11', 0, 5, 0),
(2, 4, '2017-05-25', 0, 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `stts`) VALUES
('14111006', '96e8da62f2a8459def55cd4b61ff0261', 'petugas'),
('14111063', '3792bfd72c8a9071ac790a4b3b60d15a', 'petugas'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('OP1', '4736b2b496ba3de748c6eea6c6b9ca65', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(3) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `id_provinsi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`, `id_provinsi`) VALUES
(7, '-', 9),
(8, 'Erlangga for Kids', 9),
(9, 'Erlangga', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(5, '-'),
(6, 'Anita Banesi'),
(7, 'Moch Syaiful Bakhri & Ahmad Dairobi'),
(8, 'Yugha Erlangga & Tim Divaro'),
(9, 'Moch Syaiful Bakhri & M.Irham Zuhdi'),
(10, 'Tasirun Sulaiman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `img`, `jenis_kelamin`, `alamat`, `password`, `id_agama`, `hp`, `ket`) VALUES
('14111006', 'Fitri', 'XHO6AMWBSID7RFVENCTZKJ9Y0UPQ48G32L15.png', 'P', 'Ngentak Sumberadi Mlati', 'anggraini', 2, '087851383829', ''),
('14111063', 'Tri Gunawan', 'LGATSIM9QXWP6O5VZ3J8YB4UKF10DRH7E2NC.jpg', 'L', 'Harnowo', '0806', 2, '019273981293871', ''),
('admin', 'KaSetya', 'LT3YSMP6VIWBKN24H971Z8CFAUODXQREJG05.jpg', 'L', 'Ngentak Sumberadi Mlati', 'admin', 2, '087851484838', '123'),
('OP1', 'Anggraini Diah P', '5OK9RD14ZWHY3TQ6CN0XP7GVEB2L8MASIUJF.png', 'P', 'Ngentak Sumberadi Mlati Sleman', 'op1', 2, '087851484838', 'Admin Perpustakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tgl_kembali`, `total_buku`, `status`) VALUES
(3, '2017-05-22', '6148', '2017-05-25', 2, 1),
(4, '2017-05-22', '6346', '2017-05-25', 1, 1),
(5, '2017-05-22', '6291', '2017-05-22', 3, 0),
(6, '2017-05-25', '6870', '2017-05-27', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`, `kota`) VALUES
(9, '-', '-'),
(10, 'Jakarta', 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `no_rak` int(2) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `id_kategori` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`no_rak`, `nama_rak`, `id_kategori`) VALUES
(6, '1', '000'),
(7, '2', '2X1'),
(8, '3', '2X3.51'),
(9, '4', '2X4'),
(11, '5', '420'),
(12, '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`),
  ADD KEY `id_admin_2` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`,`img`);

--
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_anggota` (`id_anggota`,`nama`,`id_kelas`,`id_agama`,`jenis_kelamin`,`hp`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_pengarang` (`id_pengarang`),
  ADD KEY `no_rak` (`no_rak`),
  ADD KEY `id_buku` (`id_buku`,`ISBN`,`judul`,`id_kategori`,`id_penerbit`,`id_pengarang`,`no_rak`,`thn_terbit`,`stok`),
  ADD KEY `id_buku_2` (`id_buku`,`ISBN`,`judul`,`id_kategori`,`id_penerbit`,`id_pengarang`,`no_rak`,`thn_terbit`);

--
-- Indeks untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD KEY `id_detail_buku` (`id_detail_buku`,`id_buku`,`no_buku`,`status`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_anggota` (`id_pinjam`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`,`id_pinjam`,`id_buku`,`no_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`,`kategori`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_detail` (`id_pinjam`),
  ADD KEY `id_kembali` (`id_kembali`,`id_pinjam`,`tgl_dikembalikan`,`terlambat`,`id_denda`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`stts`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`),
  ADD KEY `id_penerbit` (`id_penerbit`,`nama_penerbit`,`id_provinsi`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indeks untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_detail` (`tgl_kembali`),
  ADD KEY `id_buku` (`id_anggota`),
  ADD KEY `id_pinjam` (`id_pinjam`,`tgl_pinjam`,`id_anggota`,`tgl_kembali`,`total_buku`);

--
-- Indeks untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`no_rak`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `no_rak` (`no_rak`,`nama_rak`,`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  MODIFY `id_detail_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `no_rak` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`id_pengarang`) REFERENCES `tb_pengarang` (`id_pengarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_4` FOREIGN KEY (`no_rak`) REFERENCES `tb_rak` (`no_rak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_5` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD CONSTRAINT `tb_detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD CONSTRAINT `tb_kembali_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD CONSTRAINT `tb_penerbit_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD CONSTRAINT `tb_rak_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
