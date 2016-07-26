-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema soundcheck
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `soundcheck` ;

-- -----------------------------------------------------
-- Schema soundcheck
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `soundcheck` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `soundcheck` ;

-- -----------------------------------------------------
-- Table `soundcheck`.`administrators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`administrators` (
  `idAdministrator` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `permission` VARCHAR(40) NULL,
  `status` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`idAdministrator`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`users` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `photo` VARCHAR(100) NULL,
  `country` VARCHAR(50) NOT NULL,
  `estate` VARCHAR(100) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `zipcode` VARCHAR(45) NOT NULL,
  `registeredDate` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NULL,
  `permission` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`musicians`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`musicians` (
  `idUser` INT NOT NULL,
  `biography` MEDIUMTEXT NOT NULL,
  `website` VARCHAR(100) NULL,
  `facebook` VARCHAR(100) NULL,
  `twitter` VARCHAR(100) NULL,
  `youtube` VARCHAR(100) NULL,
  `myspace` VARCHAR(100) NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `fk_musicians_users`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`users` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`managers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`managers` (
  `idUser` INT NOT NULL,
  `agencyName` VARCHAR(150) NOT NULL,
  `description` TEXT NOT NULL,
  `website` VARCHAR(100) NULL,
  `facebook` VARCHAR(100) NULL,
  `twitter` VARCHAR(100) NULL,
  `youtube` VARCHAR(100) NULL,
  `myspace` VARCHAR(100) NULL,
  `phone` VARCHAR(25) NOT NULL,
  `contactEmail` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `fk_promoters_users1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`users` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`fans`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`fans` (
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `fk_fans_users1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`users` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`instruments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`instruments` (
  `idInstrument` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idInstrument`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`music_genres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`music_genres` (
  `idMusicGenre` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`idMusicGenre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`bands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`bands` (
  `idBand` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `about` MEDIUMTEXT NOT NULL,
  `photo` VARCHAR(100) NOT NULL,
  `website` VARCHAR(100) NULL,
  `facebook` VARCHAR(100) NULL,
  `twitter` VARCHAR(100) NULL,
  `youtube` VARCHAR(100) NULL,
  `myspace` VARCHAR(100) NULL,
  `country` VARCHAR(100) NOT NULL,
  `estate` VARCHAR(100) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `contactEmail` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(25) NULL,
  `latitude` VARCHAR(50) NOT NULL,
  `longitude` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idBand`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`albuns`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`albuns` (
  `idAlbum` INT NOT NULL AUTO_INCREMENT,
  `idBand` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `coverArt` VARCHAR(150) NOT NULL,
  `genre` VARCHAR(70) NOT NULL,
  `releaseDate` VARCHAR(11) NOT NULL,
  `label` VARCHAR(100) NOT NULL,
  `copyrightDate` VARCHAR(15) NOT NULL,
  `sellerLink` VARCHAR(150) NULL,
  `listeningLink` VARCHAR(150) NULL,
  PRIMARY KEY (`idAlbum`, `idBand`),
  INDEX `fk_albuns_bands1_idx` (`idBand` ASC),
  CONSTRAINT `fk_albuns_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`songs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`songs` (
  `idSong` INT NOT NULL AUTO_INCREMENT,
  `idAlbum` INT NOT NULL,
  `idBand` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `trackNumber` INT NOT NULL,
  `genre` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`idSong`, `idAlbum`, `idBand`),
  INDEX `fk_songs_albuns1_idx` (`idAlbum` ASC, `idBand` ASC),
  CONSTRAINT `fk_songs_albuns1`
    FOREIGN KEY (`idAlbum` , `idBand`)
    REFERENCES `soundcheck`.`albuns` (`idAlbum` , `idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`posts` (
  `idPost` INT NOT NULL AUTO_INCREMENT,
  `idBand` INT NOT NULL,
  `idAuthor` INT NOT NULL,
  `postName` VARCHAR(100) NOT NULL,
  `title` VARCHAR(250) NOT NULL,
  `content` LONGTEXT NOT NULL,
  `featuredImage` VARCHAR(100) NOT NULL,
  `date` VARCHAR(20) NOT NULL,
  `status` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idPost`, `idBand`),
  INDEX `fk_posts_bands_idx` (`idBand` ASC),
  INDEX `fk_post_musicians_idx` (`idAuthor` ASC),
  CONSTRAINT `fk_posts_bands`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_musicians`
    FOREIGN KEY (`idAuthor`)
    REFERENCES `soundcheck`.`musicians` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`tours`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`tours` (
  `idTour` INT NOT NULL AUTO_INCREMENT,
  `idBand` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `beginDate` VARCHAR(15) NOT NULL,
  `endDate` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idTour`, `idBand`),
  INDEX `fk_tours_bands1_idx` (`idBand` ASC),
  CONSTRAINT `fk_tours_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`shows`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`shows` (
  `idShow` INT NOT NULL AUTO_INCREMENT,
  `idBand` INT NOT NULL,
  `idTour` INT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `date` VARCHAR(15) NOT NULL,
  `timetable` VARCHAR(10) NOT NULL,
  `place` VARCHAR(100) NOT NULL,
  `latitude` VARCHAR(50) NOT NULL,
  `longitude` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idShow`, `idBand`),
  INDEX `fk_shows_bands1_idx` (`idBand` ASC),
  INDEX `fk_shows_tours1_idx` (`idTour` ASC),
  CONSTRAINT `fk_shows_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shows_tours1`
    FOREIGN KEY (`idTour`)
    REFERENCES `soundcheck`.`tours` (`idTour`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`gigs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`gigs` (
  `idGig` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NOT NULL,
  `description` TEXT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `place` VARCHAR(100) NULL,
  `date` VARCHAR(45) NOT NULL,
  `country` VARCHAR(100) NOT NULL,
  `estate` VARCHAR(100) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `district` VARCHAR(100) NULL,
  `street` VARCHAR(100) NULL,
  `number` VARCHAR(10) NULL,
  `complement` VARCHAR(100) NULL,
  `zipcode` VARCHAR(20) NULL,
  `phone` VARCHAR(25) NULL,
  `contactEmail` VARCHAR(100) NOT NULL,
  `latitude` VARCHAR(50) NOT NULL,
  `longitude` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idGig`, `idUser`),
  INDEX `fk_gigs_managers1_idx` (`idUser` ASC),
  CONSTRAINT `fk_gigs_managers1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`managers` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '							';


-- -----------------------------------------------------
-- Table `soundcheck`.`venues`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`venues` (
  `idVenue` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `about` TEXT NOT NULL,
  `website` VARCHAR(100) NULL,
  `facebook` VARCHAR(100) NULL,
  `twitter` VARCHAR(100) NULL,
  `youtube` VARCHAR(100) NULL,
  `country` VARCHAR(100) NOT NULL,
  `estate` VARCHAR(100) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `district` VARCHAR(100) NOT NULL,
  `street` VARCHAR(100) NOT NULL,
  `number` VARCHAR(10) NOT NULL,
  `complement` VARCHAR(100) NULL,
  `zipcode` VARCHAR(20) NOT NULL,
  `phone` VARCHAR(25) NOT NULL,
  `phoneAuxiliar` VARCHAR(25) NULL,
  `contactEmail` VARCHAR(100) NOT NULL,
  `latitude` VARCHAR(50) NOT NULL,
  `longitude` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idVenue`, `idUser`),
  INDEX `fk_venues_managers1_idx` (`idUser` ASC),
  CONSTRAINT `fk_venues_managers1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`managers` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`studios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`studios` (
  `idStudio` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `about` TEXT NOT NULL,
  `website` VARCHAR(100) NULL,
  `facebook` VARCHAR(100) NULL,
  `twitter` VARCHAR(100) NULL,
  `youtube` VARCHAR(100) NULL,
  `country` VARCHAR(100) NOT NULL,
  `estate` VARCHAR(100) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `district` VARCHAR(100) NOT NULL,
  `street` VARCHAR(100) NOT NULL,
  `number` VARCHAR(10) NOT NULL,
  `complement` VARCHAR(100) NULL,
  `zipcode` VARCHAR(20) NOT NULL,
  `phone` VARCHAR(25) NOT NULL,
  `phoneAuxiliar` VARCHAR(25) NULL,
  `contactEmail` VARCHAR(100) NOT NULL,
  `latitude` VARCHAR(50) NOT NULL,
  `longitude` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idStudio`, `idUser`),
  INDEX `fk_studios_promoters1_idx` (`idUser` ASC),
  CONSTRAINT `fk_studios_promoters1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`managers` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';


-- -----------------------------------------------------
-- Table `soundcheck`.`members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`members` (
  `idMember` INT NOT NULL AUTO_INCREMENT,
  `idBand` INT NOT NULL,
  `name` VARCHAR(100) NULL,
  `photo` VARCHAR(100) NULL,
  `instrument` VARCHAR(100) NULL,
  PRIMARY KEY (`idMember`, `idBand`),
  INDEX `fk_membersBand_bands1_idx` (`idBand` ASC),
  CONSTRAINT `fk_membersBand_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`events` (
  `idEvent` INT NOT NULL AUTO_INCREMENT,
  `idVenue` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `about` TEXT NOT NULL,
  `website` VARCHAR(100) NULL,
  `facebook` VARCHAR(100) NULL,
  `twitter` VARCHAR(100) NULL,
  `youtube` VARCHAR(100) NULL,
  `place` VARCHAR(45) NOT NULL,
  `date` VARCHAR(45) NOT NULL,
  `country` VARCHAR(100) NOT NULL,
  `estate` VARCHAR(100) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `district` VARCHAR(100) NULL,
  `street` VARCHAR(100) NULL,
  `number` VARCHAR(10) NULL,
  `complement` VARCHAR(100) NULL,
  `zipcode` VARCHAR(20) NULL,
  `phone` VARCHAR(25) NOT NULL,
  `phoneAuxiliar` VARCHAR(25) NULL,
  `contactEmail` VARCHAR(100) NOT NULL,
  `latitude` VARCHAR(50) NOT NULL,
  `longitude` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idEvent`, `idVenue`),
  INDEX `fk_events_venues1_idx` (`idVenue` ASC),
  CONSTRAINT `fk_events_venues1`
    FOREIGN KEY (`idVenue`)
    REFERENCES `soundcheck`.`venues` (`idVenue`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`band_members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`band_members` (
  `idBand` INT NOT NULL,
  `idUser` INT NOT NULL,
  `instrument` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idBand`, `idUser`),
  INDEX `fk_bands_has_musicians_musicians1_idx` (`idUser` ASC),
  INDEX `fk_bands_has_musicians_bands1_idx` (`idBand` ASC),
  CONSTRAINT `fk_bands_has_musicians_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bands_has_musicians_musicians1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`musicians` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`band_followers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`band_followers` (
  `idUser` INT NOT NULL,
  `idBand` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idBand`),
  INDEX `fk_fans_has_bands_bands1_idx` (`idBand` ASC),
  INDEX `fk_fans_has_bands_fans1_idx` (`idUser` ASC),
  CONSTRAINT `fk_fans_has_bands_fans1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`fans` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fans_has_bands_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`event_participation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`event_participation` (
  `idUser` INT NOT NULL,
  `idEvent` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idEvent`),
  INDEX `fk_fans_has_events_events1_idx` (`idEvent` ASC),
  INDEX `fk_fans_has_events_fans1_idx` (`idUser` ASC),
  CONSTRAINT `fk_fans_has_events_fans1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`fans` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fans_has_events_events1`
    FOREIGN KEY (`idEvent`)
    REFERENCES `soundcheck`.`events` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`venue_followers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`venue_followers` (
  `idUser` INT NOT NULL,
  `idVenue` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idVenue`),
  INDEX `fk_fans_has_venues_venues1_idx` (`idVenue` ASC),
  INDEX `fk_fans_has_venues_fans1_idx` (`idUser` ASC),
  CONSTRAINT `fk_fans_has_venues_fans1`
    FOREIGN KEY (`idUser`)
    REFERENCES `soundcheck`.`fans` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fans_has_venues_venues1`
    FOREIGN KEY (`idVenue`)
    REFERENCES `soundcheck`.`venues` (`idVenue`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`band_styles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`band_styles` (
  `idMusicGenre` INT NOT NULL,
  `idBand` INT NOT NULL,
  PRIMARY KEY (`idMusicGenre`, `idBand`),
  INDEX `fk_music_genres_has_bands_bands1_idx` (`idBand` ASC),
  INDEX `fk_music_genres_has_bands_music_genres1_idx` (`idMusicGenre` ASC),
  CONSTRAINT `fk_music_genres_has_bands_music_genres1`
    FOREIGN KEY (`idMusicGenre`)
    REFERENCES `soundcheck`.`music_genres` (`idMusicGenre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_music_genres_has_bands_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soundcheck`.`band_instruments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundcheck`.`band_instruments` (
  `idInstrument` INT NOT NULL,
  `idBand` INT NOT NULL,
  PRIMARY KEY (`idInstrument`, `idBand`),
  INDEX `fk_bands_has_instruments_instruments1_idx` (`idInstrument` ASC),
  INDEX `fk_bands_has_instruments_bands1_idx` (`idBand` ASC),
  CONSTRAINT `fk_bands_has_instruments_bands1`
    FOREIGN KEY (`idBand`)
    REFERENCES `soundcheck`.`bands` (`idBand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bands_has_instruments_instruments1`
    FOREIGN KEY (`idInstrument`)
    REFERENCES `soundcheck`.`instruments` (`idInstrument`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `soundcheck`.`administrators`
-- -----------------------------------------------------
START TRANSACTION;
USE `soundcheck`;
INSERT INTO `soundcheck`.`administrators` (`idAdministrator`, `email`, `password`, `name`, `permission`, `status`) VALUES (1, 'guilherme.raminho@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Guilherme Raminho', 'Overlord', 'Active');

COMMIT;

