-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Mar 2020 pada 07.20
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allin-bd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `act_id` int(11) NOT NULL,
  `stprog_id` int(11) DEFAULT NULL,
  `act_iniconsuldate` date DEFAULT NULL,
  `act_iniassesdate` date DEFAULT NULL,
  `act_finaliniassesdate` date DEFAULT NULL,
  `act_iniassestype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_act_st`
--

CREATE TABLE `tbl_act_st` (
  `act_st_id` int(255) NOT NULL,
  `st_id` int(255) NOT NULL,
  `act_st_category` char(25) NOT NULL,
  `act_st_name` varchar(255) NOT NULL,
  `act_st_place` varchar(255) NOT NULL,
  `act_st_description` varchar(255) NOT NULL,
  `act_st_attachment` text NOT NULL,
  `act_st_startdate` date NOT NULL,
  `act_st_enddate` date NOT NULL,
  `act_st_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alu`
--

CREATE TABLE `tbl_alu` (
  `alu_id` int(11) NOT NULL,
  `st_id` int(11) DEFAULT NULL,
  `univ_id` int(11) DEFAULT NULL,
  `alu_major` varchar(255) DEFAULT NULL,
  `alu_graduateddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_asset`
--

CREATE TABLE `tbl_asset` (
  `asset_id` char(7) NOT NULL,
  `asset_name` varchar(255) DEFAULT NULL,
  `asset_merktype` varchar(255) DEFAULT NULL,
  `asset_dateachieved` date NOT NULL,
  `asset_amount` int(11) DEFAULT NULL,
  `asset_unit` varchar(50) DEFAULT NULL,
  `asset_condition` varchar(255) DEFAULT NULL,
  `asset_notes` varchar(255) DEFAULT NULL,
  `asset_status` varchar(255) DEFAULT NULL,
  `asset_lastupdatedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_corp`
--

CREATE TABLE `tbl_corp` (
  `corp_id` char(9) NOT NULL,
  `corp_name` varchar(255) DEFAULT NULL,
  `corp_industry` varchar(255) NOT NULL,
  `corp_mail` varchar(255) DEFAULT NULL,
  `corp_phone` varchar(255) DEFAULT NULL,
  `corp_insta` varchar(255) DEFAULT NULL,
  `corp_site` varchar(255) NOT NULL,
  `corp_region` varchar(255) DEFAULT NULL,
  `corp_address` text,
  `crop_datecreated` datetime DEFAULT NULL,
  `corp_datelastedit` datetime DEFAULT NULL,
  `corp_note` varchar(255) DEFAULT NULL,
  `corp_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_corpdetail`
--

CREATE TABLE `tbl_corpdetail` (
  `corpdetail_id` int(11) NOT NULL,
  `corp_id` char(9) NOT NULL,
  `corpdetail_fullname` varchar(255) NOT NULL,
  `corpdetail_mail` varchar(255) NOT NULL,
  `corpdetail_linkedin` varchar(255) NOT NULL,
  `corpdetail_phone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_corprog`
--

CREATE TABLE `tbl_corprog` (
  `corprog_id` int(11) NOT NULL,
  `corp_id` char(9) DEFAULT NULL,
  `prog_id` char(11) DEFAULT NULL,
  `corprog_type` int(1) DEFAULT NULL,
  `corprog_datefirstdiscuss` date DEFAULT NULL,
  `corprog_datelastdiscuss` date DEFAULT NULL,
  `corprog_notes` varchar(255) DEFAULT NULL,
  `corprog_status` int(1) DEFAULT NULL,
  `corprog_file1` text NOT NULL,
  `corprog_attach1` text NOT NULL,
  `corprog_file2` text NOT NULL,
  `corprog_attach2` text NOT NULL,
  `corprog_file3` text NOT NULL,
  `corprog_attach3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_editor`
--

CREATE TABLE `tbl_editor` (
  `editor_id` char(7) NOT NULL,
  `editor_fn` varchar(50) NOT NULL,
  `editor_ln` varchar(50) NOT NULL,
  `editor_address` varchar(255) NOT NULL,
  `editor_major` varchar(255) NOT NULL,
  `univ_id` char(8) NOT NULL,
  `editor_mail` varchar(255) NOT NULL,
  `editor_phone` varchar(12) NOT NULL,
  `editor_position` varchar(50) NOT NULL,
  `editor_passw` varchar(255) NOT NULL,
  `editor_cv` text NOT NULL,
  `editor_ktp` text NOT NULL,
  `editor_bankname` varchar(50) NOT NULL,
  `editor_bankacc` int(255) NOT NULL,
  `editor_npwp` text NOT NULL,
  `editor_status` char(255) NOT NULL,
  `editor_feephours` int(255) NOT NULL,
  `editor_lastcontact` date NOT NULL,
  `editor_notes` text NOT NULL,
  `editor_lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_eduf`
--

CREATE TABLE `tbl_eduf` (
  `eduf_id` int(11) NOT NULL,
  `eduf_organizer` varchar(255) DEFAULT NULL,
  `eduf_place` text NOT NULL,
  `eduf_picname` varchar(255) DEFAULT NULL,
  `eduf_picmail` varchar(255) NOT NULL,
  `eduf_picphone` varchar(25) NOT NULL,
  `eduf_firstdisdate` date DEFAULT NULL,
  `eduf_lastdisdate` date DEFAULT NULL,
  `eduf_eventstartdate` datetime DEFAULT NULL,
  `eduf_eventenddate` datetime DEFAULT NULL,
  `eduf_status` int(1) DEFAULT NULL,
  `eduf_picallin` text NOT NULL,
  `eduf_notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_edufreview`
--

CREATE TABLE `tbl_edufreview` (
  `edufreview_id` int(11) NOT NULL,
  `eduf_id` int(11) NOT NULL,
  `edufreview_name` varchar(255) NOT NULL,
  `edufreview_score` varchar(50) NOT NULL,
  `edufreview_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_empl`
--

CREATE TABLE `tbl_empl` (
  `empl_id` char(9) NOT NULL,
  `empl_firstname` varchar(255) DEFAULT NULL,
  `empl_lastname` varchar(255) DEFAULT NULL,
  `empl_email` varchar(255) NOT NULL,
  `empl_address` varchar(255) DEFAULT NULL,
  `empl_phone` varchar(255) DEFAULT NULL,
  `empl_datebirth` date DEFAULT NULL,
  `empl_graduatefr` varchar(255) DEFAULT NULL,
  `empl_major` varchar(255) DEFAULT NULL,
  `empl_department` varchar(255) DEFAULT NULL,
  `empl_hiredate` date DEFAULT NULL,
  `empl_status` varchar(255) DEFAULT NULL,
  `empl_statusenddate` date DEFAULT NULL,
  `empl_isactive` int(1) DEFAULT NULL,
  `empl_cv` text NOT NULL,
  `empl_bankaccount` int(11) DEFAULT NULL,
  `empl_idcard` text,
  `empl_tax` text,
  `empl_healthinsurance` text,
  `empl_emplinsurance` text,
  `empl_password` text,
  `empl_lastupdatedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_infl`
--

CREATE TABLE `tbl_infl` (
  `infl_id` int(11) NOT NULL,
  `infl_fn` varchar(255) NOT NULL,
  `infl_address` varchar(255) NOT NULL,
  `infl_mail` varchar(255) NOT NULL,
  `infl_phone` varchar(12) NOT NULL,
  `infl_ktp` text NOT NULL,
  `infl_banknm` varchar(50) NOT NULL,
  `infl_bankacc` varchar(50) NOT NULL,
  `infl_npwp` text NOT NULL,
  `infl_status` char(50) NOT NULL,
  `infl_feeperpost` int(255) NOT NULL,
  `infl_lastcontact` date NOT NULL,
  `infl_notes` text NOT NULL,
  `infl_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inv`
--

CREATE TABLE `tbl_inv` (
  `inv_num` int(11) NOT NULL,
  `inv_id` char(50) NOT NULL,
  `stprog_id` int(11) DEFAULT NULL,
  `inv_category` char(50) NOT NULL,
  `inv_priceusd` int(11) DEFAULT NULL,
  `inv_priceidr` int(11) DEFAULT NULL,
  `inv_earlybirdusd` int(11) DEFAULT NULL,
  `inv_earlybirdidr` int(11) DEFAULT NULL,
  `inv_discusd` int(11) DEFAULT NULL,
  `inv_discidr` int(11) DEFAULT NULL,
  `inv_session` int(25) NOT NULL,
  `inv_duration` int(11) NOT NULL,
  `inv_totprusd` int(255) NOT NULL,
  `inv_totpridr` int(255) NOT NULL,
  `inv_words` text NOT NULL,
  `inv_paymentmethod` varchar(255) DEFAULT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_duedate` date DEFAULT NULL,
  `inv_notes` text,
  `inv_tnc` text,
  `inv_status` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invdtl`
--

CREATE TABLE `tbl_invdtl` (
  `invdtl_id` int(11) NOT NULL,
  `inv_id` char(50) DEFAULT NULL,
  `invdtl_statusname` varchar(255) DEFAULT NULL,
  `invdtl_duedate` date DEFAULT NULL,
  `invdtl_percentage` int(11) DEFAULT NULL,
  `invdtl_amountusd` int(11) DEFAULT NULL,
  `invdtl_amountidr` int(11) DEFAULT NULL,
  `invdtl_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invsch`
--

CREATE TABLE `tbl_invsch` (
  `invsch_num` int(11) NOT NULL,
  `invsch_id` char(50) NOT NULL,
  `schprog_id` int(11) NOT NULL,
  `invsch_price` int(255) NOT NULL,
  `invsch_participants` int(255) NOT NULL,
  `invsch_disc` int(255) NOT NULL,
  `invsch_totprice` int(255) NOT NULL,
  `invsch_words` text NOT NULL,
  `invsch_date` date NOT NULL,
  `invsch_duedate` date NOT NULL,
  `invsch_notes` text NOT NULL,
  `invsch_tnc` text NOT NULL,
  `invsch_status` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lead`
--

CREATE TABLE `tbl_lead` (
  `lead_id` char(5) NOT NULL,
  `lead_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mt`
--

CREATE TABLE `tbl_mt` (
  `id` int(11) NOT NULL,
  `mt_id` char(7) NOT NULL,
  `mt_firstn` varchar(255) DEFAULT NULL,
  `mt_lastn` varchar(255) DEFAULT NULL,
  `mt_address` varchar(255) DEFAULT NULL,
  `mt_major` varchar(255) DEFAULT NULL,
  `univ_id` char(8) DEFAULT NULL,
  `mt_email` varchar(255) DEFAULT NULL,
  `mt_phone` varchar(255) DEFAULT NULL,
  `mt_password` text,
  `mt_cv` varchar(255) DEFAULT NULL,
  `mt_ktp` varchar(255) DEFAULT NULL,
  `mt_banknm` varchar(50) DEFAULT NULL,
  `mt_bankacc` varchar(255) DEFAULT NULL,
  `mt_npwp` varchar(255) DEFAULT NULL,
  `mt_status` varchar(255) DEFAULT NULL,
  `mt_istutor` varchar(255) DEFAULT NULL,
  `mt_tsubject` varchar(255) DEFAULT NULL,
  `mt_feehours` int(255) DEFAULT NULL,
  `mt_feesession` int(255) DEFAULT NULL,
  `mt_lastcontactdate` date DEFAULT NULL,
  `mt_notes` varchar(255) DEFAULT NULL,
  `mt_lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_parents`
--

CREATE TABLE `tbl_parents` (
  `pr_id` int(11) NOT NULL,
  `pr_firstname` varchar(255) DEFAULT NULL,
  `pr_lastname` varchar(255) DEFAULT NULL,
  `pr_mail` varchar(255) NOT NULL,
  `pr_phone` varchar(255) DEFAULT NULL,
  `pr_insta` varchar(255) DEFAULT NULL,
  `pr_state` varchar(255) NOT NULL,
  `pr_address` text NOT NULL,
  `pr_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pettyexpenses`
--

CREATE TABLE `tbl_pettyexpenses` (
  `pettyexpenses_id` int(11) NOT NULL,
  `pettyexpenses_inv` varchar(255) DEFAULT NULL,
  `pettyexpenses_date` date DEFAULT NULL,
  `pettyexpenses_supplier` varchar(255) DEFAULT NULL,
  `pettyexpenses_type` varchar(255) DEFAULT NULL,
  `pettyexpenses_paymentfrom` varchar(255) DEFAULT NULL,
  `pettyexpenses_total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pettyinflow`
--

CREATE TABLE `tbl_pettyinflow` (
  `pettyinflow_id` int(11) NOT NULL,
  `pettyinflow_date` date DEFAULT NULL,
  `pettyinflow_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pettysaldo`
--

CREATE TABLE `tbl_pettysaldo` (
  `pettysaldo_id` int(11) NOT NULL,
  `pettysaldo_month` int(11) DEFAULT NULL,
  `pettysaldo_year` int(11) DEFAULT NULL,
  `pettysaldo_inflow` int(11) DEFAULT NULL,
  `pettysaldo_expenses` int(11) DEFAULT NULL,
  `pettysaldo_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prog`
--

CREATE TABLE `tbl_prog` (
  `prog_id` char(11) NOT NULL,
  `prog_main` varchar(255) DEFAULT NULL,
  `prog_sub` varchar(255) DEFAULT NULL,
  `prog_program` varchar(255) DEFAULT NULL,
  `prog_type` varchar(255) DEFAULT NULL,
  `prog_mentor` varchar(50) NOT NULL,
  `prog_payment` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_id` char(8) NOT NULL,
  `purchase_department` varchar(255) DEFAULT NULL,
  `purchase_usedfor` varchar(255) DEFAULT NULL,
  `purchase_statusrequest` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_notes` text NOT NULL,
  `purchase_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_purchasedtl`
--

CREATE TABLE `tbl_purchasedtl` (
  `purchasedtl_id` int(11) NOT NULL,
  `purchase_id` char(8) DEFAULT NULL,
  `purchasedtl_good` varchar(255) DEFAULT NULL,
  `purchasedtl_amount` int(255) DEFAULT NULL,
  `purchasedtl_priceperunit` int(255) DEFAULT NULL,
  `purchasedtl_notes` varchar(255) DEFAULT NULL,
  `purchasedtl_total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reason`
--

CREATE TABLE `tbl_reason` (
  `reason_id` int(11) NOT NULL,
  `reason_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_receipt`
--

CREATE TABLE `tbl_receipt` (
  `receipt_num` int(11) NOT NULL,
  `receipt_id` char(50) NOT NULL,
  `receipt_cat` int(1) NOT NULL COMMENT '1:student; 2:school',
  `inv_id` char(50) NOT NULL,
  `invdtl_id` int(11) DEFAULT NULL,
  `receipt_mtd` varchar(255) DEFAULT NULL,
  `receipt_cheque` varchar(50) NOT NULL,
  `receipt_amount` int(11) NOT NULL,
  `receipt_amountusd` int(11) NOT NULL,
  `receipt_words` text NOT NULL,
  `receipt_wordsusd` text NOT NULL,
  `receipt_date` date DEFAULT NULL,
  `receipt_notes` varchar(255) DEFAULT NULL,
  `receipt_status` varchar(255) NOT NULL COMMENT '1 : success, 2 : refund',
  `receipt_refund` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sch`
--

CREATE TABLE `tbl_sch` (
  `sch_id` char(8) NOT NULL,
  `sch_name` varchar(255) DEFAULT NULL,
  `sch_type` varchar(255) DEFAULT NULL,
  `sch_level` varchar(255) DEFAULT NULL,
  `sch_curriculum` varchar(255) DEFAULT NULL,
  `sch_mail` varchar(255) DEFAULT NULL,
  `sch_phone` varchar(255) DEFAULT NULL,
  `sch_insta` varchar(255) DEFAULT NULL,
  `sch_city` varchar(255) DEFAULT NULL,
  `sch_location` varchar(255) DEFAULT NULL,
  `sch_lastupdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_schdetail`
--

CREATE TABLE `tbl_schdetail` (
  `schdetail_id` int(11) NOT NULL,
  `sch_id` char(8) NOT NULL,
  `schdetail_fullname` varchar(50) NOT NULL,
  `schdetail_email` varchar(50) NOT NULL,
  `schdetail_linkedin` varchar(50) NOT NULL,
  `schdetail_position` varchar(50) DEFAULT NULL,
  `schdetail_phone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_schprog`
--

CREATE TABLE `tbl_schprog` (
  `schprog_id` int(11) NOT NULL,
  `sch_id` char(8) DEFAULT NULL,
  `prog_id` char(11) DEFAULT NULL,
  `schprog_datefirstdis` date DEFAULT NULL,
  `schprog_datelastdis` date DEFAULT NULL,
  `schprog_status` int(1) DEFAULT NULL COMMENT '0:Pending ; 1:Success; 2:Denied',
  `schprog_notes` text,
  `empl_id` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_schprogfix`
--

CREATE TABLE `tbl_schprogfix` (
  `schprogfix_id` int(11) NOT NULL,
  `schprog_id` int(11) NOT NULL,
  `schprogfix_eventstartdate` date DEFAULT NULL,
  `schprogfix_eventenddate` date DEFAULT NULL,
  `schprogfix_eventplace` varchar(255) DEFAULT NULL,
  `schprogfix_participantsnum` int(255) DEFAULT NULL,
  `schprogfix_status` varchar(255) DEFAULT NULL,
  `schprogfix_totalhours` varchar(255) DEFAULT NULL,
  `schprogfix_notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stdetail`
--

CREATE TABLE `tbl_stdetail` (
  `att_id` int(11) NOT NULL,
  `st_id` char(7) DEFAULT NULL,
  `att_persbrand` text NOT NULL,
  `att_interest` text NOT NULL,
  `att_person` text NOT NULL,
  `att_photo` varchar(255) DEFAULT NULL,
  `att_cv` varchar(255) DEFAULT NULL,
  `att_trans` varchar(255) DEFAULT NULL,
  `att_questioneer` varchar(255) DEFAULT NULL,
  `att_other` varchar(255) DEFAULT NULL,
  `att_lastupdatedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stmentor`
--

CREATE TABLE `tbl_stmentor` (
  `stmentor_id` int(11) NOT NULL,
  `stprog_id` int(11) DEFAULT NULL,
  `mt_id1` char(7) DEFAULT NULL,
  `mt_id2` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stprog`
--

CREATE TABLE `tbl_stprog` (
  `stprog_id` int(11) NOT NULL,
  `st_num` int(11) DEFAULT NULL,
  `prog_id` char(11) DEFAULT NULL,
  `lead_id` char(5) NOT NULL,
  `stprog_firstdisdate` date DEFAULT NULL,
  `stprog_lastdisdate` date DEFAULT NULL,
  `stprog_meetingdate` date DEFAULT NULL,
  `stprog_meetingnote` text,
  `stprog_status` int(1) DEFAULT NULL,
  `stprog_statusprogdate` date DEFAULT NULL,
  `reason_id` int(11) DEFAULT NULL,
  `stprog_runningstatus` int(1) NOT NULL,
  `empl_id` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_students`
--

CREATE TABLE `tbl_students` (
  `st_num` int(11) NOT NULL,
  `st_id` char(7) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `st_firstname` varchar(255) DEFAULT NULL,
  `st_lastname` varchar(255) DEFAULT NULL,
  `st_mail` varchar(255) DEFAULT NULL,
  `st_phone` varchar(255) DEFAULT NULL,
  `st_insta` varchar(255) DEFAULT NULL,
  `st_state` varchar(255) DEFAULT NULL,
  `st_city` varchar(255) NOT NULL,
  `st_address` text,
  `sch_id` char(8) DEFAULT NULL,
  `st_currentsch` varchar(255) DEFAULT NULL,
  `st_grade` int(255) NOT NULL,
  `st_grade_updated` int(255) DEFAULT NULL,
  `lead_id` char(5) DEFAULT NULL,
  `st_levelinterest` varchar(255) DEFAULT NULL,
  `prog_id` text,
  `st_abryear` char(4) DEFAULT NULL,
  `st_abrcountry` text,
  `st_abruniv` text,
  `st_abrmajor` text,
  `st_statusact` varchar(255) DEFAULT NULL,
  `st_note` text,
  `st_statuscli` int(1) DEFAULT NULL,
  `st_password` varchar(255) NOT NULL,
  `st_datecreate` datetime DEFAULT NULL,
  `st_datelastedit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_univ`
--

CREATE TABLE `tbl_univ` (
  `univ_id` char(8) NOT NULL,
  `univ_name` varchar(255) DEFAULT NULL,
  `univ_address` text,
  `univ_country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` char(7) NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_address` varchar(255) DEFAULT NULL,
  `vendor_phone` varchar(255) DEFAULT NULL,
  `vendor_type` varchar(255) DEFAULT NULL,
  `vendor_material` varchar(255) DEFAULT NULL,
  `vendor_size` varchar(255) DEFAULT NULL,
  `vendor_unitprice` int(11) DEFAULT NULL,
  `vendor_processingtime` varchar(50) DEFAULT NULL,
  `vendor_notes` text,
  `vendor_lastupdatedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_volunt`
--

CREATE TABLE `tbl_volunt` (
  `volunt_id` char(8) NOT NULL,
  `volunt_firstname` varchar(255) DEFAULT NULL,
  `volunt_lastname` varchar(255) DEFAULT NULL,
  `volunt_address` varchar(255) DEFAULT NULL,
  `volunt_mail` varchar(255) DEFAULT NULL,
  `volunt_phone` varchar(255) DEFAULT NULL,
  `volunt_graduatedfr` varchar(255) DEFAULT NULL,
  `volunt_major` varchar(255) DEFAULT NULL,
  `volunt_position` varchar(255) DEFAULT NULL,
  `volunt_idcard` varchar(255) DEFAULT NULL,
  `volunt_npwp` varchar(255) DEFAULT NULL,
  `volunt_status` int(2) NOT NULL,
  `volunt_lasteditdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indeks untuk tabel `tbl_act_st`
--
ALTER TABLE `tbl_act_st`
  ADD PRIMARY KEY (`act_st_id`);

--
-- Indeks untuk tabel `tbl_alu`
--
ALTER TABLE `tbl_alu`
  ADD PRIMARY KEY (`alu_id`);

--
-- Indeks untuk tabel `tbl_asset`
--
ALTER TABLE `tbl_asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indeks untuk tabel `tbl_corp`
--
ALTER TABLE `tbl_corp`
  ADD PRIMARY KEY (`corp_id`);

--
-- Indeks untuk tabel `tbl_corpdetail`
--
ALTER TABLE `tbl_corpdetail`
  ADD PRIMARY KEY (`corpdetail_id`);

--
-- Indeks untuk tabel `tbl_corprog`
--
ALTER TABLE `tbl_corprog`
  ADD PRIMARY KEY (`corprog_id`);

--
-- Indeks untuk tabel `tbl_editor`
--
ALTER TABLE `tbl_editor`
  ADD PRIMARY KEY (`editor_id`);

--
-- Indeks untuk tabel `tbl_eduf`
--
ALTER TABLE `tbl_eduf`
  ADD PRIMARY KEY (`eduf_id`);

--
-- Indeks untuk tabel `tbl_edufreview`
--
ALTER TABLE `tbl_edufreview`
  ADD PRIMARY KEY (`edufreview_id`);

--
-- Indeks untuk tabel `tbl_empl`
--
ALTER TABLE `tbl_empl`
  ADD PRIMARY KEY (`empl_id`);

--
-- Indeks untuk tabel `tbl_infl`
--
ALTER TABLE `tbl_infl`
  ADD PRIMARY KEY (`infl_id`);

--
-- Indeks untuk tabel `tbl_inv`
--
ALTER TABLE `tbl_inv`
  ADD PRIMARY KEY (`inv_num`);

--
-- Indeks untuk tabel `tbl_invdtl`
--
ALTER TABLE `tbl_invdtl`
  ADD PRIMARY KEY (`invdtl_id`);

--
-- Indeks untuk tabel `tbl_invsch`
--
ALTER TABLE `tbl_invsch`
  ADD PRIMARY KEY (`invsch_num`);

--
-- Indeks untuk tabel `tbl_lead`
--
ALTER TABLE `tbl_lead`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indeks untuk tabel `tbl_mt`
--
ALTER TABLE `tbl_mt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indeks untuk tabel `tbl_pettyexpenses`
--
ALTER TABLE `tbl_pettyexpenses`
  ADD PRIMARY KEY (`pettyexpenses_id`);

--
-- Indeks untuk tabel `tbl_pettyinflow`
--
ALTER TABLE `tbl_pettyinflow`
  ADD PRIMARY KEY (`pettyinflow_id`);

--
-- Indeks untuk tabel `tbl_pettysaldo`
--
ALTER TABLE `tbl_pettysaldo`
  ADD PRIMARY KEY (`pettysaldo_id`);

--
-- Indeks untuk tabel `tbl_prog`
--
ALTER TABLE `tbl_prog`
  ADD PRIMARY KEY (`prog_id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indeks untuk tabel `tbl_purchasedtl`
--
ALTER TABLE `tbl_purchasedtl`
  ADD PRIMARY KEY (`purchasedtl_id`);

--
-- Indeks untuk tabel `tbl_reason`
--
ALTER TABLE `tbl_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indeks untuk tabel `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  ADD PRIMARY KEY (`receipt_num`);

--
-- Indeks untuk tabel `tbl_sch`
--
ALTER TABLE `tbl_sch`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indeks untuk tabel `tbl_schdetail`
--
ALTER TABLE `tbl_schdetail`
  ADD PRIMARY KEY (`schdetail_id`);

--
-- Indeks untuk tabel `tbl_schprog`
--
ALTER TABLE `tbl_schprog`
  ADD PRIMARY KEY (`schprog_id`);

--
-- Indeks untuk tabel `tbl_schprogfix`
--
ALTER TABLE `tbl_schprogfix`
  ADD PRIMARY KEY (`schprogfix_id`);

--
-- Indeks untuk tabel `tbl_stdetail`
--
ALTER TABLE `tbl_stdetail`
  ADD PRIMARY KEY (`att_id`);

--
-- Indeks untuk tabel `tbl_stmentor`
--
ALTER TABLE `tbl_stmentor`
  ADD PRIMARY KEY (`stmentor_id`);

--
-- Indeks untuk tabel `tbl_stprog`
--
ALTER TABLE `tbl_stprog`
  ADD PRIMARY KEY (`stprog_id`);

--
-- Indeks untuk tabel `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`st_num`);

--
-- Indeks untuk tabel `tbl_univ`
--
ALTER TABLE `tbl_univ`
  ADD PRIMARY KEY (`univ_id`);

--
-- Indeks untuk tabel `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indeks untuk tabel `tbl_volunt`
--
ALTER TABLE `tbl_volunt`
  ADD PRIMARY KEY (`volunt_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_corpdetail`
--
ALTER TABLE `tbl_corpdetail`
  MODIFY `corpdetail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_corprog`
--
ALTER TABLE `tbl_corprog`
  MODIFY `corprog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_eduf`
--
ALTER TABLE `tbl_eduf`
  MODIFY `eduf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_edufreview`
--
ALTER TABLE `tbl_edufreview`
  MODIFY `edufreview_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_inv`
--
ALTER TABLE `tbl_inv`
  MODIFY `inv_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_invdtl`
--
ALTER TABLE `tbl_invdtl`
  MODIFY `invdtl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_invsch`
--
ALTER TABLE `tbl_invsch`
  MODIFY `invsch_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_parents`
--
ALTER TABLE `tbl_parents`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pettyexpenses`
--
ALTER TABLE `tbl_pettyexpenses`
  MODIFY `pettyexpenses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pettyinflow`
--
ALTER TABLE `tbl_pettyinflow`
  MODIFY `pettyinflow_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pettysaldo`
--
ALTER TABLE `tbl_pettysaldo`
  MODIFY `pettysaldo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_purchasedtl`
--
ALTER TABLE `tbl_purchasedtl`
  MODIFY `purchasedtl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_reason`
--
ALTER TABLE `tbl_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  MODIFY `receipt_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_schdetail`
--
ALTER TABLE `tbl_schdetail`
  MODIFY `schdetail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_schprog`
--
ALTER TABLE `tbl_schprog`
  MODIFY `schprog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_schprogfix`
--
ALTER TABLE `tbl_schprogfix`
  MODIFY `schprogfix_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_stdetail`
--
ALTER TABLE `tbl_stdetail`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_stmentor`
--
ALTER TABLE `tbl_stmentor`
  MODIFY `stmentor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_stprog`
--
ALTER TABLE `tbl_stprog`
  MODIFY `stprog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `st_num` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
