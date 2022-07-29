-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2020 at 09:59 PM
-- Server version: 10.2.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avidsystem_supportsDB`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbdomains` (IN `@flag` INT(11), IN `@DomainName` VARCHAR(150), IN `@DomainBuy_Domain_Miladi` VARCHAR(30), IN `@DomainBuy_Host_Miladi` VARCHAR(30), IN `@DomainExpire_Domain_Miladi` VARCHAR(30), IN `@DomainExpire_Host_Miladi` VARCHAR(30), IN `@DomainExpire_Domain_Shamsi` VARCHAR(30), IN `@DomainExpire_Host_Shamsi` VARCHAR(30), IN `@DomainDescribtion` VARCHAR(200))  NO SQL
BEGIN
	IF `@flag` =-1 THEN
	insert into tbdomains (
            	`vcrDomainName`		,
            	`vcrDomainBuy_Domain_Miladi`		,
            	`vcrDomainBuy_Host_Miladi`		,
            	`vcrDomainExpire_Domain_Miladi`		,
            	`vcrDomainExpire_Host_Miladi`		,
            	`vcrDomainExpire_Domain_Shamsi`	,
            	`vcrDomainExpire_Host_Shamsi`	,
            	`vcrDomainDescribtion`			
        )values(
            	`@DomainName`		,
            	`@DomainBuy_Domain_Miladi`			,
            	`@DomainBuy_Host_Miladi`			,
            	`@DomainExpire_Domain_Miladi`			,
            	`@DomainExpire_Host_Miladi`			,
            	`@DomainExpire_Domain_Shamsi`		,
            	`@DomainExpire_Host_Shamsi`		,
            	`@DomainDescribtion`			

        );
	ELSEIF `@flag`!= -1 THEN
        	IF `@DomainName`='Del' THEN
  				Delete from tbdomains where `intDomainID` = `@flag`;    
            END IF;
                
	update tbdomains set
            	`vcrDomainName`		=	`@DomainName`	,
            	`vcrDomainBuy_Domain_Miladi`	=	`@DomainBuy_Domain_Miladi`			,
            	`vcrDomainBuy_Host_Miladi`	=	`@DomainBuy_Host_Miladi`			,
            	`vcrDomainExpire_Domain_Miladi`	=	`@DomainExpire_Domain_Miladi`			,
            	`vcrDomainExpire_Host_Miladi`	=	`@DomainExpire_Host_Miladi`			,
            	`vcrDomainExpire_Domain_Shamsi`	=	`@DomainExpire_Domain_Shamsi`			,
            	`vcrDomainExpire_Host_Shamsi`	=	`@DomainExpire_Host_Shamsi`			,
            	`vcrDomainDescribtion`	=	`@DomainDescribtion`					
        WHERE   	`intDomainID`		=	`@flag`;

    END IF;
END$$

CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbEnamadInfo` (IN `@flag` INT(11), IN `@UserID` INT(11), IN `@EnamadInfo_RequestDate` VARCHAR(20), IN `@EnamadInfo_Name_Surname` VARCHAR(30), IN `@EnamadInfo_Name_Surname2` VARCHAR(30), IN `@EnamadInfo_Name_Surname_en` VARCHAR(30), IN `@EnamadInfo_Name_Surname2_en` VARCHAR(30), IN `@EnamadInfo_Name_Father` VARCHAR(20), IN `@EnamadInfo_CodeMeli` VARCHAR(20), IN `@EnamadInfo_CodeShenasnameh` VARCHAR(20), IN `@EnamadInfo_BirthDate` VARCHAR(20), IN `@EnamadInfo_Gender` VARCHAR(10), IN `@EnamadInfo_CodePostal` VARCHAR(20), IN `@EnamadInfo_Ostan` VARCHAR(20), IN `@EnamadInfo_Shahrestan` VARCHAR(20), IN `@EnamadInfo_Bakhsh_Mahale_Dehestan` VARCHAR(20), IN `@EnamadInfo_Bakhsh_Mahale_Dehestan_ex` VARCHAR(50), IN `@EnamadInfo_Address` VARCHAR(150), IN `@EnamadInfo_Plack` VARCHAR(20), IN `@EnamadInfo_Tabaghe` VARCHAR(20), IN `@EnamadInfo_Shomare_Vahed` VARCHAR(20), IN `@EnamadInfo_Name_Sakhteman` VARCHAR(20), IN `@EnamadInfo_Telephone_Sabet` VARCHAR(20), IN `@EnamadInfo_Telephone_Hamrah` VARCHAR(20), IN `@EnamadInfo_Email` VARCHAR(50), IN `@EnamadInfo_File_CartMeli` VARCHAR(200), IN `@EnamadInfo_File_Shenasnameh` VARCHAR(200), IN `@EnamadInfo_File_Personal` VARCHAR(200), IN `@EnamadInfo_File_PayanKhedmat` VARCHAR(200), IN `@EnamadInfo_File_AsasName` VARCHAR(200), IN `@EnamadInfo_File_AdsRooznameh` VARCHAR(200), IN `@EnamadInfo_File_AkharinTakhiratManagment` VARCHAR(200), IN `@EnamadInfo_File_AkharinTakhiratSherkat` VARCHAR(200), IN `@EnamadInfo_File_AkharinTakhiratSabtiSherkat` VARCHAR(200), IN `@EnamadInfo_Telephone_Hamrah_Confirm` VARCHAR(20), IN `@EnamadInfo_Telephone_Sabet_Confirm` VARCHAR(20), IN `@EnamadInfo_KasboKar_Name_fa` VARCHAR(50), IN `@EnamadInfo_KasboKar_Name_en` VARCHAR(50), IN `@EnamadInfo_KasboKar_Domain_Address` VARCHAR(50), IN `@EnamadInfo_KasboKar_File_Logo` VARCHAR(200), IN `@EnamadInfo_KasboKar_Tozihat` VARCHAR(200), IN `@EnamadInfo_KasboKar_Melk` VARCHAR(20), IN `@EnamadInfo_KasboKar_Type_Activation` VARCHAR(20), IN `@EnamadInfo_KasboKar_KochakVaNopa` VARCHAR(20), IN `@EnamadInfo_KasboKar_Telephone_Sabet` VARCHAR(20), IN `@EnamadInfo_KasboKar_Telephone_Hamrah` VARCHAR(20), IN `@EnamadInfo_KasboKar_Email` VARCHAR(50), IN `@EnamadInfo_KasboKar_Fax` VARCHAR(50), IN `@EnamadInfo_KasboKar_TimeWork` VARCHAR(20), IN `@EnamadInfo_KasboKar_ResponseWork` VARCHAR(20), IN `@EnamadInfo_CodeRahgiri` VARCHAR(50), IN `@EnamadInfo_Name_Sherkat` VARCHAR(50), IN `@EnamadInfo_Sherkat_Manager` VARCHAR(50), IN `@EnamadInfo_Sherkat_Manager_CodeMeli` VARCHAR(20), IN `@EnamadInfo_Sherkat_Manager_Telephone_Hamrah` VARCHAR(20), IN `@EnamadInfo_Sherkat_Manager_Email` VARCHAR(50), IN `@EnamadInfo_Sherkat_VaziatNeshani` VARCHAR(100), IN `@EnamadInfo_CodePeigiri` VARCHAR(50), IN `@EnamadInfo_Status` INT(11))  NO SQL
BEGIN
IF `@flag` =-1 THEN
	INSERT INTO tbenamadinfo
	(
		`intUserID`						                    ,
		`vcrEnamadInfo_RequestDate`			            	,
		`vcrEnamadInfo_Name_Surname`			            ,
		`vcrEnamadInfo_Name_Surname2`			            ,
		`vcrEnamadInfo_Name_Surname_en`			            ,
		`vcrEnamadInfo_Name_Surname2_en`			            ,
		`vcrEnamadInfo_Name_Father`			            	,
		`vcrEnamadInfo_CodeMeli`				            ,
		`vcrEnamadInfo_CodeShenasnameh`		        	 	,
		`vcrEnamadInfo_BirthDate`				            ,
		`vcrEnamadInfo_Gender`				             	,
		`vcrEnamadInfo_CodePostal`			              	,
		`vcrEnamadInfo_Ostan`				                ,
		`vcrEnamadInfo_Shahrestan`			            	,
		`vcrEnamadInfo_Bakhsh_Mahale_Dehestan`		      	,
		`vcrEnamadInfo_Bakhsh_Mahale_Dehestan_ex`	        ,
		`vcrEnamadInfo_Address`				            	,
		`vcrEnamadInfo_Plack` 				              	,
		`vcrEnamadInfo_Tabaghe`				             	,
		`vcrEnamadInfo_Shomare_Vahed`			            ,
		`vcrEnamadInfo_Name_Sakhteman`		        	 	,
		`vcrEnamadInfo_Telephone_Sabet`		        	  	,
		`vcrEnamadInfo_Telephone_Hamrah`		        	,
		`vcrEnamadInfo_Email`				 	            ,
		`vcrEnamadInfo_File_CartMeli`			            ,
		`vcrEnamadInfo_File_Shenasnameh`			        ,
		`vcrEnamadInfo_File_Personal`			            ,
		`vcrEnamadInfo_File_PayanKhedmat`			        ,
        `vcrEnamadInfo_File_AsasName`			            ,
		`vcrEnamadInfo_File_AdsRooznameh`			        ,
		`vcrEnamadInfo_File_AkharinTakhiratManagment`	    ,
		`vcrEnamadInfo_File_AkharinTakhiratSherkat`		    ,
		`vcrEnamadInfo_File_AkharinTakhiratSabtiSherkat`	,
		`vcrEnamadInfo_Telephone_Hamrah_Confirm`		    ,
		`vcrEnamadInfo_Telephone_Sabet_Confirm`		      	,
		`vcrEnamadInfo_KasboKar_Name_fa`			        ,
		`vcrEnamadInfo_KasboKar_Name_en`			        ,
		`vcrEnamadInfo_KasboKar_Domain_Address`		       	,
		`vcrEnamadInfo_KasboKar_File_Logo`		         	,
		`vcrEnamadInfo_KasboKar_Tozihat`			        ,
		`vcrEnamadInfo_KasboKar_Melk`			  	        ,
		`vcrEnamadInfo_KasboKar_Type_Activation`		    ,
        `vcrEnamadInfo_KasboKar_KochakVaNopa`		 	    ,
        `vcrEnamadInfo_KasboKar_Telephone_Sabet`		    ,
        `vcrEnamadInfo_KasboKar_Telephone_Hamrah`		    ,
        `vcrEnamadInfo_KasboKar_Email`			        	,
        `vcrEnamadInfo_KasboKar_Fax`			            ,
        `vcrEnamadInfo_KasboKar_TimeWork`		         	,
        `vcrEnamadInfo_KasboKar_ResponseWork`		        ,
        `vcrEnamadInfo_CodeRahgiri`			              	,
        `vcrEnamadInfo_Name_Sherkat`			            ,
        `vcrEnamadInfo_Sherkat_Manager`			   	        ,
        `vcrEnamadInfo_Sherkat_Manager_CodeMeli`		    ,
        `vcrEnamadInfo_Sherkat_Manager_Telephone_Hamrah`	,
        `vcrEnamadInfo_Sherkat_Manager_Email`		        ,
        `vcrEnamadInfo_Sherkat_VaziatNeshani`		        ,
        `vcrEnamadInfo_CodePeigiri`			             	,
        `vcrEnamadInfo_Status`
	)
	VALUES
	(
        `@UserID`					                    ,
        `@EnamadInfo_RequestDate`			            ,
        `@EnamadInfo_Name_Surname`		        	  	,
        `@EnamadInfo_Name_Surname2`		        	  	,
        `@EnamadInfo_Name_Surname_en`		        	  	,
        `@EnamadInfo_Name_Surname2_en`		        	  	,
        `@EnamadInfo_Name_Father`			            ,
        `@EnamadInfo_CodeMeli`			        	  	,
        `@EnamadInfo_CodeShenasnameh`	        		,
        `@EnamadInfo_BirthDate`			        	  	,
        `@EnamadInfo_Gender`				            ,
        `@EnamadInfo_CodePostal`		            	,
        `@EnamadInfo_Ostan`				             	,
        `@EnamadInfo_Shahrestan`			            ,
        `@EnamadInfo_Bakhsh_Mahale_Dehestan`		    ,
        `@EnamadInfo_Bakhsh_Mahale_Dehestan_ex`		  	,
        `@EnamadInfo_Address`				            ,
        `@EnamadInfo_Plack` 				            ,
        `@EnamadInfo_Tabaghe`				            ,
        `@EnamadInfo_Shomare_Vahed`			          	,
        `@EnamadInfo_Name_Sakhteman`			       	,
        `@EnamadInfo_Telephone_Sabet`		        	,
        `@EnamadInfo_Telephone_Hamrah`	       		 	,
        `@EnamadInfo_Email`				            	,
        `@EnamadInfo_File_CartMeli`			         	,
        `@EnamadInfo_File_Shenasnameh`			      	,
        `@EnamadInfo_File_Personal`			         	,
        `@EnamadInfo_File_PayanKhedmat`			    	,
        `@EnamadInfo_File_AsasName`			           	,
        `@EnamadInfo_File_AdsRooznameh`			        ,
        `@EnamadInfo_File_AkharinTakhiratManagment`		,
        `@EnamadInfo_File_AkharinTakhiratSherkat`		,
        `@EnamadInfo_File_AkharinTakhiratSabtiSherkat`	,
        `@EnamadInfo_Telephone_Hamrah_Confirm`		  	,
        `@EnamadInfo_Telephone_Sabet_Confirm`		    ,
        `@EnamadInfo_KasboKar_Name_fa`			     	,
        `@EnamadInfo_KasboKar_Name_en`			    	,
        `@EnamadInfo_KasboKar_Domain_Address`		    ,
        `@EnamadInfo_KasboKar_File_Logo`		        ,
        `@EnamadInfo_KasboKar_Tozihat`			       	,
        `@EnamadInfo_KasboKar_Melk`			        	,
        `@EnamadInfo_KasboKar_Type_Activation`		 	,
        `@EnamadInfo_KasboKar_KochakVaNopa`		     	,
        `@EnamadInfo_KasboKar_Telephone_Sabet`		  	,
        `@EnamadInfo_KasboKar_Telephone_Hamrah`		  	,
        `@EnamadInfo_KasboKar_Email`			        ,
        `@EnamadInfo_KasboKar_Fax`			 	        ,
        `@EnamadInfo_KasboKar_TimeWork`		       	 	,
        `@EnamadInfo_KasboKar_ResponseWork`             ,
        `@EnamadInfo_CodeRahgiri`			            ,
        `@EnamadInfo_Name_Sherkat`		        	 	,
        `@EnamadInfo_Sherkat_Manager`			  	    ,
        `@EnamadInfo_Sherkat_Manager_CodeMeli`		  	,
        `@EnamadInfo_Sherkat_Manager_Telephone_Hamrah`	,
        `@EnamadInfo_Sherkat_Manager_Email`			    ,
        `@EnamadInfo_Sherkat_VaziatNeshani`		 	    ,
        `@EnamadInfo_CodePeigiri`		             	,
        `@EnamadInfo_Status`
    );

    ELSEIF `@flag` != -1 THEN

        IF `@EnamadInfo_Name_Surname`='Del' THEN
            Delete from tbenamadinfo where `intEnamadInfoID` = `@flag`;    
        END IF;


        UPDATE tbenamadinfo SET

                `intUserID`						                       =    `@UserID`	                                                ,
                `vcrEnamadInfo_RequestDate`			                   =	`@EnamadInfo_RequestDate`	                                ,
                `vcrEnamadInfo_Name_Surname`			               =    `@EnamadInfo_Name_Surname`	                        	    ,
`vcrEnamadInfo_Name_Surname2`			               =    `@EnamadInfo_Name_Surname2`	                        	    ,
`vcrEnamadInfo_Name_Surname_en`			               =    `@EnamadInfo_Name_Surname_en`	                        	    ,
`vcrEnamadInfo_Name_Surname2_en`			               =    `@EnamadInfo_Name_Surname2_en`	                        	    ,
                `vcrEnamadInfo_Name_Father`			                   =	`@EnamadInfo_Name_Father`		                            ,
                `vcrEnamadInfo_CodeMeli`				               =    `@EnamadInfo_CodeMeli`	                                    ,
                `vcrEnamadInfo_CodeShenasnameh`		        	       =	`@EnamadInfo_CodeShenasnameh`                               ,
                `vcrEnamadInfo_BirthDate`				               =	`@EnamadInfo_BirthDate`	                                    ,
                `vcrEnamadInfo_Gender`				                   =    `@EnamadInfo_Gender`                                        ,
                `vcrEnamadInfo_CodePostal`			                   = 	`@EnamadInfo_CodePostal`                                    ,
                `vcrEnamadInfo_Ostan`				                   =	`@EnamadInfo_Ostan`                                         ,
                `vcrEnamadInfo_Shahrestan`			                   =	`@EnamadInfo_Shahrestan`	                                ,
                `vcrEnamadInfo_Bakhsh_Mahale_Dehestan`		           = 	`@EnamadInfo_Bakhsh_Mahale_Dehestan`                        ,
                `vcrEnamadInfo_Bakhsh_Mahale_Dehestan_ex`	           =	`@EnamadInfo_Bakhsh_Mahale_Dehestan_ex`                     ,
                `vcrEnamadInfo_Address`				                   =	`@EnamadInfo_Address`	                                    ,
                `vcrEnamadInfo_Plack` 				                   =    `@EnamadInfo_Plack` 		                                ,
                `vcrEnamadInfo_Tabaghe`				                   =	`@EnamadInfo_Tabaghe`                                       ,
                `vcrEnamadInfo_Shomare_Vahed`			               =	`@EnamadInfo_Shomare_Vahed`                                 ,
                `vcrEnamadInfo_Name_Sakhteman`		        	       =    `@EnamadInfo_Name_Sakhteman`                                ,
                `vcrEnamadInfo_Telephone_Sabet`		        	       = 	`@EnamadInfo_Telephone_Sabet`	                            ,
                `vcrEnamadInfo_Telephone_Hamrah`		        	   =	`@EnamadInfo_Telephone_Hamrah`                              ,
                `vcrEnamadInfo_Email`				 	               =    `@EnamadInfo_Email`	                                        ,
                `vcrEnamadInfo_File_CartMeli`			               = 	`@EnamadInfo_File_CartMeli`                                 ,
                `vcrEnamadInfo_File_Shenasnameh`			           =	`@EnamadInfo_File_Shenasnameh`                              ,
                `vcrEnamadInfo_File_Personal`			               =	`@EnamadInfo_File_Personal`	                                ,
                `vcrEnamadInfo_File_PayanKhedmat`			           =	`@EnamadInfo_File_PayanKhedmat`                             ,
                `vcrEnamadInfo_File_AsasName`			               =	`@EnamadInfo_File_AsasName`                                 ,
                `vcrEnamadInfo_File_AdsRooznameh`			           =	`@EnamadInfo_File_AdsRooznameh`                             ,
                `vcrEnamadInfo_File_AkharinTakhiratManagment`		   =	`@EnamadInfo_File_AkharinTakhiratManagment`                 ,
                `vcrEnamadInfo_File_AkharinTakhiratSherkat`		       =	`@EnamadInfo_File_AkharinTakhiratSherkat`                   ,
                `vcrEnamadInfo_File_AkharinTakhiratSabtiSherkat`       =	`@EnamadInfo_File_AkharinTakhiratSabtiSherkat`              ,                
                `vcrEnamadInfo_Telephone_Hamrah_Confirm`		       =	`@EnamadInfo_Telephone_Hamrah_Confirm`                      ,
                `vcrEnamadInfo_Telephone_Sabet_Confirm`		           =    `@EnamadInfo_Telephone_Sabet_Confirm`	                	,
                `vcrEnamadInfo_KasboKar_Name_fa`			           =    `@EnamadInfo_KasboKar_Name_fa`                              ,
                `vcrEnamadInfo_KasboKar_Name_en`			           =	`@EnamadInfo_KasboKar_Name_en`                              ,
                `vcrEnamadInfo_KasboKar_Domain_Address`		           =    `@EnamadInfo_KasboKar_Domain_Address`	                	,
                `vcrEnamadInfo_KasboKar_File_Logo`		               =    `@EnamadInfo_KasboKar_File_Logo`		                    ,
                `vcrEnamadInfo_KasboKar_Tozihat`			           =    `@EnamadInfo_KasboKar_Tozihat`	                    	    ,
                `vcrEnamadInfo_KasboKar_Melk`			  	           =    `@EnamadInfo_KasboKar_Melk`	                                ,
                `vcrEnamadInfo_KasboKar_Type_Activation`		       = 	`@EnamadInfo_KasboKar_Type_Activation`                      ,
                `vcrEnamadInfo_KasboKar_KochakVaNopa`		 	       =    `@EnamadInfo_KasboKar_KochakVaNopa`                         ,
                `vcrEnamadInfo_KasboKar_Telephone_Sabet`		       =	`@EnamadInfo_KasboKar_Telephone_Sabet`                      ,
                `vcrEnamadInfo_KasboKar_Telephone_Hamrah`		       =	`@EnamadInfo_KasboKar_Telephone_Hamrah`                     ,
                `vcrEnamadInfo_KasboKar_Email`			               =	`@EnamadInfo_KasboKar_Email`                                ,
                `vcrEnamadInfo_KasboKar_Fax`			               =	`@EnamadInfo_KasboKar_Fax`                                  ,
                `vcrEnamadInfo_KasboKar_TimeWork`		         	   = 	`@EnamadInfo_KasboKar_TimeWork`                             ,
                `vcrEnamadInfo_KasboKar_ResponseWork`		           = 	`@EnamadInfo_KasboKar_ResponseWork`                         ,
                `vcrEnamadInfo_CodeRahgiri`			                   =	`@EnamadInfo_CodeRahgiri`	                                ,
                `vcrEnamadInfo_Name_Sherkat`			               =    `@EnamadInfo_Name_Sherkat`	                                ,
                `vcrEnamadInfo_Sherkat_Manager`			   	           =    `@EnamadInfo_Sherkat_Manager`	                            ,
                `vcrEnamadInfo_Sherkat_Manager_CodeMeli`		       =	`@EnamadInfo_Sherkat_Manager_CodeMeli`                      ,
                `vcrEnamadInfo_Sherkat_Manager_Telephone_Hamrah`	   =	`@EnamadInfo_Sherkat_Manager_Telephone_Hamrah`              ,
                `vcrEnamadInfo_Sherkat_Manager_Email`		           =	`@EnamadInfo_Sherkat_Manager_Email`	                        ,
                `vcrEnamadInfo_Sherkat_VaziatNeshani`		           = 	`@EnamadInfo_Sherkat_VaziatNeshani`                         ,
                `vcrEnamadInfo_CodePeigiri`			                   =    `@EnamadInfo_CodePeigiri`	                                ,
                `vcrEnamadInfo_Status`                                 =    `@EnamadInfo_Status`

        WHERE `intEnamadInfoID` = `@flag`;

    END IF;

END$$

CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbInvoices` (IN `@flag` INT(11), IN `@UserID` INT(11), IN `@InvoicesPublishedDate` VARCHAR(20), IN `@InvoicesExpertName` VARCHAR(50), IN `@InvoicesImgInvoiceFile` VARCHAR(200), IN `@InvoicesImgAgreementFile` VARCHAR(200), IN `@InvoicesImgRecieveFile` VARCHAR(200), IN `@InvoicesDescription` TEXT, IN `@InvoiceStatusSeen` TINYINT(1))  NO SQL
BEGIN
	IF `@flag` =-1 THEN
	insert into tbinvoices (
            	`intUserID`		,
            	`vcrInvoicesPublishedDate`		,
            	`vcrInvoicesExpertName`		,
            	`vcrInvoicesImgInvoiceFile`		,
            	`vcrInvoicesImgAgreementFile`		,
            	`vcrInvoicesImgRecieveFile`		,
            	`txtInvoicesDescription`		
        )values(
            	`@UserID`						,
            	`@InvoicesPublishedDate`		,
            	`@InvoicesExpertName`				,
            	`@InvoicesImgInvoiceFile`			,
            	`@InvoicesImgAgreementFile`			,
            	`@InvoicesImgRecieveFile`			,
            	`@InvoicesDescription`								
        );
        ELSEIF `@flag`!= -1 THEN
        		IF `@InvoicesPublishedDate`='Del' THEN
  		     		Delete from tbinvoices where `intInvoicesID` = `@flag`;
                    
                        END IF;
                 IF `@InvoicesPublishedDate` = 'Update' THEN
	                    update tbinvoices set
                             	`intInvoiceStatusSeen`	=	`@InvoiceStatusSeen`
                            WHERE   	`intInvoicesID`	=	`@flag`;   
                        ElSE 
	                    update tbinvoices set
            	                `intUserID`						=	`@UserID`,
            	                `vcrInvoicesPublishedDate`		=	`@InvoicesPublishedDate`,
            	                `vcrInvoicesExpertName`			=	`@InvoicesExpertName`,
            	                `vcrInvoicesImgInvoiceFile`		=	`@InvoicesImgInvoiceFile`,
            	                `vcrInvoicesImgAgreementFile`	=	`@InvoicesImgAgreementFile`,
            	                `vcrInvoicesImgRecieveFile`		=	`@InvoicesImgRecieveFile`,
            	                `txtInvoicesDescription`		=	`@InvoicesDescription`
                            WHERE 	`intInvoicesID`					=	`@flag`;


                        END IF;

    END IF;
