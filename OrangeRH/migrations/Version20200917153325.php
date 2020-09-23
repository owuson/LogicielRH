<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200917153325 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conges (id INT AUTO_INCREMENT NOT NULL, jour_demande INT NOT NULL, jour_restant INT DEFAULT NULL, statut TINYINT(1) NOT NULL, date_demande DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_de_paie (id INT AUTO_INCREMENT NOT NULL, salaire DOUBLE PRECISION NOT NULL, heure_travaille INT NOT NULL, conges_restant DOUBLE PRECISION DEFAULT NULL, salaire_brut DOUBLE PRECISION NOT NULL, date_arrive DATE NOT NULL, salaire_horaire DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licenciement (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, raison LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, statut TINYINT(1) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE conges');
        $this->addSql('DROP TABLE fiche_de_paie');
        $this->addSql('DROP TABLE licenciement');
        $this->addSql('DROP TABLE message');
    }
}
