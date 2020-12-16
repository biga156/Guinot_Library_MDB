<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201215184622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, city VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, fees TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loan ADD CONSTRAINT FK_C5D30D03A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE loan_livre ADD CONSTRAINT FK_FBDA57C6CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_livre ADD CONSTRAINT FK_FBDA57C637D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_cdrom ADD CONSTRAINT FK_7D5E5438CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_cdrom ADD CONSTRAINT FK_7D5E5438497B6F6D FOREIGN KEY (cdrom_id) REFERENCES cdrom (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loan DROP FOREIGN KEY FK_C5D30D03A76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE loan_cdrom DROP FOREIGN KEY FK_7D5E5438CE73868F');
        $this->addSql('ALTER TABLE loan_cdrom DROP FOREIGN KEY FK_7D5E5438497B6F6D');
        $this->addSql('ALTER TABLE loan_livre DROP FOREIGN KEY FK_FBDA57C6CE73868F');
        $this->addSql('ALTER TABLE loan_livre DROP FOREIGN KEY FK_FBDA57C637D925CB');
    }
}
