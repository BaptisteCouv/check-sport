<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190919102437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, id_team_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(120) NOT NULL, first_name VARCHAR(120) NOT NULL, num_licence VARCHAR(255) DEFAULT NULL, num_shirt INT DEFAULT NULL, post VARCHAR(100) DEFAULT NULL, profil_img VARCHAR(255) DEFAULT NULL, birth_date DATETIME NOT NULL, nom_phone INT DEFAULT NULL, size INT DEFAULT NULL, weight INT DEFAULT NULL, is_coach TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_98197A65E7927C74 (email), INDEX IDX_98197A65F7F171DE (id_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, id_joueur_id INT DEFAULT NULL, id_match_id INT DEFAULT NULL, message VARCHAR(255) DEFAULT NULL, date_message DATETIME DEFAULT NULL, INDEX IDX_B6BD307F29D76B4B (id_joueur_id), INDEX IDX_B6BD307F7A654043 (id_match_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, nb_victory INT DEFAULT NULL, nb_defeat INT DEFAULT NULL, team_name VARCHAR(255) NOT NULL, team_logo VARCHAR(255) DEFAULT NULL, stadium_adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `match` (id INT AUTO_INCREMENT NOT NULL, id_team_host_id INT NOT NULL, id_team_guest_id INT NOT NULL, winner TINYINT(1) DEFAULT NULL, looser TINYINT(1) DEFAULT NULL, datage DATETIME NOT NULL, score INT DEFAULT NULL, nb_present_player INT NOT NULL, postponed TINYINT(1) DEFAULT NULL, cancelage TINYINT(1) DEFAULT NULL, information VARCHAR(255) DEFAULT NULL, INDEX IDX_7A5BC505C300D5C0 (id_team_host_id), INDEX IDX_7A5BC5059C20AB43 (id_team_guest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65F7F171DE FOREIGN KEY (id_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F29D76B4B FOREIGN KEY (id_joueur_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7A654043 FOREIGN KEY (id_match_id) REFERENCES `match` (id)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505C300D5C0 FOREIGN KEY (id_team_host_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC5059C20AB43 FOREIGN KEY (id_team_guest_id) REFERENCES team (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F29D76B4B');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65F7F171DE');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC505C300D5C0');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC5059C20AB43');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7A654043');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE `match`');
    }
}
