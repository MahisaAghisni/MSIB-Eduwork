-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 08.44
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `brand_name`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(4, 'Eiger');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Baju Pria'),
(3, 'Sepatu'),
(4, 'Jacket'),
(5, 'Baju Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `category_id`, `brands_id`, `product_name`, `image`, `description`, `price`, `stock`) VALUES
(13, 1, 4, 'EIGER MTN TEES', 'kaos eiger mtn.png', 'Kaus lengan pendek edisi spesial Sumpah Pemuda ini terbuat dari bahan katun yang dirancang dengan grafis ilustrasi di bagian belakang. Terinspirasi dari semangat Sumpah Pemuda pada tanggal 28 Oktober 1928, yang dengan segenap hati menyatakan satu tanah air, satu bangsa, dan satu bahasa: Indonesia. Tunjukkan semangat muda dalam diri Anda dengan memakai kaus lengan pendek Sumpah Pemuda MTN ini saat berkegiatan sehari-hari.', 189000, 20),
(14, 4, 4, 'EIGER ATHENA WTP', 'jacket eiger.png', 'Athena adalah jaket waterproof breathable yang terbuat dari bahan Eiger Shell polyester 2,5 layer dan dirancang secara anatomis untuk wanita saat melakukan kegiatan luar ruangan seperti menjelajahi medan ekstrim dari hutan hujan atas dan puncak gunung. Athena merupakan jaket waterproof berkualitas yang memiliki rating 7.000mm untuk ketahanan terhadap air dan kemampuannya untuk mencegah hawa panas terjebak di dalam sebesar 5000g/sqm/24hr sehingga mampu menjaga Anda tetap kering dari hujan maupun keringat di saat yang bersamaan. Daya tahannya terhadap air diperkuat oleh seam-sealing (sejenis tape yang direkatkan di bagian jahitan baju untuk menahan air agar tidak masuk) di seluruh bagian dan ritsleting yang memiliki lapisan flap untuk mencegah air merembes masuk melalui lubang ritsleting. Disarankan untuk menggunakan jaket ini untuk kegiatan trekking dan summit attack di wilayah hutan hujan atas maupundi puncak gunung', 1019900, 5),
(15, 5, 4, 'EIGER RIBBED T-SHIRT', 'kaos eiger wanita.png', 'Kaus lengan panjang terbaru Ribbed hadir untuk menunjang penampilan kasual terbaik Anda. Kaus ini dirancang dengan motif garis dan terbuat dari bahan katun yang nyaman.\r\n\r\nMaterial: 100% Cotton\r\n\r\nFitur:\r\nPotongan oversized\r\nLengan panjang\r\nMotif garis\r\nTerbuat dari bahan katun', 185900, 10),
(16, 3, 4, 'EIGER MID CUT SHOES', 'sepatu eiger.png', 'Dengan desain klasik minimalis, sepatu mid-cut Pedauh hadir untuk meningkatkan style harian serta membuat Anda tetap nyaman ke mana pun Anda pergi. Bagian atas sepatu ini terbuat dari bahan suede dan kanvas yang lembut juga berdaya tahan kuat yang akan mendorong Anda untuk terus bergerak dengan bebas tanpa mengurangi kenyamanan terbaik untuk kaki Anda. Selain berfungsi sebagai bantalan dan peredam hentakan, Insole Ortholite® yang ringan dan berdaya evaporasi tinggi juga efektif menguapkan kelembapan untuk menjaga permukaan tetap kering. Sepatu ini juga didukung outsole dengan proses vulkanisir yang memberikan grip serta daya tahan yang lebih baik, meningkatkan elastisitas, dan tidak mudah tergelincir saat menapaki di permukaan yang basah.', 584900, 5),
(18, 3, 1, 'Nike Dunk Low Retro', 'sepatu nike.png', 'Bahan kulit di bagian atas untuk kesempurnaan yang lembut.\r\nMidsole busa menawarkan bantalan yang ringan dan responsif.\r\nSol luar karet dengan lingkaran pivot lingkaran klasik menambah daya cengkeram yang tahan lama dan gaya warisan.\r\nKerah berpotongan rendah dan empuk terlihat ramping dan terasa nyaman.\r\nWarna yang ditampilkan: Putih/Merah Picante\r\nGaya DV0831-103\r\nNegara/Daerah Asal: Vietnam\r\n\r\nNike Dunk\r\n\r\nDari papan luncur hingga skateboard, pengaruh Nike Dunk tidak dapat disangkal. Meskipun diperkenalkan sebagai sepatu basket pada tahun 1985, solnya yang datar dan mencengkeram sangat cocok untuk komunitas olahraga yang terabaikan-skater. Mengungkap subkultur yang mendambakan kreativitas dan fungsi, Dunk merilis beberapa dekade warna yang tak terhitung jumlahnya yang terus menangkap jiwa para skater dari pantai ke pantai.', 1318000, 5),
(19, 4, 1, 'Nike Sportswear Swoosh', 'jacket nike.png', 'Siang atau malam hari, jaket baju olahraga Solo Swoosh kami memberikan Anda gaya yang bersih dan klasik yang identik dengan koleksi Solo Swoosh kami. Kain tenunnya terasa halus dan ringan, dan desain pipa yang reflektif menambah kesan kontras. Untuk tampilan yang seragam dari pintu depan hingga ke toko kaset, padukan dengan bawahan baju olahraga Solo Swoosh yang serasi.\r\n\r\nSolo Swoosh\r\n\r\nSeiring tren berubah dan berkembang seiring waktu, Swoosh tetap sederhana dan tidak pernah berubah. Koleksi Solo Swoosh memberikan penghormatan kepada sifat Swoosh yang tak lekang oleh waktu, dengan pakaian penting yang dirancang untuk melengkapi pakaian sehari-hari Anda.\r\n\r\nJernih dan Bersih\r\n\r\nKain taffeta yang ditenun dengan halus memberikan kesan jaket yang renyah untuk kenyamanan yang sejuk dan gaya klasik. Lapisan rajutan di bagian badan membuatnya tetap lembut dan ringan, sementara lengan yang dilapisi taffeta memudahkan Anda untuk masuk dan keluar.\r\n\r\nKenyamanan Berpendingin Udara\r\n\r\nKonstruksi berventilasi memungkinkan udara bersirkulasi secara alami untuk membantu tubuh Anda mempertahankan suhu yang nyaman.', 1729000, 15),
(20, 5, 1, 'Nike Sportswear Women', 'kaos nike wanita.png', 'Pertumbuhan adalah sebuah perjalanan, bukan tujuan. Jadi, sambil menggapai matahari, tetaplah nyaman dengan kaos yang lembut ini. Bahu yang turun dan bentuknya yang boxy memberi Anda tampilan yang santai tanpa merasa terlalu besar.\r\n\r\n\r\nDetail produk\r\n\r\n100% katun\r\nCuci dengan mesin\r\nDiimpor\r\nWarna yang ditampilkan: Putih\r\nGaya FJ9761-100\r\nNegara/Daerah Asal: Tiongkok', 529000, 20),
(21, 1, 2, 'KORN T-SHIRT', 'kaos adidas.png', 'Korn dan adidas bersatu untuk mempersembahkan kolaborasi yang sudah bertahun-tahun dalam proses pembuatan untuk merayakan ulang tahun ke-30 band ini. Logo yang disebut sebagai api hopscotch berpadu dengan Trefoil yang ikonik untuk tampilan yang memberi penghormatan kepada sejarah kami dengan Korn. Memadukan musik dan olahraga, ini adalah pernyataan bahwa gaya mendobrak batas dan menjalin hubungan budaya. Karena kenyamanan juga penting, Anda akan merasa nyaman mengenakannya berkat bahan katun yang lembut dengan ukuran yang tidak terlalu ketat dan tidak terlalu longgar.\r\n\r\nSPESIFIKASI\r\nKebesaran yang pas\r\n100% katun kaos tunggal\r\nKerah bergaris\r\nKode Produk IN9098', 900000, 10),
(22, 4, 2, 'TRAE TECH JACKET', 'jacket adidas.png', 'Korn dan adidas bersatu untuk mempersembahkan kolaborasi yang sudah bertahun-tahun dalam proses pembuatan untuk merayakan ulang tahun ke-30 band ini. Logo yang disebut sebagai api hopscotch berpadu dengan Trefoil yang ikonik untuk tampilan yang memberi penghormatan kepada sejarah kami dengan Korn. Memadukan musik dan olahraga, ini adalah pernyataan bahwa gaya mendobrak batas dan menjalin hubungan budaya. Karena kenyamanan juga penting, Anda akan merasa nyaman mengenakannya berkat bahan katun yang lembut dengan ukuran yang tidak terlalu ketat dan tidak terlalu longgar.\r\n\r\nSPESIFIKASI\r\nKebesaran yang pas\r\n100% katun kaos tunggal\r\nKerah bergaris\r\nKode Produk IN9098', 1700000, 10),
(23, 5, 2, 'T-SHIRT RUNNING RUN', 'kaos adidas wanita.png', 'T-SHIRT RUNNING RUN ICONS\r\nT-SHIRT LARI RINGAN DENGAN LOGO REFLEKTIF.\r\nT-Shirt Running Run Icons ini dibuat untuk bergerak — ketika kamu melakukan sesi lari singkat sebelum bekerja, atau menambah jarak pada akhir pekan. Dengan potongan klasik dan kain breathable yang lembut, t-shirt ini memberikan sensasi gerakan yang ringan dalam setiap sesi lari. Dengan bahan yang menghilangkan atau menyerap keringat, produk adidas AEROREADY membantumu tetap merasa kering.T-shirt ini mudah dipadukan dengan koleksi pakaian olahragamu berkat desain minimalis dan logo reflektifnya.\r\n\r\nSPESIFIKASI\r\nFit reguler\r\n100% poliester single jersey daur ulang\r\nRingan dan lembut\r\nKode produk: HR9887\r\nCrewneck\r\nAEROREADY yang menyerap kelembapan\r\nLogo reflektif', 580000, 20),
(24, 3, 2, 'SEPATU SAMBA OG', 'sepatu adidas.png', 'SEPATU SAMBA OG\r\nTAMPILAN DAN SENSASI KLASIK DARI SAMBA YANG AUTENTIK.\r\nDiciptakan untuk sepak bola indoor, Samba menjadi ikon street style yang tak lekang oleh waktu. Sepatu ini tetap mempertahankan warisannya dengan upper kulit lembut dan overlay berbahan suede.\r\n\r\nSPESIFIKASI\r\nRegular fit\r\nUpper berbahan kulit full grain dengan suede bertekstur dan detail gold foil\r\nOutsole berbahan karet gum\r\nMenggunakan tali sepatu\r\nBagian lining dibuat dari bahan kulit sintetis; Cupsole berbahan karet gum\r\nKode produk: B75807', 2200000, 7),
(25, 1, 1, 'Jordan Flight Essentials', 'kaos nike.png', 'Besar dan longgar untuk kenyamanan dan gaya. Kaos super lembut ini memiliki lengan yang lebih panjang dan bahu yang turun. Dipadukan dengan patch dada anyaman Jumpman yang minimalis, kamu akan terlihat n-i-c-e.\r\n\r\nDetail Produk\r\n\r\n100% Kapas\r\nKerah bergaris\r\nCuci dengan mesin\r\nDiimpor\r\nWarna Ditampilkan: Sky J Light Olive\r\nGaya DZ0604-340\r\nNegara/Daerah Asal: Tiongkok', 499000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `role` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_user`, `email`, `password`, `alamat`, `no_hp`, `role`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$E9nVsoSdK8NR7ze3Dz4o9uONp71znpObiwXgNu7Qfs6doCH8xPBlu', 'Mojokerto', '081217660423', 'admin'),
(9, 'user', 'user@gmail.com', '$2y$10$xgyiDm3kCT7mmxHdtLwSnOEgkDMMLHbxHZT2CTiOtqubxDsVCmEUK', 'Mojokerto', '081217660423', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`),
  ADD KEY `fk_product_brands` (`brands_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_brands` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