END$$

CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbPreInvoices` (IN `@flag` INT(11), IN `@UserID` INT(11), IN `@PreInvoiceDate` VARCHAR(20), IN `@PreInvoiceExpert` VARCHAR(50), IN `@PreInvoiceFilePath` VARCHAR(300), IN `@PreInvoiceConfirmation` TINYINT(1), IN `@PreInvoiceConfirmationDate` VARCHAR(20), IN `@PreInvoiceDescription` TEXT, IN `@PreInvoiceStatusSeen` TINYINT(1))  NO SQL
BEGIN
	IF `@flag` =-1 THEN
	insert into tbpreinvoices (
            	`intUserID`		,
            	`vcrPreInvoiceDate`		,
            	`vcrPreInvoiceExpert`		,
            	`vcrPreInvoiceFilePath`		,
            	`bitPreInvoiceConfirmation`		,
            	`txtPreInvoiceDescription`		
        )values(
            	`@UserID`			,
            	`@PreInvoiceDate`		,
            	`@PreInvoiceExpert`			,
            	`@PreInvoiceFilePath`			,
            	`@PreInvoiceConfirmation`			,
            	`@PreInvoiceDescription`								
        );
        ELSEIF `@flag`!= -1 THEN
        		IF `@PreInvoiceDate`='Del' THEN
  		     		Delete from tbpreinvoices where `intPreInvoiceID` = `@flag`;
                        END IF;
            
                        IF `@PreInvoiceDate` = 'Update' THEN
	                    update tbpreinvoices set
                             	`intPreInvoiceStatusSeen`	=	`@PreInvoiceStatusSeen`
                            WHERE   	`intPreInvoiceID`	=	`@flag`;   
                         ElSE 
	                    update tbpreinvoices set
                         	`intUserID`	=	`@UserID`,
                         	`bitPreInvoiceConfirmation`	=	`@PreInvoiceConfirmation`,
                         	`vcrPreInvoiceConfirmationDate`	=	`@PreInvoiceConfirmationDate`
                            WHERE   	`intPreInvoiceID`	=	`@flag`;

                        END IF;

         END IF;
END$$

CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbProducts` (IN `@flag` INT(11), IN `@UserID` INT(11), IN `@ProductName` VARCHAR(100), IN `@AgreementProduct` VARCHAR(100), IN `@StartDateProductActivity` VARCHAR(100), IN `@EndDateProductActivity` VARCHAR(100), IN `@ProductStatusSeen` TINYINT(1))  NO SQL
BEGIN
	IF `@flag` =-1 THEN
	insert into tbproducts (
            	`intUserID`		,
            	`vcrProductName`		,
            	`vcrAgreementProduct`		,
            	`vcrStartDateProductActivity`		,
            	`vcrEndDateProductActivity`		
        )values(
            	`@UserID`			,
            	`@ProductName`		,
            	`@AgreementProduct`			,
            	`@StartDateProductActivity`			,
            	`@EndDateProductActivity`								
        );
        ELSEIF `@flag`!= -1 THEN
        		IF `@ProductName`='Del' THEN
  		     		Delete from tbproducts where `intProductID` = `@flag`;
                    
                END IF;
                
	update tbproducts set
            	`intUserID`	=	`@UserID`,
            	`vcrProductName`	=	`@ProductName`,
            	`vcrAgreementProduct`	=	`@AgreementProduct`,
            	`vcrStartDateProductActivity`	=	`@StartDateProductActivity`,
            	`vcrEndDateProductActivity`	=	`@EndDateProductActivity`
        WHERE   	`intProductID`	=	`@flag`;
    END IF;

       IF `@flag`!= -2 THEN
       update tbproducts set
            	`intUserID`	=	`@UserID`,
            	`intProductStatusSeen`	=	`@ProductStatusSeen`
        WHERE   	`intProductID`	=	`@flag`;
       END IF;
END$$

CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbSupport` (IN `@flag` INT(11), IN `@SupportParentID` INT(11), IN `@AdminID` INT(11), IN `@UserID` INT(11), IN `@SupportSubject` VARCHAR(100), IN `@SupportPriority` INT(4), IN `@SupportComment` TEXT, IN `@dSupportDateTime` DATE, IN `@vSupportDateTime` VARCHAR(20), IN `@SupportFile` VARCHAR(300), IN `@Barcode` VARCHAR(13), IN `@UserRelID` INT(11), IN `@SupportStatus` INT(3))  NO SQL
BEGIN
IF `@flag` =-1 THEN
	insert into tbsupport (
            	`intSupportParentID`		,
            	`intAdminID`		,
            	`intUserID`		,
            	`vcrSupportSubject`		,
            	`intSupportPriority`		,
            	`txtSupportComment`		,
            	`datSupportDateTime`	,
            	`vcrSupportDateTime`	,
            	`vcrSupportFile`	,
            	`vcrBarcode`	        ,
            	`intUserRelID`		,
            	`intSupportStatus`			

        )values(
            	`@SupportParentID`		,
            	`@AdminID`			,
            	`@UserID`			,
            	`@SupportSubject`			,
            	`@SupportPriority`			,
            	`@SupportComment`		,
            	`@dSupportDateTime`		,
            	`@vSupportDateTime`		,
            	`@SupportFile`		,
            	`@Barcode`		,	
            	`@UserRelID`		,	
            	`@SupportStatus`		

        );

ELSEIF `@flag` =-2 THEN
	insert into tbsupport (
            	`intSupportParentID`		,
            	`intAdminID`		,
            	`intUserID`		,
            	`vcrSupportSubject`		,
            	`intSupportPriority`		,
            	`txtSupportComment`		,
            	`datSupportDateTime`	,
            	`vcrSupportDateTime`	,
            	`intUserRelID`				

        )values(
            	`@SupportParentID`		,
            	`@AdminID`			,
            	`@UserID`			,
            	`@SupportSubject`			,
            	`@SupportPriority`			,
            	`@SupportComment`		,
            	`@dSupportDateTime`		,
            	`@vSupportDateTime`		,
            	`@UserRelID`		

        );

ELSEIF `@flag`!= -1 AND `@flag`!= -2  THEN                
	update tbsupport set
            	`intSupportStatus`	=	`@SupportStatus`
        WHERE  `intSupportID` = `@flag`   ;

    END IF;

END$$

CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbUsers` (IN `@flag` INT(11), IN `@HoghogiHaghighiUser` TINYINT(1), IN `@FNameUser` VARCHAR(50), IN `@LNameUser` VARCHAR(70), IN `@UsernameUser` VARCHAR(100), IN `@PasswordUser` VARCHAR(255), IN `@RepeatPasswordUser` VARCHAR(255), IN `@EmailUser` VARCHAR(255), IN `@PhoneNumberUser` VARCHAR(11), IN `@MobileNumberUser` VARCHAR(11), IN `@CreatedUser` DATE, IN `@AddressUser` VARCHAR(300), IN `@MapLat` VARCHAR(100), IN `@MapLag` VARCHAR(100), IN `@ImgProfileUser` VARCHAR(300))  NO SQL
BEGIN
	IF `@flag` =-1 THEN
	insert into tbusers (
            	`intHoghogiHaghighiUser`		,
            	`vcrFNameUser`		,
            	`vcrLNameUser`		,
            	`vcrUsernameUser`		,
            	`vcrPasswordUser`		,
            	`vcrRepeatPasswordUser`		,
            	`vcrEmailUser`		,
            	`vcrPhoneNumberUser`		,
            	`vcrMobileNumberUser`		,
            	`datCreatedUser`		,
            	`vcrAddressUser`		,
            	`vcrMapLat`			,
            	`vcrMapLag`			,
            	`vcrImgProfileUser`			
        )values(
            	`@HoghogiHaghighiUser`		,
            	`@FNameUser`			,
            	`@LNameUser`			,
            	`@UsernameUser`			,
            	`@PasswordUser`			,
            	`@RepeatPasswordUser`		,
            	`@EmailUser`			,
            	`@PhoneNumberUser`		,
            	`@MobileNumberUser`		,
            	`@CreatedUser`			,
            	`@AddressUser`			,
            	`@MapLat`			,
            	`@MapLag`			,
            	`@ImgProfileUser`				

        );
        ELSEIF `@flag`!= -1 THEN
        	IF `@FNameUser`='Del' THEN
  			Delete from tbusers where `intUserID` = `@flag`;    
                END IF;
                
	update tbusers set
            	`intHoghogiHaghighiUser`=	`@HoghogiHaghighiUser`	,
            	`vcrFNameUser`		=	`@FNameUser`		,
            	`vcrLNameUser`		=	`@LNameUser`		,
            	`vcrUsernameUser`	=	`@UsernameUser`		,
            	`vcrPasswordUser`	=	`@PasswordUser`		,
            	`vcrRepeatPasswordUser`	=	`@RepeatPasswordUser`	,
            	`vcrEmailUser`		=	`@EmailUser`	,
            	`vcrPhoneNumberUser`	=	`@PhoneNumberUser`	,
            	`vcrMobileNumberUser`	=	`@MobileNumberUser`	,
            	`vcrAddressUser`	=	`@AddressUser`		,
            	`vcrMapLat`		=	`@MapLat`		,
            	`vcrMapLag`		=	`@MapLag`	        ,
            	`vcrImgProfileUser`	=	`@ImgProfileUser`		
        WHERE   	`intUserID`	=	`@flag`;

    END IF;
END$$

CREATE DEFINER=`avidsystem`@`localhost` PROCEDURE `sp_Insert_Update_Delete_tbUsersRel` (IN `@flag` INT(11), IN `@UserID` INT(11), IN `@UserRelSex` INT(2), IN `@UserRelName` VARCHAR(100), IN `@UserRelSection` VARCHAR(100), IN `@UserRelContact` VARCHAR(50), IN `@UserRelEmail` VARCHAR(100), IN `@UserRelAddress` VARCHAR(300), IN `@UserRel_Del` INT(11))  NO SQL
BEGIN
	IF `@flag` =-1 THEN
	insert into tbusersrel (
            	`intUserID`		,
            	`intUserRelSex`		,
            	`vcrUserRelName`		,
            	`vcrUserRelSection`		,
            	`vcrUserRelContact`		,
            	`vcrUserRelEmail`		,
            	`vcrUserRelAddress`		,
                `intUserRel_Del`
        )values(
            	`@UserID`		,
            	`@UserRelSex`			,
            	`@UserRelName`			,
            	`@UserRelSection`			,
            	`@UserRelContact`			,
            	`@UserRelEmail`		,
            	`@UserRelAddress`		,
                `@UserRel_Del`		

        );
	ELSEIF `@flag`!= -1 THEN
        	IF `@UserRelName`='Del' THEN
  				Delete from tbusersrel where `intUserRelID` = `@flag`;    
            END IF;
                
	update tbusersrel set
            	`intUserRelSex`		=	`@UserRelSex`	,
            	`vcrUserRelName`	=	`@UserRelName`			,
            	`vcrUserRelSection`	=	`@UserRelSection`			,
            	`vcrUserRelContact`	=	`@UserRelContact`			,
            	`vcrUserRelEmail`	=	`@UserRelEmail`			,
            	`vcrUserRelAddress`	=	`@UserRelAddress`   		,
            	`intUserRel_Del`	=	`@UserRel_Del`   		
        WHERE   	`intUserRelID`		=	`@flag`;

    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `intAdminID` int(11) NOT NULL,
  `vcrFNameAdmin` varchar(50) NOT NULL,
  `vcrLNameAdmin` varchar(50) DEFAULT NULL,
  `vcrUsernameAdmin` varchar(100) NOT NULL,
  `vcrPasswordAdmin` varchar(255) NOT NULL,
  `vcrRepeatPasswordAdmin` varchar(255) DEFAULT NULL,
  `vcrPhoneNumberAdmin` varchar(11) DEFAULT NULL,
  `vcrMobileNumberAdmin` varchar(11) NOT NULL,
  `vcrEmailAdmin` varchar(255) DEFAULT NULL,
  `datCreatedAdmin` datetime DEFAULT NULL,
  `vcrAddressAdmin` varchar(300) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`intAdminID`, `vcrFNameAdmin`, `vcrLNameAdmin`, `vcrUsernameAdmin`, `vcrPasswordAdmin`, `vcrRepeatPasswordAdmin`, `vcrPhoneNumberAdmin`, `vcrMobileNumberAdmin`, `vcrEmailAdmin`, `datCreatedAdmin`, `vcrAddressAdmin`) VALUES
(1, 'مهر آوید', 'آوید', 'avid234', '64109885a22e81c03947b14e7813e315', '@a1234!', '01342933', '09117091629', 'avid@info.com', NULL, 'گیلان، رشت، خیابان احسان بخش، ساختمان توسکا، طبقه 3، واحد 305 ');

-- --------------------------------------------------------

--
-- Table structure for table `tbdomains`
--

