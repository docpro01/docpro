-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 06:56 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_docpro`
--
CREATE DATABASE IF NOT EXISTS `db_docpro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_docpro`;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `b_id` int(11) NOT NULL,
  `b_code` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_shortname` varchar(255) NOT NULL,
  `b_company` varchar(255) NOT NULL,
  `b_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business_partners_class`
--

CREATE TABLE `business_partners_class` (
  `bpc_id` int(11) NOT NULL,
  `bpc_code` varchar(255) NOT NULL,
  `bpc_class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_partners_class`
--

INSERT INTO `business_partners_class` (`bpc_id`, `bpc_code`, `bpc_class`) VALUES
(1, '11', 'Company'),
(2, '21', 'Customer'),
(3, '31', 'Supplier-Ordinary Goods'),
(4, '32', 'Supplier-Capital Goods'),
(5, '33', 'Supplier-Other Goods'),
(6, '34', 'Supplier-Services'),
(7, '41', 'Related Party'),
(8, '51', 'Stockholder/Owner'),
(9, '61', 'Others (Pls. Specify)'),
(10, '71', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `business_partners_type`
--

CREATE TABLE `business_partners_type` (
  `bpt_id` int(11) NOT NULL,
  `bpt_code` varchar(255) NOT NULL,
  `bpt_type` varchar(255) NOT NULL,
  `bpt_shortname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_partners_type`
--

INSERT INTO `business_partners_type` (`bpt_id`, `bpt_code`, `bpt_type`, `bpt_shortname`) VALUES
(1, '1', 'Individual', 'IND'),
(2, '2', 'Non-Individual', 'CO'),
(3, '3', 'Government', 'GOV');

-- --------------------------------------------------------

--
-- Table structure for table `cb_br`
--

CREATE TABLE `cb_br` (
  `cbbr_id` int(11) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `cbbr_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cbbr_flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_br`
--

INSERT INTO `cb_br` (`cbbr_id`, `cb_id`, `br_id`, `cbbr_validity_date`, `cbbr_flag`) VALUES
(5, 4, 13, '2016-09-14 03:16:38', 1),
(6, 4, 14, '2016-09-14 03:16:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `coa_id` int(11) NOT NULL,
  `coa_code` varchar(255) NOT NULL,
  `coa_name` varchar(255) NOT NULL,
  `lvl_1_id` int(11) NOT NULL,
  `lvl_2_id` int(11) NOT NULL,
  `lvl_3_id` int(11) NOT NULL,
  `lvl_4_id` int(11) NOT NULL,
  `lvl_5_id` int(11) NOT NULL,
  `lvl_6_id` int(11) NOT NULL,
  `coa_company` varchar(255) NOT NULL,
  `coa_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coalvl_1_2`
--

CREATE TABLE `coalvl_1_2` (
  `coalvl12_id` int(11) NOT NULL,
  `lvl_1_id` int(11) NOT NULL,
  `lvl_2_id` int(11) NOT NULL,
  `validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coalvl_2_3`
--

CREATE TABLE `coalvl_2_3` (
  `coalvl23_id` int(11) NOT NULL,
  `lvl_2_id` int(11) NOT NULL,
  `lvl_3_id` int(11) NOT NULL,
  `validity_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coalvl_3_4`
--

CREATE TABLE `coalvl_3_4` (
  `coalvl34_id` int(11) NOT NULL,
  `lvl_3_id` int(11) NOT NULL,
  `lvl_4_id` int(11) NOT NULL,
  `validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coalvl_4_5`
--

CREATE TABLE `coalvl_4_5` (
  `coalvl45_id` int(11) NOT NULL,
  `lvl_4_id` int(11) NOT NULL,
  `lvl_5_id` int(11) NOT NULL,
  `validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coalvl_5_6`
--

CREATE TABLE `coalvl_5_6` (
  `coalvl56_id` int(11) NOT NULL,
  `lvl_5_id` int(11) NOT NULL,
  `lvl_6_id` int(11) NOT NULL,
  `validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coa_lvl_1`
--

CREATE TABLE `coa_lvl_1` (
  `lvl_1_id` int(11) NOT NULL,
  `lvl_1_code` varchar(255) NOT NULL,
  `lvl_1_name` varchar(255) NOT NULL,
  `lvl_1_company` varchar(255) NOT NULL,
  `lvl_1_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coa_lvl_2`
--

CREATE TABLE `coa_lvl_2` (
  `lvl_2_id` int(11) NOT NULL,
  `lvl_2_code` varchar(255) NOT NULL,
  `lvl_2_name` varchar(255) NOT NULL,
  `lvl_2_company` varchar(255) NOT NULL,
  `lvl_2_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coa_lvl_3`
--

CREATE TABLE `coa_lvl_3` (
  `lvl_3_id` int(11) NOT NULL,
  `lvl_3_code` varchar(255) NOT NULL,
  `lvl_3_code_int` varchar(255) NOT NULL,
  `lvl_3_name` varchar(255) NOT NULL,
  `lvl_3_company` varchar(255) NOT NULL,
  `lvl_3_bir` varchar(255) NOT NULL,
  `lvl_3_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coa_lvl_4`
--

CREATE TABLE `coa_lvl_4` (
  `lvl_4_id` int(11) NOT NULL,
  `lvl_4_code` varchar(255) NOT NULL,
  `lvl_4_name` varchar(255) NOT NULL,
  `lvl_4_company` varchar(255) NOT NULL,
  `lvl_4_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coa_lvl_5`
--

CREATE TABLE `coa_lvl_5` (
  `lvl_5_id` int(11) NOT NULL,
  `lvl_5_code` varchar(255) NOT NULL,
  `lvl_5_name` varchar(255) NOT NULL,
  `lvl_5_company` varchar(255) NOT NULL,
  `lvl_5_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coa_lvl_6`
--

CREATE TABLE `coa_lvl_6` (
  `lvl_6_id` int(11) NOT NULL,
  `lvl_6_code` varchar(255) NOT NULL,
  `lvl_6_name` varchar(255) NOT NULL,
  `lvl_6_company` varchar(255) NOT NULL,
  `lvl_6_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_branches`
--

CREATE TABLE `company_branches` (
  `cb_id` int(11) NOT NULL,
  `cb_code` varchar(255) NOT NULL,
  `cb_name` varchar(255) NOT NULL,
  `cb_ind_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cb_address` varchar(255) NOT NULL,
  `cb_tin` varchar(255) NOT NULL,
  `cb_class` varchar(255) NOT NULL,
  `cb_bp_type` varchar(255) NOT NULL,
  `cb_tax_type` varchar(255) NOT NULL,
  `cb_seq` varchar(255) NOT NULL,
  `cb_cno` varchar(255) NOT NULL,
  `cb_email` varchar(255) NOT NULL,
  `cb_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_branches`
--

INSERT INTO `company_branches` (`cb_id`, `cb_code`, `cb_name`, `cb_ind_name`, `name`, `cb_address`, `cb_tin`, `cb_class`, `cb_bp_type`, `cb_tax_type`, `cb_seq`, `cb_cno`, `cb_email`, `cb_validity_date`, `flag`) VALUES
(1, '', 'DocPro Business Solution', 'Super A. Admin', 'DocPro Business Solution', '#404 GP Building, Mabini Street, Baguio City', '', '', '2', '', '0', '091234567890', 'excellentachiever01@gmail.com', '2016-09-09 06:24:24', 1),
(2, '', 'Universal Company', 'ME I. Myself', 'Universal Company', 'Baguio City', '', '', 'Non-Individual', '', '000001', '091234567890', 'excellentachiever01@gmail.com', '2016-09-12 04:56:06', 1),
(3, '', 'Nergal Company', 'Millare, Nelson B.', 'Nergal Company', 'Baguio City', '', '', 'Non-Individual', '', '000002', '091234567890', 'excellentachiever01@gmail.com', '2016-09-12 05:24:02', 1),
(4, '', 'Nergal Company', 'Millare, Nelson B.', 'Nergal Company', 'Baguio City', '888-888-888-8888', '', 'Non-Individual', 'vat', '000003', '091234567890', 'excellentachiever01@gmail.com', '2016-09-12 06:27:41', 1),
(13, '', 'Branch 111', '', 'Branch 111', 'address 111', '111-111-111-1111', 'branch', 'Non-Individual', 'vat', '000003', '091111111111', 'email@email.com', '2016-09-14 03:16:38', 1),
(14, '', 'Branch 222', '', 'Branch 222', 'address 222', '222-222-222-2222', 'branch', 'Non-Individual', 'vat', '000003', '0922222222', 'email@email.com', '2016-09-14 03:16:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `co_banks`
--

CREATE TABLE `co_banks` (
  `co_b_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `co_b_no` varchar(255) NOT NULL,
  `co_b_class` varchar(255) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_b_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_business_partners`
--

CREATE TABLE `co_business_partners` (
  `co_bp_id` int(11) NOT NULL,
  `co_bp_code` varchar(255) NOT NULL,
  `co_bp_name` varchar(255) NOT NULL,
  `co_bp_ind_name` varchar(255) NOT NULL,
  `bp_name` varchar(255) NOT NULL,
  `co_bp_shortname` varchar(255) NOT NULL,
  `co_bp_bus_style` varchar(255) NOT NULL,
  `co_bp_address` varchar(255) NOT NULL,
  `co_bp_tin` varchar(255) NOT NULL,
  `co_bp_particulars` varchar(255) NOT NULL,
  `co_bp_class` varchar(255) NOT NULL,
  `co_bp_class_code` varchar(255) NOT NULL,
  `bpt_id` int(11) NOT NULL,
  `co_t_id1` int(11) NOT NULL,
  `co_t_id2` int(11) NOT NULL,
  `co_t_id3` int(11) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_bp_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_coa_lvl1`
--

CREATE TABLE `co_coa_lvl1` (
  `id` int(11) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `lvl_1_id` int(11) NOT NULL,
  `validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_departments`
--

CREATE TABLE `co_departments` (
  `co_de_id` int(11) NOT NULL,
  `co_de_code` varchar(255) NOT NULL,
  `co_de_name` varchar(255) NOT NULL,
  `co_de_shortname` varchar(255) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_de_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_discounts`
--

CREATE TABLE `co_discounts` (
  `co_d_id` int(11) NOT NULL,
  `co_d_code` varchar(255) NOT NULL,
  `co_d_name` varchar(255) NOT NULL,
  `co_d_shortname` varchar(255) NOT NULL,
  `co_d_rate` varchar(255) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_d_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_documents`
--

CREATE TABLE `co_documents` (
  `co_doc_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_doc_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_journals`
--

CREATE TABLE `co_journals` (
  `co_j_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_j_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_modes_of_payment`
--

CREATE TABLE `co_modes_of_payment` (
  `co_mop_id` int(11) NOT NULL,
  `mop_id` int(11) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_mop_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_others`
--

CREATE TABLE `co_others` (
  `co_o_id` int(11) NOT NULL,
  `co_o_name` varchar(255) NOT NULL,
  `co_o_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cb_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_products`
--

CREATE TABLE `co_products` (
  `co_p_id` int(11) NOT NULL,
  `co_p_code` varchar(255) NOT NULL,
  `co_p_name` varchar(255) NOT NULL,
  `co_p_shortname` varchar(255) NOT NULL,
  `co_p_description` varchar(255) NOT NULL,
  `co_pcc_id` int(11) NOT NULL,
  `co_de_id` int(11) NOT NULL,
  `co_p_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_profit_cost_centers`
--

CREATE TABLE `co_profit_cost_centers` (
  `co_pcc_id` int(11) NOT NULL,
  `co_pcc_code` varchar(255) NOT NULL,
  `co_pcc_name` varchar(255) NOT NULL,
  `co_pcc_shortname` varchar(255) NOT NULL,
  `co_de_id` int(11) NOT NULL,
  `co_pcc_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_registrant`
--

CREATE TABLE `co_registrant` (
  `cor_id` int(11) NOT NULL,
  `cor_name` varchar(255) NOT NULL,
  `cor_no` varchar(255) NOT NULL,
  `cor_email` varchar(255) NOT NULL,
  `cb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_registrant`
--

INSERT INTO `co_registrant` (`cor_id`, `cor_name`, `cor_no`, `cor_email`, `cb_id`) VALUES
(1, 'Super A. Admin', '091234567890', 'someone@somewhere.com', 1),
(2, 'Super A. Admin', '091234567890', 'excellentachiever01@gmail.com', 2),
(3, 'Super A. Admin', '091234567890', 'excellentachiever01@gmail.com', 1),
(4, 'Me I. Myself', '09123456789', 'excellentachiever01@gmail.com', 2),
(5, 'Ugnasi, Bonifacio B.', '09123456789', 'excellentachiever01@gmail.com', 3),
(6, 'Ugnasi, Bonifacio B.', '09123456789', 'excellentachiever01@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `co_services`
--

CREATE TABLE `co_services` (
  `co_s_id` int(11) NOT NULL,
  `co_s_code` varchar(255) NOT NULL,
  `co_s_name` varchar(255) NOT NULL,
  `co_s_shortname` varchar(255) NOT NULL,
  `co_s_description` varchar(255) NOT NULL,
  `co_pcc_id` int(11) NOT NULL,
  `co_de_id` int(11) NOT NULL,
  `co_s_validity_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_taxes`
--

CREATE TABLE `co_taxes` (
  `co_t_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `co_t_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_transaction`
--

CREATE TABLE `co_transaction` (
  `co_trans_id` int(11) NOT NULL,
  `co_trans_date` date NOT NULL,
  `co_journ_trans_id` int(11) NOT NULL,
  `co_trans_doc_name` varchar(255) NOT NULL,
  `co_trans_doc_no` varchar(255) NOT NULL,
  `co_trans_doc_date` date NOT NULL,
  `co_trans_doc_bp_id` int(11) NOT NULL,
  `co_trans_doc_part_period` varchar(255) NOT NULL,
  `co_trans_doc_part_remarks` varchar(255) NOT NULL,
  `co_trans_doc_pay_type` varchar(255) NOT NULL,
  `co_trans_doc_pay_terms` varchar(255) NOT NULL,
  `co_trans_doc_pay_duedate` date NOT NULL,
  `co_trans_doc_pay_mode_id` int(11) NOT NULL,
  `co_trans_doc_pay_amountpaid` varchar(255) NOT NULL,
  `co_trans_doc_pay_checknumber` varchar(255) NOT NULL,
  `co_trans_doc_pay_bank_id` int(11) NOT NULL,
  `co_trans_doc_amount_gross` varchar(255) NOT NULL,
  `co_trans_doc_amount_vat` varchar(255) NOT NULL,
  `co_trans_doc_amount_taxwithheld` varchar(255) NOT NULL,
  `co_trans_doc_amount_deduction` varchar(255) NOT NULL,
  `co_trans_doc_amount_netamount` varchar(255) NOT NULL,
  `co_trans_doc_variance_gross` varchar(255) NOT NULL,
  `co_trans_doc_variance_vat` varchar(255) NOT NULL,
  `co_trans_doc_variance_taxwithheld` varchar(255) NOT NULL,
  `co_trans_doc_variance_deduction` varchar(255) NOT NULL,
  `co_trans_doc_variance_netamount` varchar(255) NOT NULL,
  `cb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_bank_details`
--

CREATE TABLE `co_trans_bank_details` (
  `co_trans_bank_det_id` int(11) NOT NULL,
  `co_b_id` int(11) NOT NULL,
  `co_trans_bank_det_doc` varchar(255) NOT NULL,
  `co_trans_bank_det_amount` varchar(255) NOT NULL,
  `co_trans_bank_det_date` date NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_discounts`
--

CREATE TABLE `co_trans_discounts` (
  `co_trans_disc_id` int(11) NOT NULL,
  `co_d_id` int(11) NOT NULL,
  `co_trans_disc_nature` varchar(255) NOT NULL,
  `co_trans_disc_deduction` varchar(255) NOT NULL,
  `co_trans_disc_scid` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_doc_reference`
--

CREATE TABLE `co_trans_doc_reference` (
  `co_trans_doc_ref_id` int(11) NOT NULL,
  `co_doc_id` int(11) NOT NULL,
  `co_trans_doc_ref_no` varchar(255) NOT NULL,
  `co_trans_doc_docdate` date NOT NULL,
  `co_trans_doc_gross` varchar(255) NOT NULL,
  `co_trans_doc_netamount` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_ewt`
--

CREATE TABLE `co_trans_ewt` (
  `co_trans_ewt_id` int(11) NOT NULL,
  `co_t_id` int(11) NOT NULL,
  `co_trans_ewt_nature` varchar(255) NOT NULL,
  `co_trans_ewt_taxwithheld` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_fwt`
--

CREATE TABLE `co_trans_fwt` (
  `co_trans_fwt_id` int(11) NOT NULL,
  `co_t_id` int(11) NOT NULL,
  `co_trans_fwt_nature` varchar(255) NOT NULL,
  `co_trans_fwt_taxwithheld` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_journ_entry`
--

CREATE TABLE `co_trans_journ_entry` (
  `co_trans_je_id` int(11) NOT NULL,
  `co_trans_je_no` varchar(255) NOT NULL,
  `co_trans_je_trans_code` varchar(255) NOT NULL,
  `co_trans_je_seq_no` varchar(255) NOT NULL,
  `co_trans_je_acc_code` varchar(255) NOT NULL,
  `co_trans_je_acc_name` varchar(255) NOT NULL,
  `co_trans_je_debit_credit` varchar(255) NOT NULL,
  `co_trans_je_debit_amount` varchar(255) NOT NULL,
  `co_trans_je_credit_amount` varchar(255) NOT NULL,
  `co_trans_pcc_code` varchar(255) NOT NULL,
  `co_trans_dept_code_name` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_other`
--

CREATE TABLE `co_trans_other` (
  `co_trans_other_id` int(11) NOT NULL,
  `co_trans_preparedby_id` int(11) NOT NULL,
  `co_trans_verifiedby` varchar(255) NOT NULL,
  `co_trans_approvedby` varchar(255) NOT NULL,
  `co_trans_receivedby` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_products`
--

CREATE TABLE `co_trans_products` (
  `co_trans_prod_id` int(11) NOT NULL,
  `co_p_id` int(11) NOT NULL,
  `co_trans_prod_qty` varchar(255) NOT NULL,
  `co_trans_prod_unit` varchar(255) NOT NULL,
  `co_trans_prod_unitprice` varchar(255) NOT NULL,
  `co_trans_prod_gross` varchar(255) NOT NULL,
  `co_trans_prod_type` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_services`
--

CREATE TABLE `co_trans_services` (
  `co_trans_serv_id` int(11) NOT NULL,
  `co_s_id` int(11) NOT NULL,
  `co_trans_serv_qty` varchar(255) NOT NULL,
  `co_trans_serv_unit` varchar(255) NOT NULL,
  `co_trans_serv_unitprice` varchar(255) NOT NULL,
  `co_trans_serv_gross` varchar(255) NOT NULL,
  `co_trans_serv_type` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_trans_vat`
--

CREATE TABLE `co_trans_vat` (
  `co_trans_vat_id` int(11) NOT NULL,
  `co_t_id` int(11) NOT NULL,
  `co_trans_vat_nature` varchar(255) NOT NULL,
  `co_trans_vat_amount` varchar(255) NOT NULL,
  `co_trans_vat_net_amount` varchar(255) NOT NULL,
  `co_trans_vat_gross` varchar(255) NOT NULL,
  `co_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_types_of_payment`
--

CREATE TABLE `co_types_of_payment` (
  `co_top_id` int(11) NOT NULL,
  `co_top_code` varchar(255) NOT NULL,
  `co_top_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `di_id` int(11) NOT NULL,
  `di_code` varchar(255) NOT NULL,
  `di_name` varchar(255) NOT NULL,
  `di_shortname` varchar(255) NOT NULL,
  `di_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `d_id` int(11) NOT NULL,
  `d_seq` varchar(255) NOT NULL,
  `d_code` varchar(255) NOT NULL,
  `d_class` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_shortname` varchar(255) NOT NULL,
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `j_id` int(11) NOT NULL,
  `j_code` varchar(255) NOT NULL,
  `j_name` varchar(255) NOT NULL,
  `j_shortname` varchar(255) NOT NULL,
  `j_company` varchar(255) NOT NULL,
  `j_validity_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`j_id`, `j_code`, `j_name`, `j_shortname`, `j_company`, `j_validity_date`, `flag`) VALUES
(1, '1', 'Sales Journal', 'SJ', 'docpro', '2016-09-09 06:32:37', 1),
(2, '2', 'Receipts Journal', 'RJ', 'docpro', '2016-09-09 06:33:06', 1),
(3, '3', 'Purchases Journal', 'PJ', 'docpro', '2016-09-09 06:33:21', 1),
(4, '4', 'Collections Journal', 'CJ', 'docpro', '2016-09-09 06:33:40', 1),
(5, '5', 'Disbursements Journal', 'DJ', 'docpro', '2016-09-09 06:34:30', 1),
(6, '6', 'General Journal', 'GJ', 'docpro', '2016-09-09 06:34:46', 1),
(7, '7', 'Special Journal', 'SJ', 'docpro', '2016-09-09 06:35:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modes_of_payment`
--

CREATE TABLE `modes_of_payment` (
  `mop_id` int(11) NOT NULL,
  `mop_seq` varchar(255) NOT NULL,
  `mop_code` varchar(255) NOT NULL,
  `mop_name` varchar(255) NOT NULL,
  `mop_shortname` varchar(255) NOT NULL,
  `top_id` int(11) NOT NULL,
  `mop_company` varchar(255) NOT NULL,
  `mop_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `p_id` int(11) NOT NULL,
  `p_seq` varchar(255) NOT NULL,
  `p_fname` varchar(255) NOT NULL,
  `p_mname` varchar(255) NOT NULL,
  `p_lname` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_cno` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `cb_id` int(11) NOT NULL,
  `p_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`p_id`, `p_seq`, `p_fname`, `p_mname`, `p_lname`, `p_address`, `p_cno`, `p_email`, `cb_id`, `p_validity_date`, `flag`) VALUES
(1, '0', 'Super', '', 'Admin', '', '091234567890', 'excellentachiever01@gmail.com', 1, '2016-09-09 06:24:24', 1),
(2, '0', '', '', 'Me I', '', '09123456789', 'excellentachiever01@gmail.com', 2, '2016-09-12 04:56:06', 1),
(3, '0', ' Bonifacio ', 'B.', 'Ugnasi', '', '09123456789', 'excellentachiever01@gmail.com', 3, '2016-09-12 05:24:02', 1),
(4, '0', ' Bonifacio ', 'B.', 'Ugnasi', '', '09123456789', 'excellentachiever01@gmail.com', 4, '2016-09-12 06:27:41', 1),
(21, '1', 'Person 111', 'mid111', 'last 111', 'address  111', '09111111', 'email@email.com', 4, '2016-09-14 03:16:38', 1),
(22, '2', 'Person 222', 'mid222', 'last 222', 'address 222', '0922222', 'email@email.com', 4, '2016-09-14 03:16:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `t_id` int(11) NOT NULL,
  `t_seq` varchar(255) NOT NULL,
  `t_code` varchar(255) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_shortname` varchar(255) NOT NULL,
  `t_rate` varchar(255) NOT NULL,
  `t_base` varchar(255) NOT NULL,
  `tt_id` int(11) NOT NULL,
  `t_company` varchar(255) NOT NULL,
  `t_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax_types`
--

CREATE TABLE `tax_types` (
  `tt_id` int(11) NOT NULL,
  `tt_code` varchar(255) NOT NULL,
  `tt_name` varchar(255) NOT NULL,
  `tt_shortname` varchar(255) NOT NULL,
  `tt_company` varchar(255) NOT NULL,
  `tt_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types_of_payment`
--

CREATE TABLE `types_of_payment` (
  `top_id` int(11) NOT NULL,
  `top_code` varchar(255) NOT NULL,
  `top_type` varchar(255) NOT NULL,
  `top_company` varchar(255) NOT NULL,
  `top_validity_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_seq` varchar(255) NOT NULL,
  `u_code` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_type` varchar(255) NOT NULL,
  `u_company` varchar(255) NOT NULL,
  `subs_type` enum('free','premium') NOT NULL,
  `subs_exp_date` date NOT NULL,
  `setup` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_validity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_seq`, `u_code`, `u_name`, `u_pass`, `u_type`, `u_company`, `subs_type`, `subs_exp_date`, `setup`, `p_id`, `u_validity_date`, `u_flag`) VALUES
(1, '0', '', 'docproadmin', '$2y$11$/KmBn6h8.qATjCSznlLIXuB9qYW.63aSh.F3KxJlUNTNRvoBbZSYy', 'Super Admin', 'docpro', 'premium', '0000-00-00', 0, 1, '2016-09-12 04:51:31', 1),
(2, '', '', '9nSK88Kgi', 'ZhqueyTxwgx', 'Super Admin', 'company', 'free', '2016-10-12', 1, 2, '2016-09-12 04:56:06', 1),
(3, '', '', 'yv86Jnsx', 'vvG3DEXTXJn9', 'Super Admin', 'company', 'free', '2016-10-12', 1, 3, '2016-09-12 05:24:02', 1),
(4, '', '', 'fjgNuFLu', '$2y$11$sg5l3uWj/qfplaClxreqfO.H4jVdcQq/Z5HrIGnIjyz9YKW2LQWT.', 'Super Admin', 'company', 'free', '2016-10-12', 1, 4, '2016-09-12 06:27:41', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `business_partners_class`
--
ALTER TABLE `business_partners_class`
  ADD PRIMARY KEY (`bpc_id`);

--
-- Indexes for table `business_partners_type`
--
ALTER TABLE `business_partners_type`
  ADD PRIMARY KEY (`bpt_id`);

--
-- Indexes for table `cb_br`
--
ALTER TABLE `cb_br`
  ADD PRIMARY KEY (`cbbr_id`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`coa_id`);

--
-- Indexes for table `coalvl_1_2`
--
ALTER TABLE `coalvl_1_2`
  ADD PRIMARY KEY (`coalvl12_id`);

--
-- Indexes for table `coalvl_2_3`
--
ALTER TABLE `coalvl_2_3`
  ADD PRIMARY KEY (`coalvl23_id`);

--
-- Indexes for table `coalvl_3_4`
--
ALTER TABLE `coalvl_3_4`
  ADD PRIMARY KEY (`coalvl34_id`);

--
-- Indexes for table `coalvl_4_5`
--
ALTER TABLE `coalvl_4_5`
  ADD PRIMARY KEY (`coalvl45_id`);

--
-- Indexes for table `coalvl_5_6`
--
ALTER TABLE `coalvl_5_6`
  ADD PRIMARY KEY (`coalvl56_id`);

--
-- Indexes for table `coa_lvl_1`
--
ALTER TABLE `coa_lvl_1`
  ADD PRIMARY KEY (`lvl_1_id`);

--
-- Indexes for table `coa_lvl_2`
--
ALTER TABLE `coa_lvl_2`
  ADD PRIMARY KEY (`lvl_2_id`);

--
-- Indexes for table `coa_lvl_3`
--
ALTER TABLE `coa_lvl_3`
  ADD PRIMARY KEY (`lvl_3_id`);

--
-- Indexes for table `coa_lvl_4`
--
ALTER TABLE `coa_lvl_4`
  ADD PRIMARY KEY (`lvl_4_id`);

--
-- Indexes for table `coa_lvl_5`
--
ALTER TABLE `coa_lvl_5`
  ADD PRIMARY KEY (`lvl_5_id`);

--
-- Indexes for table `coa_lvl_6`
--
ALTER TABLE `coa_lvl_6`
  ADD PRIMARY KEY (`lvl_6_id`);

--
-- Indexes for table `company_branches`
--
ALTER TABLE `company_branches`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `co_banks`
--
ALTER TABLE `co_banks`
  ADD PRIMARY KEY (`co_b_id`);

--
-- Indexes for table `co_business_partners`
--
ALTER TABLE `co_business_partners`
  ADD PRIMARY KEY (`co_bp_id`);

--
-- Indexes for table `co_coa_lvl1`
--
ALTER TABLE `co_coa_lvl1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_departments`
--
ALTER TABLE `co_departments`
  ADD PRIMARY KEY (`co_de_id`);

--
-- Indexes for table `co_discounts`
--
ALTER TABLE `co_discounts`
  ADD PRIMARY KEY (`co_d_id`);

--
-- Indexes for table `co_documents`
--
ALTER TABLE `co_documents`
  ADD PRIMARY KEY (`co_doc_id`);

--
-- Indexes for table `co_journals`
--
ALTER TABLE `co_journals`
  ADD PRIMARY KEY (`co_j_id`);

--
-- Indexes for table `co_modes_of_payment`
--
ALTER TABLE `co_modes_of_payment`
  ADD PRIMARY KEY (`co_mop_id`);

--
-- Indexes for table `co_others`
--
ALTER TABLE `co_others`
  ADD PRIMARY KEY (`co_o_id`);

--
-- Indexes for table `co_products`
--
ALTER TABLE `co_products`
  ADD PRIMARY KEY (`co_p_id`);

--
-- Indexes for table `co_profit_cost_centers`
--
ALTER TABLE `co_profit_cost_centers`
  ADD PRIMARY KEY (`co_pcc_id`);

--
-- Indexes for table `co_registrant`
--
ALTER TABLE `co_registrant`
  ADD PRIMARY KEY (`cor_id`);

--
-- Indexes for table `co_services`
--
ALTER TABLE `co_services`
  ADD PRIMARY KEY (`co_s_id`);

--
-- Indexes for table `co_taxes`
--
ALTER TABLE `co_taxes`
  ADD PRIMARY KEY (`co_t_id`);

--
-- Indexes for table `co_transaction`
--
ALTER TABLE `co_transaction`
  ADD PRIMARY KEY (`co_trans_id`);

--
-- Indexes for table `co_trans_bank_details`
--
ALTER TABLE `co_trans_bank_details`
  ADD PRIMARY KEY (`co_trans_bank_det_id`);

--
-- Indexes for table `co_trans_discounts`
--
ALTER TABLE `co_trans_discounts`
  ADD PRIMARY KEY (`co_trans_disc_id`);

--
-- Indexes for table `co_trans_doc_reference`
--
ALTER TABLE `co_trans_doc_reference`
  ADD PRIMARY KEY (`co_trans_doc_ref_id`);

--
-- Indexes for table `co_trans_ewt`
--
ALTER TABLE `co_trans_ewt`
  ADD PRIMARY KEY (`co_trans_ewt_id`);

--
-- Indexes for table `co_trans_fwt`
--
ALTER TABLE `co_trans_fwt`
  ADD PRIMARY KEY (`co_trans_fwt_id`);

--
-- Indexes for table `co_trans_journ_entry`
--
ALTER TABLE `co_trans_journ_entry`
  ADD PRIMARY KEY (`co_trans_je_id`);

--
-- Indexes for table `co_trans_other`
--
ALTER TABLE `co_trans_other`
  ADD PRIMARY KEY (`co_trans_other_id`);

--
-- Indexes for table `co_trans_products`
--
ALTER TABLE `co_trans_products`
  ADD PRIMARY KEY (`co_trans_prod_id`);

--
-- Indexes for table `co_trans_services`
--
ALTER TABLE `co_trans_services`
  ADD PRIMARY KEY (`co_trans_serv_id`);

--
-- Indexes for table `co_trans_vat`
--
ALTER TABLE `co_trans_vat`
  ADD PRIMARY KEY (`co_trans_vat_id`);

--
-- Indexes for table `co_types_of_payment`
--
ALTER TABLE `co_types_of_payment`
  ADD PRIMARY KEY (`co_top_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`di_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `modes_of_payment`
--
ALTER TABLE `modes_of_payment`
  ADD PRIMARY KEY (`mop_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tax_types`
--
ALTER TABLE `tax_types`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `types_of_payment`
--
ALTER TABLE `types_of_payment`
  ADD PRIMARY KEY (`top_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_partners_class`
--
ALTER TABLE `business_partners_class`
  MODIFY `bpc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `business_partners_type`
--
ALTER TABLE `business_partners_type`
  MODIFY `bpt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cb_br`
--
ALTER TABLE `cb_br`
  MODIFY `cbbr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `coa`
--
ALTER TABLE `coa`
  MODIFY `coa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coalvl_1_2`
--
ALTER TABLE `coalvl_1_2`
  MODIFY `coalvl12_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coalvl_2_3`
--
ALTER TABLE `coalvl_2_3`
  MODIFY `coalvl23_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coalvl_3_4`
--
ALTER TABLE `coalvl_3_4`
  MODIFY `coalvl34_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coalvl_4_5`
--
ALTER TABLE `coalvl_4_5`
  MODIFY `coalvl45_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coalvl_5_6`
--
ALTER TABLE `coalvl_5_6`
  MODIFY `coalvl56_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coa_lvl_1`
--
ALTER TABLE `coa_lvl_1`
  MODIFY `lvl_1_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coa_lvl_2`
--
ALTER TABLE `coa_lvl_2`
  MODIFY `lvl_2_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coa_lvl_3`
--
ALTER TABLE `coa_lvl_3`
  MODIFY `lvl_3_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coa_lvl_4`
--
ALTER TABLE `coa_lvl_4`
  MODIFY `lvl_4_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coa_lvl_5`
--
ALTER TABLE `coa_lvl_5`
  MODIFY `lvl_5_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coa_lvl_6`
--
ALTER TABLE `coa_lvl_6`
  MODIFY `lvl_6_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_branches`
--
ALTER TABLE `company_branches`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `co_banks`
--
ALTER TABLE `co_banks`
  MODIFY `co_b_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_business_partners`
--
ALTER TABLE `co_business_partners`
  MODIFY `co_bp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_coa_lvl1`
--
ALTER TABLE `co_coa_lvl1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_departments`
--
ALTER TABLE `co_departments`
  MODIFY `co_de_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_discounts`
--
ALTER TABLE `co_discounts`
  MODIFY `co_d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_documents`
--
ALTER TABLE `co_documents`
  MODIFY `co_doc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_journals`
--
ALTER TABLE `co_journals`
  MODIFY `co_j_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_modes_of_payment`
--
ALTER TABLE `co_modes_of_payment`
  MODIFY `co_mop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_others`
--
ALTER TABLE `co_others`
  MODIFY `co_o_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_products`
--
ALTER TABLE `co_products`
  MODIFY `co_p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_profit_cost_centers`
--
ALTER TABLE `co_profit_cost_centers`
  MODIFY `co_pcc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_registrant`
--
ALTER TABLE `co_registrant`
  MODIFY `cor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `co_services`
--
ALTER TABLE `co_services`
  MODIFY `co_s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_taxes`
--
ALTER TABLE `co_taxes`
  MODIFY `co_t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_transaction`
--
ALTER TABLE `co_transaction`
  MODIFY `co_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_bank_details`
--
ALTER TABLE `co_trans_bank_details`
  MODIFY `co_trans_bank_det_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_discounts`
--
ALTER TABLE `co_trans_discounts`
  MODIFY `co_trans_disc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_doc_reference`
--
ALTER TABLE `co_trans_doc_reference`
  MODIFY `co_trans_doc_ref_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_ewt`
--
ALTER TABLE `co_trans_ewt`
  MODIFY `co_trans_ewt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_fwt`
--
ALTER TABLE `co_trans_fwt`
  MODIFY `co_trans_fwt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_journ_entry`
--
ALTER TABLE `co_trans_journ_entry`
  MODIFY `co_trans_je_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_other`
--
ALTER TABLE `co_trans_other`
  MODIFY `co_trans_other_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_products`
--
ALTER TABLE `co_trans_products`
  MODIFY `co_trans_prod_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_trans_vat`
--
ALTER TABLE `co_trans_vat`
  MODIFY `co_trans_vat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_types_of_payment`
--
ALTER TABLE `co_types_of_payment`
  MODIFY `co_top_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `di_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modes_of_payment`
--
ALTER TABLE `modes_of_payment`
  MODIFY `mop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax_types`
--
ALTER TABLE `tax_types`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types_of_payment`
--
ALTER TABLE `types_of_payment`
  MODIFY `top_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
