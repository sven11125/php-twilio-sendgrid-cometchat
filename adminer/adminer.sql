-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `chat_list`;
CREATE TABLE `chat_list` (
  `id` int(11) NOT NULL,
  `sender_uid` int(11) DEFAULT NULL,
  `receiver_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `chat_list` (`id`, `sender_uid`, `receiver_uid`) VALUES
(1,	2,	1);

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `c_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `c_data` text NOT NULL COMMENT 'Site content (emails, pages, ...)',
  `c_title` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='Pages for site && 1)-email registering confirm 2)-Invite Friend invitation\r\n';

INSERT INTO `content` (`c_id`, `c_data`, `c_title`) VALUES
(1,	'<!-- Emails use the XHTML Strict doctype -->\r\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" style=\"background: #ffffff; min-height: 100%;\">\r\n\r\n<head>\r\n  <!-- The character set should be utf-8 -->\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!-- Enables media queries -->\r\n  <meta name=\"viewport\" content=\"width=device-width\">\r\n  <!-- Link to the email\'s CSS, which will be inlined into the email -->\r\n  \r\n  <title>{{subject}}</title>\r\n\r\n  <!-- Web Font / @font-face : BEGIN -->\r\n  <!--[if mso]>\r\n        <style>\r\n            * {\r\n                font-family: sans-serif !important;\r\n            }\r\n        </style>\r\n    <![endif]-->\r\n\r\n  <!--[if !mso]><!-->\r\n  <!-- insert web font reference, eg: <link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'> -->\r\n  <!--<![endif]-->\r\n  <!-- Web Font / @font-face : END -->\r\n\r\n</head>\r\n\r\n<body style=\"-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; box-sizing: border-box; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;\">\r\n  <!-- <span class=\"preheader\">{{description}}</span> -->\r\n  <table class=\"body\" style=\"Margin: 0; background: #54468F;; border-collapse: collapse; border-spacing: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\">\r\n    <tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n      <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n        <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n          <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n            <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 600px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n              <a href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                <img src=\"https://i.imgur.com/huMfUAq.png\" width=\"600\" alt=\"Wona\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">\r\n              </a>\r\n            </th>\r\n<th class=\"expander\" style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>\r\n          </tr></tbody></table>\r\n        </td></tr></tbody></table>\r\n          \r\n          <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"68px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 68px; font-weight: normal; hyphens: auto; line-height: 68px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-1 large-1 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-10 large-10 columns\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 500px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Hey {first_name},</p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Thank you for registering. Please confirm your email below.</p>\r\n\r\n                <a class=\"expanded\" href=\"{url_confirmed}\" style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <center data-parsed style=\"min-width: 500px; width: 100%;\">\r\n                    <img src=\"https://i.imgur.com/ikxLdaf.png\" alt=\"Confirm my email\" align=\"center\" class=\"float-center\" style=\"-ms-interpolation-mode: bicubic; Margin: 0 auto; border: none; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;\">\r\n                  </center>\r\n                </a>\r\n\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"40px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 40px; font-weight: normal; hyphens: auto; line-height: 40px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">If it doesn’t work for you, please click on the link below for confirmation:</p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\"><a href=\"{url_confirmed}\" style=\"Margin: 0; color: #0374BB; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">{url_confirmed}</a></p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Yours sincerely,</p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Team Wona</p>\r\n\r\n              </th></tr></table></th>\r\n              <th class=\"small-1 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n            </tr></tbody></table>\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"54px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 54px; font-weight: normal; hyphens: auto; line-height: 54px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n          </td></tr></tbody></table>\r\n\r\n          <table style=\"Margin: 0 auto; background: #f3f3f3; background-color: #54468F; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\" align=\"center\" class=\"container\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-12 large-11 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 550px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-12 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; text-align: right; padding-right: 20px;\">\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"11px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 11px; font-weight: normal; hyphens: auto; line-height: 11px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n                <a class=\"logo-link\" href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <img src=\"https://i.imgur.com/8mpyPGT.png\" alt=\"Logo\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; padding-right: 20px; text-decoration: none; width: auto;\">\r\n                </a>              \r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n              </th></tr></table></th>\r\n            </tr></tbody></table>\r\n          </td></tr></tbody></table>\r\n      </td>\r\n    </tr>\r\n  </table>\r\n\r\n</body>\r\n\r\n</html>',	'email-confirm-1.html'),
(2,	'<!-- Emails use the XHTML Strict doctype -->\r\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" style=\"background: #ffffff; min-height: 100%;\">\r\n\r\n<head>\r\n  <!-- The character set should be utf-8 -->\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!-- Enables media queries -->\r\n  <meta name=\"viewport\" content=\"width=device-width\">\r\n  <!-- Link to the email\'s CSS, which will be inlined into the email -->\r\n  \r\n  <title>{{subject}}</title>\r\n\r\n  <!-- Web Font / @font-face : BEGIN -->\r\n  <!--[if mso]>\r\n        <style>\r\n            * {\r\n                font-family: sans-serif !important;\r\n            }\r\n        </style>\r\n    <![endif]-->\r\n\r\n  <!--[if !mso]><!-->\r\n  <!-- insert web font reference, eg: <link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'> -->\r\n  <!--<![endif]-->\r\n  <!-- Web Font / @font-face : END -->\r\n\r\n</head>\r\n\r\n<body style=\"-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; box-sizing: border-box; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;\">\r\n  <!-- <span class=\"preheader\">{{description}}</span> -->\r\n  <table class=\"body\" style=\"Margin: 0; background: #54468F; border-collapse: collapse; border-spacing: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\">\r\n    <tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n      <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n        <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n          <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n            <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 600px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n              <a href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                <img src=\"https://i.imgur.com/huMfUAq.png\" width=\"600\" alt=\"Wona\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">\r\n              </a>\r\n            </th>\r\n<th class=\"expander\" style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>\r\n          </tr></tbody></table>\r\n        </td></tr></tbody></table>\r\n          \r\n          <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"68px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 68px; font-weight: normal; hyphens: auto; line-height: 68px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-2 large-2 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 100px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-10 large-10 columns\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 500px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Hey {first name},</p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">I’ve just signed up to <a href=\"{url_confirmed}\" class=\"no-link\" style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">wona.io</a>, where Artificial Intelligence and Machine Learning companies apply to you for any job opportunities. They also have other tech roles including AI sales and business development.</p>\r\n                <a class=\"expanded\" href=\"{url_confirmed}\" style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <center data-parsed style=\"min-width: 500px; width: 100%;\">\r\n                    <img src=\"https://i.imgur.com/U9oWrQv.png\" alt=\"You are INVITED!\" align=\"center\" class=\"float-center\" style=\"-ms-interpolation-mode: bicubic; Margin: 0 auto; border: none; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;\">\r\n                  </center>\r\n                </a>\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"40px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 40px; font-weight: normal; hyphens: auto; line-height: 40px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Your friend, </p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">{Senders First Name}</p>\r\n              </th></tr></table></th>\r\n              <th class=\"small-2 large-2 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 100px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n            </tr></tbody></table>\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"54px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 54px; font-weight: normal; hyphens: auto; line-height: 54px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n          </td></tr></tbody>\r\n		  </table>\r\n\r\n          <table style=\"Margin: 0 auto; background: #f3f3f3; background-color: #54468F; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\" align=\"center\" class=\"container\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-12 large-11 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 550px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-12 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: right; padding-right: 20px;\">\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"11px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 11px; font-weight: normal; hyphens: auto; line-height: 11px; margin: 0; padding: 0;  vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n                <a class=\"logo-link\" href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <img src=\"https://i.imgur.com/8mpyPGT.png\" alt=\"Logo\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; padding-right: 20px; text-decoration: none; width: auto;\">\r\n                </a>              \r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n              </th></tr></table></th>\r\n            </tr></tbody></table>\r\n          </td></tr></tbody></table>\r\n      </td>\r\n    </tr>\r\n  </table>\r\n\r\n</body>\r\n\r\n</html>',	'email-confirm-2.html'),
(3,	'<!-- Emails use the XHTML Strict doctype -->\r\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" style=\"background: #ffffff; min-height: 100%;\">\r\n\r\n<head>\r\n  <!-- The character set should be utf-8 -->\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!-- Enables media queries -->\r\n  <meta name=\"viewport\" content=\"width=device-width\">\r\n  <!-- Link to the email\'s CSS, which will be inlined into the email -->\r\n  \r\n  <title>{{subject}}</title>\r\n\r\n  <!-- Web Font / @font-face : BEGIN -->\r\n  <!--[if mso]>\r\n        <style>\r\n            * {\r\n                font-family: sans-serif !important;\r\n            }\r\n        </style>\r\n    <![endif]-->\r\n\r\n  <!--[if !mso]><!-->\r\n  <!-- insert web font reference, eg: <link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'> -->\r\n  <!--<![endif]-->\r\n  <!-- Web Font / @font-face : END -->\r\n\r\n</head>\r\n\r\n<body style=\"-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; box-sizing: border-box; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;\">\r\n  <!-- <span class=\"preheader\">{{description}}</span> -->\r\n  <table class=\"body\" style=\"Margin: 0; background: #54468F; border-collapse: collapse; border-spacing: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\">\r\n    <tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n      <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n        <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n          <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n            <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 600px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n              <a href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                <img src=\"https://i.imgur.com/huMfUAq.png\" width=\"600\" alt=\"Wona\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">\r\n              </a>\r\n            </th>\r\n<th class=\"expander\" style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>\r\n          </tr></tbody></table>\r\n        </td></tr></tbody></table>\r\n          \r\n          <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"122px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 122px; font-weight: normal; hyphens: auto; line-height: 122px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-1 large-1 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-10 large-10 columns\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 500px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\"> Hey {first name},</p>\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Thank you for joining Wona the worlds leading platform for AI and ML experts, designed to help you find your best career move.</p>\r\n\r\n                <ul>\r\n                  <li>Please ensure your Wona profile is fully completed and demonstrates 	your key skills and accomplishments, take pride in the detail. This is 	for you, and it gives companies insight into who you are.</li>\r\n                  <li>Use a clear profile photo </li>\r\n                  <li>Tell us what is important to you</li>\r\n                  <li>What are you passionate about </li>\r\n                  <li>Let our Machine Learning algorithms do the hard work and help you 	find your best career</li>\r\n                </ul>\r\n                \r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Wona is designed to put you at the centre of everything we do, so we welcome all suggestions and feedback to be sent to <a href=\"#\" class=\"link\" style=\"Margin: 0; color: #0374BB; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">hello@wona.io</a>  and welcome to the future of Artificial Intelligence</p>\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Yours sincerely,</p>\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Team Wona</p>\r\n              </th></tr></table></th>\r\n              <th class=\"small-1 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n            </tr></tbody></table>\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"120px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 120px; font-weight: normal; hyphens: auto; line-height: 120px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n          </td></tr></tbody></table>\r\n\r\n          <table style=\"Margin: 0 auto; background: #f3f3f3; background-color: #54468F; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\" align=\"center\" class=\"container\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-12 large-11 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 550px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-12 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0;  text-align: right; padding-right: 20px;\">\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"11px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 11px; font-weight: normal; hyphens: auto; line-height: 11px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n                <a class=\"logo-link\" href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <img src=\"https://i.imgur.com/8mpyPGT.png\" alt=\"Logo\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; padding-right: 20px; text-decoration: none; width: auto;\">\r\n                </a>              \r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n              </th></tr></table></th>\r\n            </tr></tbody></table>\r\n          </td></tr></tbody></table>\r\n      </td>\r\n    </tr>\r\n  </table>\r\n\r\n</body>\r\n\r\n</html>',	'emai-signUp.html'),
(4,	'<!-- Emails use the XHTML Strict doctype -->\r\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" style=\"background: #ffffff; min-height: 100%;\">\r\n\r\n<head>\r\n  <!-- The character set should be utf-8 -->\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!-- Enables media queries -->\r\n  <meta name=\"viewport\" content=\"width=device-width\">\r\n  <!-- Link to the email\'s CSS, which will be inlined into the email -->\r\n  \r\n  <title>{{subject}}</title>\r\n\r\n  <!-- Web Font / @font-face : BEGIN -->\r\n  <!--[if mso]>\r\n        <style>\r\n            * {\r\n                font-family: sans-serif !important;\r\n            }\r\n        </style>\r\n    <![endif]-->\r\n\r\n  <!--[if !mso]><!-->\r\n  <!-- insert web font reference, eg: <link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'> -->\r\n  <!--<![endif]-->\r\n  <!-- Web Font / @font-face : END -->\r\n\r\n</head>\r\n\r\n<body style=\"-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; box-sizing: border-box; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;\">\r\n  <!-- <span class=\"preheader\">{{description}}</span> -->\r\n  <table class=\"body\" style=\"Margin: 0; background: #54468F; border-collapse: collapse; border-spacing: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\">\r\n    <tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n      <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n        <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n          <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n            <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 600px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n              <a href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                <img src=\"https://i.imgur.com/huMfUAq.png\" width=\"600\" alt=\"Wona\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">\r\n              </a>\r\n            </th>\r\n<th class=\"expander\" style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>\r\n          </tr></tbody></table>\r\n        </td></tr></tbody></table>\r\n          \r\n          <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"122px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 122px; font-weight: normal; hyphens: auto; line-height: 122px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-1 large-1 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-10 large-10 columns\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 500px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Dear {First name},</p>\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Welcome to <a href=\"#\" class=\"no-link\" style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">Wona.io</a> the worlds leading AI and ML platform designed to find your best career move.</p>\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Share with friends for your chance to earn money when they find their next job through <a href=\"#\" class=\"link\" style=\"Margin: 0; color: #0374BB; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">Wona.io</a> </p>\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Yours sincerely,</p>\r\n                <p style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: left;\">Team Wona</p>\r\n              </th></tr></table></th>\r\n              <th class=\"small-1 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n            </tr></tbody></table>\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"120px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 120px; font-weight: normal; hyphens: auto; line-height: 120px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n          </td></tr></tbody></table>\r\n\r\n          <table style=\"Margin: 0 auto; background: #f3f3f3; background-color: #54468F; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\" align=\"center\" class=\"container\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-12 large-11 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 550px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-12 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; text-align: right; padding-right: 20px;\">\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"11px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 11px; font-weight: normal; hyphens: auto; line-height: 11px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n                <a class=\"logo-link\" href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <img src=\"https://i.imgur.com/8mpyPGT.png\" alt=\"Logo\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; padding-right: 20px; text-decoration: none; width: auto;\">\r\n                </a>              \r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n              </th></tr></table></th>\r\n            </tr></tbody></table>\r\n          </td></tr></tbody></table>\r\n      </td>\r\n    </tr>\r\n  </table>\r\n\r\n</body>\r\n\r\n</html>',	'emai-welcome.html'),
(5,	'<!-- Emails use the XHTML Strict doctype -->\r\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" style=\"background: #ffffff; min-height: 100%;\">\r\n\r\n<head>\r\n  <!-- The character set should be utf-8 -->\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!-- Enables media queries -->\r\n  <meta name=\"viewport\" content=\"width=device-width\">\r\n  <!-- Link to the email\'s CSS, which will be inlined into the email -->\r\n  \r\n  <title>{{subject}}</title>\r\n\r\n  <!-- Web Font / @font-face : BEGIN -->\r\n  <!--[if mso]>\r\n        <style>\r\n            * {\r\n                font-family: sans-serif !important;\r\n            }\r\n        </style>\r\n    <![endif]-->\r\n\r\n  <!--[if !mso]><!-->\r\n  <!-- insert web font reference, eg: <link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'> -->\r\n  <!--<![endif]-->\r\n  <!-- Web Font / @font-face : END -->\r\n\r\n</head>\r\n\r\n<body style=\"-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; box-sizing: border-box; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;\">\r\n  <!-- <span class=\"preheader\">{{description}}</span> -->\r\n  <table class=\"body\" style=\"Margin: 0; background: #54468F;; border-collapse: collapse; border-spacing: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\">\r\n    <tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n      <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n        <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n          <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n            <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 600px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n              <a href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                <img src=\"https://i.imgur.com/huMfUAq.png\" width=\"600\" alt=\"Wona\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">\r\n              </a>\r\n            </th>\r\n<th class=\"expander\" style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>\r\n          </tr></tbody></table>\r\n        </td></tr></tbody></table>\r\n          \r\n          <table align=\"center\" class=\"container\" style=\"Margin: 0 auto; background: #f3f3f3; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"68px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 68px; font-weight: normal; hyphens: auto; line-height: 68px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-1 large-1 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-10 large-10 columns\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 500px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\">\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Hey {first_name},</p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">Please confirm your reset password below.</p>\r\n\r\n                <a class=\"expanded\" href=\"{url_confirmed}\" style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <center data-parsed style=\"min-width: 500px; width: 100%;\">\r\n                    <img src=\"https://i.imgur.com/ikxLdaf.png\" alt=\"Confirm reset my password\" align=\"center\" class=\"float-center\" style=\"-ms-interpolation-mode: bicubic; Margin: 0 auto; border: none; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;\">\r\n                  </center>\r\n                </a>\r\n\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"40px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 40px; font-weight: normal; hyphens: auto; line-height: 40px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">text 0</p>\r\n                <p class=\"text-center\" style=\"Margin: 0; Margin-bottom: 20px; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; margin-bottom: 20px; padding: 0; text-align: center;\">text 1</p>\r\n                \r\n              </th></tr></table></th>\r\n              <th class=\"small-1 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n            </tr></tbody></table>\r\n            <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"54px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 54px; font-weight: normal; hyphens: auto; line-height: 54px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n          </td></tr></tbody></table>\r\n\r\n          <table style=\"Margin: 0 auto; background: #f3f3f3; background-color: #54468F; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 600px;\" align=\"center\" class=\"container\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">\r\n            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">\r\n              <th class=\"small-12 large-11 columns first\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 550px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>\r\n              <th class=\"small-12 large-1 columns last\" style=\"Margin: 0 auto; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; text-align: left; width: 50px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: normal; line-height: 25px; margin: 0; text-align: right; padding-right: 20px;\">\r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"11px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 11px; font-weight: normal; hyphens: auto; line-height: 11px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n                <a class=\"logo-link\" href style=\"Margin: 0; color: #0374bb; font-family: \'Roboto\', sans-serif; font-weight: normal; line-height: 25px; margin: 0; padding: 0; text-align: left; text-decoration: none;\">\r\n                  <img src=\"https://i.imgur.com/8mpyPGT.png\" alt=\"Logo\" style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; padding-right: 20px; text-decoration: none; width: auto;\">\r\n                </a>              \r\n                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #4a4a4a; font-family: \'Roboto\', sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> \r\n              </th></tr></table></th>\r\n            </tr></tbody></table>\r\n          </td></tr></tbody></table>\r\n      </td>\r\n    </tr>\r\n  </table>\r\n\r\n</body>\r\n\r\n</html>',	'email-resaet password');

DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `job_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='All jobs';

INSERT INTO `job` (`job_id`, `job_name`) VALUES
(1,	'Software Engineering'),
(2,	'Engineering Management'),
(3,	'Design'),
(4,	'Data Analytics'),
(5,	'Developer Operations (DevOps)'),
(6,	'Quality Assurance (QA)'),
(7,	'Information Technology (IT)'),
(8,	'Project Management'),
(9,	'Product Management');

DROP TABLE IF EXISTS `job_detail`;
CREATE TABLE `job_detail` (
  `jd_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `jd_job_id` bigint(20) NOT NULL COMMENT 'Job ID',
  `jd_name` varchar(64) NOT NULL DEFAULT '' COMMENT 'Sub Job name',
  PRIMARY KEY (`jd_id`),
  KEY `job_detai;_fk1` (`jd_job_id`),
  CONSTRAINT `job_detai;_fk1` FOREIGN KEY (`jd_job_id`) REFERENCES `job` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='All jobs details';

INSERT INTO `job_detail` (`jd_id`, `jd_job_id`, `jd_name`) VALUES
(1,	1,	'AR/VR'),
(2,	1,	'Computer Vision'),
(3,	1,	'Frontend'),
(4,	1,	'Hardware'),
(5,	1,	'NLP'),
(6,	1,	'Backend'),
(7,	1,	'Data'),
(8,	1,	'Full Stack'),
(9,	1,	'Machine Learning'),
(10,	1,	'Search'),
(11,	1,	'Blockchain'),
(12,	1,	'Embedded'),
(13,	1,	'Gaming'),
(14,	1,	'Mobile'),
(15,	1,	'Security'),
(16,	2,	'Applications'),
(17,	2,	'Machine Learning'),
(18,	2,	'Search'),
(19,	2,	'Data Infrastructure'),
(20,	2,	'Mobile'),
(21,	2,	'DevOps'),
(22,	2,	'QA'),
(23,	3,	'Brand/Graphic Designer'),
(24,	3,	'UX Researcher'),
(25,	3,	'Product Designer'),
(26,	3,	'Visual/UI Designer'),
(27,	3,	'UX Designer'),
(28,	4,	'Business Analyst'),
(29,	4,	'Data Scientist'),
(30,	4,	'Business Operations'),
(31,	4,	'Data Analyst'),
(32,	5,	'Build/Release'),
(33,	5,	'DevOps'),
(34,	5,	'Site Reliability Engineer (SRE)'),
(35,	6,	'QA Manual Test'),
(36,	6,	'QA Test Automation'),
(37,	7,	'Business Systems'),
(38,	7,	'Network Administrator'),
(39,	7,	'Salesforce Developer'),
(40,	7,	'Systems Administrator'),
(41,	7,	'Database Administrator'),
(42,	7,	'Network'),
(43,	7,	'Solutions Architect'),
(44,	7,	'Desktop Support'),
(45,	7,	'NOC'),
(46,	7,	'Solutions'),
(47,	8,	'IT Project Manager'),
(48,	8,	'Program Manager'),
(49,	8,	'Project Manager'),
(50,	8,	'Technical Program Manager'),
(51,	9,	'Product Management');

DROP TABLE IF EXISTS `job_detail_add`;
CREATE TABLE `job_detail_add` (
  `jda_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `jda_job_id` bigint(20) NOT NULL COMMENT 'Job ID',
  `jda_name` varchar(64) NOT NULL DEFAULT '' COMMENT 'Sub Job name',
  PRIMARY KEY (`jda_id`) USING BTREE,
  KEY `job_detai;_fk1_add` (`jda_job_id`) USING BTREE,
  CONSTRAINT `job_detai;_fk1_add` FOREIGN KEY (`jda_job_id`) REFERENCES `job` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All jobs details';

INSERT INTO `job_detail_add` (`jda_id`, `jda_job_id`, `jda_name`) VALUES
(1,	1,	'Python'),
(2,	1,	'Java'),
(3,	1,	'C++'),
(4,	1,	'Linux'),
(5,	1,	'C'),
(6,	2,	'Agile'),
(7,	2,	'Java'),
(8,	2,	'AWS'),
(9,	2,	'JavaScript'),
(10,	2,	'SQL'),
(11,	3,	'Product Design'),
(12,	3,	'User-Centered Design'),
(13,	3,	'Adobe Creative Suite'),
(14,	3,	'Design Thinking'),
(15,	3,	'Sketch'),
(16,	4,	'SQL'),
(17,	4,	'Microsoft Excel'),
(18,	4,	'Data Visualization'),
(19,	4,	'Requirements Gathering'),
(20,	4,	'R'),
(21,	5,	'Linux'),
(22,	5,	'Docker'),
(23,	5,	'Python'),
(24,	5,	'Chef'),
(25,	5,	'Shell Scripting'),
(26,	6,	'QA Testing'),
(27,	6,	'Regression Testing'),
(28,	6,	'Test Driven Development (TDD)'),
(29,	6,	'Test Automation'),
(30,	6,	'Selenium'),
(31,	7,	'Routing'),
(32,	7,	'Cisco'),
(33,	7,	'Switches'),
(34,	7,	'Firewalls'),
(35,	7,	'Linux'),
(36,	8,	'Cross-functional Team Leadership'),
(37,	8,	'Risk Management'),
(38,	8,	'Stakeholder Management'),
(39,	8,	'Agile'),
(40,	8,	'Project Management Professional (PMP)'),
(41,	9,	'Product Management'),
(42,	9,	'Leadership'),
(43,	9,	'Product Development'),
(44,	9,	'Agile'),
(45,	9,	'Project Management');

DROP TABLE IF EXISTS `job_listing`;
CREATE TABLE `job_listing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `jd_user_id` bigint(20) NOT NULL COMMENT 'User created vacancy ID',
  `jd_job_id` bigint(20) NOT NULL COMMENT 'Job ID',
  `jd_status` bigint(20) NOT NULL DEFAULT '1' COMMENT 'Vacancy status',
  `jd_job_custom_id` varchar(16) NOT NULL DEFAULT '' COMMENT 'Custom vacancy ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Vacancy title',
  `job_description` text NOT NULL COMMENT 'Job Description',
  `jd_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp vacancy created',
  `occupancy` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Full time / Part Time / Hourly Work',
  `salary_from` int(11) NOT NULL DEFAULT '0' COMMENT 'Salary Range from',
  `salary_to` int(11) NOT NULL DEFAULT '0' COMMENT 'Salary Range to',
  `relocation_assistance` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Relocation Assistance',
  `permit_assistance` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Work Permit Assistance',
  `remote_position` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Remote work',
  PRIMARY KEY (`id`),
  KEY `job_listing_fk1` (`jd_job_id`),
  KEY `job_listing_fk2` (`jd_user_id`),
  KEY `job_listing_fk3` (`jd_status`),
  CONSTRAINT `job_listing_fk1` FOREIGN KEY (`jd_job_id`) REFERENCES `job` (`job_id`),
  CONSTRAINT `job_listing_fk2` FOREIGN KEY (`jd_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `job_listing_fk3` FOREIGN KEY (`jd_status`) REFERENCES `job_listing_status` (`jls_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Vacancy for talent from employer';

INSERT INTO `job_listing` (`id`, `jd_user_id`, `jd_job_id`, `jd_status`, `jd_job_custom_id`, `title`, `job_description`, `jd_ts`, `occupancy`, `salary_from`, `salary_to`, `relocation_assistance`, `permit_assistance`, `remote_position`) VALUES
(85,	2,	3,	1,	'5383',	'test',	'dsfdsf',	'2020-03-04 21:44:50',	1,	200,	600,	CONV('0', 2, 10) + 0,	CONV('0', 2, 10) + 0,	CONV('0', 2, 10) + 0);

DROP TABLE IF EXISTS `job_listing_job_detail`;
CREATE TABLE `job_listing_job_detail` (
  `jljd_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jljd_job_listing_id` bigint(20) NOT NULL COMMENT 'ID vacancy',
  `jljd_job_detail_id` bigint(20) NOT NULL COMMENT 'ID job detail',
  PRIMARY KEY (`jljd_id`),
  KEY `job_listing_job_details_fk1` (`jljd_job_detail_id`),
  KEY `job_listing_job_details_fk2` (`jljd_job_listing_id`),
  CONSTRAINT `job_listing_job_details_fk1` FOREIGN KEY (`jljd_job_detail_id`) REFERENCES `job_detail` (`jd_id`),
  CONSTRAINT `job_listing_job_details_fk2` FOREIGN KEY (`jljd_job_listing_id`) REFERENCES `job_listing` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='Job details for vacancy ';

INSERT INTO `job_listing_job_detail` (`jljd_id`, `jljd_job_listing_id`, `jljd_job_detail_id`) VALUES
(33,	85,	24);

DROP TABLE IF EXISTS `job_listing_like`;
CREATE TABLE `job_listing_like` (
  `jll_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `jll_user_id` bigint(20) NOT NULL COMMENT 'User liked vacancy',
  `jll_job_listing_id` bigint(20) NOT NULL COMMENT 'Vacancy ID',
  PRIMARY KEY (`jll_id`),
  KEY `job_listing_like_fk1` (`jll_user_id`),
  KEY `job_listing_like_fk2` (`jll_job_listing_id`),
  CONSTRAINT `job_listing_like_fk1` FOREIGN KEY (`jll_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `job_listing_like_fk2` FOREIGN KEY (`jll_job_listing_id`) REFERENCES `job_listing` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='User liked vacancy';


DROP TABLE IF EXISTS `job_listing_region`;
CREATE TABLE `job_listing_region` (
  `jlr_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `jlr_job_listing_id` bigint(20) NOT NULL COMMENT 'Vacancy ID',
  `jlr_country` varchar(32) NOT NULL DEFAULT '',
  `jlr_state` varchar(32) NOT NULL DEFAULT '',
  `jlr_city` varchar(32) NOT NULL DEFAULT '',
  `jlr_zip` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`jlr_id`),
  KEY `job_listing_region_fk1` (`jlr_job_listing_id`),
  CONSTRAINT `job_listing_region_fk1` FOREIGN KEY (`jlr_job_listing_id`) REFERENCES `job_listing` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='Locations for job';

INSERT INTO `job_listing_region` (`jlr_id`, `jlr_job_listing_id`, `jlr_country`, `jlr_state`, `jlr_city`, `jlr_zip`) VALUES
(41,	85,	'Germany',	'MV',	'Rerik',	'');

DROP TABLE IF EXISTS `job_listing_status`;
CREATE TABLE `job_listing_status` (
  `jls_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jls_title` varchar(16) NOT NULL DEFAULT '' COMMENT 'Status name',
  `jls_color` varchar(8) NOT NULL DEFAULT '' COMMENT 'Color status',
  PRIMARY KEY (`jls_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `job_listing_status` (`jls_id`, `jls_title`, `jls_color`) VALUES
(1,	'draft',	'#FA4A28'),
(2,	'active',	'#0374BB'),
(3,	'hold',	'#B82532'),
(4,	'closed',	'#4A4A4A');

DROP TABLE IF EXISTS `occupancy`;
CREATE TABLE `occupancy` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_title` varchar(32) NOT NULL DEFAULT '' COMMENT 'Name occupancy',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `occupancy` (`o_id`, `o_title`) VALUES
(1,	'Full time'),
(2,	'Part Time'),
(3,	'Hourly Work');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `user_id_p` bigint(20) NOT NULL COMMENT 'User ID',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT 'User online',
  `post_image` varchar(255) NOT NULL DEFAULT '' COMMENT 'Image post',
  `status_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time creating',
  PRIMARY KEY (`post_id`) USING BTREE,
  KEY `posts_fk1` (`user_id_p`),
  CONSTRAINT `posts_fk1` FOREIGN KEY (`user_id_p`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `posts` (`post_id`, `user_id_p`, `content`, `post_image`, `status_time`) VALUES
(42,	2,	'',	'',	'2020-02-27 19:53:47'),
(43,	2,	'dcdszczx',	'',	'2020-02-27 19:54:55'),
(44,	2,	'dfgfdgfdgfdg',	'',	'2020-02-27 19:58:19'),
(45,	2,	'sadfcsac33',	'',	'2020-02-27 19:59:55'),
(46,	2,	'5214',	'',	'2020-02-27 20:22:24'),
(47,	2,	'asdasd',	'',	'2020-02-27 20:28:55'),
(48,	1,	'asdasd',	'',	'2020-02-27 20:30:03'),
(49,	1,	'asdasd',	'',	'2020-02-27 20:30:21'),
(50,	1,	'\\szx\\zx\\zx',	'',	'2020-02-27 20:30:33'),
(51,	1,	'35345435435',	'',	'2020-02-27 20:30:56'),
(52,	1,	'sdcsadcvsdacdsc',	'',	'2020-02-27 20:31:20'),
(53,	1,	'sdcsadcvsdacdsc',	'',	'2020-02-27 21:05:38'),
(54,	2,	'dfdsf',	'',	'2020-02-29 17:46:30'),
(55,	1,	'New news for today',	'',	'2020-02-29 21:48:04'),
(56,	39,	'1111111',	'',	'2020-03-01 09:44:15'),
(57,	39,	'222222222222222222',	'',	'2020-03-01 11:12:06'),
(58,	39,	'3333333333',	'',	'2020-03-01 11:13:08'),
(59,	39,	'3333333333',	'',	'2020-03-01 11:14:21'),
(60,	39,	'3333333333',	'',	'2020-03-01 11:27:58'),
(61,	2,	'sdfsdf',	'',	'2020-03-02 07:59:09'),
(62,	39,	'adadadad adada adad',	'',	'2020-03-02 07:59:48'),
(63,	2,	'dsfsdfsd3333',	'',	'2020-03-02 08:00:43'),
(64,	39,	'2222 222 22',	'',	'2020-03-02 08:01:13'),
(65,	1,	'test',	'',	'2020-03-02 08:01:53'),
(66,	2,	'666',	'',	'2020-03-02 08:02:07'),
(67,	2,	'dfdfdf',	'',	'2020-03-02 08:02:51'),
(68,	2,	'ff',	'',	'2020-03-02 08:02:54'),
(69,	2,	'2222',	'',	'2020-03-02 08:03:35'),
(70,	2,	'963',	'',	'2020-03-02 10:36:13'),
(71,	2,	'963',	'',	'2020-03-02 10:36:21'),
(72,	2,	'67',	'',	'2020-03-02 10:36:31'),
(73,	2,	'ree',	'',	'2020-03-02 10:36:43'),
(74,	2,	'ree',	'',	'2020-03-02 10:36:47'),
(75,	2,	'ree',	'',	'2020-03-02 10:36:50'),
(76,	2,	'ree',	'',	'2020-03-02 10:36:55'),
(77,	2,	'6',	'',	'2020-03-02 10:37:58'),
(78,	2,	'3',	'',	'2020-03-02 16:56:10');

DROP TABLE IF EXISTS `talent_wishlist_1`;
CREATE TABLE `talent_wishlist_1` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name_options` varchar(32) NOT NULL DEFAULT '' COMMENT 'Name talent_wishlist_1',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `talent_wishlist_1` (`o_id`, `o_name_options`) VALUES
(1,	'text1'),
(2,	'text2'),
(3,	'text3');

DROP TABLE IF EXISTS `talent_wishlist_2`;
CREATE TABLE `talent_wishlist_2` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name_options` varchar(32) NOT NULL DEFAULT '' COMMENT 'Name talent_wishlist_1',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `talent_wishlist_2` (`o_id`, `o_name_options`) VALUES
(1,	'text4'),
(2,	'text5'),
(3,	'text6');

DROP TABLE IF EXISTS `talent_wishlist_3`;
CREATE TABLE `talent_wishlist_3` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name_options` varchar(32) NOT NULL DEFAULT '' COMMENT 'Name talent_wishlist_1',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `talent_wishlist_3` (`o_id`, `o_name_options`) VALUES
(1,	'text7'),
(2,	'text8'),
(3,	'text9');

DROP TABLE IF EXISTS `talent_wishlist_4`;
CREATE TABLE `talent_wishlist_4` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name_options` varchar(32) NOT NULL DEFAULT '' COMMENT 'Name talent_wishlist_1',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `talent_wishlist_4` (`o_id`, `o_name_options`) VALUES
(1,	'text10'),
(2,	'text11'),
(3,	'text12');

DROP TABLE IF EXISTS `talent_wishlist_5`;
CREATE TABLE `talent_wishlist_5` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name_options` varchar(32) NOT NULL DEFAULT '' COMMENT 'Name talent_wishlist_1',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `talent_wishlist_5` (`o_id`, `o_name_options`) VALUES
(1,	'text13'),
(2,	'text14'),
(3,	'text15');

DROP TABLE IF EXISTS `talent_wishlist_6`;
CREATE TABLE `talent_wishlist_6` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name_options` varchar(32) NOT NULL DEFAULT '' COMMENT 'Name talent_wishlist_1',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `talent_wishlist_6` (`o_id`, `o_name_options`) VALUES
(1,	'text16'),
(2,	'text17'),
(3,	'text18');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `cometchat_uid` int(11) DEFAULT NULL,
  `confirm` bit(1) NOT NULL DEFAULT b'0' COMMENT 'User account confermed EMAIL',
  `useremail` varchar(64) NOT NULL DEFAULT '' COMMENT 'User email',
  `email_receive_subsequent` bit(1) NOT NULL DEFAULT b'0' COMMENT 'You agree to receive subsequent email',
  `role` varchar(16) NOT NULL DEFAULT '' COMMENT 'User role',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT 'User password',
  `password_ch_code` varchar(64) NOT NULL DEFAULT '' COMMENT 'Password Recovery Code',
  `email_confirmation_code` varchar(64) NOT NULL DEFAULT '',
  `first_name` varchar(32) NOT NULL DEFAULT '' COMMENT 'User name',
  `last_name` varchar(32) NOT NULL DEFAULT '' COMMENT 'User name',
  `avatar` varchar(16) NOT NULL DEFAULT '' COMMENT 'Avatar URL',
  `phone` varchar(16) NOT NULL DEFAULT '' COMMENT 'User phone number',
  `employer_job_title` varchar(64) NOT NULL DEFAULT '' COMMENT 'Your job free title',
  `employer_company_name` varchar(64) NOT NULL DEFAULT '' COMMENT 'Company Name',
  `employer_employ_count` int(11) NOT NULL DEFAULT '0' COMMENT 'Employees in company',
  `employer_country` varchar(32) NOT NULL DEFAULT '' COMMENT 'EMPLOYER location Headquarters Address',
  `employer_state` varchar(32) NOT NULL DEFAULT '' COMMENT 'EMPLOYER location Headquarters Address',
  `employer_city` varchar(32) NOT NULL DEFAULT '' COMMENT 'EMPLOYER location Headquarters Address',
  `employer_zip` varchar(32) NOT NULL DEFAULT '' COMMENT 'EMPLOYER location Headquarters Address',
  `employer_talent_v1` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'EMPLOYER location City',
  `employer_talent_v2` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Standing out to candidates in a competitive market',
  `employer_talent_v3` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Finding candidates with the right skills and level of experience',
  `employer_talent_v4` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Knowing what salaries I need to offer',
  `employer_talent_v5` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Knowing what salaries I need to offer',
  `talent_job` bigint(20) DEFAULT NULL COMMENT 'What type of position do you currently have?',
  `talent_job_experience` int(11) DEFAULT NULL COMMENT 'Job max experience',
  `talent_add_exp_1` varchar(32) NOT NULL DEFAULT '' COMMENT 'Talent added skills',
  `talent_add_exp_2` varchar(32) NOT NULL DEFAULT '' COMMENT 'Talent added skills',
  `talent_add_exp_3` varchar(32) NOT NULL DEFAULT '' COMMENT 'Talent added skills',
  `talent_add_exp_4` varchar(32) NOT NULL DEFAULT '' COMMENT 'Talent added skills',
  `talent_add_exp_5` varchar(32) NOT NULL DEFAULT '' COMMENT 'Talent added skills',
  `talent_employ_type_1` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'What type of employment are you seeking? (Permanent (full-time))',
  `talent_employ_type_2` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'What type of employment are you seeking? (Contract)',
  `talent_employ_type_3` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'What type of employment are you seeking? (Intern)',
  `talent_sharing_mail_1` varchar(32) NOT NULL DEFAULT '' COMMENT 'Earn $1000 by sharing Wona',
  `talent_sharing_mail_2` varchar(32) NOT NULL DEFAULT '' COMMENT 'Earn $1000 by sharing Wona',
  `talent_sharing_mail_3` varchar(32) NOT NULL DEFAULT '' COMMENT 'Earn $1000 by sharing Wona',
  `talent_sharing_mail_4` varchar(32) NOT NULL DEFAULT '' COMMENT 'Earn $1000 by sharing Wona',
  `talent_sharing_mail_5` varchar(32) NOT NULL DEFAULT '' COMMENT 'Earn $1000 by sharing Wona',
  `talent_wishlist_1` varchar(255) NOT NULL DEFAULT '0' COMMENT 'I’m looking for a company that has',
  `talent_wishlist_2` varchar(255) NOT NULL DEFAULT '0' COMMENT 'I’d like to work at a company with',
  `talent_wishlist_3` varchar(255) NOT NULL DEFAULT '0' COMMENT 'My ideal company would be in these industries:',
  `talent_wishlist_4` varchar(255) NOT NULL DEFAULT '0' COMMENT 'I aspire to work in these top technologies:',
  `talent_wishlist_5` varchar(255) NOT NULL DEFAULT '0' COMMENT 'I’m looking for a new position as a(n)',
  `talent_wishlist_6` varchar(255) NOT NULL DEFAULT '0' COMMENT 'My preffered company to work for:',
  `talent_salary` int(11) NOT NULL DEFAULT '0' COMMENT 'What is your salary expectation from new role?',
  `talent_salary_currency` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'currency',
  `talent_remote` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Are you interested in working remotely?',
  `talent_searc_where` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Where are you in your job search?',
  `talent_start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Start date',
  `talent_europe_auth` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Do you have valid immigration permission to work in this country?',
  `talent_immigration_help` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Will you require assistance from your prospective employer in order to obtain an immigration permission to work in this country?',
  `talent_url_lin` varchar(32) NOT NULL DEFAULT '' COMMENT 'LinkedIn Profile URL:(Optional)',
  `talent_url_portfolio` varchar(32) NOT NULL DEFAULT '' COMMENT 'Portfolio/Personal Website: (Optional)',
  `talent_url_portfolio_pass` varchar(32) NOT NULL DEFAULT '' COMMENT 'Enter Portfolio password (if you don’t have one, leave blank.)',
  `talent_url_github` varchar(32) NOT NULL DEFAULT '' COMMENT 'GitHub URL: (Optional)',
  `talent_resume_url` varchar(16) NOT NULL DEFAULT '' COMMENT 'Resume URL',
  PRIMARY KEY (`id`),
  KEY `wona_user_fk1` (`talent_job`),
  CONSTRAINT `wona_user_fk1` FOREIGN KEY (`talent_job`) REFERENCES `job` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All users';

INSERT INTO `user` (`id`, `cometchat_uid`, `confirm`, `useremail`, `email_receive_subsequent`, `role`, `password`, `password_ch_code`, `email_confirmation_code`, `first_name`, `last_name`, `avatar`, `phone`, `employer_job_title`, `employer_company_name`, `employer_employ_count`, `employer_country`, `employer_state`, `employer_city`, `employer_zip`, `employer_talent_v1`, `employer_talent_v2`, `employer_talent_v3`, `employer_talent_v4`, `employer_talent_v5`, `talent_job`, `talent_job_experience`, `talent_add_exp_1`, `talent_add_exp_2`, `talent_add_exp_3`, `talent_add_exp_4`, `talent_add_exp_5`, `talent_employ_type_1`, `talent_employ_type_2`, `talent_employ_type_3`, `talent_sharing_mail_1`, `talent_sharing_mail_2`, `talent_sharing_mail_3`, `talent_sharing_mail_4`, `talent_sharing_mail_5`, `talent_wishlist_1`, `talent_wishlist_2`, `talent_wishlist_3`, `talent_wishlist_4`, `talent_wishlist_5`, `talent_wishlist_6`, `talent_salary`, `talent_salary_currency`, `talent_remote`, `talent_searc_where`, `talent_start_date`, `talent_europe_auth`, `talent_immigration_help`, `talent_url_lin`, `talent_url_portfolio`, `talent_url_portfolio_pass`, `talent_url_github`, `talent_resume_url`) VALUES
(1,	1,	CONV('1', 2, 10) + 0,	'talent@wona.com',	CONV('1', 2, 10) + 0,	'talent',	'123',	'',	'',	'Pavel',	'Rashkin',	'',	'111',	' ',	' ',	0,	'',	' ',	' ',	' ',	0,	0,	0,	0,	0,	1,	0,	'',	'',	'',	'',	'',	1,	1,	1,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	0,	'2020-02-21 15:28:13',	0,	0,	'',	'',	'',	'',	''),
(2,	2,	CONV('1', 2, 10) + 0,	'employer@wona.com',	CONV('1', 2, 10) + 0,	'employer',	'456',	'456',	'',	'Wona',	'Inc.',	'',	'222',	'Alabama JBL',	'Alabama Int',	0,	'Alabama A',	'Alabama N',	'Alabama N',	'Alabama N',	0,	0,	0,	0,	0,	1,	0,	'',	'',	'',	'',	'',	1,	1,	1,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	1,	0,	'2020-02-21 15:28:13',	0,	0,	'',	'',	'',	'',	''),
(3,	NULL,	CONV('1', 2, 10) + 0,	'recruiter@wona.com',	CONV('1', 2, 10) + 0,	'recruiter',	'789',	'789',	'',	'Morgan',	'Morgan',	'',	'333',	' ',	' ',	0,	'',	' ',	' ',	' ',	0,	0,	0,	0,	0,	1,	0,	'',	'',	'',	'',	'',	2,	2,	2,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	1,	0,	'2020-02-21 15:28:13',	0,	1,	'',	'',	'',	'',	''),
(4,	4,	CONV('1', 2, 10) + 0,	'super@wona.com',	CONV('1', 2, 10) + 0,	'superadmin',	'000',	'000',	'',	'Super',	'Pavel',	'',	'444',	' ',	' ',	0,	'',	' ',	' ',	' ',	0,	0,	0,	0,	0,	1,	0,	'',	'',	'',	'',	'',	2,	2,	2,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	0,	'2020-02-21 15:28:13',	0,	1,	'',	'',	'',	'',	''),
(20,	NULL,	CONV('1', 2, 10) + 0,	'laurence@liontech.io',	CONV('1', 2, 10) + 0,	'employer',	'Arsenal1983',	'',	'',	'Laurence ',	'Cohen',	'',	'07496 996 105',	'Chief Executive Officer',	'Lion Technologies ',	15,	'',	'',	'',	'',	0,	0,	0,	0,	0,	NULL,	NULL,	'',	'',	'',	'',	'',	0,	0,	0,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	0,	'2020-02-25 08:58:14',	0,	0,	'',	'',	'',	'',	''),
(23,	NULL,	CONV('1', 2, 10) + 0,	'ldcohen1983@icloud.com',	CONV('1', 2, 10) + 0,	'talent',	'Arsenal1983',	'',	'',	'Laurence ',	'Cohen',	'',	'07496996105',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	6,	'Java',	'Python',	'C++',	'',	'',	1,	2,	3,	'',	'',	'',	'',	'',	'1',	'1',	'3',	'2',	'1',	'0',	80000,	0,	0,	1,	'0000-00-00 00:00:00',	1,	0,	'https://www.linkedin.com',	'',	'',	'',	''),
(24,	NULL,	CONV('1', 2, 10) + 0,	'100carlosruiz100@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'helloworld100*',	'',	'',	'Carlos',	'Ruiz',	'',	'+44 7273 662517',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'Python',	'Java',	'JavaScript',	'',	'',	1,	2,	3,	'82perjuan82@gmail.com',	'',	'',	'',	'',	'1',	'2',	'0',	'3',	'1',	'1',	100000,	0,	0,	1,	'0000-00-00 00:00:00',	1,	0,	'',	'',	'',	'',	''),
(25,	0,	CONV('1', 2, 10) + 0,	'1wp.dev.morgan@gmail.com',	CONV('1', 2, 10) + 0,	'employer',	'789456123',	'2697827279',	'',	'xxTestxx',	'xxTestxx',	'',	'+380638913864',	'React.js',	'WebDev',	15,	'UK',	'London',	'London',	'London',	0,	0,	0,	0,	0,	NULL,	NULL,	'',	'',	'',	'',	'',	0,	0,	0,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	0,	'2020-02-26 15:30:37',	0,	0,	'',	'',	'',	'',	''),
(26,	NULL,	CONV('1', 2, 10) + 0,	'bh.carvalho@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'teste123A',	'',	'',	'Fernando',	'Santana',	'',	'+55(31) 98664045',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	10,	'php',	'Linux',	'javascript Vanilla',	'Vue.js',	'html / css',	1,	2,	3,	'fernando_br6@hotmail.com',	'',	'',	'',	'',	'2',	'1',	'4',	'2',	'1',	'1',	75,	0,	0,	2,	'0000-00-00 00:00:00',	0,	1,	'https://www.linkedin.com/in/fern',	'https://www.behance.net/gallery/',	'',	'https://github.com/NandoSantana',	''),
(39,	39,	CONV('1', 2, 10) + 0,	'superpuperlesha@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'111',	'4819889679',	'',	'Alex',	'Fandeev',	'',	'+380671227279',	'',	'',	35,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	0,	0,	0,	'superpuperlesha@gmail.com',	'superpuperlesha@gmail.com',	'superpuperlesha@gmail.com',	'superpuperlesha@gmail.com',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	1,	'1970-01-01 03:00:00',	0,	0,	'',	'',	'',	'',	''),
(43,	NULL,	CONV('0', 2, 10) + 0,	'ldcohen@hotmail.co.uk',	CONV('1', 2, 10) + 0,	'talent',	'Arsenal1983',	'',	'2428889434',	'Laurence',	'Cohen',	'',	'07496996105',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	10,	'+Java',	'Linux',	'Python',	'C++',	'C',	1,	2,	3,	'ldcohen1983@icloud.com',	'ldcohen@hotmail.co.uk',	'ldc436@hotmail.com',	'',	'',	'0',	'4',	'0',	'0',	'0',	'0',	100000,	2,	0,	1,	'0000-00-00 00:00:00',	1,	0,	'',	'',	'',	'',	''),
(44,	44,	CONV('1', 2, 10) + 0,	'developmentenvioroment@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'111',	'',	'',	'Alex',	'Popov',	'',	'+380671227279',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	1,	2,	3,	'superpuperlesha@gmail.com',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	30000,	1,	0,	1,	'0000-00-00 00:00:00',	0,	0,	'https://www.linkedin.com/feed/',	'https://balkonteplo.kh.ua/',	'1234567890',	'https://github.com/',	''),
(45,	NULL,	CONV('0', 2, 10) + 0,	'2@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'111',	'',	'4112706260',	'Alex',	'Popov',	'',	'+380671227279',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	0,	0,	0,	'superpuperlesha@gmail.com',	'superpuperlesha@gmail.com',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	1000,	0,	0,	1,	'1970-01-01 03:00:00',	0,	0,	'https://www.linkedin.com/feed/',	'https://balkonteplo.kh.ua/',	'1234567890',	'https://github.com/',	''),
(46,	NULL,	CONV('0', 2, 10) + 0,	'3@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'111',	'',	'8152728368',	'Alex',	'Popov',	'',	'+380671227279',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	0,	0,	0,	'superpuperlesha@gmail.com',	'superpuperlesha@gmail.com',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	1000,	0,	0,	1,	'1970-01-01 03:00:00',	0,	0,	'https://www.linkedin.com/feed/',	'https://balkonteplo.kh.ua/',	'1234567890',	'https://github.com/',	''),
(47,	NULL,	CONV('0', 2, 10) + 0,	'4@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'111',	'',	'3232874007',	'Alex',	'Popov',	'',	'+380671227279',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	1,	2,	3,	'superpuperlesha@gmail.com',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	1000,	0,	0,	1,	'1970-01-01 03:00:00',	0,	0,	'https://www.linkedin.com/',	'47.pdf',	'1234567890',	'https://github.com/',	''),
(48,	48,	CONV('1', 2, 10) + 0,	'5@gmail.com',	CONV('1', 2, 10) + 0,	'talent',	'111',	'',	'',	'Alex',	'Popov',	'',	'+380671227279',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	1,	2,	3,	'superpuperlesha@gmail.com',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	1000,	0,	0,	1,	'1970-01-01 03:00:00',	0,	0,	'https://www.linkedin.com/',	'48.pdf',	'1234567890',	'https://github.com/',	''),
(49,	49,	CONV('1', 2, 10) + 0,	'6@gmail.com',	CONV('1', 2, 10) + 0,	'employer',	'111',	'',	'',	'Alex',	'Popov',	'',	'+380671227279',	'111',	'111111111111111',	100,	'India',	'',	'Maharashtra',	'',	0,	0,	0,	0,	0,	NULL,	NULL,	'',	'',	'',	'',	'',	0,	0,	0,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	0,	'2020-03-04 13:45:41',	0,	0,	'',	'',	'',	'',	''),
(50,	50,	CONV('1', 2, 10) + 0,	'7@gmail.com',	CONV('1', 2, 10) + 0,	'employer',	'111',	'',	'',	'Alex',	'Popov',	'',	'+380671227279',	'111',	'111111111111111',	100,	'India',	'',	'Maharashtra',	'',	0,	0,	0,	0,	0,	NULL,	NULL,	'',	'',	'',	'',	'',	0,	0,	0,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	0,	'2020-03-04 13:48:56',	0,	0,	'',	'',	'',	'',	''),
(52,	52,	CONV('1', 2, 10) + 0,	'8@gmail.com',	CONV('1', 2, 10) + 0,	'employer',	'111',	'',	'',	'Alexxx',	'Poppovvvv',	'',	'+380671227279',	'',	'',	0,	'Ukraine',	'Zaporizhia Oblast',	'Ukrainka',	'70051',	0,	0,	0,	0,	0,	NULL,	NULL,	'',	'',	'',	'',	'',	0,	0,	0,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	0,	'2020-03-04 14:01:04',	0,	0,	'',	'',	'',	'',	''),
(53,	NULL,	CONV('0', 2, 10) + 0,	'1',	CONV('0', 2, 10) + 0,	'talent',	'',	'',	'1503824446',	'1',	'1',	'',	'1',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	0,	0,	0,	'',	'',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	7000,	0,	0,	1,	'2020-04-03 00:00:00',	0,	0,	'',	'',	'',	'',	''),
(54,	NULL,	CONV('0', 2, 10) + 0,	'xxxsuperpuperlesha@gmail.com',	CONV('0', 2, 10) + 0,	'talent',	'',	'',	'1544709872',	'Алексей',	'Фандеев',	'',	'+380671227279',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	1,	0,	'111',	'',	'',	'',	'',	1,	2,	3,	'',	'',	'',	'',	'',	'4',	'0',	'0',	'0',	'0',	'0',	0,	0,	0,	2,	'2020-04-03 00:00:00',	0,	0,	'',	'',	'',	'',	''),
(55,	NULL,	CONV('0', 2, 10) + 0,	'p@r.ru',	CONV('1', 2, 10) + 0,	'talent',	'123',	'',	'7621255275',	'p',	'r',	'',	'+79990852345',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	4,	10,	'125',	'18',	'17',	'19',	'16',	1,	2,	3,	'1@1.ru',	'1@1.ru',	'1@.ru',	'',	'',	'1',	'1',	'1',	'1',	'2',	'2',	1,	1,	0,	1,	'2020-09-03 00:00:00',	1,	1,	'',	'',	'',	'',	''),
(56,	NULL,	CONV('0', 2, 10) + 0,	'g@e.ru',	CONV('1', 2, 10) + 0,	'talent',	'1234',	'',	'1161365942',	'G',	'E',	'',	'+79990852345',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	4,	10,	'123',	'18',	'17',	'19',	'16',	1,	2,	3,	'1@1.ru',	'1@1.ru',	'',	'',	'',	'1',	'1',	'2',	'2',	'2',	'3',	100,	0,	0,	1,	'0000-00-00 00:00:00',	1,	1,	'',	'',	'',	'',	''),
(57,	NULL,	CONV('0', 2, 10) + 0,	'ldc1983@icloud.com',	CONV('1', 2, 10) + 0,	'talent',	'Arsenal1983',	'',	'6544384705',	'L',	'C',	'',	'07496996105',	'',	'',	0,	'',	'',	'',	'',	0,	0,	0,	0,	0,	4,	0,	'java',	'linux',	'',	'',	'',	0,	0,	0,	'ldcohen1983@icloud.com',	'ldcohen1983@icloud.com',	'',	'',	'',	'0',	'0',	'0',	'0',	'0',	'0',	1,	0,	0,	2,	'2020-05-03 00:00:00',	1,	0,	'',	'',	'',	'',	'');

DROP TABLE IF EXISTS `user_employer_job_relation`;
CREATE TABLE `user_employer_job_relation` (
  `uejr_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uejr_user_id` bigint(20) NOT NULL COMMENT 'User employer ID',
  `uejr_job_id` bigint(20) NOT NULL COMMENT 'Job ID',
  PRIMARY KEY (`uejr_id`),
  KEY `user_employer_job_relation_fk1` (`uejr_job_id`),
  KEY `user_employer_job_relation_fk2` (`uejr_user_id`),
  CONSTRAINT `user_employer_job_relation_fk1` FOREIGN KEY (`uejr_job_id`) REFERENCES `job` (`job_id`),
  CONSTRAINT `user_employer_job_relation_fk2` FOREIGN KEY (`uejr_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='Relatios user[talent] && job';


DROP TABLE IF EXISTS `user_employer_region`;
CREATE TABLE `user_employer_region` (
  `utr_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `utr_user_id` bigint(20) NOT NULL COMMENT 'User ID',
  `utr_country` varchar(32) NOT NULL DEFAULT '' COMMENT 'Country name',
  `utr_city` varchar(32) NOT NULL DEFAULT '' COMMENT 'City name',
  PRIMARY KEY (`utr_id`) USING BTREE,
  KEY `user_employer_region_fk1` (`utr_user_id`) USING BTREE,
  CONSTRAINT `user_employer_region_fk1` FOREIGN KEY (`utr_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user[talent] Possible cities for work';

INSERT INTO `user_employer_region` (`utr_id`, `utr_user_id`, `utr_country`, `utr_city`) VALUES
(1,	25,	'United Kingdom',	'England'),
(2,	49,	'South Africa',	'Limpopo'),
(3,	50,	'South Africa',	'Limpopo');

DROP TABLE IF EXISTS `user_talent_education`;
CREATE TABLE `user_talent_education` (
  `ee_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `ee_user_id` bigint(20) NOT NULL COMMENT 'talent user ID',
  `ee_name` varchar(64) NOT NULL DEFAULT '' COMMENT 'University / College',
  `ee_degree` varchar(64) NOT NULL DEFAULT '' COMMENT 'Degree',
  `ee_year` int(11) NOT NULL COMMENT 'Graduation year',
  PRIMARY KEY (`ee_id`),
  KEY `user_talent_education_exp_fk1` (`ee_user_id`),
  CONSTRAINT `user_talent_education_exp_fk1` FOREIGN KEY (`ee_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='User[talent] education';

INSERT INTO `user_talent_education` (`ee_id`, `ee_user_id`, `ee_name`, `ee_degree`, `ee_year`) VALUES
(1,	23,	'University of Leeds',	'Engineering',	2016),
(2,	24,	'University College London',	'BSc Computer Science',	2018),
(3,	26,	'PUC Minas',	'Archtecture software distribuited',	2019),
(4,	26,	'Newton Paiva',	'Advertising',	0),
(5,	39,	'HNURE',	'Engineering',	2000),
(6,	45,	'333',	'3333333333333333333333',	2019),
(7,	45,	'44444444444444',	'4444444 444444444 444444444 44444444444',	2021),
(8,	46,	'333',	'3333333333333333333333',	2019),
(9,	46,	'44444444444444',	'4444444 444444444 444444444 44444444444',	2021),
(10,	47,	'111',	'111111111111111111',	2018),
(11,	47,	'222',	'222222222222222222222222',	2019),
(12,	48,	'111',	'111111111111111111',	2018),
(13,	48,	'222',	'222222222222222222222222',	2019);

DROP TABLE IF EXISTS `user_talent_job_detail_relation`;
CREATE TABLE `user_talent_job_detail_relation` (
  `ujr_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `ujr_user_id` bigint(20) NOT NULL COMMENT 'User ID',
  `ujr_job_detail_id` bigint(20) NOT NULL COMMENT 'Job ID',
  `ujr_job_detail_experience` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Rank your specialties and add yours of experience',
  PRIMARY KEY (`ujr_id`),
  KEY `user_job_detail_relation_fk1` (`ujr_job_detail_id`),
  KEY `user_job_detail_relation_fk2` (`ujr_user_id`),
  CONSTRAINT `user_job_detail_relation_fk1` FOREIGN KEY (`ujr_job_detail_id`) REFERENCES `job_detail` (`jd_id`),
  CONSTRAINT `user_job_detail_relation_fk2` FOREIGN KEY (`ujr_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='user[talent] job_detail relations';


DROP TABLE IF EXISTS `user_talent_region`;
CREATE TABLE `user_talent_region` (
  `utr_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `utr_user_id` bigint(20) NOT NULL COMMENT 'User ID',
  `utr_country` varchar(32) NOT NULL DEFAULT '' COMMENT 'Country name',
  `utr_city` varchar(32) NOT NULL DEFAULT '' COMMENT 'City name',
  PRIMARY KEY (`utr_id`),
  KEY `user_talent_region_fk1` (`utr_user_id`),
  CONSTRAINT `user_talent_region_fk1` FOREIGN KEY (`utr_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='user[talent] Possible cities for work';

INSERT INTO `user_talent_region` (`utr_id`, `utr_user_id`, `utr_country`, `utr_city`) VALUES
(1,	24,	'United Kingdom',	'England'),
(3,	39,	'United States',	'Texas'),
(4,	39,	'United States',	'California'),
(5,	39,	'Kiribati',	'Line Islands'),
(6,	39,	'Ukraine',	'Kyiv Oblast'),
(7,	39,	'Ukraine',	'Zaporizhia Oblast'),
(8,	39,	'India',	'Punjab'),
(9,	39,	'India',	'West Bengal'),
(10,	39,	'South Africa',	'Limpopo'),
(11,	39,	'Indonesia',	'Central Java'),
(12,	43,	'United Kingdom',	'London'),
(13,	44,	'Ukraine',	'Ukrainka'),
(14,	44,	'Spain',	'Usansolo'),
(15,	54,	'Ukraine',	'Ukrainka');

DROP TABLE IF EXISTS `user_talent_work_experience`;
CREATE TABLE `user_talent_work_experience` (
  `we_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `we_user_id` bigint(20) NOT NULL COMMENT 'Useк ID',
  `we_company` varchar(64) NOT NULL DEFAULT '' COMMENT 'Company name',
  `we_title` varchar(64) NOT NULL DEFAULT '' COMMENT 'Your title',
  `we_start_year` int(11) NOT NULL,
  `we_start_month` tinyint(4) NOT NULL,
  `we_and_year` int(11) NOT NULL,
  `we_and_month` tinyint(4) NOT NULL,
  `we_current` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'I currently work here.',
  `we_description` varchar(128) NOT NULL DEFAULT '' COMMENT 'Work Description',
  PRIMARY KEY (`we_id`),
  KEY `user_talent_work_experience_fk1` (`we_user_id`),
  CONSTRAINT `user_talent_work_experience_fk1` FOREIGN KEY (`we_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='user[talent] places of previous work';

INSERT INTO `user_talent_work_experience` (`we_id`, `we_user_id`, `we_company`, `we_title`, `we_start_year`, `we_start_month`, `we_and_year`, `we_and_month`, `we_current`, `we_description`) VALUES
(1,	24,	'ABC Software Solutions',	'Junior Software Engineer',	2018,	0,	0,	0,	1,	'Used Python, Java and JavaScript across different software development projects.'),
(2,	26,	'Minas Update',	'Web Master / Desenvolvedor',	0,	0,	0,	0,	1,	'I make landing pages, sistes and systems web'),
(3,	39,	'BigDrop',	'Full stack',	2017,	6,	2019,	2,	0,	'Slicing, implementation wordpress, inner optimization'),
(4,	39,	'PSD to HTML',	'Full stack',	2019,	2,	2020,	1,	0,	'Slicing, implementation wordpress, inner optimization'),
(5,	39,	'Freelance',	'Any work',	2020,	1,	0,	0,	1,	'Slicing, implementation wordpress, inner optimization, any work'),
(6,	43,	'Lion Technologies',	'Managing Director',	0,	0,	0,	0,	1,	'Test123\r\nTest123'),
(7,	45,	'222',	'2222222222222',	2023,	0,	0,	0,	0,	'2qawsf\\se \\sfe\\sedf\\s \\swef|SAE |SWEfSAW'),
(8,	46,	'222',	'2222222222222',	2023,	0,	0,	0,	0,	'2qawsf\\se \\sfe\\sedf\\s \\swef|SAE |SWEfSAW'),
(9,	47,	'111',	'111111111111111',	2018,	1,	2021,	4,	1,	'111 111 111'),
(10,	47,	'222',	'222222222222222',	2020,	3,	0,	0,	0,	'222 222 222 222 222 222 222 222'),
(11,	48,	'111',	'111111111111111',	2018,	1,	2021,	4,	1,	'111 111 111'),
(12,	48,	'222',	'222222222222222',	2020,	3,	0,	0,	0,	'222 222 222 222 222 222 222 222');

-- 2020-03-05 23:15:46
