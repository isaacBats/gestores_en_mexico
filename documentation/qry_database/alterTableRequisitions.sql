
ALTER TABLE `requisitions` 
ADD COLUMN `messeger` VARCHAR(150) NULL AFTER `message`,
ADD COLUMN `guia` VARCHAR(150) NULL AFTER `messeger`,
ADD COLUMN `date_sender` datetime NULL AFTER `guia`;