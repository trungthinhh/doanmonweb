-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 23, 2024 lúc 03:50 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanmonweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(10) NOT NULL,
  `img` varchar(50) NOT NULL,
  `TenSP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `img`, `TenSP`) VALUES
(1, 'bon-nam-sau-ve-dien-bien.jpg', 'Văn Học'),
(2, 'doc-suy-nghi-thau-tam-tri.jpg', 'Kỹ Năng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaG` int(10) NOT NULL,
  `img` varchar(50) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `SL` int(10) NOT NULL,
  `Gia` float NOT NULL,
  `MaSach` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `MaSach` int(10) NOT NULL,
  `TenSach` varchar(100) NOT NULL,
  `Gia` float NOT NULL,
  `SL` int(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  `MoTa` varchar(500) NOT NULL,
  `MaDM` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`MaSach`, `TenSach`, `Gia`, `SL`, `img`, `MoTa`, `MaDM`) VALUES
(5, 'Thời khắc còn lại', 155, 10, 'thoi-khac-con-lai.jpg', 'Vào tháng 6 năm 2020, nhân cuộc Diễu hành Tự hào, tạp chí Queerty đã xướng danh ông là một trong 50 người hùng “dẫn đầu đất nước hướng tới sự bình đẳng, sự chấp nhận và phẩm giá cho tất cả mọi người.”', 1),
(6, 'Hải âu đi tìm cha', 60, 10, 'hai-au-di-tim-cha.jpg', 'Hải âu đi tìm cha là hành trình tràn đầy cảm hứng tự do và chan chứa yêu thương. Hãy mở quyển sách này ra, cùng Len và Lin học hỏi, cảm nhận, thay đổi để trưởng thành, và được sống những tháng ngày tươi đẹp giữa biển trời bao la của đất nước', 1),
(7, 'Ký ức đường trường sơn', 155, 10, 'ky-uc-duong-truong-son.jpg', 'Ký ức đường Trường Sơn là tập bút ký gồm 16 bài, phát họa khá sinh động các bức tranh toàn cảnh con đường huyền thoại trong những năm chiến tranh ác liệt. Có mặt từ vị chính ủy nổi tiếng – Đặng Tính đến cán bộ, chiến sĩ bộ đội phòng không, công binh, lái xe, quân y, thanh niên xung phong, dân quân, tự vệ và quần chúng nhân dân', 1),
(8, 'Bốn năm sau về điện biên', 155, 10, 'bon-nam-sau-ve-dien-bien.jpg', 'Nội dung cuốn sách cơ bản được tổ chức thành hai phần: tiểu thuyết Bốn năm sau kể về công cuộc tái thiết Điện Biên của các chiến sĩ sư đoàn 316, bốn năm sau ngày giải phóng (tác phẩm đạt giải thưởng Hồ Chí Minh về văn học-nghệ thuật) và những trang nhật ký của tác giả, cùng thư từ gửi về cho gia đình, bạn bè văn nghệ trong chuyến đi thực tế dài hơn bốn tháng (8-12/1958) ở Điện Biên.', 1),
(9, 'Bản chất của con người', 155, 10, 'day-la-ban-chat-con-nguoi.jpg', '“Đây là bản chất con người” sẽ là ngọn đèn giúp bạn soi tỏ lòng mình giữa một thế gian đầy biến động. Đến gần nhân tính không phải nhìn thấu tâm can người khác hay điều khiển một mối quan hệ nào đó, mà chính là thấu hiểu và biết khống chế bản thân tốt hơn. Hóa ra, đến cuối cùng, chúng ta vẫn chẳng kiểm soát được gì trên đời này ngoài chính mình.', 2),
(10, 'Hội chứng \"Người tử tế', 145, 10, 'hoi-chung-nguoi-tu-te.jpg', 'Cuốn sách này giúp bạn nhận ra giá trị của bản thân, hiểu nguyên nhân do sự chiều lòng người khác,	thoát ly khỏi những mối quan hệ thụ động, phát triển khả năng tự chửa lành.', 2),
(11, 'Tranh biện sao cho đúng', 102, 10, 'tranh-bien-sao-cho-dung.jpg', 'Tranh biện sao cho đúng? là cuốn sách không chỉ đơn thuần đưa ra những kĩ năng để giành chiến thắng trên đấu trường tranh biện, nó còn nêu bật được ý nghĩa đích thực của tranh biện và giới thiệu một cách dễ hiểu về các phương pháp tranh biện để ai cũng có thể áp dụng vào học tập và công việc.', 2),
(12, 'Khởi nghiệp không đợi tuổi', 145, 10, 'khoi-nghiep-khong-doi-tuoi.jpg', 'Nhà kinh tế học Mỹ Drucker, P.F cho rằng: “Tinh thần doanh nhân khởi nghiệp” là hành động của doanh nhân khởi nghiệp - người tiến hành việc biến những cảm nhận nhạy bén về kinh doanh, tài chính và sự đổi mới thành những sản phẩm hàng hóa kinh tế', 2),
(13, 'Sống kỹ luật gặt hái thành công', 165, 10, 'song-ky-luat-gat-thanh-cong-tb-2024.jpg', 'Quy tắc 66 ngày tạo dựng thói quen,Quy tắc 10-10-10 và quy tắc luôn luôn ăn món rau trước,Quy tắc 75% khắc chế và định luật Parkinson,Quy tắc 40% của lính đặc nhiệm Hải quân Mỹ (SEAL) trong tình huống vào sinh ra tử', 2),
(14, 'Khi sự sống không có dự phòng', 145, 10, 'khi-su-song-khong-co-du-phong.jpg', 'Cuốn sách “Khi sự sống không có dự phòng” của tác giả Mike Berners-Lee sẽ là câu trả lời rõ ràng ngọn nguồn cho những câu hỏi trên của bạn. Đây sẽ là cuốn cẩm nang sống trong một thế giới “bất ổn”, một cuốn sách bạn sẽ cần mang theo nếu muốn sống “hòa hợp” với hành tinh duy nhất mà chúng ta có.', 2),
(15, 'Bài học thành bại', 165, 9, 'peak-giai-ma-bi-mat-cua-nhung-thien-tai.jpg', 'BÀI HỌC THÀNH BẠI đúc kết những câu chuyện thú vị về kinh nghiệm thành công và thất bại của vĩ nhân và doanh nhân nổi tiếng. Những câu chuyện nhỏ nhưng mang ý nghĩa sâu sắc, rất thiết thực và bổ ích cho tất cả chúng ta, đặc biệt là các bạn trẻ mới bắt đầu khởi nghiệp.', 2),
(16, 'Đọc suy nghĩ, thấu tâm trí', 149, 10, 'doc-suy-nghi-thau-tam-tri.jpg', 'Hầu hết nhân viên trẻ mới bước chân vào thị trường lao động đều sẽ đối mặt với những khó khăn nhất định trong việc hòa nhập vào môi trường làm việc và văn hóa công ty. Đối với những người làm đầu tiên đi làm, vấn đề lớn nhất có lẽ đến từ từ mối quan hệ với đồng nghiệp và các lãnh đạo trực tiếp cũng như gián tiếp', 2),
(17, 'Hạt giống sáng tạo', 159, 10, 'hat-giong-sang-tao.jpg', 'Hạt giống sáng tạo là cuốn sách hướng dẫn hoàn hảo cho bất kỳ ai quan tâm đến việc khám phá một số hình thức thể hiện sáng tạo. Ngay cả khi nghĩ rằng mình không có một chút năng khiếu sáng tạo nào, bạn vẫn có thể khám phá và nuôi dưỡng một khía cạnh mới và thú vị trong cuộc sống', 2),
(18, 'Overthinking-Bạn nghĩ quá nhiều', 145, 10, 'ban-da-nghi-qua-nhieu.jpg', 'cuốn sách giúp bạn Tự kiểm soát bản thân, tập trung vào công việc,Sống thực tế, tránh ảo tưởng xa vời,Trò chuyện với tâm hồn, gạt bỏ những muộn phiền,Dọn sạch \"\"đống rác\"\" trong tâm trí,Chủ động cho đi và hóa giải sự đố kỵ', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaG`),
  ADD KEY `ClassMasach_Giohang` (`MaSach`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `ClassMaSach_SP` (`MaDM`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `ClassMasach_Giohang` FOREIGN KEY (`MaSach`) REFERENCES `product` (`MaSach`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `ClassMaSach_SP` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