CREATE TABLE `tbdomains` (
  `intDomainID` int(11) NOT NULL,
  `vcrDomainName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vcrDomainBuy_Domain_Miladi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vcrDomainBuy_Host_Miladi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vcrDomainExpire_Domain_Miladi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vcrDomainExpire_Host_Miladi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vcrDomainExpire_Domain_Shamsi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vcrDomainExpire_Host_Shamsi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vcrDomainDescribtion` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbdomains`
--

INSERT INTO `tbdomains` (`intDomainID`, `vcrDomainName`, `vcrDomainBuy_Domain_Miladi`, `vcrDomainBuy_Host_Miladi`, `vcrDomainExpire_Domain_Miladi`, `vcrDomainExpire_Host_Miladi`, `vcrDomainExpire_Domain_Shamsi`, `vcrDomainExpire_Host_Shamsi`, `vcrDomainDescribtion`) VALUES
(1, 'bahar360.ir', '2020-01-15', '2020-01-15', '2021-01-14', '2021-01-14', '1399/10/25', '1399/10/25', 'سایت بهار 360'),
(2, 'arshiaprint.com', '2018-03-15', '2018-03-15', '2020-03-16', '2020-03-16', '1399/12/19', '1399/12/19', 'سایت arshiaprint'),
(3, 'guilanbar.ir', '2019-12-16', '2019-12-16', '2020-12-18', '2020-12-18', '1399/09/28', '1399/09/28', 'سایت گیلان بار'),
(4, 'larus24.ir', '2020-01-08', '2020-01-08', '2020-12-09', '2020-12-09', '1399/09/15', '1399/09/15', 'سایت لاروز پرواز'),
(5, 'Rasht.Airport.ir', '2017-04-12', '2017-04-12', '2020-10-31', '2020-10-31', '1399/08/06', '1399/08/06', ''),
(6, 'farapayamak.ir', '2018-11-21', '', '', '', '1399/09/01', '1399/08/01', 'فرا پیامک (برای ارسال پیامک ها)'),
(7, 'spg724.com', '2017-09-12', '2017-09-12', '2020-09-12', '2020-09-12', '1399/06/19', '1399/06/19', 'سایت سپید رود'),
(8, 'Ir-pack.ir', '2019-08-31', '2019-08-31', '2020-09-03', '2020-09-03', '1399/06/09', '1399/06/09', ''),
(10, 'spg24.ir', '2020-01-11', '2020-01-11', '2023-07-14', '2023-07-14', '1399/04/18', '1399/04/18', 'سایت سپید رود'),
(11, 'avidp.com', '2019-07-04', '2019-07-04', '2020-07-04', '2020-07-04', '1399/04/09', '1399/04/09', 'سایت شرکت مهر آوید پردیس'),
(12, 'shiuuee.com', '2018-05-24', '2018-05-24', '2020-05-25', '2020-05-25', '1399/02/29', '1399/02/29', 'سایت مهندس شیوعی'),
(13, 'shakhesacademy.com', '2019-04-10', '2019-04-10', '2020-04-10', '2020-04-10', '1399/01/16', '1399/01/16', ''),
(14, 'corbeau-arch.com', '2018-02-22', '2018-02-22', '2020-02-22', '2020-02-22', '1398/11/26', '1398/11/26', ''),
(15, '33556655', '2019-05-14', '2019-05-14', '2024-05-16', '2024-05-16', '1403/02/21', '1403/02/21', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbenamadinfo`
--

CREATE TABLE `tbenamadinfo` (
  `intEnamadInfoID` int(11) NOT NULL,
  `intUserID` int(11) NOT NULL,
  `vcrEnamadInfo_RequestDate` varchar(20) NOT NULL,
  `vcrEnamadInfo_Name_Surname` varchar(30) NOT NULL,
  `vcrEnamadInfo_Name_Surname2` varchar(30) DEFAULT NULL,
  `vcrEnamadInfo_Name_Surname_en` varchar(30) DEFAULT NULL,
  `vcrEnamadInfo_Name_Surname2_en` varchar(30) DEFAULT NULL,
  `vcrEnamadInfo_Name_Father` varchar(20) NOT NULL,
  `vcrEnamadInfo_CodeMeli` varchar(20) NOT NULL,
  `vcrEnamadInfo_CodeShenasnameh` varchar(20) NOT NULL,
  `vcrEnamadInfo_BirthDate` varchar(20) NOT NULL,
  `vcrEnamadInfo_Gender` varchar(10) NOT NULL,
  `vcrEnamadInfo_CodePostal` varchar(20) NOT NULL,
  `vcrEnamadInfo_Ostan` varchar(20) NOT NULL,
  `vcrEnamadInfo_Shahrestan` varchar(20) NOT NULL,
  `vcrEnamadInfo_Bakhsh_Mahale_Dehestan` varchar(20) NOT NULL,
  `vcrEnamadInfo_Bakhsh_Mahale_Dehestan_ex` varchar(50) NOT NULL,
  `vcrEnamadInfo_Address` varchar(150) NOT NULL,
  `vcrEnamadInfo_Plack` varchar(20) NOT NULL,
  `vcrEnamadInfo_Tabaghe` varchar(20) NOT NULL,
  `vcrEnamadInfo_Shomare_Vahed` varchar(20) NOT NULL,
  `vcrEnamadInfo_Name_Sakhteman` varchar(20) NOT NULL,
  `vcrEnamadInfo_Telephone_Sabet` varchar(20) NOT NULL,
  `vcrEnamadInfo_Telephone_Hamrah` varchar(20) NOT NULL,
  `vcrEnamadInfo_Email` varchar(50) NOT NULL,
  `vcrEnamadInfo_File_CartMeli` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_Shenasnameh` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_Personal` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_PayanKhedmat` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_AsasName` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_AdsRooznameh` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_AkharinTakhiratManagment` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_AkharinTakhiratSherkat` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_File_AkharinTakhiratSabtiSherkat` varchar(200) DEFAULT NULL,
  `vcrEnamadInfo_Telephone_Hamrah_Confirm` varchar(20) NOT NULL,
  `vcrEnamadInfo_Telephone_Sabet_Confirm` varchar(20) NOT NULL,
  `vcrEnamadInfo_KasboKar_Name_fa` varchar(50) NOT NULL,
  `vcrEnamadInfo_KasboKar_Name_en` varchar(50) NOT NULL,
  `vcrEnamadInfo_KasboKar_Domain_Address` varchar(50) NOT NULL,
  `vcrEnamadInfo_KasboKar_File_Logo` varchar(200) NOT NULL,
  `vcrEnamadInfo_KasboKar_Tozihat` varchar(200) NOT NULL,
  `vcrEnamadInfo_KasboKar_Melk` varchar(20) NOT NULL,
  `vcrEnamadInfo_KasboKar_Type_Activation` varchar(20) NOT NULL,
  `vcrEnamadInfo_KasboKar_KochakVaNopa` varchar(20) NOT NULL,
  `vcrEnamadInfo_KasboKar_Telephone_Sabet` varchar(20) NOT NULL,
  `vcrEnamadInfo_KasboKar_Telephone_Hamrah` varchar(20) NOT NULL,
  `vcrEnamadInfo_KasboKar_Email` varchar(50) NOT NULL,
  `vcrEnamadInfo_KasboKar_Fax` varchar(50) NOT NULL,
  `vcrEnamadInfo_KasboKar_TimeWork` varchar(20) NOT NULL,
  `vcrEnamadInfo_KasboKar_ResponseWork` varchar(20) DEFAULT NULL,
  `vcrEnamadInfo_CodeRahgiri` varchar(50) NOT NULL,
  `vcrEnamadInfo_Name_Sherkat` varchar(50) NOT NULL,
  `vcrEnamadInfo_Sherkat_Manager` varchar(50) NOT NULL,
  `vcrEnamadInfo_Sherkat_Manager_CodeMeli` varchar(20) NOT NULL,
  `vcrEnamadInfo_Sherkat_Manager_Telephone_Hamrah` varchar(20) NOT NULL,
  `vcrEnamadInfo_Sherkat_Manager_Email` varchar(50) NOT NULL,
  `vcrEnamadInfo_Sherkat_VaziatNeshani` varchar(100) NOT NULL,
  `vcrEnamadInfo_CodePeigiri` varchar(50) DEFAULT NULL,
  `vcrEnamadInfo_Status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbenamadinfo`
--

INSERT INTO `tbenamadinfo` (`intEnamadInfoID`, `intUserID`, `vcrEnamadInfo_RequestDate`, `vcrEnamadInfo_Name_Surname`, `vcrEnamadInfo_Name_Surname2`, `vcrEnamadInfo_Name_Surname_en`, `vcrEnamadInfo_Name_Surname2_en`, `vcrEnamadInfo_Name_Father`, `vcrEnamadInfo_CodeMeli`, `vcrEnamadInfo_CodeShenasnameh`, `vcrEnamadInfo_BirthDate`, `vcrEnamadInfo_Gender`, `vcrEnamadInfo_CodePostal`, `vcrEnamadInfo_Ostan`, `vcrEnamadInfo_Shahrestan`, `vcrEnamadInfo_Bakhsh_Mahale_Dehestan`, `vcrEnamadInfo_Bakhsh_Mahale_Dehestan_ex`, `vcrEnamadInfo_Address`, `vcrEnamadInfo_Plack`, `vcrEnamadInfo_Tabaghe`, `vcrEnamadInfo_Shomare_Vahed`, `vcrEnamadInfo_Name_Sakhteman`, `vcrEnamadInfo_Telephone_Sabet`, `vcrEnamadInfo_Telephone_Hamrah`, `vcrEnamadInfo_Email`, `vcrEnamadInfo_File_CartMeli`, `vcrEnamadInfo_File_Shenasnameh`, `vcrEnamadInfo_File_Personal`, `vcrEnamadInfo_File_PayanKhedmat`, `vcrEnamadInfo_File_AsasName`, `vcrEnamadInfo_File_AdsRooznameh`, `vcrEnamadInfo_File_AkharinTakhiratManagment`, `vcrEnamadInfo_File_AkharinTakhiratSherkat`, `vcrEnamadInfo_File_AkharinTakhiratSabtiSherkat`, `vcrEnamadInfo_Telephone_Hamrah_Confirm`, `vcrEnamadInfo_Telephone_Sabet_Confirm`, `vcrEnamadInfo_KasboKar_Name_fa`, `vcrEnamadInfo_KasboKar_Name_en`, `vcrEnamadInfo_KasboKar_Domain_Address`, `vcrEnamadInfo_KasboKar_File_Logo`, `vcrEnamadInfo_KasboKar_Tozihat`, `vcrEnamadInfo_KasboKar_Melk`, `vcrEnamadInfo_KasboKar_Type_Activation`, `vcrEnamadInfo_KasboKar_KochakVaNopa`, `vcrEnamadInfo_KasboKar_Telephone_Sabet`, `vcrEnamadInfo_KasboKar_Telephone_Hamrah`, `vcrEnamadInfo_KasboKar_Email`, `vcrEnamadInfo_KasboKar_Fax`, `vcrEnamadInfo_KasboKar_TimeWork`, `vcrEnamadInfo_KasboKar_ResponseWork`, `vcrEnamadInfo_CodeRahgiri`, `vcrEnamadInfo_Name_Sherkat`, `vcrEnamadInfo_Sherkat_Manager`, `vcrEnamadInfo_Sherkat_Manager_CodeMeli`, `vcrEnamadInfo_Sherkat_Manager_Telephone_Hamrah`, `vcrEnamadInfo_Sherkat_Manager_Email`, `vcrEnamadInfo_Sherkat_VaziatNeshani`, `vcrEnamadInfo_CodePeigiri`, `vcrEnamadInfo_Status`) VALUES
(14, 6, '1398/09/18 11:37:02', 'صفا', '', '', '', 'میر', '2592929525', '2592929525', '1398/09/05', 'مرد', '5484868', 'گیلان', 'رشت', 'دهستان', 'شهرداری دو', 'خیابان - بیستون', '', '', '', '', '0256485996', '029191951', 'sa@info.com', '../file_enamd/6/1398091868039/Tulips.jpg', '../file_enamd/6/1398091840725/13980818_preinvoice.jpg', '', '', NULL, NULL, NULL, NULL, NULL, 'تائید شده', '...', 'شاه کد', 'shah code', 'www', '../file_enamd/6/1398091889366/shahcode-3-300x158.png', 'شبرنامه نویسان', 'مسکونی', 'غیر صنفی', 'خیر', '028259195', 'NULL', 'sa@info.com', '29829825', '8-20', '', '123', 'شاه کد', 'صفا پورتوکلی', '2058592652', '0911585696', 'sa@info.com', 'محل دائمی سکونت | مالک هستم | بیش از یک‌سال و کمتر از دو سال در این مکان هستم', 'NULL', 0),
(15, 6, '1398/09/18 12:03:35', 'ش', '', '', '', 'ش', 'ش', 'ت', '1398/08/28', 'مرد', '5484868', 'گیلان', '5', 'محله', 'شهرداری دو', '555', '5', '5', '5', '5', '0256485996', '029191951', 'sa@info.com', '../file_enamd/6/1398091891408/873185.jpg', '../file_enamd/6/1398091878200/873204.jpg', '', '', NULL, NULL, NULL, NULL, NULL, 'تائید شده', 'تائید شده', 'شاه کد', 'shah code', 'www', '../file_enamd/6/1398091855272/shahcode-3-300x158.png', '55', 'مسکونی', 'غیر صنفی', 'خیر', '028259195', 'NULL', 'sa@info.com', '29829825', '8-20', '', '', 'شاه کد', 'صفا پورتوکلی', '2058592652', '0911585696', 'sa@info.com', 'محل دائمی سکونت | مالک هستم | بیش از یک‌سال و کمتر از دو سال در این مکان هستم', 'NULL', 0),
(16, 22, '1398/09/18 12:36:29', 'علی وطن خواه', '', '', '', 'صفرمحمد', '3392684351', '6231', '1365/06/30', 'مرد', '4167976881', 'گیلان', 'رشت', 'منطقه شهرداری', '1', 'بلوار دیلمان-خیابان دکتر حسابی-بن بست 6 ', '', '3', '3', 'آیدین', '09113337086', '01333734392', 'ali1365vt@yahoo.com', '../file_enamd/22/1398091813173/photo_2019-08-13_10-36-43.jpg', '../file_enamd/22/1398091815405/Untitled444.jpg', '', '../file_enamd/22/1398091858415/Untitled44555.jpg', NULL, NULL, NULL, NULL, NULL, 'تائید شده', 'تائید شده', 'سپید پرواز گیلان', 'sepid parvaz gilan', 'www.spg24.ir', '../file_enamd/22/1398091856100/photo_2017-12-30_13-11-33(1).png', 'سامانه فروش اینترنتی بلیت هواپیما ، هتل و خدمات گردشگری', 'تجاری', 'صنفی', 'خیر', '01332125201', 'NULL', 'sepidparvaz@yahoo.com', '01332130034', '8 الی 24', '', '', 'سپید پرواز گیلان', 'صفرمحمد وطن خواه تربه بر', '10720264827', '09928556100', 'ali1365vt@yahoo.com', 'محل دائمی کار و تجارت | مستاجر هستم | بیش از یک‌سال در این مکان هستم', 'NULL', 0),
(17, 23, '1398/09/26 15:27:57', 'ابوالفضل امین پور', '', '', '', 'علی', '2491398702', '266', '1363/10/27', 'مرد', '3713915718', 'قم', 'قم', 'منطقه شهرداری', '4', 'بلوار امین کوچه 7', '12', 'همکف', '1', 'کیمیا', '09173320650', '02532615485', 'kimia.sono.2019@gmail.com', '../file_enamd/23/1398092696601/20191217_123151.jpg', '../file_enamd/23/1398092650659/20191217_123238.jpg', '../file_enamd/23/1398092684182/20191217_123133.jpg', '../file_enamd/23/1398092694746/20191217_123304.jpg', NULL, NULL, NULL, NULL, NULL, 'تائید شده', 'تائید شده', 'سونوگرافی کیمیا', 'sonogeraphi kimia', 'www.sonographikimia.com', '../file_enamd/23/1398092680835/20191217_140937.jpg', 'سونوگرافی و رادیولوژی', 'اداری', 'صنفی', 'خیر', '02532615485', 'NULL', 'kimia.sono.2019@gmail.com', '02532610000', '8_10', '', '', 'سونوگرافی کیمیا', 'آقای دکتر ابوالفضل امین پور', '2491398702', '09173320650', 'kimia.sono.2019@gmail.com', 'محل دائمی سکونت | مالک هستم | بیش از یک‌سال و کمتر از دو سال در این مکان هستم', 'NULL', 0),
(21, 6, '1398/10/02 12:29:20', 'صفا پورتوکلی', '', '', '', 'میر', '2508522145', '2508522145', '1398/09/03', 'مرد', '5484868', 'گیلان', 'رشت', 'محله', 'شهرداری دو', 'بیستون', '36', 'دوم', '6', 'سوگند', '0256485996', '029191951', 'sa@info.com', '../file_enamd/6/1398100251042/1-1.jpg', '../file_enamd/6/1398100210420/1-2.jpg', '../file_enamd/6/1398100258930/1-3.jpg', '../file_enamd/6/1398100231011/1-4.jpg', '../file_enamd/6/1398100266675/1.jpg', '../file_enamd/6/1398100292657/2.jpg', '../file_enamd/6/1398100229647/3.jpg', '../file_enamd/6/1398100294998/4.jpg', '../file_enamd/6/1398100224839/5.jpg', 'تائید نشده', 'تائید شده', 'شاه کد', 'shah code', 'www', '../file_enamd/6/1398100285947/logo.jpg', 'برنامه نویسان', 'مسکونی', 'غیر صنفی', 'بلی', '029191951', 'NULL', 'sa@info.com', '29829825', '8-21', '10-19', '', 'شاه کد', 'صفا پورتوکلی', '2508522145', '0256485996', 'sa@info.com', 'محل موقت سکونت | مالک هستم | ساکن شهر دیگری هستم', 'NULL', 0),
(22, 23, '1398/10/02 14:08:47', 'سع', '', '', '', 'قبلذرظ', '267884656', '8947687683', '1398/10/02', 'مرد', '65439684', 'قیبلرسظلر', 'ريالسلرُ', 'دهستان', 'رياللٍَُلٌٍب', 'ٍبلٌٍۀفبًٌٍلبفؤ', '6655643645', 'ثقبلشصثل', 'ٌٍَبلصثٌٍُل', 'قثفاشثل', '665548595858', '654988888', '54488777', '../file_enamd/23/1398100219183/.png', '../file_enamd/23/1398100284738/.png', '../file_enamd/23/1398100286742/.png', '../file_enamd/23/1398100284911/.png', '../file_enamd/23/1398100267261/.png', '../file_enamd/23/1398100216231/.png', '../file_enamd/23/1398100250841/.png', '../file_enamd/23/1398100268928/.png', '../file_enamd/23/1398100262509/.png', 'تائید شده', 'تائید شده', 'ثبٌٍَّّ', 'gbedzrgvGV', '25541', '../file_enamd/23/1398100238834/.png', 'RFGavgasVFGAwsV', 'تجاری', 'غیر صنفی', 'خیر', '65414868', 'NULL', '641', '6541', '8الی20', '8الی20', '', 'نساابعقب', 'تبالثصبا', '658898', '54', 'فذظثیذِثذل', 'محل دائمی کار و تجارت | مستاجر هستم | کمتر از یک‌سال در این مکان هستم (بیش از دو ماه)', 'NULL', 0),
(23, 6, '1398/10/03 12:17:00', 'صفا', 'پور', 'safa', 'pour', 'م', '2508522145', '2508522145', '1398/09/05', 'مرد', '5484868', 'گیلان', 'رشت', 'محله', 'شهرداری دو', 'بیستون', '258', 'دوم', '3', 'سوگند', '0256485996', '029191951', 'sa@info.com', '../file_enamd/6/1398100386468/1-1.jpg', '../file_enamd/6/1398100364158/1-2.jpg', '../file_enamd/6/1398100310147/1-3.jpg', '../file_enamd/6/1398100362282/1-4.jpg', '../file_enamd/6/1398100313623/1.jpg', '../file_enamd/6/1398100358509/2.jpg', '../file_enamd/6/1398100327475/3.jpg', '../file_enamd/6/1398100382408/4.jpg', '../file_enamd/6/1398100329179/5.jpg', 'تائید شده', 'تائید شده', 'شاه کد', 'shah code', 'www', '../file_enamd/6/1398100341624/logo.jpg', 'برنامه نویسان', 'مسکونی', 'غیر صنفی', 'بلی', '028259195', 'NULL', 'sa@info.com', '29829825', '8-20', '10-17', '', 'شاه کد', 'صفا پورتوکلی', '2508522145', '0911585696', 'sa@info.com', 'محل موقت سکونت | مالک هستم | ساکن شهر دیگری هستم', 'NULL', 0),
(24, 25, '1398/10/09 10:04:09', 'حمید', 'عبیات', 'hamid', 'abyat', 'خلف', '1987822791', '9505', '1353/06/30', 'مرد', '6198146887', 'خوزستان', 'کارون', 'بخش', 'مرکزی', 'کوت عبدالله کوی شریعتی یک نبش خیابان6', '', '', '', '', '09119896238', '06135551172', 'hamidabyat@gmail.com', '../file_enamd/25/1398100925160/IMG_20170720_112437.jpg', '../file_enamd/25/1398100918051/IMG_20170720_112346.jpg', '../file_enamd/25/1398100950369/IMG_20170720_112745.jpg', '../file_enamd/25/1398100985099/ خدمت.jpg', '../file_enamd/25/1398100998837/abyat_Page_08.jpg', '../file_enamd/25/1398100990222/abyat_Page_04.jpg', '../file_enamd/25/1398100911155/.pdf', '', '', 'تائید شده', '...', 'لاروس پرواز کارون', 'larusparvazkaroon', 'larus24.ir', '../file_enamd/25/1398100968032/WhatsApp Image 2019-12-30 at 09.58.55.jpeg', 'خدمات مسافرت هوائی و فروش بلیط به صورت الکترونیکی', 'تجاری', 'صنفی', 'خیر', '06135551172', 'NULL', 'larusparvaz@gmail.com', '06135553801', '8:30الی20', '8:30الی20', '', 'لاروس پرواز کارون', 'حمید عبیات', '14006878194', '09119896238', 'hamidabyat@gmail.com', 'محل دائمی سکونت | مستاجر هستم | بیش از یک‌سال در این مکان هستم', 'NULL', 0),
(25, 24, '1398/10/09 11:52:20', 'موسی ', 'بهار', 'MOUSA', 'BAHAR', 'دوستین', '3651523470', '1', '1352/01/03', 'مرد', '9973184663', 'سیستان و بلوچستان ', 'چابهار', 'محله', 'کورسر', 'چابهار خیابان شهید فلاحی بین فلاحی 5 و 7', '', '', '', '', '09153450308', '05435334545', 'moussabr@hotmail.com', '../file_enamd/24/1398100940610/ ملی بهار.jpg', '../file_enamd/24/1398100958955/ بهار.jpg', '../file_enamd/24/1398100958858/ عکس.jpg', '../file_enamd/24/1398100945408/ خدمت بهار.jpg', '', '', '', '', '', 'تائید شده', 'تائید شده', 'رفیع پرواز', 'rafieparvaz', 'bahar360.ir', '../file_enamd/24/1398100986523/log.jpg', 'فروش بلیت هواپیما و قطار', 'تجاری', 'صنفی', 'خیر', '05435334545', 'NULL', 'rafie.parvaz@gmail.com', '05435334422', '8 الی 20', '8 الی 20', '', 'دفتر خدمات مسافرت و هوایی رفیع', 'ایران حمودزاده', '3391472502', '09215246539', 'rafie.parvaz@gmail.com', 'محل دائمی سکونت | مالک هستم | بیش از دو سال در این مکان هستم', 'NULL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbinvoices`
--

CREATE TABLE `tbinvoices` (
  `intInvoicesID` int(11) NOT NULL,
  `intUserID` int(11) NOT NULL,
  `vcrInvoicesPublishedDate` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `vcrInvoicesExpertName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `vcrInvoicesImgInvoiceFile` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `vcrInvoicesImgAgreementFile` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `vcrInvoicesImgRecieveFile` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `txtInvoicesDescription` text COLLATE utf8_persian_ci NOT NULL,
  `intInvoiceStatusSeen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbinvoices`
--

INSERT INTO `tbinvoices` (`intInvoicesID`, `intUserID`, `vcrInvoicesPublishedDate`, `vcrInvoicesExpertName`, `vcrInvoicesImgInvoiceFile`, `vcrInvoicesImgAgreementFile`, `vcrInvoicesImgRecieveFile`, `txtInvoicesDescription`, `intInvoiceStatusSeen`) VALUES
(13, 9, '1398/08/02', 'aaa', '../invoice_files/9/13980802074240/20194_3.pdf', '../invoice_files/9/13980802074240/20194_5.pdf', '../invoice_files/9/13980802074240/19975.pdf', 'asd', NULL),
(16, 9, '1398/08/07', 'پورتوکلی', '../invoice_files/9/13980807074847/20190906_shk_stellenausschreibung.pdf', '../invoice_files/9/13980807074847/20194.pdf', '../invoice_files/9/13980807074847/20190906_shk_stellenausschreibung.pdf', 'gggg', 0),
(18, 6, '1398/08/07', 'پورتوکلی', '../invoice_files/6/13980807063024/arbeitsplatzsuche-f-data.pdf', '../invoice_files/6/13980807063024/wiss1907-02_botanisches_institut_ceplas_ag_bucherwiederh.pdf', '../invoice_files/6/13980807063024/BI_Faculty_Coordinator_2019_08_21.pdf', 'صدور فاکتور', 1),
(19, 6, '1398/08/28', 'پورتوکلی', '../invoice_files/6/13980828064356/19975.pdf', '../invoice_files/6/13980828064356/wiss1907-02_botanisches_institut_ceplas_ag_bucherwiederh.pdf', '../invoice_files/6/13980828064356/Bergner_wiMA_230819_377.pdf', 'صدور فاکتور', 1),
(21, 17, '1398/09/19', 'قثلقفا', '../invoice_files/17/13980919065048/New Microsoft Word Document.pdf', '../invoice_files/17/13980919065048/New Microsoft Word Document.pdf', '../invoice_files/17/13980919065048/New Microsoft Word Document.pdf', 'قشبشق', 0),
(26, 21, '1398/09/05', 'قثشبلش', '../invoice_files/21/13980905065439/New Microsoft Word Document.pdf', '../invoice_files/21/13980905065439/New Microsoft Word Document.pdf', '../invoice_files/21/13980905065439/New Microsoft Word Document.pdf', 'شصثب', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbipuser`
--

CREATE TABLE `tbipuser` (
  `intIPUserID` int(11) NOT NULL,
  `intUserID` int(11) NOT NULL,
  `vcrIPUserAddress` varchar(200) NOT NULL,
  `vcrIPUserOS` varchar(50) DEFAULT NULL,
  `vcrIPUserBrowser` varchar(50) DEFAULT NULL,
  `vcrIPUserDevice` varchar(100) DEFAULT NULL,
  `datIPUserEntryDateTime` datetime NOT NULL,
  `vcrIPUserEntryDateTime` varchar(20) DEFAULT NULL,
  `vcrIPUserLocation` varchar(100) DEFAULT NULL,
  `intIPUserStatusOnline` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbipuser`
--

INSERT INTO `tbipuser` (`intIPUserID`, `intUserID`, `vcrIPUserAddress`, `vcrIPUserOS`, `vcrIPUserBrowser`, `vcrIPUserDevice`, `datIPUserEntryDateTime`, `vcrIPUserEntryDateTime`, `vcrIPUserLocation`, `intIPUserStatusOnline`) VALUES
(1, 6, '::1', NULL, NULL, NULL, '2019-11-16 11:13:55', '1398/08/27 10:55:41', 'NULL', 1),
(2, 8, '::1', NULL, NULL, NULL, '2019-11-16 12:21:49', '1398/08/27 10:55:42', 'NULL', 1),
(3, 6, '::1', NULL, NULL, NULL, '2019-11-16 13:22:08', '1398/08/27 10:55:43', 'NULL', 1),
(4, 6, '::1', NULL, NULL, NULL, '2019-11-16 13:24:26', '1398/08/27 10:55:44', 'NULL', 1),
(5, 6, '::1', NULL, NULL, NULL, '2019-11-18 08:51:06', '1398/08/27 10:55:45', 'NULL', 1),
(6, 6, '::1', NULL, NULL, NULL, '2019-11-18 09:03:40', '1398/08/27 11:33:40', 'NULL', 1),
(7, 6, '::1', NULL, NULL, NULL, '2019-11-18 10:32:35', '1398/08/27 13:02:35', 'NULL', 1),
(8, 6, '::1', NULL, NULL, NULL, '2019-11-18 10:42:16', '1398/08/27 13:12:16', 'NULL', 1),
(9, 6, '::1', NULL, NULL, NULL, '2019-11-18 11:19:49', '1398/08/27 13:49:49', 'NULL', 1),
(10, 6, '::1', NULL, NULL, NULL, '2019-11-27 09:06:51', '1398/09/06 11:36:51', 'NULL', 1),
(11, 8, '::1', NULL, NULL, NULL, '2019-11-27 10:04:47', '1398/09/06 12:34:47', 'NULL', 1),
(12, 6, '94.183.35.138', NULL, NULL, NULL, '2019-11-27 12:34:22', '1398/09/06 16:04:22', 'NULL', 1),
(13, 6, '5.235.196.29', NULL, NULL, NULL, '2019-11-27 20:10:53', '1398/09/06 23:40:53', 'NULL', 1),
(14, 6, '5.235.196.29', NULL, NULL, NULL, '2019-11-27 20:24:50', '1398/09/06 23:54:50', 'NULL', 1),
(15, 6, '2.183.86.141', NULL, NULL, NULL, '2019-11-28 12:43:17', '1398/09/07 16:13:17', 'NULL', 1),
(16, 6, '93.117.31.176', NULL, NULL, NULL, '2019-11-29 13:13:07', '1398/09/08 16:43:07', 'NULL', 1),
(17, 6, '91.121.219.62', NULL, NULL, NULL, '2019-11-30 05:13:06', '1398/09/09 08:43:06', 'NULL', 1),
(18, 6, '91.121.219.62', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 08:13:14', '1398/09/09 11:43:14', 'NULL', 1),
(19, 6, '91.121.219.62', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 09:18:18', '1398/09/09 12:48:18', 'NULL', 1),
(20, 6, '94.183.35.138', 'Android', 'Handheld Browser', 'Mobile', '2019-11-30 09:20:15', '1398/09/09 12:50:15', 'NULL', 1),
(21, 6, '94.183.35.138', 'iPhone', 'Handheld Browser', 'Mobile', '2019-11-30 09:22:22', '1398/09/09 12:52:22', 'NULL', 1),
(22, 6, '94.183.35.138', 'iPhone', 'Handheld Browser', 'Mobile', '2019-11-30 09:27:03', '1398/09/09 12:57:03', 'NULL', 1),
(23, 6, '91.121.219.62', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 09:28:18', '1398/09/09 12:58:18', 'NULL', 1),
(24, 6, '94.183.35.138', 'Windows 10', 'Chrome', 'Computer', '2019-11-30 09:29:55', '1398/09/09 12:59:55', 'NULL', 1),
(25, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 09:55:04', '1398/09/09 13:25:04', 'NULL', 1),
(26, 6, '91.121.219.62', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 09:55:32', '1398/09/09 13:25:32', 'NULL', 1),
(27, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 10:27:22', '1398/09/09 13:57:22', 'NULL', 1),
(28, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 11:02:00', '1398/09/09 14:32:00', 'NULL', 1),
(29, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-11-30 11:46:25', '1398/09/09 15:16:25', 'NULL', 1),
(30, 6, '151.235.201.188', 'Windows 8.1', 'Chrome', 'Computer', '2019-12-01 05:03:09', '1398/09/10 08:33:09', 'NULL', 1),
(31, 6, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-01 05:04:50', '1398/09/10 08:34:50', 'NULL', 1),
(32, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-01 05:30:16', '1398/09/10 09:00:16', 'NULL', 1),
(33, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-01 05:50:42', '1398/09/10 09:20:42', 'NULL', 1),
(34, 6, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-01 07:00:20', '1398/09/10 10:30:20', 'NULL', 1),
(35, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-01 07:14:11', '1398/09/10 10:44:11', 'NULL', 1),
(36, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-01 07:53:34', '1398/09/10 11:23:34', 'NULL', 1),
(37, 6, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-01 09:57:37', '1398/09/10 13:27:37', 'NULL', 1),
(38, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-01 12:18:53', '1398/09/10 15:48:53', 'NULL', 1),
(39, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-02 05:31:58', '1398/09/11 09:01:58', 'NULL', 1),
(40, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-02 12:01:03', '1398/09/11 15:31:03', 'NULL', 1),
(41, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-03 04:42:10', '1398/09/12 08:12:10', 'NULL', 1),
(42, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-03 04:43:06', '1398/09/12 08:13:06', 'NULL', 1),
(43, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-03 05:29:23', '1398/09/12 08:59:23', 'NULL', 1),
(44, 6, '94.183.35.138', 'Windows 10', 'Chrome', 'Computer', '2019-12-03 06:31:47', '1398/09/12 10:01:47', 'NULL', 1),
(45, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-03 07:23:46', '1398/09/12 10:53:46', 'NULL', 1),
(46, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-03 11:00:02', '1398/09/12 14:30:02', 'NULL', 1),
(47, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-03 11:11:21', '1398/09/12 14:41:21', 'NULL', 1),
(48, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-04 05:21:50', '1398/09/13 08:51:50', 'NULL', 1),
(49, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-04 07:42:25', '1398/09/13 11:12:25', 'NULL', 1),
(50, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-04 09:04:43', '1398/09/13 12:34:43', 'NULL', 1),
(51, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-04 11:08:52', '1398/09/13 14:38:52', 'NULL', 1),
(52, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-07 05:01:44', '1398/09/16 08:31:44', 'NULL', 1),
(53, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-07 06:26:38', '1398/09/16 09:56:38', 'NULL', 1),
(54, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-07 06:30:09', '1398/09/16 10:00:09', 'NULL', 1),
(55, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-07 09:03:07', '1398/09/16 12:33:07', 'NULL', 1),
(56, 6, '185.176.32.61', 'Windows 8', 'Firefox', 'Computer', '2019-12-09 04:48:53', '1398/09/18 08:18:53', 'NULL', 1),
(57, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-09 06:16:25', '1398/09/18 09:46:25', 'NULL', 1),
(58, 6, '185.176.32.61', 'Windows 8', 'Firefox', 'Computer', '2019-12-09 08:44:11', '1398/09/18 12:14:11', 'NULL', 1),
(59, 6, '185.176.32.61', 'Windows 8', 'Firefox', 'Computer', '2019-12-09 08:45:22', '1398/09/18 12:15:22', 'NULL', 1),
(60, 22, '5.121.216.147', 'Windows 7', 'Firefox', 'Computer', '2019-12-09 08:50:15', '1398/09/18 12:20:15', 'NULL', 1),
(61, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-09 09:57:10', '1398/09/18 13:27:10', 'NULL', 1),
(62, 6, '185.176.32.61', 'Windows 8', 'Firefox', 'Computer', '2019-12-10 04:44:55', '1398/09/19 08:14:55', 'NULL', 1),
(63, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-10 11:28:07', '1398/09/19 14:58:07', 'NULL', 1),
(64, 6, '185.176.32.61', 'Windows 8', 'Firefox', 'Computer', '2019-12-11 04:59:14', '1398/09/20 08:29:14', 'NULL', 1),
(65, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-11 10:29:32', '1398/09/20 13:59:32', 'NULL', 1),
(66, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-11 11:18:32', '1398/09/20 14:48:32', 'NULL', 1),
(67, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-11 11:24:59', '1398/09/20 14:54:59', 'NULL', 1),
(68, 6, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-14 05:19:46', '1398/09/23 08:49:46', 'NULL', 1),
(69, 6, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-15 04:57:51', '1398/09/24 08:27:51', 'NULL', 1),
(70, 6, '185.176.32.61', 'Windows 10', 'Chrome', 'Computer', '2019-12-15 05:04:50', '1398/09/24 08:34:50', 'NULL', 1),
(71, 6, '185.176.32.61', 'Windows 10', 'Chrome', 'Computer', '2019-12-15 06:06:24', '1398/09/24 09:36:24', 'NULL', 1),
(72, 6, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-15 06:38:56', '1398/09/24 10:08:56', 'NULL', 1),
(73, 22, '5.121.130.216', 'Windows 7', 'Firefox', 'Computer', '2019-12-15 09:07:31', '1398/09/24 12:37:31', 'NULL', 1),
(74, 6, '185.176.32.61', 'Windows 10', 'Chrome', 'Computer', '2019-12-16 10:34:28', '1398/09/25 14:04:28', 'NULL', 1),
(75, 23, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-16 11:02:35', '1398/09/25 14:32:35', 'NULL', 1),
(76, 23, '2.187.188.163', 'Windows 7', 'Firefox', 'Computer', '2019-12-17 05:41:32', '1398/09/26 09:11:32', 'NULL', 1),
(77, 23, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-17 07:16:12', '1398/09/26 10:46:12', 'NULL', 1),
(78, 23, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-17 08:38:18', '1398/09/26 12:08:18', 'NULL', 1),
(79, 23, '2.187.188.163', 'Windows 7', 'Firefox', 'Computer', '2019-12-17 09:00:16', '1398/09/26 12:30:16', 'NULL', 1),
(80, 23, '185.176.32.23', 'Windows 7', 'Firefox', 'Computer', '2019-12-17 10:25:45', '1398/09/26 13:55:45', 'NULL', 1),
(81, 23, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-17 10:56:39', '1398/09/26 14:26:39', 'NULL', 1),
(82, 23, '185.176.32.23', 'Windows 7', 'Firefox', 'Computer', '2019-12-17 11:45:51', '1398/09/26 15:15:51', 'NULL', 1),
(83, 23, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2019-12-17 11:59:57', '1398/09/26 15:29:57', 'NULL', 1),
(84, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-22 11:24:40', '1398/10/01 14:54:40', 'NULL', 1),
(85, 6, '185.176.32.61', 'Windows 8', 'Firefox', 'Computer', '2019-12-23 05:05:21', '1398/10/02 08:35:21', 'NULL', 1),
(86, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-23 05:34:56', '1398/10/02 09:04:56', 'NULL', 1),
(87, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-23 07:54:01', '1398/10/02 11:24:01', 'NULL', 1),
(88, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-23 09:15:17', '1398/10/02 12:45:17', 'NULL', 1),
(89, 23, '185.176.32.61', 'Windows 8', 'Firefox', 'Computer', '2019-12-23 10:32:41', '1398/10/02 14:02:41', 'NULL', 1),
(90, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-24 08:18:34', '1398/10/03 11:48:34', 'NULL', 1),
(91, 6, '94.183.35.138', 'Windows 10', 'Firefox', 'Computer', '2019-12-24 08:21:39', '1398/10/03 11:51:39', 'NULL', 1),
(92, 25, '94.101.134.55', 'Windows 7', 'Firefox', 'Computer', '2019-12-30 06:20:35', '1398/10/09 09:50:35', 'NULL', 1),
(93, 24, '95.162.208.101', 'Android', 'Handheld Browser', 'Mobile', '2019-12-30 07:25:40', '1398/10/09 10:55:40', 'NULL', 1),
(94, 24, '2.181.162.54', 'Windows XP', 'Chrome', 'Computer', '2019-12-30 07:38:04', '1398/10/09 11:08:04', 'NULL', 1),
(95, 6, '94.183.35.138', 'Windows 10', 'Chrome', 'Computer', '2020-01-14 08:58:14', '1398/10/24 12:28:14', 'NULL', 1),
(96, 6, '94.183.35.138', 'Windows 10', 'Chrome', 'Computer', '2020-01-20 09:43:22', '1398/10/30 13:13:22', 'NULL', 1),
(97, 6, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2020-01-20 09:55:58', '1398/10/30 13:25:58', 'NULL', 1),
(98, 23, '94.183.35.138', 'Windows 8', 'Firefox', 'Computer', '2020-01-20 09:56:47', '1398/10/30 13:26:47', 'NULL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `comment_sender_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 'سلام', 'صفا', '2019-10-13 06:49:08'),
(2, 0, 'درود بر شما', 'وفا', '2019-10-13 06:49:52'),
(3, 0, 'علیه سلام', 'محمد', '2019-10-13 06:50:28'),
(4, 3, 'سلام', 'دوم', '2019-10-13 07:22:20'),
(5, 1, 'خداحافظ', 'علی', '2019-10-13 07:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbpreinvoices`
--

CREATE TABLE `tbpreinvoices` (
  `intPreInvoiceID` int(11) NOT NULL,
  `intUserID` int(11) NOT NULL,
  `vcrPreInvoiceDate` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `vcrPreInvoiceExpert` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `vcrPreInvoiceFilePath` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `bitPreInvoiceConfirmation` tinyint(1) NOT NULL DEFAULT 0,
  `vcrPreInvoiceConfirmationDate` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `txtPreInvoiceDescription` text COLLATE utf8_persian_ci NOT NULL,
  `intPreInvoiceStatusSeen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbpreinvoices`
--

INSERT INTO `tbpreinvoices` (`intPreInvoiceID`, `intUserID`, `vcrPreInvoiceDate`, `vcrPreInvoiceExpert`, `vcrPreInvoiceFilePath`, `bitPreInvoiceConfirmation`, `vcrPreInvoiceConfirmationDate`, `txtPreInvoiceDescription`, `intPreInvoiceStatusSeen`) VALUES
(17, 9, '1398/08/20', 'پورتوکلی', '../pre_invoice_files/9/13980820085921/13980818_preinvoice.jpg', 0, '', 'پیش فاکتور\r\nپیش فاکتور رزرواسیون، نصب و راه اندازی', 0),
(19, 9, '1398/08/21', 'پورتوکلی', '../pre_invoice_files/9/13980821104334/Tulips.jpg', 1, '1398/09/10 09:45:53', 'با قیمت مناسب', 0),
(21, 9, '1398/08/18', 'aaa', '../pre_invoice_files/9/13980818065742/Tulips.jpg', 0, '', 'ssss', 0),
(22, 9, '1398/08/14', 'پورتوکلی', '../pre_invoice_files/9/13980814074206/Tulips.jpg', 0, '', 'qweqweqwe', 0),
(25, 6, '1398/08/07', 'پورتوکلی', '../pre_invoice_files/6/13980807064141/13980818_preinvoice.jpg', 0, '', 'فایل عکس', 1),
(26, 6, '1398/08/22', 'پورتوکلی', '../pre_invoice_files/6/13980822060032/BI_Presidency_2019_08_08.pdf', 1, '1398/09/18 20:37:10', 'aaaa', 1),
(28, 6, '1398/08/13', 'پورتوکلی', '../pre_invoice_files/6/13980813062320/BI_Presidency_2019_08_08.pdf', 0, NULL, 'aaaaa', 1),
(29, 6, '1398/08/22', 'ششش', '../pre_invoice_files/6/13980822062349/873185.jpg', 1, '1398/09/11 08:37:43', 'aaaaedfsdgf', 1),
(30, 6, '1398/08/07', 'پورتوکلی', '../pre_invoice_files/6/13980807062528/New Microsoft Word Document.docx', 0, '', 'wqtwehrsrthh', 1),
(31, 17, '1398/09/13', 'قثلقفا', '../pre_invoice_files/17/13980913065012/New Microsoft Word Document.pdf', 0, NULL, 'اقفسط', 0),
(32, 21, '1398/09/26', 'لقفسل', '../pre_invoice_files/21/13980926065417/New Microsoft Word Document.pdf', 0, NULL, 'ثقلث', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbproducts`
--

CREATE TABLE `tbproducts` (
  `intProductID` int(11) NOT NULL,
  `intUserID` int(11) NOT NULL,
  `vcrProductName` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `vcrAgreementProduct` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `vcrStartDateProductActivity` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `vcrEndDateProductActivity` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `intProductStatusSeen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbproducts`
--

INSERT INTO `tbproducts` (`intProductID`, `intUserID`, `vcrProductName`, `vcrAgreementProduct`, `vcrStartDateProductActivity`, `vcrEndDateProductActivity`, `intProductStatusSeen`) VALUES
(1, 6, 'رزرواسیون 222', '5289746', '1398/06/05', '1399/06/05', 0),
(2, 6, 'اتوماسیون', '8595148', '1398/06/05', '1399/06/05', NULL),
(3, 8, 'رزرواسیون', '529859624', '1398/07/25', '1399/07/25', NULL),
(4, 8, 'سامانه مدیریت', '6285635', '1398/06/05', '1399/01/05', NULL),
(9, 8, 'رزرواسیون', '52985958646', '1395/07/25', '1396/07/25', NULL),
(15, 9, 'سامانه مدیریت', '2569756', '1398/08/13', '1398/08/19', NULL),
(19, 6, 'درست شد', '2354365', '1398/08/12', '1398/08/28', 0),
(20, 6, 'اخرین ویرایش', '9689966', '1397/09/04', '1398/09/10', 0),
(21, 17, 'هاست', '252', '1398/09/03', '1398/09/28', 0),
(22, 21, 'ثب', '6984', '1398/09/02', '1398/09/28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbsupport`
--

CREATE TABLE `tbsupport` (
  `intSupportID` int(11) NOT NULL,
  `intSupportParentID` int(11) NOT NULL,
  `intAdminID` int(11) DEFAULT NULL,
  `intUserID` int(11) DEFAULT NULL,
  `vcrSupportSubject` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `intSupportPriority` int(4) DEFAULT NULL,
  `txtSupportComment` text COLLATE utf8_persian_ci NOT NULL,
  `datSupportDateTime` datetime DEFAULT NULL,
  `vcrSupportDateTime` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `vcrSupportFile` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `intSupportDownloadCount` int(11) DEFAULT 0,
  `vcrBarcode` varchar(13) COLLATE utf8_persian_ci DEFAULT NULL,
  `intUserRelID` int(11) NOT NULL,
  `intSupportStatus` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbsupport`
--

INSERT INTO `tbsupport` (`intSupportID`, `intSupportParentID`, `intAdminID`, `intUserID`, `vcrSupportSubject`, `intSupportPriority`, `txtSupportComment`, `datSupportDateTime`, `vcrSupportDateTime`, `vcrSupportFile`, `intSupportDownloadCount`, `vcrBarcode`, `intUserRelID`, `intSupportStatus`) VALUES
(199, 0, NULL, 6, 'خرابی سیستم', 2, 'لطفا در اسرع وقت به سیستم های ما رسیدگی کنید.', '2019-11-11 13:20:50', NULL, NULL, 0, '1398082015477', 2, 2),
(200, 0, NULL, 6, 'دعوتنامه برای شرکت', 3, 'شما را دعوت کردیم. لطفا تشریف بیاورید.', '2019-11-11 13:22:32', '1398/08/26 19:33:37', NULL, 0, '1398082053991', 16, 2),
(201, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'چشم، ممنون', '2019-11-11 13:23:16', NULL, NULL, 0, NULL, 16, 0),
(202, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'چشم2', '2019-11-16 07:51:22', NULL, NULL, 0, NULL, 16, 0),
(203, 200, NULL, 6, 'دعوتنامه برای شرکت', 3, 'سپاس', '2019-11-16 08:01:28', NULL, NULL, 0, NULL, 16, 0),
(204, 199, 1, NULL, 'خرابی سیستم', 2, 'aaaa', '2019-11-16 10:12:47', NULL, NULL, 0, NULL, 2, 0),
(205, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'aaaa', '2019-11-16 10:13:02', NULL, NULL, 0, NULL, 16, 0),
(206, 199, 1, NULL, 'خرابی سیستم', 2, 'bbbbbb', '2019-11-16 10:20:21', NULL, NULL, 0, NULL, 2, 0),
(207, 200, NULL, 6, 'دعوتنامه برای شرکت', 3, '2222', '2019-11-16 10:21:02', NULL, NULL, 0, NULL, 16, 0),
(208, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'asd', '2019-11-17 16:41:19', 'aa', NULL, 0, NULL, 16, 0),
(209, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'asaf', '2019-11-17 16:41:54', '1398/8/26', NULL, 0, NULL, 16, 0),
(210, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'ad', '2019-11-17 16:45:12', '1398/8/26۱۹:۱۵:۱۲', NULL, 0, NULL, 16, 0),
(211, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'sfsfd', '2019-11-17 16:46:00', 'Array۱۹۱۶۰۰', NULL, 0, NULL, 16, 0),
(212, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'asfasf', '2019-11-17 16:46:16', '1398 8 26۱۹۱۶۱۶', NULL, 0, NULL, 16, 0),
(213, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'aadsd', '2019-11-17 16:48:01', '1398 8 26191801', NULL, 0, NULL, 16, 0),
(214, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'asda', '2019-11-17 16:53:21', '۱۳۹۸۰۸۲۶۱۹۲۳۲۱', NULL, 0, NULL, 16, 0),
(215, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'asdad', '2019-11-17 16:54:08', '13980826192408', NULL, 0, NULL, 16, 0),
(216, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'jh', '2019-11-17 16:59:38', '13980826192938', NULL, 0, NULL, 16, 0),
(217, 200, 1, NULL, 'دعوتنامه برای شرکت', 3, 'yufjyb', '2019-11-17 17:03:37', '1398/08/26 19:33:37', NULL, 0, NULL, 16, 0),
(218, 199, 1, NULL, 'خرابی سیستم', 2, 'asdad', '2019-11-17 17:12:15', '1398/08/26 19:42:15', NULL, 0, NULL, 2, 0),
(219, 0, NULL, 6, 'eeee', 1, 'rrrrr', '2019-11-18 09:08:31', '1398/08/27 11:38:31', '../file/6/20194_2.pdf', 0, '1398082751285', 1, 2),
(220, 219, NULL, 6, 'eeee', 1, 'aaa', '2019-11-18 09:17:45', '1398/08/27 11:38:45', NULL, 0, NULL, 1, 0),
(221, 219, NULL, 6, 'eeee', 1, 'sfsfd', '2019-11-18 09:44:57', '1398/08/27 12:14:57', NULL, 0, NULL, 1, 0),
(222, 199, NULL, 6, 'خرابی سیستم', 2, 'www', '2019-11-18 09:48:51', '1398/08/27 12:18:51', NULL, 0, NULL, 2, 0),
(223, 0, NULL, 6, 'asdasdasd', 3, 'asdasdasd', '2019-11-27 09:07:53', '1398/09/06 11:37:53', '../file/6/20194_5.pdf', 1, '1398090653329', 33, 2),
(224, 0, NULL, 6, 'asdasd', 2, 'asdasd', '2019-11-27 09:36:31', '1398/09/06 12:06:31', '../file/6/1398090658386/19975.pdf', 1, '1398090658386', 31, 2),
(225, 0, NULL, 6, 'asfaf', 3, 'adsfs', '2019-11-27 09:42:15', '1398/09/06 12:12:15', '../file/6/1398090612755/BI_Faculty_Coordinator_2019_08_21.pdf', 4, '1398090612755', 2, 2),
(226, 200, NULL, 6, 'دعوتنامه برای شرکت', 3, 'کاربر', '2019-11-27 10:00:57', '1398/09/06 12:30:57', NULL, 0, NULL, 16, 0),
(227, 0, NULL, 8, 'sdadsfnbfs', 4, 'cgmhcgm', '2019-11-27 10:05:04', '1398/09/06 12:35:04', '../file/8/1398090689732/20194_5.pdf', 2, '1398090689732', 4, 0),
(228, 227, NULL, 8, 'sdadsfnbfs', 4, 'سلام', '2019-11-27 12:31:06', '1398/09/06 15:01:06', NULL, 0, NULL, 4, 0),
(229, 0, NULL, 6, 'دیتیا', 3, 'ویووزوزووزکزککزووزک\r\nطاایازتز\r\nوزوزوبتب\r\nویویویویتیت\r\nکستیتیت', '2019-11-28 12:50:46', '1398/09/07 16:20:46', NULL, 0, '1398090760218', 16, 2),
(230, 0, NULL, 6, 'درخواست سیستم اتوماسیون', 3, 'با سلام و خسته نباشید جناب آقای ...\r\nاینجانب خواهان برنامه ی سیتم اتوماسیون برای فرودگاه نیازمندیم و لطفا هر چه سریعتر این اقدام را برایمان فراهم نمایید.\r\nبا تشکر و ارادتمند شما.\r\n', '2019-11-28 12:56:15', '1398/09/07 16:26:15', NULL, 0, '1398090719253', 32, 2),
(231, 0, NULL, 6, 'درخواست سرور', 2, 'با سلام و خسته نباشید جناب آقای ...\r\nاینجانب ... از شما تشکر میکنم  و همیشه موفق و پیروز باشید.\r\nما نیاز به شبکه داریم و لطفا برایمان فراهم نمایید.\r\nلطفا با شماره ای که قید کردم هماهنگ فرمایید.\r\nبا تشکر و ارادتمند شما.\r\n', '2019-11-28 13:01:20', '1398/09/07 16:31:20', NULL, 0, '1398090776092', 2, 2),
(232, 231, NULL, 6, 'درخواست سرور', 2, 'لازم به ذکر است ، ما آخر این ماه به اینترنت نیاز داریم.', '2019-11-28 13:03:29', '1398/09/07 16:33:29', NULL, 0, NULL, 2, 0),
(233, 230, 1, NULL, 'درخواست سیستم اتوماسیون', 3, 'سلام\r\nچشم ، به زودی خدمات اتوماسیون را برای شما راه اندازی میکنیم.', '2019-11-28 13:17:34', '1398/09/07 16:47:34', NULL, 0, NULL, 32, 0),
(234, 0, NULL, 6, 'فاکتور مربوط به سیستم رزرواسیون', 2, 'با سلام\r\nلطفا فاکتور مربوط به سیستم رزرواسیون را مجدد برای ما ارسال نمائید.\r\nبا تشکر', '2019-11-30 08:21:08', '1398/09/09 11:51:08', NULL, 0, '1398090969605', 32, 2),
(235, 234, 1, NULL, 'فاکتور مربوط به سیستم رزرواسیون', 2, 'سلام \r\nچشم ، ارسال شد.', '2019-11-30 08:33:25', '1398/09/09 12:03:25', NULL, 0, NULL, 32, 0),
(236, 231, 1, NULL, 'درخواست سرور', 2, '\r\nسلام\r\nچشم\r\nانجام وظیفه می شود.\r\n', '2019-11-30 09:07:29', '1398/09/09 12:37:29', NULL, 0, NULL, 2, 0),
(237, 0, NULL, 6, 'فاکتور مربوط به نصب برنامه', 2, 'سلام', '2019-11-30 11:05:20', '1398/09/09 14:35:20', '../file/6/1398090924957/19975.pdf', 2, '1398090924957', 2, 2),
(238, 237, NULL, 6, 'فاکتور مربوط به نصب برنامه', 2, 'سریع', '2019-11-30 11:06:28', '1398/09/09 14:36:28', NULL, 0, NULL, 2, 0),
(239, 237, 1, NULL, 'فاکتور مربوط به نصب برنامه', 2, 'چشم', '2019-11-30 11:28:21', '1398/09/09 14:58:21', NULL, 0, NULL, 2, 0),
(240, 0, NULL, 6, 'درخواست هاست', 4, 'لطفا اقدامات لازم را مبذول بفمایید\r\n', '2019-12-01 05:41:09', '1398/09/10 09:11:09', '../file/6/1398091083954/New Microsoft Word Document.pdf', 1, '1398091083954', 35, 2),
(241, 0, NULL, 6, 'دستگاه اثر انگشت', 3, 'سلام ', '2019-12-01 07:01:31', '1398/09/10 10:31:31', '../file/6/1398091080913/New Microsoft Word Document.pdf', 0, '1398091080913', 35, 2),
(242, 0, NULL, 6, 'adasd', 1, 'asda', '2019-12-02 10:09:30', '1398/09/11 13:39:30', NULL, 0, '1398091198986', 2, 2),
(243, 0, NULL, 6, 'adafa', 2, 'adfsa', '2019-12-02 10:13:21', '1398/09/11 13:43:21', NULL, 0, '1398091191387', 2, 2),
(244, 0, NULL, 6, 'aefsf', 1, 'svZxz', '2019-12-02 10:13:54', '1398/09/11 13:43:54', NULL, 0, '1398091131388', 31, 2),
(245, 0, NULL, 6, 'safdsgs', 2, 'sdsf', '2019-12-02 10:40:07', '1398/09/11 14:10:07', NULL, 0, '1398091112747', 31, 2),
(246, 0, NULL, 6, 'ddj', 2, 'gghkgfgk', '2019-12-03 04:43:41', '1398/09/12 08:13:41', NULL, 0, '1398091286065', 16, 2),
(247, 0, NULL, 6, 'zddfhtrsh', 3, 'fxjfgj', '2019-12-03 04:44:11', '1398/09/12 08:14:11', NULL, 0, '1398091283285', 2, 2),
(248, 0, NULL, 6, 'asfaf', 2, 'dsh', '2019-12-03 05:15:49', '1398/09/12 08:45:49', NULL, 0, '1398091277398', 32, 2),
(249, 0, NULL, 6, 'ssdf', 2, 'fgh', '2019-12-03 05:16:03', '1398/09/12 08:46:03', NULL, 0, '1398091276124', 2, 2),
(250, 0, NULL, 6, 'RGSH', 2, 'ASDASD', '2019-12-03 06:42:12', '1398/09/12 10:12:12', NULL, 0, '1398091229881', 16, 2),
(251, 230, NULL, 6, 'درخواست سیستم اتوماسیون', 3, 'ممنون', '2019-12-03 07:29:41', '1398/09/12 10:59:41', NULL, 0, NULL, 32, 0),
(252, 0, NULL, 6, 'پشتیبانی', 1, 'سلام', '2019-12-04 00:00:00', '1398/09/13 12:36:19', NULL, 0, '1398091323366', 33, 2),
(253, 252, NULL, 6, 'پشتیبانی', 1, 'ssss', '2019-12-04 09:11:44', '1398/09/13 12:41:44', NULL, 0, NULL, 33, 0),
(254, 252, NULL, 6, 'پشتیبانی', 1, 'aaa', '2019-12-04 09:22:00', '1398/09/13 12:52:00', NULL, 0, NULL, 33, 0),
(255, 0, NULL, 6, 'پشتیبانی 2', 1, 'ssss', '2019-12-04 00:00:00', '1398/09/13 12:52:22', NULL, 0, '1398091367050', 39, 2),
(256, 255, NULL, 6, 'پشتیبانی 2', 1, 'aaa', '2019-12-04 00:00:00', '1398/09/13 13:04:54', NULL, 0, NULL, 39, 0),
(257, 255, NULL, 6, 'پشتیبانی 2', 1, 'aaa', '2019-12-04 00:00:00', '1398/09/13 13:10:56', NULL, 0, NULL, 39, 0),
(258, 255, NULL, 6, 'پشتیبانی 2', 1, 'ssd', '2019-12-04 00:00:00', '1398/09/13 13:16:46', NULL, 0, NULL, 39, 0),
(259, 255, NULL, 6, 'پشتیبانی 2', 1, 'aaa', '2019-12-04 00:00:00', '1398/09/13 13:23:01', NULL, 0, NULL, 39, 0),
(260, 0, NULL, 6, 'جدید', 2, '25895958686', '2019-12-04 00:00:00', '1398/09/13 13:31:41', '', 0, '1398091312183', 40, 2),
(261, 260, NULL, 6, 'جدید', 2, 'فرستاده شد', '2019-12-04 00:00:00', '1398/09/13 13:41:16', NULL, 0, NULL, 40, 0),
(262, 260, NULL, 6, 'جدید', 2, 'ممنون', '2019-12-04 00:00:00', '1398/09/13 13:44:02', NULL, 0, NULL, 40, 0),
(263, 260, NULL, 6, 'جدید', 2, 'ذذذ', '2019-12-04 00:00:00', '1398/09/13 13:46:43', NULL, 0, NULL, 40, 0),
(264, 260, NULL, 6, 'جدید', 2, 'ss', '2019-12-04 00:00:00', '1398/09/13 13:50:58', NULL, 0, NULL, 40, 0),
(265, 260, NULL, 6, 'جدید', 2, 'aaa', '2019-12-04 00:00:00', '1398/09/13 13:51:50', NULL, 0, NULL, 40, 0),
(266, 260, NULL, 6, 'جدید', 2, 'a', '2019-12-04 00:00:00', '1398/09/13 13:52:02', NULL, 0, NULL, 40, 0),
(267, 260, NULL, 6, 'جدید', 2, 's', '2019-12-04 00:00:00', '1398/09/13 13:54:20', NULL, 0, NULL, 40, 0),
(268, 0, NULL, 6, 'فایل', 1, 'فایل', '2019-12-04 00:00:00', '1398/09/13 14:41:11', '../file/6/1398091349666/20194_5.pdf', 1, '1398091349666', 40, 2),
(269, 0, NULL, 6, 'ذ', 1, 'ذ', '2019-12-04 00:00:00', '1398/09/13 14:47:38', ' . $target_file . ', 0, '1398091318931', 39, 2),
(270, 0, NULL, 6, 'ش', 1, 'ذ', '2019-12-04 00:00:00', '1398/09/13 14:48:39', '../file/6/1398091318036/arbeitsaufnahme-f-data.pdf', 1, '1398091318036', 39, 2),
(271, 0, NULL, 6, 'اخرین', 1, 'شششش', '2019-12-04 00:00:00', '1398/09/13 15:14:20', '', 0, '1398091396435', 39, 2),
(272, 271, NULL, 6, 'اخرین', 1, 'تست', '2019-12-04 00:00:00', '1398/09/13 15:14:29', NULL, 0, NULL, 39, 0),
(273, 271, 1, NULL, 'اخرین', 1, 'تست از مدیر', '2019-12-04 00:00:00', '1398/09/13 15:17:29', NULL, 0, NULL, 39, 0),
(274, 271, 1, NULL, 'اخرین', 1, 'jsk', '2019-12-04 00:00:00', '1398/09/13 15:34:02', NULL, 0, NULL, 39, 0),
(275, 271, 1, NULL, 'اخرین', 1, 'a', '2019-12-04 00:00:00', '1398/09/13 15:35:02', NULL, 0, NULL, 39, 0),
(276, 271, NULL, 6, 'اخرین', 1, 'ممنون', '2019-12-04 00:00:00', '1398/09/13 15:35:33', NULL, 0, NULL, 39, 0),
(277, 0, NULL, 6, 'sadfad', 1, 'asf', '2019-12-09 00:00:00', '1398/09/18 09:54:29', '', 0, '1398091851012', 39, 2),
(278, 0, NULL, 6, 'زر', 2, 'بظذ', '2019-12-09 00:00:00', '1398/09/18 10:27:22', '', 0, '1398091891205', 41, 2),
(279, 0, NULL, 6, 'تست', 3, 'دستت طلا', '2019-12-10 00:00:00', '1398/09/19 15:06:59', '../file/6/1398091974781/873185.jpg', 1, '1398091974781', 40, 2),
(280, 0, NULL, 6, 'آینه', 3, 'فازیفغطسق5فغاپظ', '2019-12-15 00:00:00', '1398/09/24 08:34:16', '', 0, '1398092499301', 41, 2),
(281, 0, NULL, 6, 'تست', 2, 'ممنون، تقریبا تموم شد', '2019-12-23 00:00:00', '1398/10/02 12:51:56', '../file/6/1398100295343/1.jpg', 1, '1398100295343', 37, 2),
(282, 0, NULL, 23, 'nzsbn', 3, 'z', '2019-12-23 00:00:00', '1398/10/02 14:12:15', '', 0, '1398100277572', 43, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `intUserID` int(11) NOT NULL,
  `intHoghogiHaghighiUser` tinyint(1) NOT NULL,
  `vcrFNameUser` varchar(50) NOT NULL,
  `vcrLNameUser` varchar(70) DEFAULT NULL,
  `vcrUsernameUser` varchar(100) NOT NULL,
  `vcrPasswordUser` varchar(255) NOT NULL,
  `vcrRepeatPasswordUser` varchar(255) NOT NULL,
  `vcrEmailUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `vcrPhoneNumberUser` varchar(11) DEFAULT NULL,
  `vcrMobileNumberUser` varchar(11) DEFAULT NULL,
  `datCreatedUser` datetime DEFAULT NULL,
  `vcrAddressUser` varchar(300) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `vcrMapLat` varchar(100) DEFAULT NULL,
  `vcrMapLag` varchar(100) DEFAULT NULL,
  `vcrImgProfileUser` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`intUserID`, `intHoghogiHaghighiUser`, `vcrFNameUser`, `vcrLNameUser`, `vcrUsernameUser`, `vcrPasswordUser`, `vcrRepeatPasswordUser`, `vcrEmailUser`, `vcrPhoneNumberUser`, `vcrMobileNumberUser`, `datCreatedUser`, `vcrAddressUser`, `vcrMapLat`, `vcrMapLag`, `vcrImgProfileUser`) VALUES
(6, 0, 'فرودگاه بین المللی سردار جنگل (آزمایشی)', '', 'airport', '202cb962ac59075b964b07152d234b70', '123', 'air@yahoo.com', '0133366859', '09113256895', '2019-10-20 10:33:28', '', ' 37.321591, 49.616054 ', '', ''),
(8, 0, 'دادگستری(آزمایشی)', '', 'dadgah', 'da4fb5c6e93e74d3df8527599fa62642', '120', 'dadg.@gmail.com', '052-6589', '676384', '2019-10-20 10:35:24', '', '', '', ''),
(9, 0, 'شرکت رایان گستر (شعبه سه)(آزمایشی)', '', 'rayan', '124bd1296bec0d9d93c7b52a71ad8d5b', '0123456', 'rayan@gmail.com', '05648292455', '031528946', '2019-11-02 07:51:14', 'رشت - خیابان بیستون - ...', '', '', ''),
(15, 0, 'بانک مرکزی(آزمایشی)', '', 'bankm', 'b73ce398c39f506af761d2277d853a92', '160', 'bank.@gmail.com', '021528987', '091289898', '2019-11-16 00:00:00', 'تهران', '', '', ''),
(17, 0, 'شاتل(آزمایشی)', '', 'shatel', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'shatel.@info.com', '015297859', '09223595030', '2019-11-27 00:00:00', 'رشت - میدان صیقلان - بلوار آیت الله احسانبخش، مجتمع اتحادیه توسکا، طبقه سوم، واحد 307', '@37.2825174,49.5925949,21z', '', ''),
(18, 0, 'کانون وکلا(آزمایشی)', '', 'vokala', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'air@yahoo.com', '0133366859', '099828225', '2019-11-30 00:00:00', 'رشت - خیابان بیستون - ...', '@37.2782744,49.5795035,18.75z', '', ''),
(21, 1, 'سعید', 'موسی زاده(آزمایشی)', 'saeed123', '202cb962ac59075b964b07152d234b70', '123', 'saeed@m.com', '013669874', '09111486851', '2019-12-01 00:00:00', '', '', '', ''),
(22, 1, 'علی', 'وطن خواه', 'alivatankhah', 'f2cb67b38a34ff33230423e9a8282178', 'spg724', 'sepidparvaz@yahoo.com', '01333125201', '09113337086', '2019-12-09 00:00:00', 'رشت پل بوسار روبه روی کوی مرادیان', '', '', ''),
(23, 0, 'مرکز تصویر برداری کیمیا', '', 'tkimia', '17567ae7020d560118ec6cd4c9de8b27', 'aminpor124', 'www.k,hcklmk@gmail.com', '565469896', '62659848654', '2019-12-16 00:00:00', 'قم ', '', '', ''),
(24, 0, 'رفیع پرواز', '', 'bahar234', 'c20bd834fe22d1bb943e08e9f7dbc984', 'rafie360', 'rafie.parvaz@gmail.com', '0111111111', '09153450308', '2019-12-30 00:00:00', '', '', '', ''),
(25, 0, 'لاروس پرواز کارون', '', 'abyat234', 'd9b8f4a38ec5497b797adc510f6a6e81', 'laros951', 'hamidabyat@gmail.com', '0111111111', '09119896238', '2019-12-30 00:00:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbusersrel`
--

CREATE TABLE `tbusersrel` (
  `intUserRelID` int(11) NOT NULL,
  `intUserID` int(11) NOT NULL,
  `intUserRelSex` int(2) NOT NULL,
  `vcrUserRelName` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `vcrUserRelSection` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `vcrUserRelContact` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `vcrUserRelEmail` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `vcrUserRelAddress` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `intUserRel_Del` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbusersrel`
--

INSERT INTO `tbusersrel` (`intUserRelID`, `intUserID`, `intUserRelSex`, `vcrUserRelName`, `vcrUserRelSection`, `vcrUserRelContact`, `vcrUserRelEmail`, `vcrUserRelAddress`, `intUserRel_Del`) VALUES
(1, 6, 1, 'نقی زاده', 'IT', '035-958555', 'k65naghi.@gmail.com', '', 0),
(2, 6, 2, 'خراسانی', 'انفورماتیک و مدیر سایت', '085-58265', 'kh_58@airport.com', '', 0),
(4, 8, 1, 'مشهدی', 'دبیرخانه', '241-2852202', '', '', 0),
(16, 6, 2, 'حسینی', 'مدیریت', '0911335829', 'air@yahoo.com', 'جاده انزلی، فرودگاه بین المللی سردار جنگل، طبقه 3، واحد مدیریت', 0),
(31, 6, 2, 'مرادی', 'دبیرخانه', '05695966', 'air@yahoo.com', '', 0),
(32, 6, 1, 'قلیزاده', 'حراست', '01349778', 'harasat@info.com', 'فرودگاه شعبه ۲', 1),
(33, 6, 2, 'همدانی فر', 'منشی', '01342528', 'hhh@gmail.com', '', 0),
(34, 6, 1, 'حسن زاده 2', 'مدیر سخت افزار', '0911248547', 'air@yahoo.com', 'فرودگاه رشت ', 0),
(35, 6, 2, 'امینی', 'حراست', '09111111111', 'amini@info.com', 'رشت مطهری', 0),
(36, 6, 1, 'aaa', 'sss', '111', 'b.@gmail.com', '', 1),
(37, 6, 2, 'ساسانی', 'بلی', '0066666', 'affff@info.com', 'th', 0),
(38, 6, 1, 'sdsdg', 'sdsdf', 'sdgs', 'sdgs', 's', 1),
(39, 6, 2, 'مرادی', 'چایی', '085962632', 'b.@gmail.com', 'رشت - خیابان بیستون - ...', 1),
(40, 6, 1, 'روحانی', 'نگهبان', '05695966', 'air@yahoo.com', 'فرودگاه رشت', 1),
(41, 6, 1, 'مهرانی', 'حسابدار', '09110002020', 'meh@gmail.com', 'انزلی', 1),
(42, 6, 2, 'تست', 'بخاری', '1', 'b.@gmail.com', 'ادرس', 1),
(43, 23, 1, 'بیقذلظ', 'ظیبرذ', '98484', '', 'رسیة', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tbipuser_tbuser`
-- (See below for the actual view)
--
CREATE TABLE `view_tbipuser_tbuser` (
`intUserID` int(11)
,`vcrFNameUser` varchar(50)
,`vcrLNameUser` varchar(70)
,`vcrUsernameUser` varchar(100)
,`intIPUserID` int(11)
,`ipUser_tbUser` int(11)
,`vcrIPUserAddress` varchar(200)
,`vcrIPUserOS` varchar(50)
,`vcrIPUserBrowser` varchar(50)
,`vcrIPUserDevice` varchar(100)
,`vcrIPUserEntryDateTime` varchar(20)
,`intIPUserStatusOnline` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tbsupport`
-- (See below for the actual view)
--
CREATE TABLE `view_tbsupport` (
`intAdminID` int(11)
,`intUserID` int(11)
,`vcrFNameUser` varchar(50)
,`vcrLNameUser` varchar(70)
,`intSupportID` int(11)
,`intSupportParentID` int(11)
,`SAdminID` int(11)
,`SUserID` int(11)
,`vcrSupportSubject` varchar(100)
,`intSupportPriority` int(4)
,`txtSupportComment` text
,`vcrSupportDateTime` varchar(20)
,`vcrSupportFile` varchar(300)
,`vcrBarcode` varchar(13)
,`intSupportStatus` tinyint(3)
,`SUsersRelID` int(11)
,`intUserRelID` int(11)
,`TbUserRel_UserID` int(11)
,`intUserRelSex` int(2)
,`vcrUserRelName` varchar(100)
,`vcrUserRelSection` varchar(100)
,`vcrUserRelContact` varchar(50)
,`vcrUserRelEmail` varchar(100)
,`vcrUserRelAddress` varchar(300)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tbsupportGroup`
-- (See below for the actual view)
--
CREATE TABLE `view_tbsupportGroup` (
`intAdminID` int(11)
,`intUserID` int(11)
,`vcrFNameUser` varchar(50)
,`vcrLNameUser` varchar(70)
,`intSupportID` int(11)
,`intSupportParentID` int(11)
,`SAdminID` int(11)
,`SUserID` int(11)
,`COUNT(*)` bigint(21)
,`vcrSupportSubject` varchar(100)
,`intSupportPriority` int(4)
,`txtSupportComment` text
,`intSupportStatus` tinyint(3)
);

-- --------------------------------------------------------

--
-- Structure for view `view_tbipuser_tbuser`
--
DROP TABLE IF EXISTS `view_tbipuser_tbuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`avidsystem`@`localhost` SQL SECURITY DEFINER VIEW `view_tbipuser_tbuser`  AS  select `tbusers`.`intUserID` AS `intUserID`,`tbusers`.`vcrFNameUser` AS `vcrFNameUser`,`tbusers`.`vcrLNameUser` AS `vcrLNameUser`,`tbusers`.`vcrUsernameUser` AS `vcrUsernameUser`,`tbipuser`.`intIPUserID` AS `intIPUserID`,`tbipuser`.`intUserID` AS `ipUser_tbUser`,`tbipuser`.`vcrIPUserAddress` AS `vcrIPUserAddress`,`tbipuser`.`vcrIPUserOS` AS `vcrIPUserOS`,`tbipuser`.`vcrIPUserBrowser` AS `vcrIPUserBrowser`,`tbipuser`.`vcrIPUserDevice` AS `vcrIPUserDevice`,`tbipuser`.`vcrIPUserEntryDateTime` AS `vcrIPUserEntryDateTime`,`tbipuser`.`intIPUserStatusOnline` AS `intIPUserStatusOnline` from (`tbipuser` join `tbusers` on(`tbipuser`.`intUserID` = `tbusers`.`intUserID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tbsupport`
--
DROP TABLE IF EXISTS `view_tbsupport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`avidsystem`@`localhost` SQL SECURITY DEFINER VIEW `view_tbsupport`  AS  select `tbadmin`.`intAdminID` AS `intAdminID`,`tbusers`.`intUserID` AS `intUserID`,`tbusers`.`vcrFNameUser` AS `vcrFNameUser`,`tbusers`.`vcrLNameUser` AS `vcrLNameUser`,`tbsupport`.`intSupportID` AS `intSupportID`,`tbsupport`.`intSupportParentID` AS `intSupportParentID`,`tbsupport`.`intAdminID` AS `SAdminID`,`tbsupport`.`intUserID` AS `SUserID`,`tbsupport`.`vcrSupportSubject` AS `vcrSupportSubject`,`tbsupport`.`intSupportPriority` AS `intSupportPriority`,`tbsupport`.`txtSupportComment` AS `txtSupportComment`,`tbsupport`.`vcrSupportDateTime` AS `vcrSupportDateTime`,`tbsupport`.`vcrSupportFile` AS `vcrSupportFile`,`tbsupport`.`vcrBarcode` AS `vcrBarcode`,`tbsupport`.`intSupportStatus` AS `intSupportStatus`,`tbsupport`.`intUserRelID` AS `SUsersRelID`,`tbusersrel`.`intUserRelID` AS `intUserRelID`,`tbusersrel`.`intUserID` AS `TbUserRel_UserID`,`tbusersrel`.`intUserRelSex` AS `intUserRelSex`,`tbusersrel`.`vcrUserRelName` AS `vcrUserRelName`,`tbusersrel`.`vcrUserRelSection` AS `vcrUserRelSection`,`tbusersrel`.`vcrUserRelContact` AS `vcrUserRelContact`,`tbusersrel`.`vcrUserRelEmail` AS `vcrUserRelEmail`,`tbusersrel`.`vcrUserRelAddress` AS `vcrUserRelAddress` from (((`tbsupport` left join `tbusers` on(`tbsupport`.`intUserID` = `tbusers`.`intUserID`)) left join `tbadmin` on(`tbsupport`.`intAdminID` = `tbadmin`.`intAdminID`)) join `tbusersrel` on(`tbsupport`.`intUserRelID` = `tbusersrel`.`intUserRelID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tbsupportGroup`
--
DROP TABLE IF EXISTS `view_tbsupportGroup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`avidsystem`@`localhost` SQL SECURITY DEFINER VIEW `view_tbsupportGroup`  AS  select `tbadmin`.`intAdminID` AS `intAdminID`,`tbusers`.`intUserID` AS `intUserID`,`tbusers`.`vcrFNameUser` AS `vcrFNameUser`,`tbusers`.`vcrLNameUser` AS `vcrLNameUser`,`tbsupport`.`intSupportID` AS `intSupportID`,`tbsupport`.`intSupportParentID` AS `intSupportParentID`,`tbsupport`.`intAdminID` AS `SAdminID`,`tbsupport`.`intUserID` AS `SUserID`,count(0) AS `COUNT(*)`,`tbsupport`.`vcrSupportSubject` AS `vcrSupportSubject`,`tbsupport`.`intSupportPriority` AS `intSupportPriority`,`tbsupport`.`txtSupportComment` AS `txtSupportComment`,`tbsupport`.`intSupportStatus` AS `intSupportStatus` from ((`tbsupport` left join `tbusers` on(`tbsupport`.`intUserID` = `tbusers`.`intUserID`)) left join `tbadmin` on(`tbsupport`.`intAdminID` = `tbadmin`.`intAdminID`)) where `tbsupport`.`intSupportParentID` = 0 and `tbsupport`.`intSupportStatus` = '0' or `tbsupport`.`intSupportStatus` = '1' group by `tbsupport`.`intUserID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`intAdminID`);

--
-- Indexes for table `tbdomains`
--
ALTER TABLE `tbdomains`
  ADD PRIMARY KEY (`intDomainID`);

--
-- Indexes for table `tbenamadinfo`
--
ALTER TABLE `tbenamadinfo`
  ADD PRIMARY KEY (`intEnamadInfoID`);

--
-- Indexes for table `tbinvoices`
--
ALTER TABLE `tbinvoices`
  ADD PRIMARY KEY (`intInvoicesID`);

--
-- Indexes for table `tbipuser`
--
ALTER TABLE `tbipuser`
  ADD PRIMARY KEY (`intIPUserID`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbpreinvoices`
--
ALTER TABLE `tbpreinvoices`
  ADD PRIMARY KEY (`intPreInvoiceID`);

--
-- Indexes for table `tbproducts`
--
ALTER TABLE `tbproducts`
  ADD PRIMARY KEY (`intProductID`);

--
-- Indexes for table `tbsupport`
--
ALTER TABLE `tbsupport`
  ADD PRIMARY KEY (`intSupportID`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`intUserID`);

--
-- Indexes for table `tbusersrel`
--
ALTER TABLE `tbusersrel`
  ADD PRIMARY KEY (`intUserRelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `intAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbdomains`
--
ALTER TABLE `tbdomains`
  MODIFY `intDomainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbenamadinfo`
--
ALTER TABLE `tbenamadinfo`
  MODIFY `intEnamadInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbinvoices`
--
ALTER TABLE `tbinvoices`
  MODIFY `intInvoicesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbipuser`
--
ALTER TABLE `tbipuser`
  MODIFY `intIPUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpreinvoices`
--
ALTER TABLE `tbpreinvoices`
  MODIFY `intPreInvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbproducts`
--
ALTER TABLE `tbproducts`
  MODIFY `intProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbsupport`
--
ALTER TABLE `tbsupport`
  MODIFY `intSupportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `intUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbusersrel`
--
ALTER TABLE `tbusersrel`
  MODIFY `intUserRelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
