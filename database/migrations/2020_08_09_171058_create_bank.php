<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreateBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('kode_bank', 5);
            $table->string('nama', 100);
            $table->string('nama_lainnya', 100)->nullable();
        });
        $str = "INSERT INTO `bank` VALUES (1, '002', 'BANK BRI', 'BRI');
        INSERT INTO `bank` VALUES (2, '003', 'BANK EKSPOR INDONESIA', NULL);
        INSERT INTO `bank` VALUES (3, '008', 'BANK MANDIRI', NULL);
        INSERT INTO `bank` VALUES (4, '009', 'BANK BNI', 'BNI');
        INSERT INTO `bank` VALUES (5, '011', 'BANK DANAMON', 'DANAMON');
        INSERT INTO `bank` VALUES (6, '013', 'PERMATA BANK', 'PERMATA');
        INSERT INTO `bank` VALUES (7, '014', 'BANK BCA', 'BCA');
        INSERT INTO `bank` VALUES (8, '016', 'BANK BII', NULL);
        INSERT INTO `bank` VALUES (9, '019', 'BANK PANIN', NULL);
        INSERT INTO `bank` VALUES (10, '020', 'BANK ARTA NIAGA KENCANA', NULL);
        INSERT INTO `bank` VALUES (11, '022', 'BANK NIAGA', NULL);
        INSERT INTO `bank` VALUES (12, '023', 'BANK BUANA IND', NULL);
        INSERT INTO `bank` VALUES (13, '026', 'BANK LIPPO', NULL);
        INSERT INTO `bank` VALUES (14, '028', 'BANK NISP', NULL);
        INSERT INTO `bank` VALUES (15, '030', 'AMERICAN EXPRESS BANK LTD', NULL);
        INSERT INTO `bank` VALUES (16, '031', 'CITIBANK N.A.', NULL);
        INSERT INTO `bank` VALUES (17, '032', 'JP. MORGAN CHASE BANK, N.A.', NULL);
        INSERT INTO `bank` VALUES (18, '033', 'BANK OF AMERICA, N.A', NULL);
        INSERT INTO `bank` VALUES (19, '034', 'ING INDONESIA BANK', NULL);
        INSERT INTO `bank` VALUES (20, '036', 'BANK MULTICOR TBK.', NULL);
        INSERT INTO `bank` VALUES (21, '037', 'BANK ARTHA GRAHA', NULL);
        INSERT INTO `bank` VALUES (22, '039', 'BANK CREDIT AGRICOLE INDOSUEZ', NULL);
        INSERT INTO `bank` VALUES (23, '040', 'THE BANGKOK BANK COMP. LTD', NULL);
        INSERT INTO `bank` VALUES (24, '041', 'THE HONGKONG & SHANGHAI B.C.', NULL);
        INSERT INTO `bank` VALUES (25, '042', 'THE BANK OF TOKYO MITSUBISHI UFJ LTD', NULL);
        INSERT INTO `bank` VALUES (26, '045', 'BANK SUMITOMO MITSUI INDONESIA', NULL);
        INSERT INTO `bank` VALUES (27, '046', 'BANK DBS INDONESIA', NULL);
        INSERT INTO `bank` VALUES (28, '047', 'BANK RESONA PERDANIA', NULL);
        INSERT INTO `bank` VALUES (29, '048', 'BANK MIZUHO INDONESIA', NULL);
        INSERT INTO `bank` VALUES (30, '050', 'STANDARD CHARTERED BANK', NULL);
        INSERT INTO `bank` VALUES (31, '052', 'BANK ABN AMRO', NULL);
        INSERT INTO `bank` VALUES (32, '053', 'BANK KEPPEL TATLEE BUANA', NULL);
        INSERT INTO `bank` VALUES (33, '054', 'BANK CAPITAL INDONESIA, TBK.', NULL);
        INSERT INTO `bank` VALUES (34, '057', 'BANK BNP PARIBAS INDONESIA', NULL);
        INSERT INTO `bank` VALUES (35, '058', 'BANK UOB INDONESIA', NULL);
        INSERT INTO `bank` VALUES (36, '059', 'KOREA EXCHANGE BANK DANAMON', NULL);
        INSERT INTO `bank` VALUES (37, '060', 'RABOBANK INTERNASIONAL INDONESIA', NULL);
        INSERT INTO `bank` VALUES (38, '061', 'ANZ PANIN BANK', NULL);
        INSERT INTO `bank` VALUES (39, '067', 'DEUTSCHE BANK AG.', NULL);
        INSERT INTO `bank` VALUES (40, '068', 'BANK WOORI INDONESIA', NULL);
        INSERT INTO `bank` VALUES (41, '069', 'BANK OF CHINA LIMITED', NULL);
        INSERT INTO `bank` VALUES (42, '076', 'BANK BUMI ARTA', NULL);
        INSERT INTO `bank` VALUES (43, '087', 'BANK EKONOMI', NULL);
        INSERT INTO `bank` VALUES (44, '088', 'BANK ANTARDAERAH', NULL);
        INSERT INTO `bank` VALUES (45, '089', 'BANK HAGA', NULL);
        INSERT INTO `bank` VALUES (46, '093', 'BANK IFI', NULL);
        INSERT INTO `bank` VALUES (47, '095', 'BANK CENTURY, TBK.', NULL);
        INSERT INTO `bank` VALUES (48, '097', 'BANK MAYAPADA', NULL);
        INSERT INTO `bank` VALUES (49, '110', 'BANK JABAR', NULL);
        INSERT INTO `bank` VALUES (50, '111', 'BANK DKI', NULL);
        INSERT INTO `bank` VALUES (51, '112', 'BPD DIY', NULL);
        INSERT INTO `bank` VALUES (52, '113', 'BANK JATENG', NULL);
        INSERT INTO `bank` VALUES (53, '114', 'BANK JATIM', NULL);
        INSERT INTO `bank` VALUES (54, '115', 'BPD JAMBI', NULL);
        INSERT INTO `bank` VALUES (55, '116', 'BPD ACEH', NULL);
        INSERT INTO `bank` VALUES (56, '117', 'BANK SUMUT', NULL);
        INSERT INTO `bank` VALUES (57, '118', 'BANK NAGARI', NULL);
        INSERT INTO `bank` VALUES (58, '119', 'BANK RIAU', NULL);
        INSERT INTO `bank` VALUES (59, '120', 'BANK SUMSEL', NULL);
        INSERT INTO `bank` VALUES (60, '121', 'BANK LAMPUNG', NULL);
        INSERT INTO `bank` VALUES (61, '122', 'BPD KALSEL', NULL);
        INSERT INTO `bank` VALUES (62, '123', 'BPD KALIMANTAN BARAT', NULL);
        INSERT INTO `bank` VALUES (63, '124', 'BPD KALTIM', NULL);
        INSERT INTO `bank` VALUES (64, '125', 'BPD KALTENG', NULL);
        INSERT INTO `bank` VALUES (65, '126', 'BPD SULSEL', NULL);
        INSERT INTO `bank` VALUES (66, '127', 'BANK SULUT', NULL);
        INSERT INTO `bank` VALUES (67, '128', 'BPD NTB', NULL);
        INSERT INTO `bank` VALUES (68, '129', 'BPD BALI', NULL);
        INSERT INTO `bank` VALUES (69, '130', 'BANK NTT', NULL);
        INSERT INTO `bank` VALUES (70, '131', 'BANK MALUKU', NULL);
        INSERT INTO `bank` VALUES (71, '132', 'BPD PAPUA', NULL);
        INSERT INTO `bank` VALUES (72, '133', 'BANK BENGKULU', NULL);
        INSERT INTO `bank` VALUES (73, '134', 'BPD SULAWESI TENGAH', NULL);
        INSERT INTO `bank` VALUES (74, '135', 'BANK SULTRA', NULL);
        INSERT INTO `bank` VALUES (75, '145', 'BANK NUSANTARA PARAHYANGAN', NULL);
        INSERT INTO `bank` VALUES (76, '146', 'BANK SWADESI', NULL);
        INSERT INTO `bank` VALUES (77, '147', 'BANK MUAMALAT', NULL);
        INSERT INTO `bank` VALUES (78, '151', 'BANK MESTIKA', NULL);
        INSERT INTO `bank` VALUES (79, '152', 'BANK METRO EXPRESS', NULL);
        INSERT INTO `bank` VALUES (80, '153', 'BANK SHINTA INDONESIA', NULL);
        INSERT INTO `bank` VALUES (81, '157', 'BANK MASPION', NULL);
        INSERT INTO `bank` VALUES (82, '159', 'BANK HAGAKITA', NULL);
        INSERT INTO `bank` VALUES (83, '161', 'BANK GANESHA', NULL);
        INSERT INTO `bank` VALUES (84, '162', 'BANK WINDU KENTJANA', NULL);
        INSERT INTO `bank` VALUES (85, '164', 'HALIM INDONESIA BANK', NULL);
        INSERT INTO `bank` VALUES (86, '166', 'BANK HARMONI INTERNATIONAL', NULL);
        INSERT INTO `bank` VALUES (87, '167', 'BANK KESAWAN', NULL);
        INSERT INTO `bank` VALUES (88, '200', 'BANK TABUNGAN NEGARA (PERSERO)', 'BTN');
        INSERT INTO `bank` VALUES (89, '212', 'BANK HIMPUNAN SAUDARA 1906, TBK .', NULL);
        INSERT INTO `bank` VALUES (90, '213', 'BANK TABUNGAN PENSIUNAN NASIONAL', NULL);
        INSERT INTO `bank` VALUES (91, '405', 'BANK SWAGUNA', NULL);
        INSERT INTO `bank` VALUES (92, '422', 'BANK JASA ARTA', NULL);
        INSERT INTO `bank` VALUES (93, '426', 'BANK MEGA', NULL);
        INSERT INTO `bank` VALUES (94, '427', 'BANK JASA JAKARTA', NULL);
        INSERT INTO `bank` VALUES (95, '441', 'BANK BUKOPIN', NULL);
        INSERT INTO `bank` VALUES (96, '451', 'BANK SYARIAH MANDIRI', NULL);
        INSERT INTO `bank` VALUES (97, '459', 'BANK BISNIS INTERNASIONAL', NULL);
        INSERT INTO `bank` VALUES (98, '466', 'BANK SRI PARTHA', NULL);
        INSERT INTO `bank` VALUES (99, '472', 'BANK JASA JAKARTA', NULL);
        INSERT INTO `bank` VALUES (100, '484', 'BANK BINTANG MANUNGGAL', NULL);
        INSERT INTO `bank` VALUES (101, '485', 'BANK BUMIPUTERA', NULL);
        INSERT INTO `bank` VALUES (102, '490', 'BANK YUDHA BHAKTI', NULL);
        INSERT INTO `bank` VALUES (103, '491', 'BANK MITRANIAGA', NULL);
        INSERT INTO `bank` VALUES (104, '494', 'BANK AGRO NIAGA', NULL);
        INSERT INTO `bank` VALUES (105, '498', 'BANK INDOMONEX', NULL);
        INSERT INTO `bank` VALUES (106, '501', 'BANK ROYAL INDONESIA', NULL);
        INSERT INTO `bank` VALUES (107, '503', 'BANK ALFINDO', NULL);
        INSERT INTO `bank` VALUES (108, '506', 'BANK SYARIAH MEGA', NULL);
        INSERT INTO `bank` VALUES (109, '513', 'BANK INA PERDANA', NULL);
        INSERT INTO `bank` VALUES (110, '517', 'BANK HARFA', NULL);
        INSERT INTO `bank` VALUES (111, '520', 'PRIMA MASTER BANK', NULL);
        INSERT INTO `bank` VALUES (112, '521', 'BANK PERSYARIKATAN INDONESIA', NULL);
        INSERT INTO `bank` VALUES (113, '525', 'BANK AKITA', NULL);
        INSERT INTO `bank` VALUES (114, '526', 'LIMAN INTERNATIONAL BANK', NULL);
        INSERT INTO `bank` VALUES (115, '531', 'ANGLOMAS INTERNASIONAL BANK', NULL);
        INSERT INTO `bank` VALUES (116, '523', 'BANK DIPO INTERNATIONAL', NULL);
        INSERT INTO `bank` VALUES (117, '535', 'BANK KESEJAHTERAAN EKONOMI', NULL);
        INSERT INTO `bank` VALUES (118, '536', 'BANK UIB', NULL);
        INSERT INTO `bank` VALUES (119, '542', 'BANK ARTOS IND', NULL);
        INSERT INTO `bank` VALUES (120, '547', 'BANK PURBA DANARTA', NULL);
        INSERT INTO `bank` VALUES (121, '548', 'BANK MULTI ARTA SENTOSA', NULL);
        INSERT INTO `bank` VALUES (122, '553', 'BANK MAYORA', NULL);
        INSERT INTO `bank` VALUES (123, '555', 'BANK INDEX SELINDO', NULL);
        INSERT INTO `bank` VALUES (124, '566', 'BANK VICTORIA INTERNATIONAL', NULL);
        INSERT INTO `bank` VALUES (125, '558', 'BANK EKSEKUTIF', NULL);
        INSERT INTO `bank` VALUES (126, '559', 'CENTRATAMA NASIONAL BANK', NULL);
        INSERT INTO `bank` VALUES (127, '562', 'BANK FAMA INTERNASIONAL', NULL);
        INSERT INTO `bank` VALUES (128, '564', 'BANK SINAR HARAPAN BALI', NULL);
        INSERT INTO `bank` VALUES (129, '567', 'BANK HARDA', NULL);
        INSERT INTO `bank` VALUES (130, '945', 'BANK FINCONESIA', NULL);
        INSERT INTO `bank` VALUES (131, '946', 'BANK MERINCORP', NULL);
        INSERT INTO `bank` VALUES (132, '947', 'BANK MAYBANK INDOCORP', 'MAYBANK');
        INSERT INTO `bank` VALUES (133, '948', 'BANK OCBC – INDONESIA', NULL);
        INSERT INTO `bank` VALUES (134, '949', 'BANK CHINA TRUST INDONESIA', NULL);
        INSERT INTO `bank` VALUES (135, '950', 'BANK COMMONWEALTH', NULL);
        INSERT INTO `bank` VALUES (136, '032', 'BANK SENTRAL ASIA', 'BSA')";
        $query = explode(";", $str);
        foreach ($query as $key => $value) {
            DB::statement($value);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank');
    }
}