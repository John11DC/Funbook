<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214173220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_1');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE feedback');
        $this->addSql('DROP INDEX admin_Id ON user');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, DROP picture, DROP firstname, DROP lastname, DROP age, DROP phone, DROP verify, DROP admin_Id, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id VARCHAR(40) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, name VARCHAR(45) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE book (id VARCHAR(40) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, createdAt VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, title VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, description LONGTEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, photo MEDIUMTEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, user_Id VARCHAR(40) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, INDEX user_Id (user_Id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact (id VARCHAR(40) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, name VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, email VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, subject VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, message LONGTEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE feedback (id VARCHAR(40) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, comment LONGTEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, note TINYINT(1) NOT NULL, valid TINYINT(1) DEFAULT \'0\' NOT NULL, user_Id VARCHAR(40) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, INDEX user_Id (user_Id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT book_ibfk_1 FOREIGN KEY (user_Id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT feedback_ibfk_1 FOREIGN KEY (user_Id) REFERENCES user (id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD picture MEDIUMTEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ADD firstname VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ADD lastname VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ADD age INT DEFAULT NULL, ADD phone INT DEFAULT NULL, ADD verify TINYINT(1) DEFAULT \'0\', ADD admin_Id VARCHAR(40) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, DROP roles, CHANGE id id VARCHAR(40) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE email email VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE password password VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_1 FOREIGN KEY (admin_Id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX admin_Id ON user (admin_Id)');
    }
}
