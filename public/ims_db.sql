/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : ims_db

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 16/01/2022 10:53:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cp
-- ----------------------------
DROP TABLE IF EXISTS `cp`;
CREATE TABLE `cp`  (
  `id_cp` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_vendor` int NOT NULL,
  PRIMARY KEY (`id_cp`) USING BTREE,
  INDEX `cp_id_vendor_foreign`(`id_vendor`) USING BTREE,
  CONSTRAINT `cp_id_vendor_foreign` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cp
-- ----------------------------

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_customer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_cp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (2, 'dany putra', 'kp. kapudang', '9890131089', '13123123', 'putradany@gmail.com', '0989131298', 'putra', '082398912', 'selamat');

-- ----------------------------
-- Table structure for deliveri_order
-- ----------------------------
DROP TABLE IF EXISTS `deliveri_order`;
CREATE TABLE `deliveri_order`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_do` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_do` datetime NULL DEFAULT NULL,
  `customer_id` int NULL DEFAULT NULL,
  `produk_id` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of deliveri_order
-- ----------------------------
INSERT INTO `deliveri_order` VALUES (3, '12345', '2021-09-25 15:01:00', 1, 1, 2, 'baru', '2021-09-25 15:01:38', '2021-09-26 19:45:14', 1);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for home_page
-- ----------------------------
DROP TABLE IF EXISTS `home_page`;
CREATE TABLE `home_page`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `greeting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `footer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `background` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of home_page
-- ----------------------------
INSERT INTO `home_page` VALUES (1, 'Selamat Datang', 'Inventory Management System', 'PTa', 'ims', 'logo.png', 'background-login.png', NULL, '2021-12-04 15:16:44');

-- ----------------------------
-- Table structure for inventory
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory`  (
  `id_inventory` int NOT NULL AUTO_INCREMENT,
  `lokasi_gudang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_rak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_barisRak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_kolomRak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_inventory`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventory
-- ----------------------------
INSERT INTO `inventory` VALUES (3, 'OMM', '1', '1', 'AA');
INSERT INTO `inventory` VALUES (4, 'OMM', '2', '2', 'A');
INSERT INTO `inventory` VALUES (5, 'OMM', '1', '1', 'B');

-- ----------------------------
-- Table structure for itr
-- ----------------------------
DROP TABLE IF EXISTS `itr`;
CREATE TABLE `itr`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_itr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pr` int NULL DEFAULT NULL,
  `tanggal_itr` datetime NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `flag` int NOT NULL DEFAULT 0,
  `id_validator` int NULL DEFAULT NULL,
  `id_pemeriksa` int NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of itr
-- ----------------------------
INSERT INTO `itr` VALUES (6, '33221122', 12, '2022-01-16 10:46:51', NULL, 1, 2, NULL, '2022-01-16 03:33:22', '2022-01-16 10:46:54');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (19, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (20, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (21, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (22, '2021_07_14_081933_create_vendor_table', 1);
INSERT INTO `migrations` VALUES (23, '2021_07_14_082126_create_cp_table', 1);
INSERT INTO `migrations` VALUES (24, '2021_07_14_082932_create_customer_table', 1);
INSERT INTO `migrations` VALUES (25, '2021_07_14_083140_create_inventory_table', 1);
INSERT INTO `migrations` VALUES (26, '2021_07_14_083524_create_produk_table', 1);
INSERT INTO `migrations` VALUES (27, '2021_07_14_101520_create_permission_tables', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 2);

-- ----------------------------
-- Table structure for otr
-- ----------------------------
DROP TABLE IF EXISTS `otr`;
CREATE TABLE `otr`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_otr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_do` int NULL DEFAULT NULL,
  `validated_by` int NULL DEFAULT NULL,
  `flag` int NULL DEFAULT 0,
  `valid_otr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of otr
-- ----------------------------
INSERT INTO `otr` VALUES (2, '12345', 3, 2, 0, NULL, '2021-09-25 15:52:16', NULL);
INSERT INTO `otr` VALUES (3, '12345', 3, 2, 1, 'valid_1;valid_2;valid_3;valid_4;valid_5;valid_6;valid_7', '2021-09-26 19:44:48', '2021-09-26 19:45:14');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'read-product', 'web', '2021-09-21 06:06:58', '2021-09-21 06:06:58');
INSERT INTO `permissions` VALUES (2, 'read-vendor', 'web', '2021-09-21 06:06:58', '2021-09-21 06:06:58');
INSERT INTO `permissions` VALUES (3, 'read-user', 'web', '2021-09-21 06:06:58', '2021-09-21 06:06:58');
INSERT INTO `permissions` VALUES (4, 'read-inventory', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');
INSERT INTO `permissions` VALUES (5, 'read-customer', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');
INSERT INTO `permissions` VALUES (6, 'read-role', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');
INSERT INTO `permissions` VALUES (7, 'read-permission', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');
INSERT INTO `permissions` VALUES (8, 'read-pr', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');
INSERT INTO `permissions` VALUES (9, 'read-itr', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');
INSERT INTO `permissions` VALUES (10, 'read-otr', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');
INSERT INTO `permissions` VALUES (11, 'read-do', 'web', '2021-09-21 06:06:59', '2021-09-21 06:06:59');

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `id_inventory` int NOT NULL,
  `kode_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_seri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `modal` int NOT NULL,
  `dimensi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_pembelian` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_gudang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (1, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (2, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (3, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (4, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (5, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (6, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (7, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (8, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (9, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (10, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (11, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (12, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (13, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (14, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (15, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (16, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (17, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (18, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (19, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (20, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (21, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (22, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (23, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (24, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (25, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (26, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (27, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (28, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (29, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (30, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (31, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (32, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (33, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (34, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (35, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (36, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10);
INSERT INTO `produk` VALUES (37, 0, 'gfs', '089123', 'aibon', '$data->photo_produk', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'OMM/1/1/AA', 10);
INSERT INTO `produk` VALUES (39, 2, 'a', '090', 'aibon a', '$data->photo_produk', 'bbb', 'b', '2342232', 8000, 10000, '23', '5kg', 'a', 'OMM/1/1/AA', 232);
INSERT INTO `produk` VALUES (45, 0, 'CR000011', 'BRAZ109409', 'Komputer', '$data->photo_produk', 'Sparepart', 'Mesin Part', '1fd23232v', 12000, 10000, '100X100X100', '5kg', 'Set', 'a', 120);
INSERT INTO `produk` VALUES (46, 0, '1', '1222', 'a', NULL, 'aaa', 'qwq', '23498', 12222, 12222, '12cm', '100kg', 'tos', 'OMM/1/1/AA', 12);

-- ----------------------------
-- Table structure for purchase_request
-- ----------------------------
DROP TABLE IF EXISTS `purchase_request`;
CREATE TABLE `purchase_request`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_pr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `total` int NOT NULL,
  `status` int NOT NULL DEFAULT 0,
  `acc_by` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of purchase_request
-- ----------------------------
INSERT INTO `purchase_request` VALUES (12, '324234324324324', 'fvdfregreg', '2022-01-16 01:29:00', 528000, 0, 2, 2, '2022-01-15 18:30:19', '2022-01-16 03:44:51');

-- ----------------------------
-- Table structure for purchase_request_products
-- ----------------------------
DROP TABLE IF EXISTS `purchase_request_products`;
CREATE TABLE `purchase_request_products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pr_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `is_checked` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of purchase_request_products
-- ----------------------------
INSERT INTO `purchase_request_products` VALUES (18, 12, 2, 17, 1, 'a', 1, '2022-01-16 02:21:28', '2022-01-16 03:44:51');
INSERT INTO `purchase_request_products` VALUES (19, 12, 2, 19, 15, 'b', 1, '2022-01-16 02:21:28', '2022-01-16 03:44:51');
INSERT INTO `purchase_request_products` VALUES (20, 12, 3, 17, 32, 'c', 1, '2022-01-16 02:21:28', '2022-01-16 03:44:51');
INSERT INTO `purchase_request_products` VALUES (21, 12, 3, 45, 12, 'd', 1, '2022-01-16 02:21:28', '2022-01-16 03:44:51');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'web', '2021-09-21 06:06:58', '2021-09-21 06:06:58');
INSERT INTO `roles` VALUES (3, 'kepala gudang 1', 'web', '2021-09-23 06:34:20', '2021-10-05 04:19:52');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'admin', '1638612714_7.jpg', 'admin@gmail.com', NULL, '$2y$10$pnJJKOwPO60w1ppRA4NkAeDteuE5SPTAuioEnLYyoMI8XpVexbN8y', NULL, '2021-09-21 06:07:53', '2021-12-04 10:11:54');

-- ----------------------------
-- Table structure for vendor
-- ----------------------------
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor`  (
  `id_vendor` int NOT NULL AUTO_INCREMENT,
  `nama_vendor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_vendor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_vendor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vendor
-- ----------------------------
INSERT INTO `vendor` VALUES (2, 'c', 'jwqijdiwqjisjqw', '0182736452', '7236473625432', 'a@mail.com');
INSERT INTO `vendor` VALUES (3, 'a', 'jhcdgbhdwbecweg', '372647367', '78e6r3734653', 'a@mail.com');

SET FOREIGN_KEY_CHECKS = 1;
